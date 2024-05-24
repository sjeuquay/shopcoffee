@props([
    'name' => '',
])
    @vite(['resources/css/client/bootstrap.min.css', 'resources/css/client/style.css'])
<section>
    <div class="" style="max-width:996px;margin: 0 auto;">
        <div class="" style="text-align: center;display:flex;align-items:center;justify-content:center;height:100%;flex-direction:column;">
            <img src="{{ asset('img/404.png') }}" alt="" style="max-width:100%;">
            <h1 class="py-5 text-uppercase fw-bold" style="font-size: 40px;color:rgba(0, 0, 0, 0.527);letter-spacing:4px;">{{$name}}</h1>
        </div>
    </div>
</section>
