@if (session('deleted') == 'ok')
    <script>
        Swal.fire(
            '¡Eliminado!',
            'La experiencia ha sido eliminada.',
            'success'
        )
    </script>
@endif
