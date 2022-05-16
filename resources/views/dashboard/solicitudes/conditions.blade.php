@extends('dashboard.master')

@section('content')
    <div class="container">
        <div class="row justify-content-around mt-5">
            <div class="d-lg-flex d-md-flex d-sm-block">
                <div class="w-50">
                    <img src="{{ asset('images/icons/checklist.jpg') }}" class="mw-100"  alt="Imagén no disponible">
                </div>

                <div class="">
                    <div class="row">
                        <div>
                            <h3>
                                <span class="fw-bold">
                                    !Únete a Cadena de Honor, publica ofertas de trabajo y
                                    ayuda a un estudiante en su proceso de formación!
                                </span>
                            </h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 mt-3">
                            <div class="form-group">

                                @if (auth()->user())
                                    <h3>
                                        <small>
                                            <strong>{{ auth()->user()->name }}</strong>, para solicitar una cuenta como
                                            empleador,
                                            por favor cierra sesión!
                                        </small>
                                    </h3>
                                @else
                                    <a href="{{ route('solicitudes.create') }}" class="btn btn-primary btn-sm">Solicitar
                                        cuenta</a>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div>
                            <ul>
                                <li>Solicita una cuenta de empleador</li>
                                <p>Llena los datos del formulario y una vez que sea
                                    aprobado por el administrador obtendrá una cuenta
                                </p>

                                <li>Publica ofertas de trabajo</li>
                                <p>
                                    Tener una cuenta de empleador le permitirá
                                    crear ofertas de trabajo fácilmente.
                                    Las ofertas serán revisas por el administrador
                                </p>

                                <li>Revisa las postulaciones</li>
                                <p>
                                    Seleccione entre los candidatos mediante las hojas de vida recibidas
                                </p>

                                <li>Realiza el contrato</li>
                                <p>
                                    Elije el candidato que mejor se adapte al perfil buscado
                                </p>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection


<style>
    span,
    li {
        color: #0069A3;
    }

</style>
