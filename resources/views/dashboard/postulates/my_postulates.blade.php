

@if (sizeof($my_postulates) > 0)
    <h6>Postulaciones </h6>
    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead>
                <tr class="table-primary">
                    <th scope="col">Fecha Postulacion</th>
                    <th scope="col">Nombre empresa</th>
                    <th scope="col">Correo</th>
                    <th scope="col">Vacante</th>
                    <th scope="col">Perfil requerido</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($my_postulates as $postulados)
                    <tr>
                        <td>{{ $postulados->created_at->format('d-m-Y') }}</td>
                        <td>{{ $postulados->company }}</td>
                        <td>{{ $postulados->email }}</td>
                        <td>{{ $postulados->job }}</td>
                        <td>{{ $postulados->profile }}</td>
                        <td> <form class="formulario-eliminar-post"
                            action="{{ route('postulates.destroy', ['postulate' => $postulados->id]) }}" method="post">
            
                            @method('DELETE')
                            @csrf
            
                            <button type="submit" class="btn btn-danger" title="Quitar"><i class="bi bi-dash-circle-fill"></i></button>
            
                        </form></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@else
    <br><br>
    <h2>Todavía no te postulas a una vacante ...</h2>
    <img src="https://img.icons8.com/emoji/48/000000/hourglass-not-done.png"/>
@endif

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