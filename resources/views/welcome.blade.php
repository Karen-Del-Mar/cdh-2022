@extends('dashboard.master')

@section('content')
    <div class="container-fluid" style="height: 100vh">
        <div class="row">

            <div class="col-md-5">
                <div class="row">
                    <div>
                        <h1 class="titles">¿Quienes somos?</h1>
                        <p class="text-p">Un programa con Sello UAM para que los graduados,
                            los estudiantes y todas las personas o instituciones
                            con vínculos con la UAM que quieran ayudar a
                            universitarios UAM con dificultades para continuar
                            sus estudios lo puedan hacer y de esta manera
                            fortalecer una cultura de solidaridad en la Institución</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <h1 class="titles">Misión</h1>
                        <p class="text-p">Cadena de Honor es un programa que orienta a los estudiantes que necesitan ingresos economicos adicionales en actividades laborales presenciales 
                            o virtuales en Manizales y en la región. </p>
                    </div>
                    <div class="col">
                        <h1 class="titles">Visión</h1>
                        <p class="text-p">En dos años queremos ser un programa que pueda solucionar un 50% de las solicitudes de empleo de los estudiantes</p>
                    </div>
                </div>
            </div>

            <div class="col-md-1">

            </div>

            <div class="col-md-5">
                <div class="row">
                    <!-- Logo grande del centro -->
                    <img src="{{ asset('images/logo/logocdh.png') }}" width="10%" height="10%" alt="">
                    <!-- Imagen de todos -->
                    <img class="info" src="{{ asset('images/banner/cadena_de_honor.jpg') }}" width="40%"
                        height="20%" alt="">
                </div>
                <div class="row">
                    <div class="col info backcolor">
                        <a href="{{ route('solicitudes.showConditions') }}" style="text-decoration: none;">
                            <h2 class="titles-2">Empleador</h2>
                            <p class="text-p">Descubre como puedes
                                ayudar a un estudiante
                                a terminar su carrera</p>
                        </a>
                    </div>
                    <div class="col info backcolor">
                        <a href="{{ route('student.create') }}" style="text-decoration: none;">
                            <h2 class="titles-2">Estudiante</h2>
                            <p class="text-p">
                                Conoce una oportunidad
                                para tener un ingreso
                                económico extra.
                            </p>
                        </a>
                    </div>
                </div>
            </div>

        </div>
        <div class="row justify-content-md-center">
            <div class="col-4" style="border: solid white">
                <h4 style="color: #F4D73B; text-align:center; font-weight: bold">Solicitar más información o ayuda</h4>
                <p class="text-p" style=" text-align:center">tel: 3203030000 secretaría Cadena de Honor</p>

            </div>
        </div>
    </div>
@endsection
<style>
    .titles {
        border-bottom: 3px solid #F4D73B;
    }

    .titles-2 {
        color: #0069A3;
        text-align: center;
    }

    .text-p {
        color: rgb(121, 120, 120);
        margin: 10%;
        text-decoration: none;
        font-weight: bold;
    }

    .titles {
        color: #0069A3;
        margin: 10%;
        font-weight: bold;
    }

    .info {
        margin: 2%;
    }

    .backcolor {
        background-color: #F4D73B;
    }

</style>
