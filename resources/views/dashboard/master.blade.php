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
    @include('dashboard.partials.alerts')



    @yield('content')
</body>

</html>
<script>
    $('.formulario-postular').submit(function(e) {
        e.preventDefault();

        Swal.fire({
            title: '¿Estás seguro?',
            text: "Su postulación se enviará al empleador de la vacante",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: '¡Si, enviar!',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                this.submit();
            }
        })

    });

    $('.formulario-eliminar').submit(function(e) {
        e.preventDefault();

        Swal.fire({
            title: '¿Estás seguro?',
            text: "Esta experiencia se eliminará definitivamente",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: '¡Si, eliminar!',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                this.submit();
            }
        })

    });

    $('.formulario-editar').submit(function(e) {


        var savebutton = document.getElementById('savebutton');
        var readonly = true;
        var inputs = document.querySelectorAll('textarea[name="experience"]');
        // savebutton.addEventListener('click', function() {

        for (var i = 0; i < inputs.length; i++) {
            inputs[i].toggleAttribute('readonly');
        };
        if (savebutton.innerHTML == "Editar") {
            savebutton.innerHTML = "Guardar";
            savebutton.setAttribute("class", "btn btn-warning");
            e.preventDefault();
        } else {
            /*Llega acá al dar click en guardar*/
            savebutton.innerHTML = "Editar";
            this.submit();
        }
        //  });

    });

    $('.formulario-ocultar-exp').submit(function(e) {
    
        e.preventDefault();

        Swal.fire({
            title: '¿Ocultar comentario?',
            text: "Si cosidera que este comentario no cumple con las normas del programa puede ocultarlo para los demás usuarios",
            icon: 'info',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: '¡Si, ocultar!',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                this.submit();
            }
        })

    });
  
    $('.formulario-mostrar-exp').submit(function(e) {
    
    e.preventDefault();

    Swal.fire({
        title: '¿Mostrar comentario?',
        text: "El comentario se volverá visible para todos los usuarios",
        icon: 'info',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: '¡Si, mostrar!',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            this.submit();
        }
    })

});

$('.formulario-ocultar-v').submit(function(e) {
    
    e.preventDefault();

    Swal.fire({
        title: '¿Ocultar vacante?',
        text: "Si cosidera que esta vacante no cumple con las normas del programa puede ocultarla para los demás usuarios",
        icon: 'info',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: '¡Si, ocultar!',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            this.submit();
        }
    })

});

$('.formulario-mostrar-v').submit(function(e) {

e.preventDefault();

Swal.fire({
    title: '¿Mostrar vacante?',
    text: "La vacante se volverá visible para todos los usuarios",
    icon: 'info',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: '¡Si, mostrar!',
    cancelButtonText: 'Cancelar'
}).then((result) => {
    if (result.isConfirmed) {
        this.submit();
    }
})

});
    /* Función buscar para empleadores y vacantes */
    var original = $('div[data-role="recipe"]');

    $(document).ready(function() {
        $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $('div[data-role="recipe"]').filter(function() {
                $(this).toggle($(this).find('h4').text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
</script>
