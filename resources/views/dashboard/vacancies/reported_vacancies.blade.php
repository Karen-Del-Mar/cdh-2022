    <div class="container">
        @if (session('status'))
        @endif

        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">Empleo</th>
                        <th scope="col">Empresa</th>
                        <th scope="col">Perfil requerido</th>
                        <th scope="col">Disponibilidad</th>
                        <th scope="col">Salario</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($vacancies as $vacancy)
                        <tr>
                            <td>{{ $vacancy->job }}</td>
                            <td>{{ $vacancy->company }}</td>
                            <td>{{ $vacancy->profile }}</td>
                            <td>{{ $vacancy->availability }}</td>
                            <td>{{ $vacancy->payment }}</td>
                            <td>
                                <a href="{{ route('vacancies.show', $vacancy->id) }}"
                                    class="btn btn-warning btn-sm">Ver</a>

                                {{-- TODO --}}
                                {{-- <a href="{{ route('vacancies.edit', $vacancy->id) }}" class="btn btn-info btn-sm">Editar</a>
                        <form id="eliminarVacante" action="{{ route('admins.destroy',$vacancy->id) }}"
                            data-action="{{ route('vacancies.destroy', $vacancy->id) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                        </form> --}}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
