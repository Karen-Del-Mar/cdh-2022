<div class="table-responsive">
    <table class="table table-hover" id="tabla">
        <thead>
            <tr>
                <td colspan="4" class="d-flex">
                    <input id="buscar" type="text" class="form-control" placeholder="Escriba algo para filtrar" /><i
                        class="bi bi-search"></i>
                </td>
            </tr>
            <tr>
                {{-- 3 estados de estudiante: Ha enviado postulaciones, no se ha postulado, contratado
                    Hacerlo desde las consultas --}}
                <th scope="col">Nombre</th>
                <th scope="col">Correo</th>
                <th scope="col">Teléfono</th>
                <th scope="col">Carrera</th>
                <th scope="col">Promedio</th>
                <th scope="col">Estado</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($lista_student as $student)
                @if ($student->average < 3.5)
                    <tr class="table-danger">
                        <td>{{ $student->name }}</td>
                        <td>{{ $student->email }}</td>
                        <td>{{ $student->phone }}</td>
                        <td>{{ $student->career }}</td>
                        <td>{{ $student->average }}</td>

                        @if ($student->state == 'No postulado')
                            <td><label class="badge rounded-pill bg-secondary">{{ $student->state }}</label></td>
                        @else
                            @if ($student->state == 'Postulado')
                                <td><label class="badge rounded-pill bg-info text-dark">{{ $student->state }}</label></td>
                            @else
                                <td><label class="badge rounded-pill bg-success">{{ $student->state }}</label></td>
                            @endif
                        @endif

                        <td> {{-- $student-> id es id de usuario --}}
                            <a href="{{ route('student.show', $student->id_user) }}" class="btn btn-warning btn-sm">
                                Ver
                            </a>
                        </td>
                    </tr>
                @else
                    <tr>
                        <td>{{ $student->name }}</td>
                        <td>{{ $student->email }}</td>
                        <td>{{ $student->phone }}</td>
                        <td>{{ $student->career }}</td>
                        <td>{{ $student->average }}</td>

                        @if ($student->state == 'No postulado')
                            <td><label class="badge rounded-pill bg-secondary">{{ $student->state }}</label></td>
                        @else
                            @if ($student->state == 'Postulado')
                                <td><label class="badge rounded-pill bg-info text-dark">{{ $student->state }}</label></td>
                            @else
                                <td><label class="badge rounded-pill bg-success">{{ $student->state }}</label></td>
                            @endif
                        @endif

                        <td> {{-- $student-> id es id de usuario --}}
                            <a href="{{ route('student.show', $student->id_user) }}" class="btn btn-warning btn-sm">
                                Ver
                            </a>

                        </td>
                    </tr>
                @endif
            @endforeach
        </tbody>
    </table>
</div>

<script>
    var busqueda = document.getElementById('buscar');
    var table = document.getElementById("tabla").tBodies[0];

    buscaTabla = function() {
        texto = busqueda.value.toLowerCase();
        var r = 0;
        while (row = table.rows[r++]) {
            if (row.innerText.toLowerCase().indexOf(texto) !== -1)
                row.style.display = null;
            else
                row.style.display = 'none';
        }
    }

    busqueda.addEventListener('keyup', buscaTabla);
</script>
