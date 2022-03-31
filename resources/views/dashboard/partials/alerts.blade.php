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
