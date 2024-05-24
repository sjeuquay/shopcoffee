<?php

namespace App\Http\Controllers\Cart;

use App\Models\Cart\Cart;
use App\Models\Cart\CartItem;
use App\Models\Cart\CartItemAddOn;
use App\Models\Product\Product;
use App\Models\Product\Ingredient;
use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\Controller;
use App\Models\CartItem\CartItem as CartItemCartItem;
use App\Models\Product\ProductSpecification;
use App\Models\Product\SizeType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Models\Promotion;

class CartController extends Controller
{
    public function addToCart(Request $request, $productId)
    {
        // Kiểm tra xem người dùng đã đăng nhập chưa
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'You need to log in first.');
        }

        // Lấy thông tin sản phẩm từ yêu cầu
        $product = Product::findOrFail($productId);
        $quantity = 1; // Số lượng mặc định là 1 khi thêm vào giỏ hàng

        // Kiểm tra người dùng có giỏ hàng hoạt động không, nếu không, tạo mới
        $user = Auth::user();
        $cart = Cart::where('user_id', $user->id)
            ->where('active', 1)
            ->first();

        if (!$cart) {
            $cart = new Cart();
            $cart->user_id = $user->id;
            $cart->active = 1;
            $cart->save();
        }
        $input_size_type = $request->input('size_cup', null);


        if (!$input_size_type) {
            $sizeType = SizeType::where('is_default', 1)->first();

            // Nếu không tìm thấy kích thước mặc định, sử dụng giá mặc định của sản phẩm
            if (!$sizeType) {
                $productPrice = $product->unit_price;
            } else {
                $input_size_type = $sizeType->description;
            }
        }
        if ($input_size_type) {
            $sizeType = SizeType::where('description', $input_size_type)->first();
            // Nếu không tìm thấy kích thước, sử dụng giá mặc định của sản phẩm
            if (!$sizeType) {
                $productPrice = $product->unit_price;
            } else {
                // Tìm giá của sản phẩm dựa trên kích thước từ bảng product_specification
                $productSpecification = ProductSpecification::where('product_id', $productId)
                    ->where('size_id', $sizeType->id)
                    ->first();

                // Nếu không tìm thấy thông tin về kích thước trong bảng product_specification
                // Sử dụng giá mặc định của sản phẩm
                if (!$productSpecification) {
                    $productPrice = $product->unit_price;
                } else {
                    $productPrice = $productSpecification->specification_price + $product->unit_price;
                }
            }
        }
        // dd($size_type);
        // Tạo mới một mục trong bảng cart_item
        $cartItem = new CartItem();
        $cartItem->cart_id = $cart->id;
        $cartItem->size = $input_size_type;
        $cartItem->product_id = $productId;
        $cartItem->quantity = $quantity;
        $cartItem->price = $productPrice;
        $cartItem->sub_total = $quantity * $productPrice;

        $cartItem->save();
        // Xử lý cart_item_add_on nếu có
        $selectedOptions = json_decode($request->input('selectedOptions'), true);
        if ($selectedOptions) {
            foreach ($selectedOptions as $selectedOption) {
                $ingredientId = $selectedOption['ingredientId'];
                $optionName = $selectedOption['option'];

                $selectedIngredient = Ingredient::find($ingredientId);

                if ($selectedIngredient) {
                    $optionPrice = null;

                    // Xác định giá của option dựa trên tên option
                    if ($optionName == $selectedIngredient->option_1) {
                        $optionPrice = $selectedIngredient->unit_price1;
                    } elseif ($optionName == $selectedIngredient->option_2) {
                        $optionPrice = $selectedIngredient->unit_price2;
                    } elseif ($optionName == $selectedIngredient->option_3) {
                        $optionPrice = $selectedIngredient->unit_price3;
                    }

                    // Nếu giá không null, thêm option vào mục giỏ hàng
                    if ($optionPrice !== null) {
                        $option = new CartItemAddOn();
                        $option->cart_item_id = $cartItem->id;
                        $option->product_id = $productId;
                        $option->ingredient_id = $ingredientId;
                        $option->optionName = $optionName;
                        $option->quantity = 1;
                        $option->unit_price = $optionPrice;
                        $option->sub_total = $optionPrice; // Tính toán lại tổng giá trị sau này nếu cần
                        $option->save();
                    }
                }
            }
        }

        // Cập nhật tổng số lượng trong session
        $totalQuantity = Session::get('totalQuantity', 0);
        $totalQuantity += $quantity;
        Session::put('totalQuantity', $totalQuantity);
        return redirect()->back()->with('success', 'Product added to cart successfully.');
    }
    public function removeFromCart(Request $request, $productId)
    {
        // Kiểm tra xem người dùng đã đăng nhập hay chưa
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'You need to log in first.');
        }

        // Tìm kiếm giỏ hàng của người dùng đang đăng nhập
        $user = Auth::user();
        $cart = Cart::where('user_id', $user->id)
            ->where('active', 1)
            ->first();

        if (!$cart) {
            return redirect()->back()->with('error', 'No active cart found.');
        }
        $id = $request->input('cart_item_id');
        // Tìm kiếm và xóa mục trong bảng cart_item
        $cartItem = CartItem::where('id', $id)
            ->where('product_id', $productId)
            ->whereHas('cart', function ($query) use ($user) {
                $query->where('user_id', $user->id)->where('active', 1);
            })->first();

        if ($cartItem) {

            // Xóa mục khỏi giỏ hàng
            $cartItem->delete();

            // Xóa các addon liên quan đến sản phẩm
            CartItemAddOn::where('cart_item_id', $cartItem->id)->delete();

            // Kiểm tra xem giỏ hàng còn mục nào không
            $cartItemsExist = CartItem::where('cart_id', $cart->id)->exists();

            // Nếu không còn sản phẩm nào trong giỏ hàng, xóa cả giỏ hàng
            if (!$cartItemsExist) {
                $cart->delete();
            }
            return redirect()->back()->with('message', 'Product removed from cart successfully.');
        } else {
            return redirect()->back()->with('error', 'Product not found in cart.');
        }
    }
    public function showCart()
    {
        if (Auth::check()) {
            $user = Auth::user();

            $cart = Cart::where('user_id', $user->id)
                ->where('active', 1)
                ->first();

            if (!$cart) {
                $cartItems = [];
            } else {
                $cartItems = CartItem::where('cart_id', $cart->id)->get();
                foreach ($cartItems as $cartItem) {
                    $cartItem->addons = CartItemAddOn::where('cart_item_id', $cartItem->id)
                        ->where('product_id', $cartItem->product_id)
                        ->get();
                }
            }
        } else {
            $cartItems = [];
        }

        return view('client.cart.cart', [
            'cartItems' => $cartItems
        ]);
    }
    public function updateCartItemQuantity(Request $request)
    {
        $Id = $request->input('id');
        $cartId = $request->input('cart_id');
        $productId = $request->input('product_id');
        $quantity = $request->input('quantity');

        // Tìm kiếm cart item với id, cart_id và product_id tương ứng
        $cartItem = CartItem::where('id', $Id)
            ->where('cart_id', $cartId)
            ->where('product_id', $productId)
            ->first();

        // Kiểm tra xem cart item có tồn tại hay không
        if ($cartItem) {
            // Cập nhật số lượng và tổng phụ của cart item
            $cartItem->quantity = $quantity;
            $cartItem->sub_total = $cartItem->price * $quantity;

            // Lưu thay đổi vào cơ sở dữ liệu và kiểm tra kết quả
            if ($cartItem->save()) {
                $totalQuantity = CartItem::where('cart_id', $cartId)->sum('quantity');
                // Cập nhật giá trị totalQuantity vào session
                Session::put('totalQuantity', $totalQuantity);

                return response()->json(['success' => true, 'message' => 'Cart item updated successfully.']);
            } else {
                return response()->json(['error' => 'Failed to update cart item: ' . $cartItem->getError()]);
            }
        } else {
            return response()->json(['error' => 'Cart item not found.']);
        }
    }
    public function updateCartAddonQuantity(Request $request)
    {
        $addonId = $request->input('addon_id');
        $quantity = $request->input('quantity');

        // Tìm cart item addon theo ID
        $addon = CartItemAddOn::find($addonId);
        if (!$addon) {
            return response()->json(['success' => false, 'error' => 'Cart item addon not found']);
        }

        // Cập nhật số lượng và tổng tiền cho addon
        $addon->quantity = $quantity;
        $addon->sub_total = $addon->unit_price * $quantity;
        $addon->save();
        return response()->json(['success' => true]);
    }
}
