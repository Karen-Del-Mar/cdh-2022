@extends('dashboard.master')
@section('content')

<form action="{{ route('contracts.store') }}" method="post">
    @include('dashboard.contracts._form')
</form>

@endsection
