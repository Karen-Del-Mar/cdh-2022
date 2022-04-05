@extends('dashboard.master')
@section('content')
{{-- TODO: Poner opción de cerrar vacante para no recibir más postulaciones --}}
    <form action="{{ route('vacancies.update', ['vacancy' => $vacancy->id]) }}" method="post">
        @method('PUT')
        @csrf
        @include('dashboard.partials.validation-error')

        <div class="container py-4">
            <div class="p-5 mb-2 bg-light rounded-3">
                <div class="container-fluid py-3">

                    <div class="form-group">
                        <div class="row center">
                            <div class="col mb-1">
                                <label for="job">Cargo:</label>
                                <input type="text" class="form-control" name="job" id="job"
                                    placeholder="Nombre de la vacante..." value="{{ old('job', $vacancy->job) }}">
                                <br>
                                <label for="profile">Perfil requerido:</label>
                                <textarea name="profile" id="profile" class="form-control" placeholder="Describa aquí el perfil solicitado"
                                    style="min-width: 100%; height: 30px;">{{ old('profile', $vacancy->profile) }}</textarea>
                                {{-- <input id="id_employer" name="id_employer" type="number" value="{{ auth()->user()->id }}"
                                hidden> --}}
                                <br>
                                <label for="payment">Salario por hora:</label>
                                <input type="number" class="form-control" name="payment" id="payment"
                                    value="{{ old('payment', $vacancy->payment) }}">

                                <br>
                                <label for="availability">Disponibilidad de horario</label>
                                <textarea name="availability" id="availability" class="form-control" rows="3" style="min-width: 100%"
                                    value="{{ old('availability', $vacancy->availability) }}"
                                    placeholder="Describa aquí la disponibilidad requerida">{{ old('availability', $vacancy->availability) }}</textarea>
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
    </form>
@endsection
<style>
    .container {
        margin: auto;


    }

    .container-fluid {
        opacity: 1;
    }

    /* textarea {
    height: 30px;
    width: 100%;
    resize: none;
} */

</style>
