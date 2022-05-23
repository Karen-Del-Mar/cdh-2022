@extends('dashboard.master')
@section('content')
    @include('dashboard.partials.validation-error')

    <form action="{{ route('student.update', [$user->id]) }}" method="post"  enctype='multipart/form-data'>
        @method('PUT')
        @csrf
        
        <div class="container bg-light">
            <div class="row">
                <div class="col-lg-6">
                    <h3>Datos personales</h3>
        
                    <div class="form-group row">
                        <div class="input-group mb-3">
                            <img width="100px" src="{{ asset('images/students-profiles/' . $user->avatar) }}">
                            <i class="bi bi-camera p-2"></i>
                            <input type="file" class="form-control @error('name') is-invalid @enderror" id="avatar"
                                name="avatar">
                            @error('avatar')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
        
                    <div class="form-group row mb-2">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre completo') }} <span
                                class="required">*</span> </label>
        
                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                value="{{old('name',$user->name)}}" autocomplete="name" autofocus>
        
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
        
        
        
                    <div class="form-group row mb-2">
                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }} <span
                                class="required">*</span></label>
        
                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{old('email',$user->email)}}" autocomplete="email">
        
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
        
                    <div class="row center mb-2">
                        <div class="col">
                            <label for="document_type" class="form-label">Tipo de
                                documento </label>
                            <select class="form-control @error('document_type') is-invalid @enderror" name="document_type"
                                id="document_type">
                                <option value=""></option>
                                @include('dashboard/partials/options_document', [
                                    'val' => 'C.C',
                                ])
                            </select>
                            @error('document_type')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col">
                            <label for="name" class="form-label">Numero documento</label>
                            <input type="number" name="document" id="document"
                                class="form-control @error('document') is-invalid @enderror" value="{{old('document',$user->document)}}" />
        
                            @error('document')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
        
                    <div class="form-group row mb-2">
                        <label for="phone" class="form-label col-md-4 col-form-label text-md-right">Telefono <span
                                class="required">*</span></label>
                        <div class="col-md-6">
                            <input type="number" name="phone" id="phone"
                                class="form-control @error('phone') is-invalid @enderror" value="{{old('phone',$user->phone)}}" />
                            @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
        
                    <div class="row">
                        <div class="form-group row">
                            <input id="rol_id" class="form-control" value="3" name="rol_id" type="hidden">
                        </div>
                    </div>
        
        
        
                    <div class="form-group row ">
                        <div class="form-label col-md-4 col-form-label text-md-right">
                            <label>Género <span class="required">*</span></label>
                        </div>
                        <div class="col-md-6 mb-2">
                            <select class="form-control @error('gender') is-invalid @enderror" name="gender" id="gender">
                                <option value=""></option>
                                @include('dashboard/partials/option-gender', [
                                    'val' => 'mujer',
                                ])
                            </select>
                            @error('gender')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
        
        
                    <div class="row center mb-2">
        
                        <div class="col">
                            <label for="eps" class="form-label">EPS <span class="required">*</span></label>
                            <input type="text" name="eps" id="eps" class="form-control @error('eps') is-invalid @enderror"
                                value="{{old('eps',$student->eps)}}" />
                            @error('eps')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
        
                        <div class="col">
                            <label for="blood_type" class="form-label">Tipo de sangre <span
                                    class="required">*</span></label>
        
                            <select class="form-control @error('blood_type') is-invalid @enderror" name="blood_type"
                                id="blood_type">
                                <option value=""></option>
                                @include('dashboard.partials.blood-type', [
                                    'val' => 'O+',
                                ])
                            </select>
                            @error('blood_type')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
        
                    </div>
        
                    <div class="form-group row mb-2">
                        <label for="birthday" class="form-label col-md-4 col-form-label text-md-right">Fecha de nacimiento <span
                                class="required">*</span></label>
                        <div class="col-md-6">
                            <input type="date" name="birthday" id="birthday"
                                class="form-control @error('birthday') is-invalid @enderror" value="{{old('birthday',$student->birthday)}}" />
                            @error('birthday')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
        
                    <div class="form-inline">
                        @foreach ($skills as $skill => $id)
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="skill{{ $id }}"
                                    name="skill{{ $id }}" value="{{ $id }}">
                                <label class="form-check-label" for="skill{{ $id }}">{{ $skill }}</label>
                            </div>
                        @endforeach
                    </div>
                </div>
        
                <div class="col-lg-6">
                    <h3>Perfil laboral</h3>
                    <div class="form-group">
                        <div class="row center">
        
                            <div class="row">
                                <div class="col">
                                    <label>Carrera <span class="required">*</span></label>
                                </div>
                                <div class="col">
                                    <select class="form-control @error('career') is-invalid @enderror" name="career"
                                        id="career">
                                        <option value="{{old('career',$student->career)}}"></option>
                                        @include('dashboard.partials.careers', [
                                            'val' => 'Ing. Sistemas',
                                        ])
                                    </select>
                                </div>
                            </div>
        
                            <div class="col">
                                <label for="name" class="form-label">Promedio <span class="required">*</span></label>
                                <input type="number" name="average" id="average"
                                    class="form-control @error('average') is-invalid @enderror" value="{{old('average',$student->average)}}" />
                                @error('average')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col">
                                <label for="name" class="form-label">Semestre actual <span
                                        class="required">*</span></label>
                                <input type="number" name="semester" id="semester"
                                    class="form-control @error('semester') is-invalid @enderror" value="{{old('semester',$student->semester)}}" />
                                @error('semester')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row center">
                            <div class="col">
                                <label for="basic_tools" class="form-label">Perfil <span
                                        class="required">*</span></label>
                                <textarea class="form-control @error('basic_tools') is-invalid @enderror" name="basic_tools" id="basic_tools" cols="30"
                                    rows="4"
                                    placeholder="Describa su perfil y conocimientos, ej: Manejo de herramientas ofimaticas">{{old('basic_tools',$student->basic_tools)}}</textarea>
                                @error('basic_tools')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row center">
                            <div class="col">
                                <label for="work_experience" class="form-label">Experiencia laboral (opcional)</label>
                                <textarea class="form-control" name="work_experience" id="work_experience" cols="30" rows="7"
                                    placeholder="Empresa &#10;Ciudad &#10;Cargo &#10;Tiempo Laborado &#10;Jefe inmediato &#10;Cargo jefe &#10;Teléfono">{{old('work_experience',$student->work_experience)}}</textarea>
                            </div>
                        </div>
        
                        <div class="row center">
                            <div class="col">
                                <label for="languages" class="form-label">Idiomas <span
                                        class="required">*</span></label>
                                <textarea class="form-control @error('languages') is-invalid @enderror" name="languages" id="languages" cols="30"
                                    rows="2" placeholder="Lectura % - Escucha % - Habla %">{{old('languages',$student->languages)}}</textarea>
                                @error('languages')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
        
                    </div>
                </div>
        
            </div>
            <div class="row justify-content-center align-items-center">
                <div class="mx-auto mb-3">
                    <div class="form-group">
                        <a href="{{ URL::previous() }}" class="btn btn-danger btn-sm">Cancelar</a>
                        {{-- <a href="{{ route('login') }}" class="btn btn-success btn-sm">Registrar</a> --}}
                        <button type="submit" class="btn btn-success btn-sm">Registrar</button>
                    </div>
                </div>
            </div>
        </div>

    </form>
@endsection



<style>
    .required {
        color: red;
    }

    .row {
        margin: 2%
    }

</style>
