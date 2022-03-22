@csrf
@extends('dashboard.master')

@section('content')

    <div class="container mt-5 text-center">
        <div class="row justify-content-md-center">
            <div class="col-md-6" style="border: solid white">
                <h4 style="font-weight: bold">Solicitar más información o ayuda</h4> 
                <div class="d-block"> 
                    <span><strong> Tel: </strong> 3203030000 secretaría Cadena de Honor</span>
                </div>
                <div>
                    <span> <strong> Correo: </strong> cadenadehonor@autonoma.edu.co</span>
                </div>
            </div>
        </div>

    </div>
    <div class="container text-center mt-5 mb-2">
        <h1 class="mb-2">Conoce nuestro equipo</h1>
    </div>

    <div class="container mt-3">

        <div class="row">

            <div class="col-md-3">
                <div class="bg-white p-3 text-center rounded box">
                    <img class="img-responsive rounded-circle"
                        src="{{ asset('images/admins-profiles/albertoCardona.jpg') }}" width="120" height="120">
                    <h5 class="mt-3 name">Alberto Cardona</h5><span class="work d-block">Vicerrector Desarrollo
                        Humano</span>
                    <div class="mt-4 about"><span>alberto.cardona@autonoma.edu.co</span></div>
                    <div class="mt-4">
                        (60) (6) 8727272 - 141
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="bg-white p-3 text-center rounded box">
                    <img class="img-responsive rounded-circle" src="{{ asset('images/admins-profiles/diana-perea.jpg') }}"
                        width="120" height="120">
                    <h5 class="mt-3 name">Diana Perea</h5><span class="work d-block">Coordinadora de Unidad de
                        Bienestar</span>
                    <div class="mt-4 about"><span>dianaperea@autonoma.edu.co</span></div>
                    <div class="mt-4">
                        (60) (6) 8727272 - 349
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="bg-white p-3 text-center rounded box">
                    <img class="img-responsive rounded-circle"
                        src="{{ asset('images/admins-profiles/paola-cortes.jpg') }}" width="120" height="120">
                    <h5 class="mt-3 name">Paola Cortes</h5><span class="work d-block">Auxiliar Administrativa
                        Vicerrectoría</span>
                    <div class="mt-4 about"><span>ycortes@autonoma.edu.co</span></div>
                    <div class="mt-4">
                        (60) (6) 8727272 - 141
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="bg-white p-3 text-center rounded box">
                    <img class="img-responsive rounded-circle"
                        src="{{ asset('images/admins-profiles/paola-cortes.jpg') }}" width="120" height="120">
                    <h5 class="mt-3 name">Karen Castaño</h5><span class="work d-block">Coordinadora Cadena de
                        Honor</span>
                    <div class="mt-4 about"><span>karen.castanor@autonoma.edu.co</span></div>
                    <div class="mt-4">
                        (60) (6) 8727272 - 141
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

<style>
    .name {
        color: #0069A3
    }

    .work {
        font-weight: bold;
        font-size: 15px
    }

    .about span {
        font-size: 15px;
        word-wrap: break-word;
    }

    .box {
        -webkit-box-shadow: 0px 0px 5px 1px rgba(196, 194, 196, 0.72);
        -moz-box-shadow: 0px 0px 5px 1px rgba(196, 194, 196, 0.72);
        box-shadow: 0px 0px 5px 1px rgba(196, 194, 196, 0.72)
            /*
     -webkit-box-shadow: 0px 0px 10px 0px rgba(196, 194, 196, 0.72) inset;
    -moz-box-shadow: 0px 0px 10px 0px rgba(196, 194, 196, 0.72) inset;
    box-shadow: 0px 0px 10px 0px  rgba(196, 194, 196, 0.72) inset

    -webkit-box-shadow: 13px 12px 5px -10px rgba(196, 194, 196, 0.72);
    -moz-box-shadow: 13px 12px 5px -10px rgba(196, 194, 196, 0.72);
    box-shadow: 13px 12px 5px -10px rgba(196, 194, 196, 0.72)
    */
    }

    .col-md-3 {
        margin-top: 10px
    }

</style>
