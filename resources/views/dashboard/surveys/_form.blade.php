@csrf
@include('dashboard.partials.validation-error')    
<input value="{{$id_receiver}}" id="receiver" name="receiver" hidden>
<input value="{{auth()->user()->id}}" id="emitter" name="emitter" hidden>
    <!-- Card -->
    <div class="mx-0 mx-sm-auto">
        <!-- QUESTION 1-->
        <div class="text-center">
            <p>
                <strong>How do you rate customer support</strong>
            </p>
        </div>
        
        <div class="form-control">
            @component('dashboard.partials.survey-values', ["question"=>"q1"])@endcomponent
        </div>
        <!-- QUESTION 2-->
        <div class="text-center">
            <p>
                <strong>How do you rate customer support</strong>
            </p>
        </div>

        <div class="form-control">
            @component('dashboard.partials.survey-values', ["question"=>"q2"])@endcomponent
        </div>
        <!-- QUESTION 3-->
        <div class="text-center">
            <p>
                <strong>How do you rate customer support</strong>
            </p>
        </div>

        <div class="form-control">
            @component('dashboard.partials.survey-values', ["question"=>"q3"])@endcomponent
        </div>
        <!-- QUESTION 4-->
        <div class="text-center">
            <p>
                <strong>How do you rate customer support</strong>
            </p>
        </div>

        <div class="form-control">
            @include('dashboard/partials/survey-values', ["question"=>"q4"])
        </div>
        <!-- QUESTION 5-->
        <div class="text-center">
            <p>
                <strong>How do you rate customer support</strong>
            </p>
        </div>

        <div class="form-control">            
            @include('dashboard/partials/survey-values', ["question"=>"q5"])      
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-primary">Enviar</button>
        </div>
    </div>


