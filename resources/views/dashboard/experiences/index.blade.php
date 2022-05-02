<div class="container mb-5">

    <div class="row d-flex justify-content-center">

        <div class="col-md-8">

            <div class="text-left">
                <h6>All comment({{ $comments }})</h6>
            </div>

            @foreach ($lista as $experience)
                <div class="card p-3 mb-2 mt-2">

                    <div class="d-flex flex-row">
                        <img src="{{ asset('images/students-profiles/' . $experience->avatar) }}" height="40"
                            width="40" class="rounded-circle">

                        <div class="d-flex flex-column ms-2 ml-2">

                            <h6 class="mb-1">{{ $experience->name }} - {{ $experience->rol }} </h6>

                            <div class="d-flex flex-row">
                                <span class="text-muted fw-normal fs-10">{{ $experience->created_at->format('d-m-Y H:i:s') }}</span>
                            </div>

                            <div class="comment-text text-justify mt-2">
                                @if ($experience->hidden == 0)
                                    @if (Auth::guest() || auth()->user()->id !== $experience->id_user)
                                        <p class="comment-text">{{ $experience->experience }} </p>
                                    @endif
                                @endif
                            </div>

                        </div>
                    </div>

                    @if (auth()->user())
                        @if (auth()->user()->id === $experience->id_user)
                            <div class="d-block btn-group btn-group-sm">

                                <form class="formulario-editar"
                                    action="{{ route('experience.update', ['experience' => $experience->id]) }}"
                                    method="post">
                                    @method('PUT')
                                    @csrf
                                    @if ($experience->hidden == 1)
                                    <p class="card-text text-danger">Su comentario se ha ocultado por infringir las normas de Cadena de Honor.</p>
                                    @endif
                                    <textarea class="form-control inputs h-auto mb-2" name="experience" id="experience"
                                        readonly>{{ $experience->experience }}</textarea>
                                    {{-- <div class="d-flex"> --}}
                                    <button type="submit" class="btn btn-primary" id="savebutton">Editar</button>

                                </form>

                                <form class="formulario-eliminar"
                                    action="{{ route('experience.destroy', ['experience' => $experience->id]) }}"
                                    method="post">

                                    @method('DELETE')
                                    @csrf

                                    <button type="submit" class="btn btn-danger">Eliminar</button>
                                    {{-- </div> --}}
                                </form>

                            </div>
                        @endif
                        @if (auth()->user()->rol->key == 'admin')
                            @if ($experience->hidden == 0)
                                <form class="formulario-ocultar-exp"
                                    action="{{ route('userExperience.change_hidden', ['id' => $experience->id, 1]) }}"
                                    method="POST">
                                    @method('PUT')
                                    @csrf

                                    <button id="hideButton" type="submit" class="btn btn-danger">Ocultar</button>
                                </form>
                            @else
                                <form class="formulario-mostrar-exp"
                                    action="{{ route('userExperience.change_hidden', ['id' => $experience->id, 0]) }}"
                                    method="POST">
                                    @method('PUT')
                                    @csrf

                                    <button id="hideButton" type="submit" class="btn btn-success">Mostrar</button>
                                </form>
                            @endif
                        @endif
                    @endif
                </div>
            @endforeach

            <div class="p-3 bg-white mt-2 rounded text-center mb-5">
                <h5>¿Eres egresado? Contáctanos para compartir tu experiencia</h5>
                <a class="btn btn-primary btn-sm px-3" href="/contact">Contacto</a>
            </div>
        </div>

    </div>

</div>


<style>
    .index {
        background-color: #eee;

    }

    .card {
        border: none;
        -webkit-box-shadow: 0 2px 3px rgba(0, 0, 0, 0.03);
        box-shadow: 0 2px 3px rgba(0, 0, 0, 0.03)
    }

    h6 {
        color: #0069A3
    }

    .card .inputs textarea {
        height: 40px;
        padding: 0px 10px;
        font-size: 17px;
        box-shadow: none;
        outline: none;
    }

    .card .inputs taxtarea[readonly] {
        border: 2px solid rgba(30, 217, 171, 0)
    }

</style>
