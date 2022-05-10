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
                        <td>{{ $experience->id }}</td>

                        <td>
                            <div class="d-flex">

                                <form class="formulario-mostrar-exp"
                                    action="{{ route('userExperience.change_hidden', ['id' => $experience->id, 0]) }}"
                                    method="post">
                                    @method('PUT')
                                    @csrf
                                    <button type="submit" class="btn btn-success" title="Mostrar comentario"><i
                                            class="bi bi-emoji-laughing"></i></button>
                                </form>

                                <form class="formulario-eliminar"
                                    action="{{ route('experience.destroy', ['experience' => $experience->id]) }}"
                                    method="post">

                                    @method('DELETE')
                                    @csrf

                                    <button type="submit" class="btn btn-danger"><i
                                        class="bi bi-trash3"></i></button>
                                    {{-- </div> --}}
                                </form>

                            </div>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
