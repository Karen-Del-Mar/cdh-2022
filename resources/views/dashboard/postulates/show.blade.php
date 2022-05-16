@include('dashboard.students.show')



<div class="container d-flex justify-content-center align-items-center">
    <div class="mx-auto mb-4">
        <div class="form-group d-flex">
            <div class="">
                <a href="{{ URL::previous() }}" class="btn btn-success">Cancelar</a>
            </div>
            <div class="">
                <a class="btn btn-primary"
                    href="{{ route('contracts.created_contract', [$postulate->id]) }}">Contratar</a>
            </div>

            {{-- Usar otra palabra para rechazar --}}

            <form class="formulario-eliminar-post"
                action="{{ route('postulates.destroy', ['postulate' => $postulate->id]) }}" method="post">

                @method('DELETE')
                @csrf

                <button type="submit" class="btn btn-danger">Rechazar</button>

            </form>
        </div>
    </div>

</div>

<script>
    $('.formulario-eliminar-post').submit(function(e) {
        e.preventDefault();

        Swal.fire({
            title: '¿Estás seguro?',
            text: "La postulación se eliminará definitivamente",
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
</script>
