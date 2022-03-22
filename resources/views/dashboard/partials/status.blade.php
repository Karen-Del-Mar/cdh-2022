{{-- Con shift + Alt + F aplicamos formato al código --}}
@if (session('status'))
    <div class="alert alert-info">
        {{ session('status') }}
    </div>
@endif
