{{-- @extends('dashboard.master')
@section('content') --}}
{{-- <div class="container my-4"> --}}
<div class="table-responsive">
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Correo</th>
                <th scope="col">Teléfono</th>
                <th scope="col">Carrera</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($lista_student as $student)
                <tr>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->email }}</td>
                    <td>{{ $student->phone }}</td>
                    {{-- <td>{{ $student->career }}</td> --}}
                    <td>
                        <a href="{{ route('student.show', $student) }}" class="btn btn-warning btn-sm">
                            Ver
                        </a>

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
{{-- </div> --}}
{{-- @endsection() --}}
