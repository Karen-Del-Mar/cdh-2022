@extends('dashboard.master')
@section('content')
    <form action="{{ route('student.store') }}" method="post">
        @include('dashboard.students._form')
    </form>
@endsection