@extends('client.layout')

@section('title', 'feedback')
@section('content')
    <!-- banner -->
    <section>
        <div class="banner_contact">
            <div class="d-flex justify-content-center align-items-center h-100">
                <h2 class="text-white text-uppercase title-contact_banner text-center fw-bold">phản hồi cho chúng tôi</h2>
            </div>
        </div>
    </section>
    <!-- end banner -->

    <!-- contact form -->
    <section class="d-block">
        <div class="bg-dark">
            <div class="container py-4" style="max-width: 996px !important;">
                <div class="mb-3">
                    <span class="text-white ">Chúng tôi hoan nghênh ý kiến đóng góp quý báu của bạn.</span>
                </div>
                <div class="row bg-white justify-content-center">
                    <div class="bg-secondary text-uppercase p-3 fw-bolder text-white">Chi tiết phản hồi của bạn</div>
                    <div class="p-3">
                        <p class="form-text">Tất cả các trường được đánh dấu * là bắt buộc</p>
                        <div class="mb-6 row align-items-center mb-2">
                            <label for="inputNumberCard" class="col-sm-4 col-form-label form-text">Họ và tên
                                <span class="text-danger">*</span></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="inputNumberCard" placeholder="">
                            </div>
                        </div>
                        <div class="mb-2">
                            <label for="" class="form-text">Làm thế nào chúng ta có thể liên lạc với bạn?</label>
                        </div>
                        <div class="mb-6 row align-items-center mb-2">
                            <label for="inputNumberCard" class="col-sm-4 col-form-label form-text">Số điện thoại
                                <span class="text-danger">*</span></label>
                            </label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="inputNumberCard" placeholder="">
                            </div>
                        </div>
                        <div class="mb-6 row align-items-center mb-2">
                            <label for="inputNumberCard" class="col-sm-4 col-form-label form-text">Địa chỉ
                                
                            </label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="inputNumberCard" placeholder="">
                            </div>
                        </div>
                        <div class="mb-6 row align-items-center mb-2">
                            <label for="inputNumberCard" class="col-sm-4 col-form-label form-text">Email <span class="text-danger">*</span>
                                </label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="inputNumberCard" placeholder="">
                            </div>
                        </div>
                        <div class="mb-2">
                            <label for="" class="form-text">Bạn gặp vấn đề gì?</label>
                            <div class="my-2">
                                <input type="checkbox" name="" id="">
                                <span style="font-size: 13px" for="">Vấn đề 1</span>
                            </div>
                            <div class="my-2">
                                <input type="checkbox" name="" id="">
                                <span style="font-size: 13px" for="">Vấn đề 2</span>
                            </div>
                            <div class="my-2">
                                <input type="checkbox" name="" id="">
                                <span style="font-size: 13px" for="">Vấn đề 3</span>
                            </div>
                            <div class="my-2">
                                <input type="checkbox" name="" id="">
                                <span style="font-size: 13px" for="">Vấn đề 4</span>
                            </div>
                        </div>
                    </div>
                    <div class="bg-secondary text-uppercase p-3 fw-bolder text-white">Tin nhắn của bạn gửi cho tôi</div>
                    <div class="p-3">
                        <div class="mb-6 row align-items-center mb-2">
                            <label for="inputNumberCard" class="col-sm-4 col-form-label form-text">Hãy để lại tin nhắn của bạn để chúng tôi có thể hỗ trợ bạn.
                                </label>
                            <div class="col-sm-6">
                                <textarea class="form-control" name="" id="" cols="30" rows="5"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end py-3">
                        <a href="" class="btn btn-success w-25">Gởi</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end contact form -->
    @endsection