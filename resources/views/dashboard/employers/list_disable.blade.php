@if (sizeof($users) > 0)

    <div class="container">

        <h6>Lista de empresas inhabilitadas</i></h6>
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr class="table-primary">
                        <th scope="col">Documento</th>
                        <th scope="col">Nombre Empleador</th>
                        <th scope="col">Empresa</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->document }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->company }}</td>
                            <td>{{ $user->description }}</td>

                            <td>
                                <div class="d-flex">
                                    <a href="{{ route('employer.show', $user->id_user) }}" class="btn btn-warning"
                                        title="Ver perfil"><i class="bi bi-eye-fill"></i>
                                    </a>
                                    <form class="form-enable-employer"
                                        action="{{ route('employer.disable_employer', ['id' => $user->id_employer, 0]) }}"
                                        method="post">
                                        @method('PUT')
                                        @csrf
                                        <button type="submit" class="btn btn-success" title="Habilitar perfil"><i
                                                class="bi bi-emoji-laughing"></i></button>
                                    </form>
                                </div>
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
