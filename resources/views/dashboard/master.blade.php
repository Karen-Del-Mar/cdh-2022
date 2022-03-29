<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <title>Cadena de honor</title>
</head>

<body>
    @include('dashboard.partials.header')
    {{-- @include('dashboard.partials.nav-menu') --}}
    @include('dashboard.partials.status')


    @yield('content')
</body>

</html>

<script>
    window.addEventListener('message', () => {
        Swal.fire({
            icon: 'success',
            title: 'Acción Exitosa',
            showConfirmButton: false,
            timer: 1000,
        })
    });

    window.addEventListener('prueba', () => {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Something went wrong!',
            footer: '<a href="">Why do I have this issue?</a>'
        })
    });
</script>
