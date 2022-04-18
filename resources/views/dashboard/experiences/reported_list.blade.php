<div class="container">
    @if (session('status'))
    @endif

    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">Estudiante</th>
                    <th scope="col">Correo</th>
                    <th scope="col">Telefono</th>
                    <th scope="col">Comentario</th>
                    <th scope="col">Fecha</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($list_exp as $experience)
                    <tr>
                        <td>{{ $experience->name }}</td>
                        <td>{{ $experience->email }}</td>
                        <td>{{ $experience->phone }}</td>
                        <td>{{ $experience->experience }}</td>
                        <td>{{ $experience->created_at }}</td>
                        <td>
                            {{-- <a href="{{ route('vacancies.show', $vacancy->id) }}"
                                class="btn btn-warning btn-sm">Ver</a> --}}

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
