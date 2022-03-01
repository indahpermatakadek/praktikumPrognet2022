<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- <link rel="stylesheet" href="css/style.css"> --}}
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        #circle {
            clip-path: circle(600px at right 800px);
        }

        @yield('css');
    </style>

    <title>Praktikum Pemrograman Internet 2022</title>
</head>
<body class="p-5 justify-center items-center">

    @yield('content')

</body>