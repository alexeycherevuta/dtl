<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <script src="{{ asset('js/app.js') }}"></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    @include('layouts.navigation')
    <div class="container" style="padding-top: 66px"></div>
    @if (session('success'))
    <div class="container">
        <div class="row mt-5">
            <div class="col-12">
                <div class="alert alert-success m-0" role="alert">
                    <h5 class="font-weight-bold"><i class="fas fa-check-circle mr-2"></i>Success</h5>
                    {{ session('success') }}
                </div>
            </div>
        </div>
    </div>
    @endif
    @yield('content')
    @include('layouts.footer')
    @yield('scripts')
</body>
</html>
