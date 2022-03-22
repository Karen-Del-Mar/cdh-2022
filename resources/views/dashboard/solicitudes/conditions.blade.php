@extends('dashboard.master')

@section('content')
    <div class="row justify-content-around">
      <div class="col-1">
        <img src="{{ asset('images/formularioLaboral.jpg') }}" width="280" height="202" alt="">
      </div>

      <div class="col-7">
          <div class="row">
              <div>
                <h3>
                    <span>
                        !Únete a Cadena de Honor, publica ofertas de trabajo y
                    ayuda a un estudiante en su proceso de formación!
                    </span>
                </h3>
              </div>
          </div>
          <div class="row">
            <div class="mb-3">
                <div class="form-group">

                    @if (auth()->user())
                    <h3>
                        <small>
                           <strong>{{auth()->user()->name}}</strong>, para solicitar una cuenta como empleador,
                        por favor cierra sesión!
                        </small>
                    </h3>
                    @else
                    <a href="{{  route('solicitudes.create') }}" class="btn btn-primary btn-sm" >Solicitar cuenta</a>
                    @endif
                </div>
            </div>
          </div>

          <div class="row">
              <div>
                  <ul>
                      <li>Solicita una cuenta de empleador</li>
                      <small>Llena los datos del formulario y una vez que sea
                             aprobado por el administrador obtendrá una cuenta
                      </small>

                      <li>Publica ofertas de trabajo</li>
                      <small>
                        Tener una cuenta de empleador le permitirá
                        crear ofertas de trabajo fácilmente.
                        Las ofertas serán revisas por el administrador
                      </small>

                      <li>Revisa las postulaciones</li>
                      <small>
                          Seleccione entre los candidatos mediante los CV's recibidos
                      </small>

                      <li>Realiza el contrato</li>
                      <small>
                          Elije el candidato que mejor se adapte al perfil buscado
                      </small>
                  </ul>
              </div>
          </div>
      </div>
    </div>


@endsection


<style>

.row{
    margin: 5%;
}
ul{
    color: #0069A3;
}
small{
    color: #000000
}

span{
    color: #0069A3;
    font-weight: bold;
}
</style>


