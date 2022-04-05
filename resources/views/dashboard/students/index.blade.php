<div class="table-responsive">
    <table class="table table-striped table-hover" id="tabla">
        <thead>
            <tr>
                <td colspan="4" class="d-flex">
                    <input id="buscar" type="text" class="form-control" placeholder="Escriba algo para filtrar" /><i class="bi bi-search"></i>
                </td>
            </tr>
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
                    <td>{{ $student->career }}</td>
                    <td>
                        <a href="{{ route('student.show', $student->id) }}" class="btn btn-warning btn-sm">
                            Ver
                        </a>

                    </td>
                </tr>
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
