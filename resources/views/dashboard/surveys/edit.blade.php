@extends('dashboard.master')
@section('content')
    @include('dashboard.partials.validation-error')

    <form action="{{ route('surveys.update', $survey->id) }}" method="post">
        
        @method('PUT')
        @include('dashboard.surveys._form',['survey'=> $survey])
    </form>
@endsection
