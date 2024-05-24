@extends('client.layout')

@section('title', 'checkout')
@section('content')

<main class="bg-black">
    <div class="container">
        <div class="row bg-dark">
            <div class="d-flex flex-wrap justify-content-between">
                <!-- Step Indicators -->
                @for ($i = 1; $i <= 5; $i++)
                    <div class="p-3 {{ $i == 1 ? 'border-3 border-bottom border-success' : 'd-none d-sm-block' }}">
                        <p class="fw-bold text-white">Bước {{ $i }}</p>
                        <span class="fw-bold text-white text-uppercase fs-5">{{ ['Giỏ hàng', 'Thông tin', 'Thanh toán', 'Kiểm tra', 'Xác nhận'][$i-1] }}</span>
                    </div>
                @endfor
            </div>
        </div>

        <div class="container py-3">
            <div class="row">
            <div class="col-md-8">
                <div class="bg-white">
                    <div class="table-responsive">
                        <table class="table text-center">
                            <thead>
                                <tr>
                                    <th scope="col">Sản phẩm</th>
                                    <th scope="col"></th>
                                    <th scope="col">Số lượng</th>
                                    <th scope="col">Tổng</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($cartItems as $cartItem)
                                    @php
                                        $product = \App\Models\Product\Product::find($cartItem->product_id);
                                        $addOnSubTotal = \App\Models\Cart\CartItemAddOn::where('cart_item_id', $cartItem->id)->sum('sub_total');
                                        $totalPrice = $cartItem->sub_total + $addOnSubTotal;
                                    @endphp
                                    <tr>
                                        <td scope="row">
                                            <img src="{{ asset('img/product/'.$product->internal_image_path) }}" alt="" width="45" height="45">
                                        </td>
                                        <td scope="row">
                                            <div class="d-flex flex-column">
                                                <p class="text-truncate text-dark">{{ $product->name }}</p>
                                                <p class="text-truncate text-warning-emphasis">
                                                    <small>
                                                        @if($cartItem->size)
                                                            Size: {{ $cartItem->size }}
                                                        @endif
                                                        @foreach ($cartItem->addons as $addon)
                                                            + {{ $addon->optionName }}
                                                        @endforeach
                                                    </small>
                                                </p>
                                            </div>
                                        </td>
                                        <td>{{ $cartItem->quantity }}</td>
                                        <td>{{ number_format($totalPrice, 0, ',', '.') }} VND</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <a href="/shopcoffee" class="nav-link text-warning-emphasis"><i class="bi bi-chevron-left"></i> Tiếp tục mua hàng</a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="bg-body-secondary">
                    <div class="container py-3">
                        <div class="d-flex align-items-center gap-3">
                            <i class="bi bi-ticket-perforated fs-3"></i>
                            <span> Tôi muốn sử dụng mã khuyến mãi</span>
                        </div>
                        <form id="applyPromotionForm" class="row" method="POST" action="{{ route('apply-promotion') }}">
                            @csrf
                            <div class="col-6">
                                <input type="text" class="form-control" id="promotionCode" placeholder="Mã khuyến mãi" name="promotion_code">
                            </div>
                            <button type="submit" class="btn btn-outline-dark text-uppercase col-5">Áp dụng</button>
                        </form>
                        <!-- Total calculation -->
                        <hr>
                        <div class="d-flex justify-content-between">
                            <p class="text-uppercase form-text text-black"><small>Tạm tính</small></p>
                            <strong class="text-warning-emphasis">{{ number_format($cart->total_price, 0, ',', '.') }} VND</strong>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-between">
                            <p class="form-text text-black"><small>Thuế</small></p>
                            <strong id="tax" class="text-warning-emphasis">{{ number_format($tax, 0, ',', '.') }} VND</strong>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-between">
                            <p class="form-text text-black"><small>Giảm giá</small></p>
                            <strong id="discountAmount" class="text-warning-emphasis">{{ number_format($discountAmount, 0, ',', '.') }} VND</strong>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-between">
                            <h5 class="fw-bold">TỔNG</h5>
                            <strong id="totalAmount" class="text-warning-emphasis fs-5">{{ number_format($newTotal, 0, ',', '.') }} VND</strong>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-end">
                            <a href="/shipping" class="btn btn-success">Tiếp theo <i class="bi bi-chevron-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
</main>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const applyPromotionForm = document.getElementById('applyPromotionForm');

        applyPromotionForm.addEventListener('submit', function(event) {
            event.preventDefault();

            const promotionCode = document.getElementById('promotionCode').value;
            // console.log(promotionCode);
            fetch(applyPromotionForm.action, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({
                    promotion_code: promotionCode
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    document.getElementById('discountAmount').textContent = data.discountAmount + ' VND';
                    document.getElementById('tax').textContent = data.newTax + ' VND';
                    document.getElementById('totalAmount').textContent = data.newTotal + ' VND';
                } else {
                    alert(data.message);
                }
            })
            .catch(error => console.error('Error:', error));
        });
    });
</script>

@endsection
