<link rel="icon" href="{{ asset('image/icon.png') }}" type="image/x-icon">
<!-- General CSS Files -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/jquery-shorten@0.3.2/dist/css/shorten.min.css">

@stack('css')
<!-- Template CSS -->
<link rel="stylesheet" href="{{ asset('stisla/css/style.css') }}">
<link rel="stylesheet" href="{{ asset('stisla/css/components.css') }}">
{{-- <link rel="stylesheet" href="{{ asset('stisla/css/custom.css') }}"> --}}
{{-- <link rel="stylesheet" href="{{ asset('css/loading.css') }}"> --}}
<style>
.table-borderless > tbody > tr > td,
.table-borderless > tbody > tr > th,
.table-borderless > tfoot > tr > td,
.table-borderless > tfoot > tr > th,
.table-borderless > thead > tr > td,
.table-borderless > thead > tr > th {
    border: none;
}
</style>

@yield('css')