@extends('dashboard.master')
@section('content')
    <form action="{{route('employer.disable_employer', ['id' => $employer->id, true])}}" method="post">
        @method('PUT')
        @csrf
        @include('dashboard.employers.confirm_disable')
    </form>
@endsection
