    <div class="row justify-content-around">
        <div class="col-1">
            <img src="{{ asset('images/formularioLaboral.jpg') }}" width="280" height="202" alt="">
        </div>

        <div class="col-7">
            <div class="row">
                <div>
                    <h3>
                        <span>
                           Deshabilitar cuenta de empleador
                        </span>
                    </h3>
                </div>
            </div>
            <div class="row">
                <div class="mb-3">
                    <div class="form-group">

                        @if (auth()->user()->rol->key == 'admin')
                            <a href="{{ URL::previous() }}" class="btn btn-success btn-sm">Cancelar</a>
                            <button type="submit" class="btn btn-danger btn-sm">Deshabilitar cuenta</button>

                            {{-- <a href="{{  route('employer.disable_employer') }}" class="btn btn-primary btn-sm" >Deshabilitars cuenta</a> --}}
                        @endif
                    </div>
                </div>
            </div>

            <div class="row">
                <div>
                    <ul>
                        <li>Deshabilitar una cuenta de empleador</li>
                        <small>Llena los datos del formulario y una vez que sea
                            aprobado por el administrador obtendrá una cuenta
                        </small>

                        <li>El usuario de la empresa {{$employer->company}} ya no podrá Publicar ofertas de trabajo</li>
                        <small>
                            Tener una cuenta de empleador le permitirá
                            crear ofertas de trabajo fácilmente.
                            Las ofertas serán revisas por el administrador
                        </small>

                        <li>Este usuario ya no podrá Revisar las postulaciones</li>
                        <small>
                            Seleccione entre los candidatos mediante los CV's recibidos
                        </small>

                        <li>El perfil del usuario ya no será visible</li>
                        <small>
                            Elije el candidato que mejor se adapte al perfil buscado
                        </small>
                    </ul>
                </div>
            </div>
        </div>
    </div>


    <style>
        .row {
            margin: 5%;
        }

        ul {
            color: #0069A3;
        }

        small {
            color: #000000
        }

        span {
            color: #0069A3;
            font-weight: bold;
        }

    </style>
