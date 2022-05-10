@csrf
@extends('dashboard.master')

@include('dashboard.partials.validation-error')

@section('content')
    <div class="jumbotron">
        <div class="container d-flex justify-content-center align-items-center">
            <!--  Primer card  -->
            <div class="card profile-card">
                {{-- <div class="upper"> <img src="https://i.imgur.com/Qtrsrk5.jpg" class="img-fluid"> </div> --}}
                <div class="">
                    <div class="user text-center">
                        <div class="profile"> <img src="{{ asset('images/students-profiles/' . $user->avatar) }}"
                                class="rounded-circle" width="80">
                        </div>
                    </div>
                    <div class="mt-5 text-center">
                        <h4 class="mb-0">{{ $user->name }}</h4> <span
                            class="text-muted d-block mb-2">{{ $student->career }}</span>
                        {{-- <button class="btn btn-primary btn-sm follow">Aceptar</button> --}}
                        <div class="d-flex justify-content-between align-items-center mt-4 px-4">
                            <div class="stats">
                                <h6 class="mb-0">Valoración</h6> <span>{{ $student->score }}</span>
                            </div>
                            <div class="stats">
                                <h6 class="mb-0">Semestre actual</h6> <span> {{ $student->semester }} </span>
                            </div>
                            @if (auth()->user()->rol_id == 1)
                                <div class="stats">

                                    <h6 class="mb-0">Promedio</h6> <span>{{ $student->average }}</span>

                                </div>
                            @endif
                        </div>
                        <label class="badge rounded-pill bg-success">{{$student->state}} {{$empleo}}</label>
                    </div>
                </div>
                <!---->
                @if (Auth::guest())
                    <a href="/login" class="hidden"></a>
                @else
                    @if (auth()->user()->rol_id == 3)
                        <a class="btn btn-info" href="{{ route('student.edit', $user->id) }}">
                            <i class="bi bi-pencil-fill"></i> {{ __('Editar perfil') }}
                        </a>
                    @endif
                @endif
                <!---->
            </div>
            <!--    -->
        </div>
        <!-- d-flex pone todo en una misma fila--->
        <div class="d-flex flex-column justify-content-center align-items-center">
            <br><br>
            <div class="card w-75">
                <div class="card-body">
                    <h5 class="card-title" style="color:#0069A3">Habilidades</h5>
                    <p class="card-text badge rounded-pill bg-secondary">{{ $student->job_skills }}</p>
                </div>
            </div>
            <br>
            <div class="card w-75">
                <div class="card-body">
                    <h5 class="card-title" style="color:#0069A3">Datos de contacto</h5>
                    <div class="d-lg-flex d-md-flex d-sm-block">
                        <p class="card-text me-3 fw-bold" style="">Correo</p>
                        <p class="card-text me-3" style="">{{ $user->email }}</p>
                        <p class="card-text me-3 fw-bold" style="">Teléfono</p>
                        <p class="card-text me-3" style="">{{ $user->phone }}</p>
                    </div>
                </div>
            </div>
            <div class="card w-75">
                <div class="card-body">
                    <h5 class="card-title" style="color:#0069A3">Formación adicional</h5>
                    <p class="card-text me-3 fw-bold" style="">Herramientas ofimaticas</p>
                    <p class="card-text">{{ $student->office_tools }}</p>
                    <p class="card-text me-3 fw-bold" style="">Idiomas</p>
                    <p class="card-text">{{ $student->languages }}</p>
                </div>
            </div>
            <div class="card w-75">
                <div class="card-body">
                    <h5 class="card-title" style="color:#0069A3">Experiencia laboral</h5>
                    <p class="card-text">{!! nl2br(e($student->work_experience)) !!}</p>
                </div>
            </div>
            <div class="card w-75">
                <div class="card-body">
                    <h5 class="card-title" style="color:#0069A3">Otros datos personales</h5>
                    <div class="d-flex">
                        <p class="card-text me-3 fw-bold" style="">Tipo de documento</p>
                        <p class="card-text me-3" style="">C.C</p>
                        <p class="card-text me-3 fw-bold" style="">Número</p>
                        <p class="card-text">{{ $user->document }}</p>
                    </div>
                    <div class="d-flex">
                        <p class="card-text me-3 fw-bold" style="">EPS</p>
                        <p class="card-text me-3" style="">{{ $student->eps }}</p>
                        <p class="card-text me-3 fw-bold" style="">Tipo de sangre</p>
                        <p class="card-text">{{ $student->blood_type }}</p>
                    </div>
                </div>
            </div>
            
            <div class="card w-75">
                <div class="card-body">
                    <h5 class="card-title">Valoración</h5>
                    <div class="d-lg-flex d-md-flex d-sm-block">
                        <input type="hidden" name="" value="{{ $rol = $user->rol_id }}">

                        @component('dashboard.partials.rating-user', compact('datas', 'rol'))
                        @endcomponent()
                        <div class="m-auto">
                            <h1 class="m-auto">{{ $student->score }}</h1>
                            <span class="bi bi-star">
                            <span class="bi bi-star">
                            <span class="bi bi-star">
                            <span class="bi bi-star">
                            <span class="bi bi-star">
                            <p> {{ $count }} opiniones</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

@endsection

<style>
    .jumbotron {
        padding: 2rem 1rem;
        margin-bottom: 2rem;
        background-color: #e9ecef;
        border-radius: .3rem;
    }

    .card {
        width: 380px;
        border: none;
        border-radius: 15px;
        padding: 8px;
        background-color: #fff;
        position: relative;
        margin-bottom: 1%;
        /*  height: 370px */
    }

    .profile-card {
        margin-top: 2%;
    }

    .user {
        position: relative
    }

    .profile img {
        height: 80px;
        width: 80px;
        margin-top: 2%
    }

    .profile {
        position: absolute;
        top: -50px;
        left: 38%;
        height: 90px;
        width: 90px;
        border: 3px solid #fff;
        border-radius: 50%
    }

    .follow {
        border-radius: 15px;
        padding-left: 20px;
        padding-right: 20px;
        height: 35px
    }

    .stats span {
        font-size: 29px
    }

</style>
