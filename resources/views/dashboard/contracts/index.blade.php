<div class="container">
    @if (sizeof($lista_student) > 0)
    <h6>Lista de contratos </h6>
    {{-- <a href="{{ route('admins.create') }}" class="btn btn-info btn-sm mb-3"></a> --}}
    <div class="table-responsive">
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
                
                @foreach ($lista_student as $list_student)

                    <tr>
                        <td>{{ $list_student->name }}</td>
                        <td>{{ $list_student->start_date }}</td>
                        <td>{{ $list_student->job }} </td>
                        <td>{{ $list_student->payment }}</td>
                        <td>{{ $list_student->phone }}</td>
                        <td>{{ $list_student->final_date }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @else
    <br><br>
    <h2>Todavía no tienes contratos ...</h2>
@endif
</div>

