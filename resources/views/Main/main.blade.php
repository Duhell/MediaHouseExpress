<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description"
        content="OFW Serbisyo't Kooperatiba is a non-governmental organization (NGO) in the Philippines whose function is to help Manning Agencies with the deployment and monitoring of Overseas Filipino Workers. Skilled, non-skilled, professional, or non-professional, whatever your occupation may be, OFW Serbisyo't Kooperatiba is here to lend a helping hand.">
    <meta name="keywords" content="OFW,Media,House,Express,Tulong,Tabang">
    <meta name="author" content="YCMS">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Media House Express</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('favicon.ico') }}" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
    @vite('resources/css/app.css')
</head>

<body class="relative overflow-x-hidden">
    @if (!Request::is('admin/login'))
        @include('NavView')
    @endif
    <main class="relative">
        @yield('contents')
    </main>
    @if (!Request::is('admin/login'))
        @include('FooterView')
    @endif
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const errorShow = document.getElementById('err');
            const successShow = document.getElementById('success');

            const hideElements = () => {
                if (errorShow) {
                    errorShow.style.display = "none";
                }
                if (successShow) {
                    successShow.style.display = "none";
                }
            };

            if (errorShow || successShow) {
                setTimeout(hideElements, 4000);
            }
        });
    </script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>

</html>
