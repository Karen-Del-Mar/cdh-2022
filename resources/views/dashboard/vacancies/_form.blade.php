@csrf
@include('dashboard.partials.validation-error')
<div class="background">
    <div class="container py-4">
        <div class="p-5 mb-2 bg-light rounded-3">
            <div class="container-fluid py-3">
                <h4>
                    <p style="color: #0069A3;; text-align: center;">
                        Crear una nueva vacante laboral
                    </p>
                </h4>
                <div class="form-group">
                    <div class="row center">
                        <div class="col mb-1">
                            <input type="text" class="form-control" name="job" id="job"
                                placeholder="Nombre de la vacante...">
                            <br>
                            <textarea name="profile" id="profile" class="form-control" rows="3"
                                placeholder="Describa aquí el perfil solicitado..."></textarea>

                            {{-- <input id="id_employer" name="id_employer" type="number" value="{{ auth()->user()->id }}"
                                hidden> --}}
                            <h1>

                            </h1>


                            <br>
                            <label for="payment">Salario:</label>
                            <input type="number" class="form-control" name="payment" id="payment">

                            <br>
                            <label for="">Disponibilidad de horario</label>
                            <textarea name="availability" id="availability" class="form-control" rows="3"
                                placeholder="Describa aquí la disponibilidad requerida"></textarea>

                        </div>
                    </div>
                </div>
            </div>
            <div class="mb-2">
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">Enviar</button>
                    <a href="{{ URL::previous() }}" class="btn btn-success btn-block">Cancelar</a>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    .background {
        background-repeat: no-repeat;
        background-position: center;
        background-size: cover;
        background-image: url({{ url('images/cadena_images/fondoU.jpg') }});
    }

    .container {
        margin: auto;


    }

    .p-5 {
        width: 50%;
        margin: auto;
        /* opacity: 0.7; */
        /* filter:  alpha(opacity=50); */
    }

    .container-fluid {
        opacity: 1;
    }

</style>
