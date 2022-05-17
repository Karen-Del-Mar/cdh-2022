@extends('dashboard.master')
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
                        <h4>Bienvenid@, {{ auth()->user()->name }} </h4>
                    </div>

                    @if (auth()->user()->rol->key == 'student')
                        
                        <a class="btn btn-primary" href="{{ route('student.show', auth()->user()->id) }}">
                            <img src="https://img.icons8.com/pastel-glyph/50/F4D73B/person-male--v3.png"/>
                            {{ __('Ver perfil') }}
                        </a>

                        <div class="page-content page-container" id="page-content">
                            <div class="padding">
                                <div class="row container d-flex justify-content-center">
                                    <div class="col-sm-12">
                               

                                        <div class="container mt-5">
                                            <ul class="m-0 nav nav-fill nav-pills nav-justified nav-tabs" id="myTab" role="tablist">
                                                <li class="nav-item" role="presentation"> 
                                                    <button class="active nav-link" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true"> 
                                                        <img src="https://img.icons8.com/ios/50/F4D73B/open-folder-in-new-tab.png"/>Mis Postulaciones
                                                    </button> </li>
                                                <li class="nav-item" role="presentation"> 
                                                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">
                                                        <img src="https://img.icons8.com/external-vitaliy-gorbachev-lineal-vitaly-gorbachev/50/F4D73B/external-document-business-vitaliy-gorbachev-lineal-vitaly-gorbachev-1.png"/>Mis contratos</button> </li>               
                                            </ul>
                                            <div class="border-grey bg-white p-3 tab-content">
                                                <div class="tab-pane active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                                    @include('dashboard.postulates.my_postulates')
                                                </div>                                                

                                                <div class="tab-pane" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                                     @include('dashboard.contracts.my_contracts') 
                                                   
                                                </div>                                               
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        

                    @endif

                    @if (auth()->user()->rol->key == 'admin')

                        <div class="page-content page-container" id="page-content">
                            <div class="padding">
                                <div class="row container d-flex justify-content-center">
                                    <div class="col-sm-12">
                               
                                        <a class="btn btn-outline-primary" href="{{ route('survey.barchart') }}">
                                            <img src="https://img.icons8.com/external-vitaliy-gorbachev-lineal-vitaly-gorbachev/50/F4D73B/external-document-business-vitaliy-gorbachev-lineal-vitaly-gorbachev-1.png"/>
                                            {{ __('Datos') }}           
                                        </a>

                                        <div class="container mt-5">
                                            <ul class="m-0 nav nav-fill nav-pills nav-justified nav-tabs" id="myTab" role="tablist">
                                                <li class="nav-item" role="presentation"> <button class="active nav-link" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">
                                                    <img src="https://img.icons8.com/dotty/50/F4D73B/add-user-group-woman-woman.png"/> Solicitudes 
                                                </button> </li>
                                                <li class="nav-item" role="presentation"> 
                                                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false"> 
                                                        <img src="https://img.icons8.com/external-wanicon-lineal-wanicon/50/F4D73B/external-student-back-to-school-wanicon-lineal-wanicon-1.png"/> Estudiantes 
                                                    </button> </li>
                                                <li class="nav-item" role="presentation"> 
                                                    <button class="nav-link" id="messages-tab" data-bs-toggle="tab" data-bs-target="#messages" type="button" role="tab" aria-controls="messages" aria-selected="false"> 
                                                        <img src="https://img.icons8.com/external-prettycons-lineal-prettycons/37/F4D73B/external-hidden-security-prettycons-lineal-prettycons.png"/>Empresas Inhabilitadas 
                                                    </button> </li>
                                                <li class="nav-item" role="presentation"> <button class="nav-link" id="reports-tab" data-bs-toggle="tab" data-bs-target="#reports" type="button" role="tab" aria-controls="reports" aria-selected="false"> 
                                                    <img src="https://img.icons8.com/external-prettycons-lineal-prettycons/50/F4D73B/external-warning-delivery-prettycons-lineal-prettycons.png"/> Vacantes reportadas 
                                                </button> </li>
                                                <li class="nav-item" role="presentation"> <button class="nav-link" id="settings-tab" data-bs-toggle="tab" data-bs-target="#settings" type="button" role="tab" aria-controls="settings" aria-selected="false"> 
                                                     Comentarios inapropiados <img src="https://img.icons8.com/pastel-glyph/30/F4D73B/info--v1.png"/> </button> </li>
                                            </ul>
                                            <div class="border-grey bg-white p-3 tab-content">
                                                <div class="tab-pane active" id="home" role="tabpanel" aria-labelledby="home-tab">
                
                                                    @include('dashboard.solicitudes.index')
                                                </div>
                                                <div class="tab-pane" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                                    @include('dashboard.students.index')
                                                </div>
                                                <div class="tab-pane" id="messages" role="tabpanel" aria-labelledby="messages-tab">
                                                    @include('dashboard.employers.list_disable')                                                   
                                                </div>
                                                <div class="tab-pane" id="reports" role="tabpanel" aria-labelledby="reports-tab">
                                                    {{-- <p>  auctor nisl. Nulla facilisi. Integer imperdiet faucibus ante. In eget sem non ex consectetur pharetra. Fusce sollicitudin purus sit amet dolor pulvinar congue. Donec luctus facilisis malesuada. Duis lobortis neque vel tortor aliquet sollicitudin. Donec sit amet dui mauris. Morbi in mattis libero, in sagittis nisl. Suspendisse tempor, mi pellentesque dictum venenatis, ipsum nisi lobortis risus, non finibus nisi ex vitae dolor. Duis augue nulla, finibus ut turpis ac, dictum laoreet sapien. Morbi vel ullamcorper dolor. Ut tempus sed metus quis consequat. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Aenean tempor pharetra nisi ut aliquet. Phasellus sit amet justo enim. </p> --}}
                                                    @include('dashboard.vacancies.reported_vacancies')
                                                </div>
                                                <div class="tab-pane" id="settings" role="tabpanel" aria-labelledby="settings-tab">
                                                    <p> Los testimonios que se hayan ocultado.
                                      
                                                    </p>
                                                    @include('dashboard.experiences.reported_list')
                                
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    @endif


                    @if (auth()->user()->rol->key == 'employer')
                             
                        <a class="btn btn-primary" href="{{ route('employer.show', auth()->user()->id) }}">
                            <img src="https://img.icons8.com/pastel-glyph/50/F4D73B/person-male--v3.png"/>
                            {{ __('Mi perfil') }}           
                        </a>

                      
                        <div class="page-content page-container" id="page-content">
                            <div class="padding">
                                <div class="row container d-flex justify-content-center">
                                    <div class="col-sm-12">
                               

                                        <div class="container mt-5">
                                            <ul class="m-0 nav nav-fill nav-pills nav-justified nav-tabs" id="myTab" role="tablist">
                                                <li class="nav-item" role="presentation"> 
                                                    <button class="active nav-link" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true"> 
                                                        <img src="https://img.icons8.com/ios/50/F4D73B/groups.png"/>Postulaciones Recibidas
                                                    </button> </li>
                                                <li class="nav-item" role="presentation"> 
                                                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">
                                                        <img src="https://img.icons8.com/external-vitaliy-gorbachev-lineal-vitaly-gorbachev/50/F4D73B/external-document-business-vitaliy-gorbachev-lineal-vitaly-gorbachev-1.png"/>Contratos Realizados</button> </li>               
                                            </ul>
                                            <div class="border-grey bg-white p-3 tab-content">
                                                <div class="tab-pane active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                                    @include('dashboard.postulates.index')
                                                </div>                                                

                                                <div class="tab-pane" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                                     @include('dashboard.contracts.index') 
                                                    {{-- <p>  auctor nisl. Nulla facilisi. Integer imperdiet faucibus ante.</p> --}}
                                                </div>                                               
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    @endif 

                </div>
            </div>
        </div>
    </div>
@endsection
