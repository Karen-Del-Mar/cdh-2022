@if (session('deleted') == 'ok')
    <script>
        Swal.fire(
            '¡Eliminado!',
            'La experiencia ha sido eliminada.',
            'success'
        )
    </script>
@endif


@if (session('postulated') == 'ok')
    <script>
        Swal.fire(
            '¡Enviada!',
            'Su postulación ha sido enviada.',
            'success'
        )
    </script>
@endif

@if (session('postulated') == 'no')
    <script>
        Swal.fire(
            '¡Error!',
            'Ya estás postulado a esta vacante.',
            'error'
        )
    </script>
@endif

@if (session('updated') == 'ok')
    <script>
        Swal.fire(
            '¡Hecho!',
            'Su experiencia fue actualizada.',
            'success'
        )
    </script>
@endif

@if (session('deleteV') == 'fail')
    <script>
        Swal.fire(
            '¡Error!',
            'La vacante no puede ser eliminada porque ha recibido postulaciones.',
            'error'
        )
    </script>
@endif

@if (session('deleteV') == 'ok')
    <script>
        Swal.fire(
            '¡Hecho!',
            'La vacante fue eliminada.',
            'success'
        )
    </script>
@endif

@if (session('deletePost') == 'ok')
    <script>
        Swal.fire(
            '¡Hecho!',
            'La postulación fue eliminada.',
            'success'
        )
    </script>
@endif