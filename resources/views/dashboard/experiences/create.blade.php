@extends('dashboard.master')
@section('content')
    <div class="index">
        <form action="{{ route('experience.store') }}" method="post">
            @include('dashboard.experiences._form')
        </form>
        @include('dashboard.experiences.index')
    </div>
@endsection
