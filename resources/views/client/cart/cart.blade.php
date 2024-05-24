@extends('client.layout')

@section('title', 'cart')
@section('content')
<main style="min-height: 70vh;">
    <div class="p-3 bg-white">
        <div class="table-responsive">
            <table class="table text-center">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">
                            <label for="AllProduct" class="form-check-label">Sản Phẩm</label>
                        </th>
                        <th scope="col">Đơn giá</th>
                        <th scope="col" class="text-center">Số lượng</th>
                        <th scope="col">Thành tiền</th>
                        <th scope="col">Thao tác</th>
                    </tr>
                </thead>
                <tbody class="table-light">
                    @if (count($cartItems) > 0)
                    @foreach ($cartItems as $cartItem)
                    @php
                    $product = \App\Models\Product\Product::find($cartItem->product_id);
                    @endphp
                    <tr>
                        <td class="align-middle id-checkbox" data-id="{{ $cartItem->id }}">
                            <div class="d-flex justify-content-between">
                                <div class="d-flex">
                                    <img class="d-none d-lg-block" src="{{ asset('img/product/'.$product->internal_image_path) }}" alt="" width="100">
                                    <div class="form-text">
                                        <div class="div">
                                            <p class="text-dark">{{ $product->name }}</p>
                                            @if(!empty($cartItem->size))
                                            <p class="text-dark-emphasis"><small>Size: {{$cartItem->size}}</small></p>
                                            @endif
                                        </div>
                                        <input type="hidden" id="cartId" value="{{ $cartItem->cart_id }}">
                                        @if (!empty($cartItem->addons))
                                        @foreach ($cartItem->addons as $addon)
                                        <p class="text-dark-emphasis"><small>+ {{ $addon->optionName }}</small></p>
                                        @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td class="align-middle">
                            <p class="text-dark" id="unitPrice{{$cartItem->id}}">{{ $cartItem->price }} VND</p>
                            @if (!empty($cartItem->addons))
                            @foreach ($cartItem->addons as $addon)
                            <p class="text-dark-emphasis" id="unitPriceAddon{{$addon->id}}"><small>{{ $addon->unit_price }}</small></p>
                            @endforeach
                            @endif
                        </td>
                        <td class="align-middle">
                            <div class="d-flex justify-content-center">
                                <div class="d-flex col-4 align-items-center">
                                    <button data-product-id="{{ $cartItem->product_id }}" id="decreaseButton{{$cartItem->id}}" class="btn px-2 decreaseButton" type="button">-</button>
                                    <input data-product-id="{{ $cartItem->product_id }}" id="quantityInput{{$cartItem->id}}" type="number" class="text-dark form-control form-control-sm quantityInput" value="{{ $cartItem->quantity }}" disabled>
                                    <button data-product-id="{{ $cartItem->product_id }}" id="increaseButton{{$cartItem->id}}" class="btn px-2 increaseButton" type="button">+</button>
                                </div>
                            </div>                         
                            @if (!empty($cartItem->addons))
                            @foreach ($cartItem->addons as $addon)
                            <div class="d-flex">
                                <div class="d-flex col-4 align-items-center">
                                    <button data-product-id="{{$addon->id}}" id="decreaseAddonButton{{$addon->id}}" class="btn px-2 decreaseAddonButton" type="button">-</button>
                                    <input data-product-id="{{$addon->id}}" id="quantityInputAddon{{$addon->id}}" type="number" class="text-dark form-control form-control-sm quantityInputAddon" value="{{ $addon->quantity }}" disabled>
                                    <button data-product-id="{{$addon->id}}" id="increaseAddonButton{{$addon->id}}" class="btn px-2 increaseAddonButton" type="button">+</button>
                                </div>
                            </div>
                            @endforeach
                            @endif
                            <input type="hidden" id="maxQuantityInput{{$cartItem->product_id}}" value="{{ $product->quantity_available }}">
                        </td>
                        <td class="align-middle">
                            <p class="text-dark" id="subTotal{{$cartItem->id}}">{{ $cartItem->sub_total }} VND</p>
                            @if (!empty($cartItem->addons))
                            @foreach ($cartItem->addons as $addon)
                            <p class="text-dark-emphasis" id="totalPriceAddon{{$addon->id}}"><small>{{ $addon->sub_total }}</small></p>
                            @endforeach
                            @endif
                        </td>
                        <td class="align-middle">
                            <form action="{{ route('remove-from-cart', ['id' => $cartItem->product_id]) }}" method="POST">
                                @csrf
                                <input value="{{ $cartItem->id }}" name="cart_item_id" type="hidden">
                                <button type="submit" class="btn bi bi-trash3 fs-5"></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    @else
                    <tr>
                        <td colspan="6" class="text-center">
                            <p>Giỏ hàng của bạn đang trống.</p>
                        </td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
    <form action="{{route('checkout')}}" method="POST">
        @csrf
        <div class="fixed-bottom p-3 bg-body-secondary">
            @if(session('error'))
                <div class="text-center">
                    <p class="text-danger">{{ session('error') }}</p>
                </div>
            @endif
            <hr>
            <div class="d-flex justify-content-between flex-row">
                <span class="d-flex gap-1"><span class="d-none d-lg-block">Tổng thanh toán</span> (<strong id="totalQuantity"></strong> Sản phẩm)</span>
                <strong class="text-danger">Giá: <span id="totalAmount"></span></strong><input type="hidden" id="totalAmountInput" name="totalAmount">
                <button class="btn btn-success" type="submit">Mua hàng</button>
            </div>
        </div>
    </form>
</main>

@if(Request::url() == route('cart'))
<script>
    console.log(document.getElementById('quantityCart').innerText);
    document.addEventListener('DOMContentLoaded', function() {
        var decreaseButtons = document.querySelectorAll('.decreaseButton');
        var increaseButtons = document.querySelectorAll('.increaseButton');
        var decreaseAddonButtons = document.querySelectorAll('.decreaseAddonButton');
        var increaseAddonButtons = document.querySelectorAll('.increaseAddonButton');

        decreaseButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                var Id = this.closest('tr').querySelector('.id-checkbox').dataset.id;
                var cartId = document.getElementById('cartId').value;
                var productId = this.getAttribute('data-product-id');
                var input = document.getElementById('quantityInput' + Id);
                var value = parseInt(input.value) - 1;
                if (value < 1) value = 1; // Prevent decreasing below 1
                input.value = value;
                updateQuantity(Id, cartId, productId, value);
                updateSubtotal(Id, value);
                updateTotalProductQuantity();
            });
        });

        increaseButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                var Id = this.closest('tr').querySelector('.id-checkbox').dataset.id;
                var cartId = document.getElementById('cartId').value;
                var productId = this.getAttribute('data-product-id');
                var input = document.getElementById('quantityInput' + Id);
                var currentQuantity = parseInt(input.value);
                var maxInput = document.getElementById('maxQuantityInput' + productId);
                var maxQuantity = parseInt(maxInput.value);
                if (currentQuantity < maxQuantity) {
                    input.value = currentQuantity + 1;
                    var quantity = input.value;
                    updateQuantity(Id, cartId, productId, quantity);
                    updateSubtotal(Id, quantity);
                    updateTotalProductQuantity();
                } else {
                    alert("Số lượng đã đạt đến giới hạn tối đa.");
                }
            });
        });

        decreaseAddonButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                var addonId = this.getAttribute('data-product-id');
                var input = document.getElementById('quantityInputAddon' + addonId);
                var value = parseInt(input.value) - 1;
                if (value < 1) value = 1; // Prevent decreasing below 1
                input.value = value;
                updateAddonQuantity(addonId, value);
                updateAddonTotalPrice(addonId, value);
                updatePriceAddonQuantity(addonId, value);
                calculateTotalPrice();
            });
        });

        increaseAddonButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                var addonId = this.getAttribute('data-product-id');
                var input = document.getElementById('quantityInputAddon' + addonId);
                var currentQuantity = parseInt(input.value);
                input.value = currentQuantity + 1;
                var quantity = input.value;
                updateAddonQuantity(addonId, quantity);
                updateAddonTotalPrice(addonId, quantity);
                updatePriceAddonQuantity(addonId, quantity);
                calculateTotalPrice();
            });
        });


        function updateQuantity(Id, cartId, productId, quantity) {
            fetch('/update-cart-item-quantity', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        id: Id,
                        cart_id: cartId,
                        product_id: productId,
                        quantity: quantity
                    })
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    if (!data.success) {
                        alert('Lỗi');
                    } else {
                        updateTotalProductQuantity(data.totalQuantity)
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        }

        function updateAddonQuantity(addonId, quantity) {
            fetch('/update-addon-quantity', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        addon_id: addonId,
                        quantity: quantity
                    })
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    if (!data.success) {
                        alert('Lỗi');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        }

        function updateSubtotal(Id, quantity) {
            var unitPrice = parseFloat(document.getElementById('unitPrice' + Id).innerText);
            var subtotal = unitPrice * quantity;
            document.getElementById('subTotal' + Id).innerText = subtotal + ' VND';
            calculateTotalPrice();
        }

        function updateAddonTotalPrice(addonId, quantity) {
            var unitPrice = parseFloat(document.getElementById('unitPriceAddon' + addonId).innerText);
            var totalPriceElement = document.getElementById('totalPriceAddon' + addonId);
            var totalPrice = unitPrice * quantity;
            totalPriceElement.innerText = totalPrice;
            calculateTotalPrice();
        }

        function updatePriceAddonQuantity(addonId, quantity) {
            var quantityElement = document.getElementById('quantityInputAddon' + addonId);
            quantityElement.value = quantity;
            var unitPriceElement = document.getElementById('unitPriceAddon' + addonId);
            var unitPrice = parseFloat(unitPriceElement.innerText);
            var totalPriceElement = document.getElementById('totalPriceAddon' + addonId);
            var totalPrice = unitPrice * quantity;
            totalPriceElement.innerText = totalPrice;
            calculateTotalPrice();
        }

        function calculateTotalPrice() {
            var total = 0;
            var subtotalElements = document.querySelectorAll('[id^="subTotal"]');
            var addonTotalPriceElements = document.querySelectorAll('[id^="totalPriceAddon"]');
            subtotalElements.forEach(function(element) {
                total += parseFloat(element.innerText);
            });
            addonTotalPriceElements.forEach(function(element) {
                total += parseFloat(element.innerText);
            });
            var totalAmountInput = document.getElementById('totalAmountInput');
            totalAmountInput.value = total; // Cập nhật giá trị vào trường input ẩn
            document.getElementById('totalAmount').innerText = total + ' VND';
        }


        function updateTotalProductQuantity(totalQuantity) {
            var totalQuantity = 0;
            var quantityInputs = document.querySelectorAll('.quantityInput');
            quantityInputs.forEach(function(input) {
                totalQuantity += parseInt(input.value);
            });
            document.getElementById('totalQuantity').innerText = totalQuantity;
        }

        updateTotalProductQuantity();
        calculateTotalPrice();

    });
</script>
@endif
@endsection