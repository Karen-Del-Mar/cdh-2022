@extends('dashboard.master')
@section('content')


    <div class="container light-blue">
        @if (session('status'))
        @endif

        @if (Auth::guest())
        @else
            @if (auth()->user()->rol->key == 'employer')
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
                        <div class="d-lg-flex d-sm-block">
                            <p class="card-text" style="color:#0069A3; margin-right: 2%">{{ $vacancy->company }}</p>
                            <p class="card-text" style="color:#0069A3; margin-right: 2%">{{ $vacancy->email }}</p>
                            <p class="card-text" style="color:#0069A3; margin-right: 2%">{{ $vacancy->location }}</p>

                        </div>

                        <div class="d-lg-flex d-sm-block">
                            <p class="card-text" style="margin-right: 2%; font-weight:bold">Perfil requerido:</p>
                            <p class="card-text" style="margin-right: 2%">{{ $vacancy->profile }}</p>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="d-flex">
                                    <p class="card-text" style="margin-right: 2%; font-weight:bold">Horario:</p>
                                    <p class="card-text" style="margin-right: 2%">{{ $vacancy->availability }}</p>
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
                        @endif
                    @endif


                </div><br>
            @endforeach
        </div>

    </div>
@endsection

<style>
    .light-blue {
        background: #db9107;
    }

</style>

