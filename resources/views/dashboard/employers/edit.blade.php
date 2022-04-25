@extends('dashboard.master')
@section('content')
    <form action="{{route('employer.update', ['employer' => $user->id])}}" method="post" enctype = 'multipart/form-data'>
        @method('PUT')
        @csrf
        <div class="container bg-light py-4">
            <div class="jumbotron">
                <div class="form-group">
                    <div class="form-group">
                        <div class="row center">
                            <div class="col mb-3">

                                <label for="avatar"> <input type="file" name="avatar"> </label>
                                <br>

                                <label>Nombre y apellido del empleador</label>
                                <input type="text" class="form-control" name="name" id="name"
                                    placeholder="Nombre y apellido del empleador" value="{{ old('name', $user->name) }}">
        
                                <br>
                                <label>Número de Documento</label>
                                <input type="number" class="form-control" name="document" id="document"
                                    placeholder="Número de Documento" value="{{ old('name', $user->document) }}">
                                <br>
                                <label>Email</label>
                                <input type="email" class="form-control" name="email" id="email" placeholder="Email" value="{{ old('name', $user->email) }}">
                                <br>
                                <label>Teléfono</label>
                                <input type="number" class="form-control" name="phone" id="phone"
                                    placeholder="Teléfono" value="{{ old('name', $user->phone) }}">
                                <br>
        
        
                                <label>Nombre de la empresa</label>
                                <input type="text" class="form-control" name="company" id="company"
                                    placeholder="Nombre de la empresa " value="{{ old('name', $employer->company) }}">
                                <p style="color: #0069A3;">(En caso de no ser una empresa poner el nombre del empleador)</p>
                                <label>Dirección</label>
                                <input type="text" class="form-control" name="location" id="location"
                                    placeholder="Dirección" value="{{ old('name', $employer->location) }}">
                                <br>
                                <label>Descripción</label>
                                <textarea name="description" id="description" class="form-control" rows="3"
                                    placeholder="Descipción de la empresa">{{ old('name', $employer->description) }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="form-group">
                            <a href="{{ URL::previous() }}" class="btn btn-outline-danger btn-sm">Cancelar</a>
                            <button type="submit" class="btn btn-outline-success btn-sm">Editar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
