@extends('dashboard.master')
@section('content')
    @if (auth()->user())
        <h3>
            <small>
                <strong>{{ auth()->user()->name }}</strong>, para solicitar una cuenta como
                estudiante,
                por favor cierra sesión!
            </small>
        </h3>
    @else
        <form action="{{ route('student.store') }}" method="post" enctype='multipart/form-data'>
            @csrf
            {{-- @include('dashboard.partials.validation-error') --}}
            @include('dashboard.students._form')
        </form>
    @endif
@endsection
