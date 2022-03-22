    <div class="container light-blue">
        @if (session('status'))
        @endif

        @if (Auth::guest())
        @else
            @if (auth()->user()->id === $user->id)
                <a href="{{ route('vacancies.create') }}" class="mt-4 btn btn-success btn-lg mb-3">
                    Nueva vacante
                </a>
            @endif
        @endif

        <div class="justify-content-center row">

            @foreach ($vacancies as $vacancy)
                <br>
                <div class="card w-75" style="margin: 2%">
                    <div class="card-body">
                        <h5 class="card-title" style="color:#0069A3; font-weight:bold">{{ $vacancy->job }}</h5>
                        {{-- <div class="d-flex">
                            <p class="card-text" style="color:#0069A3; margin-right: 2%">{{ $vacancy->company }}
                            </p>
                            <p class="card-text" style="color:#0069A3; margin-right: 2%">{{ $vacancy->email }}</p>
                            <p class="card-text" style="color:#0069A3; margin-right: 2%">{{ $vacancy->location }}
                            </p>

                        </div> --}}

                        <div class="d-flex">
                            <p class="card-text" style="margin-right: 2%; font-weight:bold">Perfil requerido:</p>
                            <p class="card-text" style="margin-right: 2%">{{ $vacancy->profile }}</p>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="d-flex">
                                    <p class="card-text" style="margin-right: 2%; font-weight:bold">Horario:</p>
                                    <p class="card-text" style="margin-right: 2%">{{ $vacancy->availability }}
                                    </p>
                                </div>
                                {{-- <div class="d-flex">
                                    <p class="card-text" style="margin-right: 2%; font-weight:bold">Encargado:</p>
                                    <p class="card-text" style="margin-right: 2%">{{ $vacancy->name }}</p>
                                </div> --}}
                            </div>
                            <div class="col">
                                <div class="d-flex">
                                    <p class="card-text" style="margin-right: 2%; font-weight:bold">Salario:</p>
                                    <p class="card-text" style="margin-right: 2%">${{ $vacancy->payment }}</p>
                                </div>

                            </div>
                            <div class="col-2">
                                <p>poner botones aqui </p>
                            </div>
                        </div>

                    </div>

                    @if (Auth::guest())
                        <a href="/login" class="btn btn-info">Aplicar</a>
                    @else
                        @if (auth()->user()->id === $user->id)
                            <div class="btn-group btn-group-sm">

                                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal" data-bs-whatever="">Editar</button>

                                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal2" data-bs-whatever="">Eliminar</button>
                            </div>
                        @endif

                        @if (auth()->user()->rol->key === 'student')
                            <form action="{{ route('postulates.store') }}" method="POST">
                                @csrf
                                {{-- <input id="id_student" hidden name="id_student" value="{{ auth()->user()->id }}">

                                <input id="id_vacancy" hidden name="id_vacancy" value="{{ $vacancies->id }}"> --}}

                                <button type="submit" class="btn btn-success btn-sm">Postularme</button>
                            </form>
                        @endif
                    @endif
                </div><br>

                <form action="{{ route('vacancies.update', ['vacancy' => $vacancy->id]) }}" method="post">

                    @method('PUT')
                    @csrf

                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">


                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>

                                <div class="modal-body">
                                    <form>
                                        <div class="mb-3">
                                            <label for="recipient-name" class="col-form-label">Vacante:</label>
                                            <textarea type="text" class="form-control" rows="5" id="experience"
                                                name="experience">{}</textarea>
                                        </div>

                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Guardar cambios</button>
                                </div>
                            </div>

                        </div>
                    </div>

                </form>

                <form action="{{ route('vacancies.destroy', ['vacancy' => $vacancy->id]) }}" method="post">

                    @method('DELETE')
                    @csrf

                    <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">


                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">New Message</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>

                                <div class="modal-body">
                                    <form>
                                        <div class="mb-3">
                                            <label for="recipient-name" class="col-form-label"> ¿Desea eliminar la
                                                vacante?</label>
                                        </div>

                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Eliminar</button>
                                </div>
                            </div>

                        </div>
                    </div>

                </form>
                {{-- TODO --}}
                {{-- <a href="{{ route('vacancies.edit', $vacancy->id) }}" class="btn btn-info btn-sm">Editar</a>
                        <form id="eliminarVacante" action="{{ route('admins.destroy',$vacancy->id) }}"
                            data-action="{{ route('vacancies.destroy', $vacancy->id) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                        </form> --}}
            @endforeach
        </div>
    </div>

    <style>
        .light-blue {
            background: #d9eaf5;
        }

    </style>

    <script>
        var exampleModal = document.getElementById('exampleModal')
        exampleModal.addEventListener('show.bs.modal', function(event) {
            // Button that triggered the modal
            var button = event.relatedTarget
            // Extract info from data-bs-* attributes
            var recipient = button.getAttribute('data-bs-whatever')
            // If necessary, you could initiate an AJAX request here
            // and then do the updating in a callback.
            //
            // Update the modal's content.
            var modalTitle = exampleModal.querySelector('.modal-title')
            var modalBodyInput = exampleModal.querySelector('.modal-body input')

            modalTitle.textContent = 'Editar vacante'
            modalBodyInput.value = recipient
        })

        var exampleModal2 = document.getElementById('exampleModal2')
        exampleModal2.addEventListener('show.bs.modal', function(event) {
            // Button that triggered the modal
            var button = event.relatedTarget
            // Extract info from data-bs-* attributes
            var recipient = button.getAttribute('data-bs-whatever')
            // If necessary, you could initiate an AJAX request here
            // and then do the updating in a callback.
            //
            // Update the modal's content.
            var modalTitle = exampleModal2.querySelector('.modal-title')
            var modalBodyInput = exampleModal2.querySelector('.modal-body input')

            modalTitle.textContent = 'Eliminar vacante'
            modalBodyInput.value = recipient
        })
    </script>
