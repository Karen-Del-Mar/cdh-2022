@extends('dashboard.master')
@section('content')


    <div class="container light-blue">

        <br>
        <div class="row height d-flex justify-content-center align-items-center mt-2">
            <div class="col-md-6">
                <div class="form-search">
                    <i class="bi bi-search"></i>
                    <input type="text" class="form-control form-input" placeholder="Buscar por cargo..." id="myInput"
                        style=" border-color: #0069A3">
                </div>
            </div>
        </div>

        @if (session('status'))
        @endif

        @if (Auth::guest())
        @else
            @if (auth()->user()->rol->key == 'employer')
                <a href="{{ route('vacancies.create') }}" class="mt-4 btn btn-success btn-lg mb-3">
                    <i class="bi bi-plus-circle"></i> Nueva vacante
                </a>
            @endif
        @endif

        <div class="justify-content-center row">

            @foreach ($vacancies as $vacancy)
                <div data-role="recipe">
                    <div class="card w-75 mx-auto my-2">
                        <div class="card-body">
                            <h4 class="card-title" style="color:#0069A3; font-weight:bold">{{ $vacancy->job }}</h4>
                            <div class="d-lg-flex d-sm-block">
                                <p class="card-text" style="color:#0069A3; margin-right: 2%">{{ $vacancy->company }}
                                </p>
                                <p class="card-text" style="color:#0069A3; margin-right: 2%">{{ $vacancy->email }}
                                </p>
                                <p class="card-text" style="color:#0069A3; margin-right: 2%">{{ $vacancy->location }}
                                </p>

                            </div>

                            <div class="d-lg-flex d-sm-block">
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
                                    <div class="d-flex">
                                        <p class="card-text" style="margin-right: 2%; font-weight:bold">Encargado:</p>
                                        <p class="card-text" style="margin-right: 2%">{{ $vacancy->name }}</p>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="d-flex">
                                        <p class="card-text" style="margin-right: 2%; font-weight:bold">Salario:</p>
                                        <p class="card-text" style="margin-right: 2%">${{ $vacancy->payment }}</p>
                                    </div>
                                    <div class="d-flex">
                                        <p class="card-text" style="margin-right: 2%; font-weight:bold">Contacto:</p>
                                        <p class="card-text" style="margin-right: 2%">{{ $vacancy->phone }}</p>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-sm-4">
                                    <img src="{{ asset('images/restaurants-logo/logo-example.png') }}" alt=""
                                        class="mr-1" id="profile" width="100%">
                                </div>
                            </div>

                        </div>
                        @if (Auth::guest())
                            <a href="/login" class="btn btn-info">Aplicar</a>
                        @else
                            @if (auth()->user()->rol->key === 'student')
                                <form class="formulario-postular" action="{{ route('postulates.store') }}" method="POST"
                                    id="formulario-postular">
                                    @csrf

                                    <input id="id_user" hidden name="id_user" value="{{ auth()->user()->id }}">

                                    <input id="id_vacancy" hidden name="id_vacancy" value="{{ $vacancy->id }}">

                                    <button type="submit" class="btn btn-primary btn-sm">Postularme</button>
                                </form>
                            @endif {{-- Hacer un sweet alert de confirmación esto debe hacer un update que cambie el estado de la vacante --}}
                            @if (auth()->user()->rol->key == 'admin')
                                <form class="formulario-ocultar" action="{{route('vacancies.update')}}" method="POST">
                                    <button type="submit" class="btn btn-primary btn-sm">Ocultar</button>
                                </form>
                            @endif
                        @endif


                    </div>
                </div>
            @endforeach
        </div>

    </div>
@endsection

<style>
    .light-blue {
        background: #d9eaf5;
    }

    .form-search {
        position: relative;
        border-radius: 25%;
        color: #0069A3;
        border-color: #0069A3;
    }

    .form-search .bi-search {
        position: absolute;
        top: 20px;
        left: 20px;
        color: #0069A3;
        border-color: #0069A3;

    }

    .form-search span {
        color: #0069A3;

        position: absolute;
        right: 17px;
        top: 13px;
        padding: 2px;
        border-left: 1px solid #0069A3;
        border-color: #0069A3;

    }

    .left-pan {
        color: #0069A3;

        padding-left: 7px
    }

    .left-pan i {
        color: #0069A3;

        padding-left: 10px
    }

    .form-input {
        color: #0069A3;
        height: 55px;
        text-indent: 33px;
        border-radius: 25%;
        border-color: #0069A3;
    }

    .form-input:focus {
        box-shadow: none;
        border: none
    }

</style>
