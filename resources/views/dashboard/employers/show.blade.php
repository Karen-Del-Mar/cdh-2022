@csrf
@extends('dashboard.master')
@include('dashboard.partials.validation-error')
@section('content')

    <div class="container border-bottom bg-white mt-1 pt-md-3 pt-2 w-75">
        <div class="d-flex flex-md-row justify-content-around align-items-center">
            <div class="d-flex flex-md-row align-items-center">
                <div class="p-md-2">
                    <img src="{{ asset('images/employers-profile/' . $user->avatar) }}" alt="" id="profile"
                        class="img-fluid">
                </div>
                <div class="p-md-2 p-1" id="info">
                    <h5>{{ $employer->company }}</h5>
                    <div class="text-muted">{{ $user->name }}</div>
                </div>
            </div>
            <div class="rounded p-lg-2 p-1" id="blue-background">
                <div class="d-flex flex-md-row align-items-center">
                    <div class="d-flex flex-column align-items-center px-lg-3 px-md-2 px-1" id="border-right">
                        <p class="h4">{{ $employer->score }}</p>
                        <div class="text-muted" id="count">Valoración</div>
                    </div>
                    <div class="d-flex flex-column align-items-center px-lg-3 px-md-2 px-1" id="border-right">
                        <p class="h4">{{ $count }}</p>
                        <div class="text-muted" id="count">Ofertas</div>
                    </div>
                    <div class="d-flex flex-column align-items-center px-lg-3 px-md-2 px-1" id="border-right">
                        @if (Auth::guest())
                            <a href="/login" class="hidden"></a>
                        @else
                            @if (auth()->user()->id === $user->id)
                                <a class="btn btn-info" href="{{ route('employer.edit', $user->id) }}">
                                    <i class="bi bi-pencil-fill"></i> {{ __('Editar perfil') }}
                                </a>
                            @endif
                            @if (auth()->user()->rol->key === 'admin')
                                @if ($employer->hidden == 0)
                                <form class="form-disable-employer" action="{{ route('employer.disable_employer', ['id' => $employer->id, 1]) }}" method="POST">
                                    @method('PUT')
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-sm">Deshabilitar perfil</button>
                                </form>
                                    <a class="btn btn-danger" href="{{ route('employer.confirm_disable', $user) }}">
                                        {{ __('Deshabilitar perfil') }}
                                    </a>
                                @else
                                    <form class="form-enable-employer" action="{{ route('employer.disable_employer', ['id' => $employer->id, 0]) }}"
                                        method="post">
                                        @method('PUT')
                                        @csrf
                                        <button type="submit" class="btn btn-warning btn-sm">Habilitar cuenta</button>
                                    </form>
                                @endif
                            @endif
                        @endif
                    </div>
                </div>
            </div>


        </div>

    </div>
    <div class="d-flex flex-column justify-content-center align-items-center">
        <br><br>
        <div class="card w-75">
            <div class="card-body">
                <h5 class="card-title" style="color:#0069A3">Descripción</h5>
                <p class="card-text">{{ $employer->description }}</p>
                <div class="d-lg-flex d-sm-block">
                    <p class="card-text" style="margin-right: 2%; font-weight:bold">Dirección</p>
                    <p class="card-text" style="margin-right: 2%">{{ $employer->location }}</p>
                    <p class="card-text" style="margin-right: 2%; font-weight:bold">Teléfono</p>
                    <p class="card-text" style="margin-right: 2%">{{ $user->phone }}</p>
                    <p class="card-text" style="margin-right: 2%; font-weight:bold">Correo</p>
                    <div class="card-text" style="margin-right: 2%; word-wrap: break-word;"><span>
                            {{ $user->email }} </span> </div>
                </div>
            </div>
        </div>

    </div>

    <div class="d-flex flex-column justify-content-center align-items-center">
        <br><br>
        <div class="card w-75">
            @include('dashboard.vacancies.index_perfil')
        </div>
    </div>

    <div class="d-flex flex-column justify-content-center align-items-center">
        <div class="card w-75">
            <div class="card-body">
                <h5 class="card-title">Valoración</h5>
                <div class="d-lg-flex d-md-flex d-sm-block">

                    <input type="hidden" name="" value="{{ $rol = $user->rol_id }}">
                    @component('dashboard.partials.rating-user', compact('datas', 'rol'))
                    @endcomponent()
                    <div class="m-auto">
                        <h1 class="m-auto">{{ $employer->score }}</h1>
                        <span class="bi bi-star">
                            <span class="bi bi-star">
                                <span class="bi bi-star">
                                    <span class="bi bi-star">
                                        <span class="bi bi-star">
                                            <p> {{ $count_rates }} opiniones</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
<style>
    #profile {
        width: 50%;
        height: 50%;
    }

    .card-text span {
        word-wrap: break-word;
    }

</style>
