@csrf
@include('dashboard.partials.validation-error')

<input value="{{ $id_receiver }}" id="receiver" name="receiver" hidden>
<input value="{{ auth()->user()->id }}" id="emitter" name="emitter" hidden>
<!-- Card -->
<div class="mx-0 mx-sm-auto mt-5">
    <!-- QUESTION 1-->
    @component('dashboard.partials.survey-questions', ['question' => auth()->user()->rol->key =='employer' ? "¿Conocimientos en el área?":"¿Dispones de todo lo necesario para realizar tu trabajo?"])
    @endcomponent

    <div class="form-control">
        @component('dashboard.partials.survey-values', ['question' => 'q1'])
        @endcomponent
    </div>
    <!-- QUESTION 2-->
    @component('dashboard.partials.survey-questions', ['question' => auth()->user()->rol->key =='employer' ? "¿Cómo ha sido el desempeño?":"¿Cómo considera que fue el trato recibido?"])
    @endcomponent


    <div class="form-control">
        @component('dashboard.partials.survey-values', ['question' => 'q2'])
        @endcomponent
    </div>
    <!-- QUESTION 3-->
    @component('dashboard.partials.survey-questions', ['question' => auth()->user()->rol->key =='employer' ? "¿Compromiso en la realización de actividades?":"¿Cómo valoraría el ambiente laboral?"])
    @endcomponent

    <div class="form-control">
        @component('dashboard.partials.survey-values', ['question' => 'q3'])
        @endcomponent
    </div>
    <!-- QUESTION 4-->
    @component('dashboard.partials.survey-questions', ['question' => auth()->user()->rol->key =='employer' ? "¿Puntualidad?":"¿Cumplió con sus expectativas?"])
    @endcomponent


    <div class="form-control">
        @include('dashboard/partials/survey-values', ['question' => 'q4'])
    </div>
    <!-- QUESTION 5-->   
    @component('dashboard.partials.survey-questions', ['question' => auth()->user()->rol->key =='employer' ? "¿Presentación y cordialidad?":"¿Recomendaría la empresa a un compañero?"])
    @endcomponent
    <div class="form-control">
        @include('dashboard/partials/survey-values', ['question' => 'q5'])
    </div>

    <div class="text-center">
        <button type="submit" class="btn btn-primary">Enviar</button>
    </div>
</div>
