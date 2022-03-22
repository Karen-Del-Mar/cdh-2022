@extends('dashboard.master')
@section('content')

    <form action="{{ route('solicitudes.store') }}" method="post">
        @include('dashboard.solicitudes._form')
    </form>

@endsection