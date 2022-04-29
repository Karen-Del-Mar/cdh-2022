@extends('dashboard.master')
@section('content')
    <form action="{{ route('surveys.store') }}" method="post">
        @include('dashboard.surveys._form')
    </form>
@endsection
