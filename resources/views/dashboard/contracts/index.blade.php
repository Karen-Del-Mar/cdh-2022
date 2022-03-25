@extends('dashboard.master')

@section('content')
<div class="container">
    <h6>Lista de contratos </h6>
    {{-- <a href="{{ route('admins.create') }}" class="btn btn-info btn-sm mb-3"></a> --}}
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">Nombre empleado</th>
                <th scope="col">Fecha inicio</th>
                <th scope="col">Cargo</th>
                <th scope="col">Salario</th>
                <th scope="col">Contacto</th>
                <th scope="col">Fecha finalización</th>
            </tr>
        </thead>
        <tbody>
            {{$var = 0}}
            @foreach ($lista_student as $list_student)
                {{$var = $var+1}}
                <tr>
                    <td>{{ $list_student->name }}</td>
                    <td>{{ $list_student->start_date }}</td>
                    <td>{{$list_student->job}} </td>
                    <td>{{ $list_student->payment }}</td>
                    <td>{{ $list_student->phone }}</td>
                    <td>{{ $list_student->final_date }}</td>
                    {{-- <td>
                        <a href="{{ route('admins.show', $admin->document) }}" class="btn btn-warning btn-sm">Ver</a>
                        <a href="{{ route('admins.edit', $admin->document) }}" class="btn btn-info btn-sm">Editar</a>
                        <form id="eliminarSolicitud" action="{{ route('admins.destroy',$admin->document) }}"
                            data-action="{{ route('admins.destroy', $admin->document) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                        </form>
                    </td> --}}
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
