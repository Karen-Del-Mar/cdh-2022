@csrf
@include('dashboard.partials.validation-error')
<div class="container">
    <div class="jumbotron">
        <div class="form-group">
            <div class="row center">
              
                <div class="col mb-3">
                    <input type="text" name="id_postulate" id="id_postulate" value="{{$id_postulate}}">
                    <input type="text" name="id_vacancy" id="id_vacancy" value="{{$vacancy->id}}">
                    <label for="">Fecha inicio</label>
                    <input type="date" class="form-control" name="start_date" id="start_date">
                    <br>

                    <label for="">Fecha finalización</label>
                    <input type="date" class="form-control" name="final_date" id="final_date">
                    <br>

                    <input type="text" id="id_student" name="id_student" value="{{$id}} " hidden>

                    <input type="text" id="id_employer" name="id_employer" value="{{$vacancy->id_employer}}" hidden>

                    <label for="">Cargo</label>
                    <input type="text" id="job" name="job" class="form-control" value="{{$vacancy->job}} ">

                    <label for="">Salario</label>
                    <input type="number" class="form-control" class="form-control" name="payment" id="payment" value="{{$vacancy->payment}}">
                    <br>

                    <textarea class="form-control" name="description" id="description" placeholder="Escriba aquí los detalles del contrato">{{ old('description', $contract->description) }}</textarea>

                </div>
            </div>
            <div class="mb-3">
                <div class="form-group">
                    <a href="{{ URL::previous() }}" class="btn btn-outline-danger btn-sm">Cancelar</a>
                    <button type="submit" class="btn btn-outline-success btn-sm">Registrar</button>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .jumbotron {
        padding: 2rem 1rem;
        margin-bottom: 2rem;
        background-color: #e9ecef;
        border-radius: .3rem;
    }
</style>