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
                        </div>
                        <div class="col">
                            <div class="d-flex">
                                <p class="card-text" style="margin-right: 2%; font-weight:bold">Salario:</p>
                                <p class="card-text" style="margin-right: 2%">${{ $vacancy->payment }}</p>
                            </div>

                        </div>
                    </div>

                </div>

                @if (Auth::guest())
                    <a href="/login" class="btn btn-info">Aplicar</a>
                @else
                    @if (auth()->user()->id === $user->id)
                        
                        <div class="btn-group btn-group-sm">
                            <div class="col-2">
                                {{-- Falta poner la opción de vigencia en el form para no recibir más postulaciones  --}}

                                <a href="{{ route('vacancies.edit', $vacancy->id) }}"
                                    class="btn btn-primary btn-sm">Editar</a>
                            </div>

                            <div class="col-2">
                                {{-- no deja eliminar si hay postulaciones  --}}

                                <form action="{{ route('vacancies.destroy', ['vacancy' => $vacancy->id]) }}"
                                    method="post">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                                </form>

                            </div>

                        </div>
                    @endif

                    @if (auth()->user()->rol->key === 'student')
                        <form action="{{ route('postulates.store') }}" method="POST">
                            @csrf
                            {{-- <input id="id_student" hidden name="id_student" value="{{ auth()->user()->id }}">

                                <input id="id_vacancy" hidden name="id_vacancy" value="{{ $vacancies->id }}"> --}}

                            <button type="submit" class="btn btn-info btn-sm">Postularme</button>
                        </form>
                    @endif
                @endif
            </div><br>
        @endforeach
        {{-- TODO --}}
        {{-- <a href="{{ route('vacancies.edit', $vacancy->id) }}" class="btn btn-info btn-sm">Editar</a>
                        <form id="eliminarVacante" action="{{ route('admins.destroy',$vacancy->id) }}"
                            data-action="{{ route('vacancies.destroy', $vacancy->id) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                        </form> --}}

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
        // var recipient = button.getAttribute('data-bs-whatever')
        // If necessary, you could initiate an AJAX request here
        // and then do the updating in a callback.
        //
        // Update the modal's content.
        var modalTitle = exampleModal2.querySelector('.modal-title')
        var modalBodyInput = exampleModal2.querySelector('.modal-body input')

        modalTitle.textContent = 'Eliminar vacante' + recipient
        modalBodyInput.value = recipient
    })
</script>
