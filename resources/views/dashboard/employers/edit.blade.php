@extends('dashboard.master')
@section('content')
    <form action="{{ route('employer.update', ['employer' => $user->id]) }}" method="post" enctype='multipart/form-data'>
        @method('PUT')
        @csrf
        <div class="container bg-light py-4">
            <div class="jumbotron">
                <div class="form-group">
                    <div class="form-group">
                        <div class="row center">
                            <div class="col mb-3">

                                <div class="input-group mb-3">
                                    <img width="100px" src="{{ asset('images/employers-profile/'. $user->avatar) }}">
                                    <i class="bi bi-camera p-2"></i>
                                    <input type="file" class="form-control" id="avatar" name="avatar">
                                </div>

                                <br>

                                <label>Nombre y apellido del empleador</label>
                                <input type="text" class="form-control" name="name" id="name"
                                    placeholder="Nombre y apellido del empleador" value="{{ old('name', $user->name) }}">

                                <br>
                                <label>Número de Documento</label>
                                <input type="number" class="form-control" name="document" id="document"
                                    placeholder="Número de Documento" value="{{ old('document', $user->document) }}">
                                <br>
                                <label>Email</label>
                                <input type="email" class="form-control" name="email" id="email" placeholder="Email"
                                    value="{{ old('email', $user->email) }}">
                                <br>
                                <label>Teléfono</label>
                                <input type="number" class="form-control" name="phone" id="phone" placeholder="Teléfono"
                                    value="{{ old('phone', $user->phone) }}">
                                <br>

                                <label>Nombre de la empresa</label>
                                <input type="text" class="form-control" name="company" id="company"
                                    placeholder="Nombre de la empresa " value="{{ old('company', $employer->company) }}">
                                <p style="color: #0069A3;">(En caso de no ser una empresa poner el nombre del empleador)</p>
                                <label>Dirección</label>
                                <input type="text" class="form-control" name="location" id="location"
                                    placeholder="Dirección" value="{{ old('location', $employer->location) }}">
                                <br>
                                <label for="sector">Sector</label>

                                <select class="form-control form-select" name="sector" id="sector">
                                    <option value=""></option>
                                    @include('dashboard/partials/option-sector', [
                                        'val' => $employer->sector,
                                    ])
                                </select>
                                <br>
                                <label>Descripción</label>
                                <textarea name="description" id="description" class="form-control" rows="3"
                                    placeholder="Descipción de la empresa">{{ old('description', $employer->description) }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="form-group">
                            <a href="{{ URL::previous() }}" class="btn btn-danger btn-sm">Cancelar</a>
                            <button type="submit" class="btn btn-success btn-sm">Editar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
