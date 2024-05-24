@extends('client.layout')

@section('content')
    <main class="bg-black py-3">
        <div class="container bg-white">
            <div class="row">
                @include('client.account.sidebar')
                    
                @yield('profile')
            </div>
        </div>
        </div>
    </main>
@endsection
