<div class="container light-blue">
    @if (session('status'))
    @endif

    @if (Auth::guest())
    @else
        @if (auth()->user()->id === $user->id)
            <a href="{{ route('vacancies.create') }}" class="mt-4 btn btn-success btn-lg mb-3">
                <i class="bi bi-plus-circle"></i> Nueva vacante
            </a>
        @endif
    @endif

    <div class="justify-content-center row">

        @foreach ($vacancies as $vacancy)
            <div class="card w-75" style="margin: 2%">

                @if ($vacancy->state !== 2 && (Auth::guest() || auth()->user()->rol->key === 'student'))
                    <div class="card-body">

                        <h5 class="card-title" style="color:#0069A3; font-weight:bold">{{ $vacancy->job }}
                        </h5>

                        <div class="d-lg-flex d-sm-block">
                            @if ($vacancy->state == 1)
                                <p class="card-text text-danger">Venció {{ $vacancy->limit_date }}</p>
                            @else
                                @if ($vacancy->limit_date !== null)
                                    <p class="card-text text-success">Vence {{ $vacancy->limit_date }}</p>
                                @endif
                                @if ($vacancy->places > 0)
                                    <p class="card-text text-success ms-3">Plazas {{ $vacancy->places }}</p>
                                @else
                                    @if ($vacancy->places == 0)
                                        <p class="card-text text-danger ms-3">Sin Plazas</p>
                                    @endif
                                @endif
                            @endif
                        </div>
                        <div class="d-flex">
                            <p class="card-text" style="margin-right: 2%; font-weight:bold">Perfil
                                requerido:</p>
                            <p class="card-text" style="margin-right: 2%">{{ $vacancy->profile }}</p>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="d-flex">
                                    <p class="card-text" style="margin-right: 2%; font-weight:bold">
                                        Horario:</p>
                                    <p class="card-text" style="margin-right: 2%">
                                        {{ $vacancy->availability }}
                                    </p>
                                </div>
                            </div>
                            <div class="col">
                                <div class="d-flex">
                                    <p class="card-text" style="margin-right: 2%; font-weight:bold">
                                        Salario:</p>
                                    <p class="card-text" style="margin-right: 2%">
                                        ${{ $vacancy->payment }}</p>
                                </div>

                            </div>
                        </div>

                    </div>
                @else
                    @if ($vacancy->state == 2 && !Auth::guest() && (auth()->user()->id === $user->id || auth()->user()->rol->key === 'admin'))
                        <div class="card-body">

                            <h5 class="font-weight-bold text-danger">Vacante Reportada: No se recibiran postulaciones
                            </h5>

                            <h5 class="card-title" style="color:#0069A3; font-weight:bold">{{ $vacancy->job }}
                            </h5>

                            <div class="d-lg-flex d-sm-block">
                                @if ($vacancy->state == 1)
                                    <p class="card-text text-danger">Venció {{ $vacancy->limit_date }}</p>
                                @else
                                    @if ($vacancy->limit_date !== null)
                                        <p class="card-text text-success">Vence {{ $vacancy->limit_date }}</p>
                                    @endif
                                    @if ($vacancy->places > 0)
                                        <p class="card-text text-success ms-3">Plazas {{ $vacancy->places }}</p>
                                    @else
                                        @if ($vacancy->places == 0)
                                            <p class="card-text text-danger ms-3">Sin Plazas</p>
                                        @endif
                                    @endif
                                @endif
                            </div>
                            <div class="d-flex">
                                <p class="card-text" style="margin-right: 2%; font-weight:bold">Perfil requerido:
                                </p>
                                <p class="card-text" style="margin-right: 2%">{{ $vacancy->profile }}</p>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="d-flex">
                                        <p class="card-text" style="margin-right: 2%; font-weight:bold">Horario:
                                        </p>
                                        <p class="card-text" style="margin-right: 2%">
                                            {{ $vacancy->availability }}
                                        </p>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="d-flex">
                                        <p class="card-text" style="margin-right: 2%; font-weight:bold">Salario:
                                        </p>
                                        <p class="card-text" style="margin-right: 2%">${{ $vacancy->payment }}
                                        </p>
                                    </div>

                                </div>
                            </div>

                        </div>

                    @endif

                @endif
                @if (Auth::guest())
                    @if ($vacancy->state !== 2)
                        <a href="/login" class="btn btn-info">Aplicar</a>
                    @endif
                @else
                    @if (auth()->user()->id === $user->id)
                        <div class="btn-group btn-group-sm">
                            <div class="d-flex">
                                {{-- Falta poner la opción de vigencia en el form para no recibir más postulaciones --}}
                                <form>
                                    <a href="{{ route('vacancies.edit', $vacancy->id) }}"
                                        class="btn btn-primary btn-sm"><i class="bi bi-pencil-fill"></i> Editar</a>
                                </form>
                                <form>
                                    <a class="btn btn-warning btn-sm"
                                        href="{{ route('postulates.list_postulates_vacancy', $vacancy->id) }}"><i
                                            class="bi bi-eye"></i> Ver
                                        postulaciones</a>
                                </form>
                                {{-- no deja eliminar si hay postulaciones --}}

                                <form action="{{ route('vacancies.destroy', ['vacancy' => $vacancy->id]) }}"
                                    method="post">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-danger btn-sm" type="submit"><i class="bi bi-trash3"></i>
                                        Eliminar</button>
                                </form>

                            </div>

                        </div>
                    @endif

                    @if (auth()->user()->rol->key === 'student' && $vacancy->state == 0 && $vacancy->places !== 0)
                        <form class="formulario-postular" action="{{ route('postulates.store') }}" method="POST">
                            @csrf

                            <input id="id_user" hidden name="id_user" value="{{ auth()->user()->id }}">

                            <input id="id_vacancy" hidden name="id_vacancy" value="{{ $vacancy->id }}">

                            <button type="submit" class="btn btn-primary btn-sm">Postularme</button>
                        </form>
                    @endif
                @endif
            </div><br>
        @endforeach
    </div>
</div>

<style>
    .light-blue {
        background: #d9eaf5;
    }

</style>

<script>

</script>
