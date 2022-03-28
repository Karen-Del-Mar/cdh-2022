@if (sizeof($lista) > 0)
    <h6>Postulaciones </h6>
    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                   
                    <th scope="col">fechaPostulacion</th>
                    <th scope="col">Nombre postulado</th>
                    <th scope="col">correo postulado</th>
                    <th scope="col">Vacante</th>
                    <th scope="col">Perfil requerido</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($lista as $postulados)
                    <tr>
                       
                        <td>{{ $postulados->created_at }}</td>
                        <td>{{ $postulados->name }}</td>
                        <td>{{ $postulados->email }}</td>
                        <td>{{ $postulados->job }}</td>
                        <td>{{ $postulados->profile }}</td>
                        <td>

                            <a href="{{ route('postulates.show', $postulados->id) }}" class="btn btn-warning btn-sm">
                                Ver
                            </a>

                            {{-- <a href="{{ route('solicitudes.edit', $postulados->document) }}"
                         class="btn btn-info btn-sm">Editar</a>
                     <form id="eliminarSolicitud" action="{{ route('solicitudes.destroy', $postulados->document) }}"
                         data-action="{{ route('admins.destroy', $postulados->document) }}" method="POST">
                         @method('DELETE')
                         @csrf
                         <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                     </form> --}}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@else
    <br><br>
    <h2>No existen postulados ...</h2>
@endif
