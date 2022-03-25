<div class="row">

    <div class="col">
        @include('dashboard.students.show')
    </div>

</div>

<div class="container">
    <div class="row ">
        <div class="col-6">
            <a class="btn btn-primary" href="{{ route('contracts.created_contract',[$user->id, $postulate->id]) }}">Contratar</a>
            {{-- Usar otra palabra para rechazar --}}
            <a href="{{ URL::previous() }}" class="btn btn-danger">Rechazar</a>
            <a href="{{ URL::previous() }}" class="btn btn-success">Cancelar</a>
        </div>
    </div>
</div>
 