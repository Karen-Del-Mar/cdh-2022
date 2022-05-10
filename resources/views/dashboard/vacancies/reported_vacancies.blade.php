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
                        <th scope="col">Contacto</th>
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
                            <td>{{ $vacancy->phone }}</td>
                            <td>

                                <form class="formulario-mostrar-v"
                                    action="{{ route('vacancies.set_state', ['id' => $vacancy->id, 0]) }}"
                                    method="POST">
                                    @method('PUT')
                                    @csrf

                                    <button type="submit" class="btn btn-success ms-2" title="Habilitar vacante"><i
                                        class="bi bi-emoji-laughing"></i></button>
                                </form>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
