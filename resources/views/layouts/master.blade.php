<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="js">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    {!! app('seotools')->generate() !!}
    <link rel="stylesheet" href="{{ mix('css/'.config('app.unique_id').'.css') }}">
{{--    <link id="skin-default" rel="stylesheet" href="{{ asset('css/theme.css') }}">--}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    @stack('styles')
    @livewireStyles

</head>

<body class="nk-body bg-lighter npc-general has-sidebar ">
{{ $slot }}
<!-- app-root @e -->

@livewireScripts
<!-- JavaScript -->
<script src="{{ mix('js/app.js') }}"></script>
<script src="{{ mix('js/scripts.js') }}"></script>
<script src="{{ asset('assets/js/charts/gd-default.js') }}"></script>
@stack('scripts')
<script>


    @if(Session::has('success'))
    NioApp.Toast('{{ Session::get('success') }}', 'info', {
        position: 'top-right'
    });
    @php
        Session::forget('success');
    @endphp
    @endif


    @if(Session::has('info'))
    NioApp.Toast('{{ Session::get('info') }}', 'info', {
        position: 'top-right'
    });
    @php
        Session::forget('info');
    @endphp
    @endif


    @if(Session::has('warning'))
    NioApp.Toast('{{ Session::get('warning') }}', 'warning', {
        position: 'top-right'
    });
    @php
        Session::forget('warning');
    @endphp
    @endif


    @if(Session::has('error'))
    NioApp.Toast('{{ Session::get('error') }}', 'error', {
        position: 'top-right'
    });
    @php
        Session::forget('error');
    @endphp
    @endif
</script>
</body>

</html>
