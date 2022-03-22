@extends('dashboard.master')
@section('content')
<form action="{{ route('vacancies.store') }}" method="post">
    @include('dashboard.vacancies._form')
</form>
@endsection
