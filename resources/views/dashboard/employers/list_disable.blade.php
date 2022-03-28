@if (sizeof($users) > 0)

    <div class="container">

        <h6>Gestionar Solicitudes</i></h6>
        <div class="table-responsive">
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
                    @foreach ($users as $user )
                        
                    
                        <tr>
                            <td>{{ $user->document }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->company }}</td>
                            <td>{{ $user->description }}</td>
                            <td>

                                <a href="{{ route('employer.show', $user ->id_user) }}"
                                    class="btn btn-warning btn-sm"><i class="fas fa-eye"></i>
                                    Habilitar</a>
                            </td>
                        </tr>
                        @endforeach 
                </tbody>
            </table>
        </div>
    </div>
@else
    <h3>No hay empresas Deshabilitadas</h3>
@endif

{{-- @extends('dashboard.master')

@section('content') --}}

{{-- @endsection --}}
