<?php

namespace Database\Seeders;

use App\Models\Setting\PaymentMethod;
use Illuminate\Database\Seeder;

class PaymentMethodsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PaymentMethod::truncate();

        $methods = [
            [
                'type'              => 'Tiền mặt',
                'short_description' => 'Thanh toán tiền mặt khi nhận hàng',
                'special_notes'     => 'An toàn và đáng tin cậy cho các giao dịch nhỏ.',
             ],
            [
                'type'              => 'Chuyển khoản ngân hàng',
                'short_description' => 'Thanh toán qua ngân hàng',
                'special_notes'     => 'Phù hợp cho các giao dịch lớn, đảm bảo an toàn thông tin.',
             ],
            [
                'type'              => 'Thẻ tín dụng/Ghi nợ',
                'short_description' => 'Thanh toán bằng thẻ Visa, MasterCard',
                'special_notes'     => 'Chấp nhận các loại thẻ Visa, MasterCard, và JCB.',
             ],
            [
                'type'              => 'Ví điện tử',
                'short_description' => 'Thanh toán qua Momo, ZaloPay',
                'special_notes'     => 'Tiện lợi, nhanh chóng, phù hợp cho các giao dịch online và offline.',
             ],
            [
                'type'              => 'QR Code',
                'short_description' => 'Thanh toán bằng cách quét mã QR',
                'special_notes'     => 'Sử dụng ứng dụng ngân hàng hoặc ví điện tử để quét mã.',
             ],
            [
                'type'              => 'COD (Cash on Delivery)',
                'short_description' => 'Thanh toán tiền mặt khi giao hàng',
                'special_notes'     => 'An toàn cho người mua, đảm bảo nhận được hàng trước khi thanh toán.',
             ],
         ];

        foreach ($methods as $m) {
            PaymentMethod::create($m);
        }

    }
}
