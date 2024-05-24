@extends('client.layout')

@section('title', 'about')
@section('content')

    {{-- banner --}}
    <section class="banner_about">
        <div class="wrapper-banner_about">
            <h1 class="title-banner_about">Một hương vị mà bạn nên khám phá</h1>
            <picture class="picture-banner_about">
                <source media="(min-width: 1200px)" srcset="{{ asset('img/hero-bg-2x-min-v2-min.jpg') }}">
                <source media="(max-width: 768px)" srcset="{{ asset('img/hero-bg-mobile-2x-min-v2.jpg') }}">
                <img src="{{ asset('img/hero-bg-2x-min-v2-min.jpg') }}" alt="">
            </picture>
            <div class="btn-banner_about">
                <a href="{{route('coffee')}}" class="">Khám phá</a>
            </div>
        </div>
    </section>
    {{-- end banner --}}

    {{-- technology --}}
    <section class="position-relative d-block py-5">
        <picture class="picture_technology">
            <source media="(max-width: 768px)" srcset="{{ asset('img/dot.gif') }}">
            <img src="{{ asset('img/wood-bg-min.jpg') }}" alt="" style="height: 100%">
        </picture>
        <div class="position-relative" style="--image-rotation-time: 2.8s;--image-rotation-delay: 0.5s;z-index:2;">
            <article class="d-block article_technology">
                <div class="d-flex justify-content-between align-items-center box-content_technology">
                    <div class="content_technology-info">
                        <h3>CÀ PHÊ Mozanio ĐẶC BIỆT TẠI NHÀ</h3>
                        <div class="">Công nghệ tiên tiến của Vertuo sẽ mang đến cho bạn trải nghiệm cà phê đặc biệt.
                            Từ cà phê đặc trưng đến cà phê Mozanio đích thực, tất cả đều có hương vị mịn màng, đậm đà và đậm
                            đà
                            Crema.</div>
                    </div>
                    <picture class="technology_photo">
                        <source media="(min-width: 768px)"
                            srcset="{{ asset('img/pngtree-coffee-cup-aroma-container-png-image_6373241.jpg') }}">
                        <img src="{{ asset('img/pngtree-coffee-cup-aroma-container-png-image_6373241.jpg') }}"
                            alt="">
                    </picture>
                </div>
            </article>
            <article class="d-block article_technology">
                <div class="d-flex justify-content-between align-items-center box-content_technology flex-row-reverse">
                    <div class="content_technology-info">
                        <h3>HỆ THỐNG SẢN XUẤT SÁNG TẠO</h3>
                        <div class="">Công nghệ Vertuo đọc mã vạch trên mỗi viên nang, tự động điều chỉnh theo
                            cài đặt hoàn hảo để bạn có thể pha loại cà phê yêu thích của mình nhiều lần mà không cần
                            thất bại.</div>
                    </div>
                    <picture class="technology_photo" style="right: 0 !important">
                        <source media="(min-width: 768px)"
                            srcset="{{ asset('img/pngtree-cup-of-coffee-with-splash-and-beans-on-a-plain-white-png-image_10530822.png') }}">
                        <img class=""
                            src="{{ asset('img/pngtree-cup-of-coffee-with-splash-and-beans-on-a-plain-white-png-image_10530822.png') }}"
                            alt="">
                    </picture>
                </div>
            </article>
            <article class="d-block article_technology mt-4" style="padding-top: 20px">
                <div class="d-flex justify-content-between align-items-center box-content_technology">
                    <div class="content_technology-info">
                        <h3>Sự hoàn hảo khi chạm vào nút</h3>
                        <div class="">Hệ thống cà phê tiên tiến nhất mà chúng tôi từng phát triển cũng là hệ thống đơn
                            giản nhất. Chỉ
                            nhấn nút.</div>
                    </div>
                    <picture class="technology_photo">
                        <source media="(min-width: 768px)" srcset="{{ asset('img/unnamed.png') }}">
                        <img src="{{ asset('img/unnamed.png') }}" alt="">
                    </picture>
                </div>
            </article>
            <article class="d-block article_technology">
                <div class="d-flex justify-content-between align-items-center box-content_technology flex-row-reverse">
                    <div class="content_technology-info">
                        <h3>Một loạt cà phê đặc biệt</h3>
                        <div class="">Vertuo pha cà phê, cà phê Mozanio và mọi thứ ở giữa. Từ bóng tối và dữ dội
                            đến dịu nhẹ và mịn màng, với hơn 30 cách pha trộn để bạn khám phá và yêu thích.</div>
                    </div>
                    <picture class="technology_photo" style="right: 0 !important">
                        <source media="(min-width: 768px)" srcset="{{ asset('img/wide-range-min.png') }}">
                        <img class="" src="{{ asset('img/wide-range-mobile@2x-min.jpg') }}" alt="">
                    </picture>
                </div>
            </article>
        </div>
    </section>
    {{-- end technology --}}

    {{-- features --}}
    <section class="features">
        <div class="wrapper" style="height: auto">
            <h2 class="title_features">Với Vertuo Next, chúng tôi đã phát minh lại cà phê phục vụ một lần. Lặp lại.</h2>
            <div class="text_features">Vertuo mới. Cao cấp hơn. Nhiều sự lựa chọn hơn. Yêu thương nhiều hơn.</div>
            <div class="holder_features">
                <article class="features_items">
                    <img src="{{ asset('img/slim-design@2x-min.png') }}" alt="">
                    <h3>MỎNG & MẸO MẸ</h3>
                    <div class="">Thiết kế mỏng 5,5 inch giúp bạn dễ dàng lắp vừa vặn ở hầu hết mọi nơi. Kiểu dáng đẹp
                        mắt của nó làm cho
                        bạn muốn khoe nó ở khắp mọi nơi.</div>
                </article>
                <article class="features_items">
                    <img src="{{ asset('img/new-coffee@2x-min.png') }}" alt="">
                    <h3>Nhiều lựa chọn hơn</h3>
                    <div class="">Giống như cà phê và Carafe kiểu Pour-Over Style 18oz mới. Để có một ly MOZANIO bền
                        lâu hơn
                        chốc lát. Được thiết kế dành riêng cho Vertuo Next.</div>
                </article>
                <article class="features_items">
                    <img src="{{ asset('img/recyclable-materials@2x-min.png') }}" alt="">
                    <h3>Vật liệu tái chế</h3>
                    <div class="">Nhựa tái chế. Phong cách đáng chú ý. Chiếc máy đầu tiên của chúng tôi được làm từ
                        54% vật liệu có thể tái chế
                        nguyên vật liệu.</div>
                </article>
            </div>
        </div>
    </section>
    {{-- end features --}}

    {{-- explore-machines --}}
    <section class="explore-machines ">
        <picture class="picture picture-explore">
            <source media="(min-width: 1440px)" srcset="{{ asset('img/explore-machines-bg@2x-min.jpg') }}">
            <img src="{{ asset('img/explore-machines-bg-min.jpg') }}" alt="">
        </picture>
        <div class="position-relative text-center" style="z-index:2;">
            <div class="wrapper">
                <h2 class="title-explore-machines">Khám phá dòng sản phẩm Vertuo</h2>
            </div>
            <div class="box-img-explore-machines">
                <div class="row-explore-machines explore">
                    <article class="items-explore-machines" data-swiper-slide-index="1">
                        <h4 class="title-active">Vertuo mới nhất, nhỏ nhất, linh hoạt nhất của chúng tôi từ trước đến nay.
                        </h4>
                        <img src=" {{ asset('img/product/machines-vertuo-next@2x-min.png') }}" alt="">
                    </article>
                    <article class="items-explore-machines" data-swiper-slide-index="2">
                        <h4 class="title-active">Cà phê đặc biệt được thực hiện dễ dàng. Từ đầu đến bể.</h4>
                        <img src=" {{ asset('img/product/machines-evolou-min.png') }}" alt="">
                    </article>
                    <article class="items-explore-machines" data-swiper-slide-index="3">
                        <h4 class="title-active">Vertuo Plus Deluxe là thiết kế mới nhất cho trải nghiệm pha chế bia đỉnh
                            cao.
                        </h4>
                        <img src=" {{ asset('img/product/machines-vertuo-deluxe-black-min.png') }}" alt="">
                    </article>
                    <article class="items-explore-machines" data-swiper-slide-index="4">
                        <h4 class="title-active">Cỗ máy hiện đại, vượt thời gian đã ra mắt Vertuo.</h4>
                        <img src=" {{ asset('img/product/machines-vertuo-deluxe@2x-min.png') }}" alt="">
                    </article>
                    <article class="items-explore-machines" data-swiper-slide-index="5">
                        <h4 class="title-active">Vertuo cổ điển dành cho cà phê và Mozanio đặc biệt.</h4>
                        <img src=" {{ asset('img/product/machines-vertuo-plus-min.png') }}" alt="">
                    </article>
                    <article class="items-explore-machines" data-swiper-slide-index="1">
                        <h4 class="title-active">Vertuo mới nhất, nhỏ nhất, linh hoạt nhất của chúng tôi từ trước đến nay.
                        </h4>
                        <img src=" {{ asset('img/product/machines-vertuo-next@2x-min.png') }}" alt="">
                    </article>
                    <article class="items-explore-machines" data-swiper-slide-index="2">
                        <h4 class="title-active">Cà phê đặc biệt được thực hiện dễ dàng. Từ đầu đến bể.</h4>
                        <img src=" {{ asset('img/product/machines-evolou-min.png') }}" alt="">
                    </article>
                    <article class="items-explore-machines" data-swiper-slide-index="3">
                        <h4 class="title-active">Vertuo Plus Deluxe là thiết kế mới nhất cho trải nghiệm pha chế bia đỉnh
                            cao.
                        </h4>
                        <img src=" {{ asset('img/product/machines-vertuo-deluxe-black-min.png') }}" alt="">
                    </article>
                    <article class="items-explore-machines" data-swiper-slide-index="4">
                        <h4 class="title-active">Cỗ máy hiện đại, vượt thời gian đã ra mắt Vertuo.</h4>
                        <img src=" {{ asset('img/product/machines-vertuo-deluxe@2x-min.png') }}" alt="">
                    </article>
                    <article class="items-explore-machines" data-swiper-slide-index="5">
                        <h4 class="title-active">Vertuo cổ điển dành cho cà phê và Mozanio đặc biệt.</h4>
                        <img src=" {{ asset('img/product/machines-vertuo-plus-min.png') }}" alt="">
                    </article>
                </div>
                <div class=""></div>
            </div>
            <a href="" class="btn-explore-machines">MUA máy vertuo</a>
        </div>
    </section>
    {{-- end explore-machines --}}

    {{-- explore-coffe --}}
    <section class="explore-machines">
        <div class="wrapper position-relative text-center">
            <h2 class="explore-coffee_title">Một thế giới cà phê để khám phá</h2>
            <div class="" style="margin-top:15px">Khám phá các hỗn hợp phiên bản giới hạn, nguồn gốc duy nhất và
                theo mùa
                đặc sản.</div>
            <div class="position-relative wrapper-explore_coffee">
                <div class="holder-explore_coffee exlpore_coffee">
                    <a href="" class="col-explore_coffee">
                        <div class="box-img-explore">
                            <img src="{{ asset('img/product/caphelyden.png') }}" alt="">
                        </div>
                        <div class="box-name_explore">
                            <h3 class="name-explore_coffee">cà phê đen</h3>
                        </div>
                    </a>
                    <a href="" class="col-explore_coffee">
                        <div class="box-img-explore">
                            <img src="{{ asset('img/product/ca-phe-da.png') }}" alt="">
                        </div>
                        <div class="box-name_explore">
                            <h3 class="name-explore_coffee">Cà phê đá</h3>
                        </div>
                    </a>
                    <a href="" class="col-explore_coffee">
                        <div class="box-img-explore">
                            <img src="{{ asset('img/product/caphekem.png') }}" alt="">
                        </div>
                        <div class="box-name_explore">
                            <h3 class="name-explore_coffee">Cà phê kem</h3>
                        </div>
                    </a>
                    <a href="" class="col-explore_coffee">
                        <div class="box-img-explore">
                            <img src="{{ asset('img/product/caphelyden.png') }}" alt="">
                        </div>
                        <div class="box-name_explore">
                            <h3 class="name-explore_coffee">Bánh nướng xốp Hazelino</h3>
                        </div>
                    </a>
                    <a href="" class="col-explore_coffee">
                        <div class="box-img-explore">
                            <img src="{{ asset('img/product/caphelyden.png') }}" alt="">
                        </div>
                        <div class="box-name_explore">
                            <h3 class="name-explore_coffee">Bánh nướng xốp Hazelino</h3>
                        </div>
                    </a>
                    <a href="" class="col-explore_coffee">
                        <div class="box-img-explore">
                            <img src="{{ asset('img/product/caphelyden.png') }}" alt="">
                        </div>
                        <div class="box-name_explore">
                            <h3 class="name-explore_coffee">Bánh nướng xốp Hazelino</h3>
                        </div>
                    </a>
                    <a href="" class="col-explore_coffee">
                        <div class="box-img-explore">
                            <img src="{{ asset('img/product/caphelyden.png') }}" alt="">
                        </div>
                        <div class="box-name_explore">
                            <h3 class="name-explore_coffee">Bánh nướng xốp Hazelino</h3>
                        </div>
                    </a>
                </div>
            </div>
            <a href="{{route('coffee')}}" class="btn-explore_coffee">Đến shop cà phê</a>
        </div>
    </section>
    {{-- end explore-coffe --}}

    {{-- FAQ --}}
    <section class="faq-section">
        <picture class="faq-picture">
            <img src="{{ asset('img/faq-min.png') }}" alt="">
        </picture>
        <div class="faq-wrapper wrapper">
            <article class="faq-info text-white">
                <h2 class="" style="font-size: 26px; letter-spacing:3px;">Các câu hỏi thường gặp</h2>
                <div class="" style="margin-top: 35px;">
                    <div class="" style="margin-top: 10px">
                        <input type="text" class="d-none">
                        <label for="faq-toggle" class="faq-label">
                            <span class="icon-faq">
                                <svg class="icon" width="27" height="17" viewBox="0 0 27 17">
                                    <path fill="#fff" fill-rule="evenodd" stroke="#fff"
                                        d="M13.5 12.528L24.664 1.363 26.302 3 13.5 15.802.698 3l1.637-1.638L13.5 12.528z">
                                    </path>
                                </svg>
                            </span>
                            Sự khác biệt giữa Vertuo và Original
                        </label>
                        {{-- <input type="checkbox" id="faq-toggle" class="faq-toggle"> --}}
                        <div class="faq-content">
                            <p>Bạn có thể pha cà phê Mozanio cho cốc lớn hơn với Vertuo
                                <br>
                                - từ một tách Mozanio ngắn, một Gran Lungo mịn màng, một tách Cà phê mê hoặc một tách Alto
                                lớn hơn
                                đứng đầu
                                với lớp kem mịn màng và hào phóng. Đằng sau, công nghệ này sử dụng Centrifusion™ nhẹ nhàng
                                trích xuất, nhận dạng từng viên nang và điều chỉnh các thông số phù hợp để tạo ra
                                phong cách cà phê hoàn hảo. Với Original, bạn cũng có thể thưởng thức hương vị mượt mà, chân
                                thực tương tự của
                                của bạn
                                cà phê
                                <br>
                                - từ công thức nấu ăn Ristretto, Mozanio, Lungo, đến Americano và sữa. Máy nguyên bản sử
                                dụng một
                                Hệ thống chiết xuất 19 bar áp suất cao giúp giải phóng hương thơm tươi mát từ mỗi viên nang.
                            </p>
                            <p>
                                Hãy thử tạo ra nhiều công thức pha cà phê và sữa, Cappuccino hoặc Latte bằng cách sử dụng
                                Aeroccino
                                hoặc hệ thống một chạm tích hợp.
                            </p>
                        </div>
                    </div>
                    <div class="" style="margin-top: 10px">
                        <input type="text" class="d-none">
                        <label for="faq-toggle" class="faq-label">
                            <span class="icon-faq">
                                <svg class="icon" width="27" height="17" viewBox="0 0 27 17">
                                    <path fill="#fff" fill-rule="evenodd" stroke="#fff"
                                        d="M13.5 12.528L24.664 1.363 26.302 3 13.5 15.802.698 3l1.637-1.638L13.5 12.528z">
                                    </path>
                                </svg>
                            </span>
                            Vertuo khác với các loại cà phê khác như cà phê phin hay cà phê hòa tan như thế nào?
                        </label>
                        {{-- <input type="checkbox" id="faq-toggle" class="faq-toggle"> --}}
                        <div class="faq-content">
                            <p>
                                Hãy thử tạo ra nhiều công thức pha cà phê và sữa, Cappuccino hoặc Latte bằng cách sử dụng
                                Aeroccino
                                hoặc hệ thống một chạm tích hợp. Bạn có thể chuẩn bị chính xác cà phê nhỏ hoặc lớn của mình
                                với
                                lớp crema đậm đà và mượt mà, vì mỗi máy Vertuo đều sử dụng tính năng nhận dạng mã vạch và
                                pha chế
                                hệ thống chiết xuất để tạo ra trải nghiệm cà phê của bạn. Mã vạch duy nhất trên mỗi viên
                                nang
                                điều chỉnh lưu lượng và thể tích nước, nhiệt độ, thời gian truyền và xoay viên nang để
                                tận dụng tối đa trải nghiệm cà phê của bạn - cà phê hoàn hảo của bạn mọi lúc.
                            </p>
                        </div>
                    </div>
                    <div class="" style="margin-top: 10px">
                        <input type="text" class="d-none">
                        <label for="faq-toggle" class="faq-label">
                            <span class="icon-faq">
                                <svg class="icon" width="27" height="17" viewBox="0 0 27 17">
                                    <path fill="#fff" fill-rule="evenodd" stroke="#fff"
                                        d="M13.5 12.528L24.664 1.363 26.302 3 13.5 15.802.698 3l1.637-1.638L13.5 12.528z">
                                    </path>
                                </svg>
                            </span>
                            Tôi có thể tái chế viên nang Vertuo không?
                        </label>
                        {{-- <input type="checkbox" id="faq-toggle" class="faq-toggle"> --}}
                        <div class="faq-content">
                            <p>
                                Tất cả các viên MOZANIO đều được làm từ nhôm và có thể tái chế. Mang theo viên nang đã sử
                                dụng của bạn
                                đến một trong những điểm thu gom của chúng tôi, thả chúng tại cửa hàng MOZANIO gần nhất hoặc
                                vứt rác
                                trung tâm thu gom hoặc đổ đầy viên nang đã qua sử dụng vào túi tái chế của bạn và gửi qua
                                đường bưu điện
                                nhà cung cấp dịch vụ khi họ giao hàng cho bạn lần tiếp theo. Bằng cách thêm việc tái chế
                                viên nang vào cà phê của bạn
                                theo nghi thức, cà phê của bạn sẽ không chỉ ngon mà còn có cảm giác ngon nữa.
                            </p>
                        </div>
                    </div>
                    <div class="" style="margin-top: 10px">
                        <input type="text" class="d-none">
                        <label for="faq-toggle" class="faq-label">
                            <span class="icon-faq">
                                <svg class="icon" width="27" height="17" viewBox="0 0 27 17">
                                    <path fill="#fff" fill-rule="evenodd" stroke="#fff"
                                        d="M13.5 12.528L24.664 1.363 26.302 3 13.5 15.802.698 3l1.637-1.638L13.5 12.528z">
                                    </path>
                                </svg>
                            </span>
                            Có bao nhiêu caffeine trong viên nang MOZANIO?
                        </label>
                        {{-- <input type="checkbox" id="faq-toggle" class="faq-toggle"> --}}
                        <div class="faq-content">
                            <p>Nhiều nghiên cứu khoa học khác nhau chỉ ra rằng việc tiêu thụ 300 đến 400 mg caffeine từ tất
                                cả các loại thực phẩm.
                                nguồn mỗi ngày cho dân số trưởng thành khỏe mạnh bình thường không gây ra bất kỳ tác dụng
                                phụ nào
                                về sức khỏe.
                            </p>
                            <p>
                                Được biểu thị bằng cốc, có nghĩa là 300-400mg caffeine thường đại diện cho 4-5 cốc
                                <strong>MOZANIO</strong>
                                Cà phê nguyên chất, hoặc 2 đến 5 tách cà phê cho cà phê Vertuo, có thể thay đổi tùy theo
                                trộn.
                            </p>
                            <p>Tuy nhiên, khuyến nghị chính thức dành cho phụ nữ mang thai và cho con bú là:</p>
                            <p>- họ giảm lượng tiêu thụ xuống còn 200-300 mg caffeine mỗi ngày,</p>
                            <p>- tương đương với 3 đến 4 cốc
                                <strong>MOZANIO</strong>
                                Cà phê nguyên chất mỗi ngày, 1 đến 4 tách đối với cà phê Vertuo.
                            </p>
                        </div>
                    </div>
                    <div class="" style="margin-top: 10px">
                        <input type="text" class="d-none">
                        <label for="faq-toggle" class="faq-label">
                            <span class="icon-faq">
                                <svg class="icon" width="27" height="17" viewBox="0 0 27 17">
                                    <path fill="#fff" fill-rule="evenodd" stroke="#fff"
                                        d="M13.5 12.528L24.664 1.363 26.302 3 13.5 15.802.698 3l1.637-1.638L13.5 12.528z">
                                    </path>
                                </svg>
                            </span>
                            Công thức nấu cà phê đá được MOZANIO gợi ý là gì?
                        </label>
                        <div class="faq-content">
                            <p>Các chuyên gia của chúng tôi đã thiết kế một công thức được hiệu chỉnh kỹ lưỡng để mang lại
                                sự hài hòa hoàn hảo của
                                nước giải khát cuối cùng, cung cấp hương thơm và giải khát được phát triển. Công thức này
                                rất đơn giản để
                                chuẩn bị và tồn tại trong hai biến thể, màu đen hoặc với sữa.
                            </p>
                            <p>
                                - đen: 90g đá viên + 1,35oz cà phê + 3oz nước lạnh
                            </p>
                            <p>- với sữa: 90g đá viên + 1,35oz cà phê + 3oz bọt sữa lạnh</p>
                            <p>Xin lưu ý rằng việc tôn trọng tỷ lệ chính xác sẽ mang lại kết quả tối ưu.</p>
                            <p>Chọn loại cà phê Mozanio ưa thích của bạn và thử nó như một loại cà phê đá.</p>
                        </div>
                    </div>
                    <div class="" style="margin-top: 10px">
                        <input type="text" class="d-none">
                        <label for="faq-toggle" class="faq-label">
                            <span class="icon-faq">
                                <svg class="icon" width="27" height="17" viewBox="0 0 27 17">
                                    <path fill="#fff" fill-rule="evenodd" stroke="#fff"
                                        d="M13.5 12.528L24.664 1.363 26.302 3 13.5 15.802.698 3l1.637-1.638L13.5 12.528z">
                                    </path>
                                </svg>
                            </span>
                            Sự khác biệt giữa hạt cà phê và cà phê anh đào là gì?
                        </label>
                        <div class="faq-content">
                            <p>
                                Quả cà phê là quả trên cây cà phê, còn hạt cà phê nằm bên trong quả cà phê
                                quả anh đào sẽ được rang và nghiền sẽ nằm trong cốc của bạn.
                            </p>
                        </div>
                    </div>
                    <div class="" style="margin-top: 10px">
                        <input type="text" class="d-none">
                        <label for="faq-toggle" class="faq-label">
                            <span class="icon-faq">
                                <svg class="icon" width="27" height="17" viewBox="0 0 27 17">
                                    <path fill="#fff" fill-rule="evenodd" stroke="#fff"
                                        d="M13.5 12.528L24.664 1.363 26.302 3 13.5 15.802.698 3l1.637-1.638L13.5 12.528z">
                                    </path>
                                </svg>
                            </span>
                            Chuẩn bị cà phê lý tưởng là gì?
                        </label>
                        {{-- <input type="checkbox" id="faq-toggle" class="faq-toggle"> --}}
                        <div class="faq-content">
                            <p>
                                Cà phê là một thức uống rất linh hoạt, có thể uống và pha chế theo nhiều cách. MOZANIO
                                đề xuất cho bạn một chiếc máy và một ly cà phê để mang đến cho bạn một tách cà phê hoàn hảo,
                                hết lần này đến lần khác.
                                Tùy thuộc vào cách pha chế bạn chọn, bạn có thể có một loại cà phê Ý đậm đà như cà phê
                                Mozanio, hoặc một loại cà phê
                                cà phê mịn lớn hơn, đến cà phê có hương vị sô cô la.
                            </p>
                        </div>
                    </div>
                    <div class="" style="margin-top: 10px">
                        <input type="text" class="d-none">
                        <label for="faq-toggle" class="faq-label">
                            <span class="icon-faq">
                                <svg class="icon" width="27" height="17" viewBox="0 0 27 17">
                                    <path fill="#fff" fill-rule="evenodd" stroke="#fff"
                                        d="M13.5 12.528L24.664 1.363 26.302 3 13.5 15.802.698 3l1.637-1.638L13.5 12.528z">
                                    </path>
                                </svg>
                            </span>
                            Có phải tất cả cà phê MOZANIO đều tốt với sữa không?
                        </label>
                        <div class="faq-content">
                            <p>Có tất nhiên nó phụ thuộc vào những gì bạn đang tìm kiếm. Ví dụ:
                                <strong>Kazaar</strong>
                                và
                                <strong>Napoli</strong>
                                và
                                <strong>Volluto</strong>
                                ví dụ như chúng tiến hóa nhiều hơn dưới ảnh hưởng của sữa. Cà phê đậm đặc có sự độc đáo
                                khả năng giữ được vị đắng, vị khói và vị đắng dễ chịu của chúng, ngay cả khi bổ sung thêm
                                sữa vào công thức nấu ăn. Mặt khác, cà phê nhẹ hơn sẽ tạo ra mùi caramel/bánh quy khi
                                say với sữa. Để có những trải nghiệm ngọt ngào, bạn có thể nhận ra các công thức nấu ăn sáng
                                tạo mà bạn sẽ tìm thấy trên
                                <a href="" class="" style="color: #8d6708;text-decoration:none;">sáng tạo cà
                                    phê đỉnh cao</a>
                            </p>
                        </div>
                    </div>
                </div>
            </article>
        </div>
    </section>
    {{-- end FAQ --}}

@endsection
