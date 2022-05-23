@extends('dashboard.master')

@section('content')
    <div class="container bg-light">
        <div class="row justify-content-around mt-5">
            <p class="text-center fw-bold fs-1" style="color: #0069A3">!Elije un tipo de usuario para registrar!</p>

            <div class="d-lg-flex d-md-flex d-sm-block">

                <div class="col-lg-6 col-md-6 col-sm-10">
                    <div class="row">
                        <img src="{{ asset('images/icons/Back to back-pana.svg') }}" class="w-50 mx-auto"
                            alt="Imagén no disponible">
                    </div>
                    <div class="row mt-2 ">
                        <a href="{{ route('solicitudes.showConditions') }}" class="btn btn-primary w-50 mx-auto">Empleador</a>
                    </div>

                </div>

                <div class="col-lg-6 col-md-6 col-sm-10">
                    <div class="row">

                        <img src="{{ asset('images/icons/Students-pana.svg') }}" class="w-75 mx-auto"
                            alt="Imagén no disponible">
                    </div>
                    <div class="row">
                        <a href="{{ route('student.create') }}" class="btn btn-warning w-50 mx-auto">Estudiante</a>                       
                    </div>
                </div>

            </div>

        </div>

    </div>

    <footer class="text-center text-white fixed-bottom">
        <a class="text-center p-3" href="https://storyset.com/people">People illustrations by Storyset</a>
    </footer>
@endsection
