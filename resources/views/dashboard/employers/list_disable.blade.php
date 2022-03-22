@if (sizeof($users) > 0)

    <div class="container">

        <h6>Gestionar Solicitudes</i></h6>

        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">Documento</th>
                    <th scope="col">Nombre Empleador</th>
                    <th scope="col">Empresa</th>
                    <th scope="col">Descripción</th>
                </tr>
            </thead>
            <tbody>
                @for ($i = 0; $i <= sizeof($users); $i++)
                    <tr>
                        <td>{{ $users[$i]->document }}</td>
                        <td>{{ $users[$i]->name }}</td>
                        <td>{{ $employers[$i]->company }}</td>
                        <td>{{ $employers[$i]->description }}</td>
                        <td>

                            <a href="{{ route('solicitudes.show', $employer->id) }}" class="btn btn-warning btn-sm"><i
                                    class="fas fa-eye"></i>
                                Habilitar</a>
                        </td>
                    </tr>
                @endfor
            </tbody>
        </table>
    </div>
@else
    <h3>No hay empresas Deshabilitadas</h3>
@endif
