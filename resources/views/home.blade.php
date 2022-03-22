@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{-- {{ __('You are logged in!') }} --}}
                        <h4>Bienvenido, {{ auth()->user()->name }} </h4>
                    </div>

                    @if (auth()->user()->rol->key == 'student')
                        
                        <a class="btn btn-info" href="{{ route('student.show', auth()->user()->id) }}">
                            {{ __('Ver perfil') }}
                        </a>

                    @endif

                    @if (auth()->user()->rol->key == 'admin')

                        <div class="page-content page-container" id="page-content">
                            <div class="padding">
                                <div class="row container d-flex justify-content-center">
                                    <div class="col-sm-12">
                               

                                        <div class="container mt-5">
                                            <ul class="m-0 nav nav-fill nav-justified nav-tabs" id="myTab" role="tablist">
                                                <li class="nav-item" role="presentation"> <button class="active nav-link" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true"> <i class="fas fa-home"></i> Solicitudes </button> </li>
                                                <li class="nav-item" role="presentation"> <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false"> <i class="fas fa-user-astronaut"></i> Estudiantes </button> </li>
                                                <li class="nav-item" role="presentation"> <button class="nav-link" id="messages-tab" data-bs-toggle="tab" data-bs-target="#messages" type="button" role="tab" aria-controls="messages" aria-selected="false"> <i class="far fa-envelope-open"></i> Empresas Inhabilitadas </button> </li>
                                                <li class="nav-item" role="presentation"> <button class="nav-link" id="settings-tab" data-bs-toggle="tab" data-bs-target="#settings" type="button" role="tab" aria-controls="settings" aria-selected="false"> <i class="fas fa-sliders-h"></i> Comentarios inapropiados </button> </li>
                                            </ul>
                                            <div class="border-grey bg-white p-3 tab-content">
                                                <div class="tab-pane active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                                    @include('dashboard.solicitudes.index')
                                                </div>
                                                <div class="tab-pane" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                                    @include('dashboard.students.index')
                                                </div>
                                                <div class="tab-pane" id="messages" role="tabpanel" aria-labelledby="messages-tab">
                                                    <p>  auctor nisl. Nulla facilisi. Integer imperdiet faucibus ante. In eget sem non ex consectetur pharetra. Fusce sollicitudin purus sit amet dolor pulvinar congue. Donec luctus facilisis malesuada. Duis lobortis neque vel tortor aliquet sollicitudin. Donec sit amet dui mauris. Morbi in mattis libero, in sagittis nisl. Suspendisse tempor, mi pellentesque dictum venenatis, ipsum nisi lobortis risus, non finibus nisi ex vitae dolor. Duis augue nulla, finibus ut turpis ac, dictum laoreet sapien. Morbi vel ullamcorper dolor. Ut tempus sed metus quis consequat. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Aenean tempor pharetra nisi ut aliquet. Phasellus sit amet justo enim. </p>
                                                </div>
                                                <div class="tab-pane" id="settings" role="tabpanel" aria-labelledby="settings-tab">
                                                    <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus eu velit volutpat, dapibus odio vel, auctor nisl. Nulla facilisi. Integer imperdiet faucibus ante. In eget sem non ex consectetur pharetra. Fusce sollicitudin purus sit amet dolor pulvinar congue. Donec luctus facilisis malesuada. Duis lobortis neque vel tortor aliquet sollicitudin. Donec sit amet dui mauris. Morbi in mattis libero, in sagittis nisl. Suspendisse tempor, mi pellentesque dictum venenatis, ipsum nisi lobortis risus, non finibus nisi ex vitae dolor. Duis augue nulla, finibus ut turpis ac, dictum laoreet sapien. Morbi vel ullamcorper dolor. Ut tempus sed metus quis consequat. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Aenean tempor pharetra nisi ut aliquet. Phasellus sit amet justo enim. </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif


                    @if (auth()->user()->rol->key == 'employer')
                             
                        <a class="btn btn-info" href="{{ route('employer.show', auth()->user()->id) }}">
                            {{ __('Ver perfil') }}
                        </a>
                        <div class="container btn-group" role="group" aria-label="Basic outlined example">
                            <button type="submit" class="btn btn-outline-primary">
                                {{-- <a href="{{ route('employer.index_perfil') }} ">Gestionar ofertas laborales</a> --}}
                            </button>

                            <button type="button" class="btn btn-outline-primary">
                                <a href="">Contratos..</a>
                            </button>

                            <button type="button" class="btn btn-outline-primary">Postulaciones...</button>
                        </div>
                        <br><br>
                        {{-- @include('dashboard.postulates.index') --}}
                    @endif 

                </div>
            </div>
        </div>
    </div>
@endsection




<style>
    /* .container {
        margin: auto;
        background-repeat: no-repeat;
        background-position: center;
    
    }

    body {
        background-color: #f9f9fa
    }

    .flex {
        -webkit-box-flex: 1;
        -ms-flex: 1 1 auto;
        flex: 1 1 auto
    }

    @media (max-width:991.98px) {
        .padding {
            padding: 1.5rem
        }
    }

    @media (max-width:767.98px) {
        .padding {
            padding: 1rem
        }
    }

    .padding {
        padding: 5rem
    } */
    body {
    padding: 0;
    margin: 0;
    background-color: #eee
}

.border-grey {
    border: 1px solid;
    border-end-start-radius: 5px;
    border-end-end-radius: 5px;
    border-top: none;
    border-color: #dee2e6
}

.active {
    background-color: white
}

#myTab {
    background-color: #dee2e6
}

.nav-link {
    color: #666
}
</style>

<script>
var firstTabEl = document.querySelector('#myTab li:last-child a')
var firstTab = new bootstrap.Tab(firstTabEl)

firstTab.show()

</script>