{{-- @extends('dashboard.master')
@include('dashboard.partials.nav-menu') --}}
@if (sizeof($lista) > 0)

    <div class="container">

        <h6>Gestionar Solicitudes</i></h6>
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">Documento</th>
                        <th scope="col">Nombre Empleador</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Dirección</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($lista as $solicitude)
                        <tr>
                            <td>{{ $solicitude->document }}</td>
                            <td>{{ $solicitude->name }}</h1>
                            </td>
                            <td>{{ $solicitude->description }}</td>
                            <td>{{ $solicitude->location }}</td>
                            <td>

                                <a href="{{ route('solicitudes.show', $solicitude->id) }}"
                                    class="btn btn-warning btn-sm"><i class="bi bi-eye"></i>
                                    Ver</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@else
    <h3>No hay solicitudes pendientes de aprobación</h3>
@endif
