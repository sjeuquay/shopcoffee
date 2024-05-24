<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Cart\Cart;
use App\Models\Category;
use App\Models\Product\Product;
use App\Utils\getColumnName;
use App\Utils\Message;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\View;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct(Request $request,
        protected Product $product,
        protected Category $category,
        protected getColumnName $getColumnName
    ) {
        $admin = $request->session()->get('isAdmin');
        View::share('admin', $admin);
    }
    public function index()
    {
        $productList = Product::orderBy('id', 'desc')->get();
        // dd($productList);
        $title = 'Quản lý sản phẩm';
        return view("admin.product.list", compact("title", "productList"));
    }

    public function specification_page($id)
    {
        $title = 'Thông số kỹ thuật';
        return view('admin.product.specification.list', compact('title', 'id'));
    }
    public function sizeType_page()
    {
        return view('admin.product.sizeType');
    }
    public function sizeType_addForm()
    {
        $title = 'Size Type Add Form';
        return view('admin.product.sizeTypeAddForm', compact('title'));
    }
    public function sizeType_editForm($id)
    {
        $title = 'Size Type Edit Form';
        return view('admin.product.sizeTypeAddForm', compact('title'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Thêm sản phẩm';
        return view("admin.product.form", compact("title"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        $filename = null;
        if ($request->hasFile('internal_image_path')) {
            $file     = $request->file('internal_image_path');
            $filename = time() . '-' . $file->getClientOriginalName();
            $file->move(public_path('img/product'), $filename);
        }
        $validated                          = $request->all();
        $validated['internal_image_path'] = $filename;

        Product::create($validated);

        return redirect()->route('admin.products.list.index')
            ->with('response_message', Message::out('success', 'Thêm thành công.'));
    }

    /**
     * Display the specified resource.
     */

    public function home()
    {
        $title = 'index web';
        try {
            // Kiểm tra người dùng đã đăng nhập hay chưa
            $user = Auth::user();
            $totalQuantity = 0;
            if ($user) {
                $addressString = $user->address; // Lấy chuỗi địa chỉ từ cột address trong bảng user

                // Tách địa chỉ thành các phần tử mảng
                $addressParts = preg_split('/\|,\|/', $addressString, -1, PREG_SPLIT_NO_EMPTY);

                // Khởi tạo biến inputCompanyName
                $inputCompanyName = '';

                // Kiểm tra xem có phần tử tên công ty trong mảng không
                if (count($addressParts) > 5) {
                    // Nếu có, lấy và loại bỏ phần tử đầu tiên của mảng để gán vào inputCompanyName
                    $inputCompanyName = array_shift($addressParts);
                }

                // Gán các phần tử còn lại của mảng vào các biến tương ứng
                $inputPostal = array_shift($addressParts);
                $inputAddress = array_shift($addressParts);
                $district = array_shift($addressParts);
                $city = array_shift($addressParts);
                $country = implode(', ', $addressParts);

                $totalQuantity = 0;
                // Nếu đã đăng nhập, tính tổng số lượng sản phẩm trong giỏ hàng của người dùng và đưa vào session
                $cart = Cart::where('user_id', $user->id)
                    ->where('active', 1)
                    ->first();
                if ($cart) {
                    $totalQuantity = $cart->cartItems()->sum('quantity');
                }
                Session::put('totalQuantity', $totalQuantity);
                // Trả về mảng dữ liệu địa chỉ
                $address = [
                    'inputCompanyName' => $inputCompanyName,
                    'inputPostal' => $inputPostal,
                    'inputAddress' => $inputAddress,
                    'district' => $district,
                    'city' => $city,
                    'country' => $country
                ];
                Session::put('address', $address);
            }
            
            $product          = Product::orderBy('id', 'desc')->take(24)->get();
            $productTrennings = DB::table('products')
                ->select('products.id', 'products.name', 'products.description', 'products.unit_price', 'products.internal_image_path', 'products.short_description', 'products.meta_description', 'products.sku', 'products.url_key', DB::raw('SUM(order_details.quantity) as total_quantity'))
                ->leftJoin('order_details', 'products.id', '=', 'order_details.product_id')
                ->groupBy('products.id', 'products.name', 'products.description', 'products.unit_price', 'products.internal_image_path', 'products.short_description', 'products.meta_description', 'products.sku', 'products.url_key')
                ->orderByDesc('total_quantity')
                ->take(20)
                ->get();
        } catch (Exception $error) {
            return back()->withErrors($error->getMessage())->withInput();
        }

        return view("client.home", [
            'products' => $product,
            'Trenning' => $productTrennings,
        ]);
    }
    public function productDetail(string $id, string $id_C)
    {
        try {
            // Lấy thông tin sản phẩm
            $product = Product::find($id);
            // product detail

            // Kiểm tra nếu sản phẩm không tồn tại
            if (!$product) {
                return view("client.shop.404Product");
            }

            $ingredients = $product->ingredient;

            $sizeTypes = DB::table('size_type')
                ->join('product_specification', 'size_type.id', '=', 'product_specification.size_id')
                ->where('product_specification.product_id', $id)
                ->select('size_type.*')
                ->distinct()
                ->get();

            $similar = DB::table('products')
                ->select('products.id', 'products.category_id', 'products.name', 'products.description', 'products.unit_price', 'products.internal_image_path', 'products.short_description', 'products.meta_description', 'products.sku', 'products.url_key')
                ->where('products.category_id', $id_C)
                ->groupBy('products.id', 'products.category_id', 'products.name', 'products.description', 'products.unit_price', 'products.internal_image_path', 'products.short_description', 'products.meta_description', 'products.sku', 'products.url_key')
                ->orderByDesc('products.category_id')
                ->take(10)
                ->get();
            // Trả về view với thông tin sản phẩm, chi tiết sản phẩm và danh sách các loại kích thước
        } catch (Exception $exception) {
            return back()->withErrors($exception->getMessage())->withInput();
        }
        return view('client.shop.product', [
            'product'     => $product,
            'sizeTypes'   => $sizeTypes,
            'similar'     => $similar,
            'ingredients' => $ingredients,
        ]);
    }

    public function shopCoffee()
    {
        // lấy danh sách sp mới
        $productNew = Product::with('productSpecification.sizeType') // Thêm with để lấy thông tin productSpecification và sizeType
            ->orderBy('id', 'desc')
            ->get();
        foreach ($productNew as $product) {
            if ($product->productSpecification && $product->productSpecification->sizeType) {
                $sizes = $product->productSpecification->sizeType->pluck('description');
                $product->setAttribute('allSizes', $sizes);
            } else {
                // Xử lý trường hợp không có productSpecification hoặc sizeType
                $product->setAttribute('allSizes', []);
            }
        }
        // Lấy danh sách tất cả các danh mục sản phẩm
        $categories = Category::all();
        // Lấy danh sách sản phẩm cho mỗi danh mục
        foreach ($categories as $category) {
            $category->products = Product::with('productSpecification.sizeType')
                ->where('category_id', $category->id)
                ->get();

            // Lặp qua từng sản phẩm và lấy tất cả các kích thước
            foreach ($category->products as $product) {
                if ($product->productSpecification && $product->productSpecification->sizeType) {
                    $sizes = $product->productSpecification->sizeType->pluck('description');
                    $product->setAttribute('allSizes', $sizes);
                } else {
                    // Xử lý trường hợp không có productSpecification hoặc sizeType
                    $product->setAttribute('allSizes', []);
                }
            }
        }

        $productTrendings = Product::with('productSpecification.sizeType')
            ->leftJoin('order_details', 'products.id', '=', 'order_details.product_id')
            ->select('products.id', 'products.category_id', 'products.name', 'products.description', 'products.unit_price', 'products.internal_image_path', 'products.short_description', 'products.meta_description', 'products.sku', 'products.url_key', DB::raw('SUM(order_details.quantity) as total_quantity'))
            ->groupBy('products.id', 'products.category_id', 'products.name', 'products.description', 'products.unit_price', 'products.internal_image_path', 'products.short_description', 'products.meta_description', 'products.sku', 'products.url_key')
            ->orderByDesc('total_quantity')
            ->get();

        // Lặp qua danh sách sản phẩm trending và lấy tất cả các kích thước
        foreach ($productTrendings as $product) {
            if (!empty($product->productSpecification) && !empty($product->productSpecification->sizeType)) {
                $sizes = $product->productSpecification->sizeType->pluck('description');
                $product->setAttribute('allSizes', $sizes);
            } else {
                // Xử lý trường hợp không có productSpecification
                $product->setAttribute('allSizes', []);
            }
        }
        try {
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', "kích thước sản phẩm không tồn tại");
        }

        // Trả về view hiển thị danh sách sản phẩm của các danh mục
        return view('client.shop.shopCoffee', compact('categories', 'productTrendings', 'productNew'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $title                 = "Sửa sản phẩm";
        $product               = $this->product::findOrFail($id);
        $categories            = $this->category::all();
        $this_category_product = $product->category;

        return view("admin.product.editForm", compact(
            "title",
            "product",
            "categories",
            "this_category_product"
        ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, string $id)
    {
        try {
            $validated = $request->all();
            $product   = Product::findOrFail($id);
            // Lấy column name trong database
            $column_name           = Schema::getColumnListing('products');
            $id_position_search    = array_search('id', $column_name);
            $column_name_withoutId = array_splice($column_name, $id_position_search + 1);
            // Upload new Image
            $product  = Product::findOrFail($id);
            $filename = null;
            if ($request->hasFile('internal_image_path')) {
                $file     = $request->file('internal_image_path');
                $filename = time() . '-' . $file->getClientOriginalName();
                $file->move(public_path('img/product'), $filename);
                $validated['internal_image_path'] = $filename;
                // Delete the old image if it exists
                $oldImage = $product->internal_image_path;
                $filePath = public_path('img/product/' . $oldImage);
                if (file_exists($filePath)) {
                    unlink($filePath);
                }
            } else {
                $validated['internal_image_path'] = $product->internal_image_path;
            }
            $validated['created_date']  = $product->created_date;
            $validated['modified_date'] = now()->format('Y-m-d H:i:s');

            $fromDate = $request->input('is_new_from_date') == null ? null : Carbon::parse($request->input('is_new_from_date'))->format('Y-m-d');
            $toDate   = $request->input('is_new_to_date') == null ? null : Carbon::parse($request->input('is_new_to_date'))->format('Y-m-d');

            if ($toDate < $fromDate) {
                $toDate = $fromDate;
            }
            $validated['is_new_from_date'] = $fromDate;
            $validated['is_new_to_date']   = $toDate;

            $missingColumn = array_diff($column_name_withoutId, array_keys($validated));
            foreach ($missingColumn as $column) {
                $validated[$column] = 0;
            }
            $product->update($validated);

            return redirect()->route('admin.products.list.index')
                ->with('response_message', Message::out('success', 'Cập nhật thành công.'));
        } catch (\Throwable $error) {
        }
    }

    public function inredient()
    {
        $ingredientOptions = request('ingredient_options');
        dd($ingredientOptions);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product  = Product::findOrFail($id);
        $oldImage = $product->internal_image_path;
        $filePath = public_path('img/product/' . $oldImage);
        if (file_exists($filePath)) {
            unlink($filePath);
        }
        $product->delete();

        return redirect()->route('admin.products.list.index')
            ->with('response_message', Message::out('danger', 'Sản phẩm đã được xóa thành công !'));
    }

    public function time_sublimit($k = 1)
    {
        $limit     = ini_get('max_execution_time'); // changes even when you set_time_limit()
        $sub_limit = round($limit * $k);
        if (0 === $sub_limit) {
            $sub_limit = INF;
        }
        return $sub_limit;
    }
}
