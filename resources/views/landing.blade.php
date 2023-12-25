<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Media House Express</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
    <style>
        /* *{
            outline: 1px solid red;
        } */
    </style>
    @vite('resources/css/app.css')
</head>
<body>
    <main class="relative">
        @include('NavView')
        @include('HeroView')
        @include('ServiceView')
        @include('BenefitView')
        @include('OrganizationView')
        @include('ExistenceView')
        @include('EpisodesView')
        @include('TeamView')
        @include('FooterView')
    </main>
    <script src="../path/to/flowbite/dist/flowbite.min.js"></script>
</body>
</html>
