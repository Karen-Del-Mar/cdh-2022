@if (sizeof($my_postulates) > 0)
    <h6>Postulaciones </h6>
    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">Fecha Postulacion</th>
                    <th scope="col">Nombre empresa</th>
                    <th scope="col">correo</th>
                    <th scope="col">Vacante</th>
                    <th scope="col">Perfil requerido</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($my_postulates as $postulados)
                    <tr>
                        <td>{{ $postulados->created_at }}</td>
                        <td>{{ $postulados->company }}</td>
                        <td>{{ $postulados->email }}</td>
                        <td>{{ $postulados->job }}</td>
                        <td>{{ $postulados->profile }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@else
    <br><br>
    <h2>Todavía no te postulas a una vacante ...</h2>
    <img src="https://img.icons8.com/emoji/48/000000/hourglass-not-done.png"/>
@endif
