@extends('dashboard.master')
@section('content')
    @include('dashboard.partials.validation-error')

    <form action="{{ route('contracts.update', $contract->id) }}" method="post">
        @method('PUT')
        @csrf
        <div class="container mt-4">
            <div class="jumbotron">
                <div class="form-group">
                    <div class="row center w-75 mx-auto">
                      
                        <div class="col mb-3">
                            <label for="">Fecha inicio</label>
                            <input type="date" class="form-control" name="start_date" id="start_date" value="{{old('start_date', $contract->start_date)}}">
                            <br>
        
                            <label for="">Fecha finalización</label>
                            <input type="date" class="form-control" name="final_date" id="final_date" value="{{old('final_date', $contract->final_date)}}">
                            <br>
        
                            <input type="text" id="id_student" name="id_student" value="{{old('id_student', $contract->id_student)}} " hidden>
        
                            <input type="text" id="id_employer" name="id_employer" value="{{old('id_employer', $contract->id_employer)}}" hidden>
        
                            <label for="">Cargo</label>
                            <input type="text" id="job" name="job" class="form-control" value="{{old('job', $contract->job)}} ">
        
                            <label for="">Salario</label>
                            <input type="number" class="form-control" class="form-control" name="payment" id="payment" value="{{old('payment', $contract->payment)}}">
                            <br>
                            <label for="">Descripción</label>
                            
                            <textarea class="form-control" name="description" id="description" placeholder="Escriba aquí los detalles del contrato">{{ old('description', $contract->description) }}</textarea>
        
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="form-group">
                            <a href="{{ URL::previous() }}" class="btn btn-danger btn-sm">Cancelar</a>
                            <button type="submit" class="btn btn-success btn-sm">Registrar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        

    </form>
@endsection

<style>
    .jumbotron {
        padding: 2rem 1rem;
        margin-bottom: 2rem;
        background-color: #e9ecef;
        border-radius: .3rem;
    }
</style>