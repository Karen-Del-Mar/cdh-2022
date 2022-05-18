@extends('dashboard.master')
@section('content')
    <form action="{{ route('student.store') }}" method="post">
        @csrf
        @include('dashboard.students._form')
    </form>
@endsection