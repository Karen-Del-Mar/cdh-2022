@extends('dashboard.master')
@section('content')
    <div class="container">
        <h4>
            <p style="color: #0069A3;; text-align: center;">
                Detalle de la cuenta de empleador solicitante
            </p>
        </h4>
        <form method="POST" action="{{ route('userEmployer.accept_request', $solicitudes->id) }}">
            @csrf
            <div class="form-group">
                <div class="row center">
                    <div class="col mb-3">
                        <input type="text" class="form-control" name="name" id="name"
                            placeholder="Nombre y apellido del empleador" value="{{ old('name', $solicitudes->name) }}"
                            readonly>

                        <br>
                        <input type="number" class="form-control" name="document" id="document"
                            placeholder="Número de Documento" value="{{ old('document', $solicitudes->document) }}"
                            readonly>
                        <br>


                        <div class="form-group">
                            <input type="hidden" class="form-control" name="password" id="password" value="12345678">
                        </div>

                        <input type="email" class="form-control" name="email" id="email" placeholder="Email"
                            value="{{ old('email', $solicitudes->email) }}" readonly>
                        <br>

                        <input type="number" class="form-control" name="phone" id="phone" placeholder="Teléfono"
                            value="{{ old('phone', $solicitudes->phone) }}" readonly>
                        <br>

                        <div class="row">
                            <div class="form-group row">
                                <input id="rol_id" class="form-control" value="2" name="rol_id" type="hidden" readonly>
                            </div>
                        </div>


                        <input type="text" class="form-control" name="company" id="company"
                            placeholder="Nombre de la empresa" value="{{ old('company', $solicitudes->company) }}"
                            readonly>

                        <p style="color: #0069A3;;">(En caso de no ser una empresa poner el nombre del empleador)
                        </p>

                        <input type="text" class="form-control" name="location" id="location" placeholder="Dirección"
                            value="{{ old('location', $solicitudes->location) }}" readonly>
                        <br>
                        <textarea name="description" id="description" class="form-control" rows="3"
                            placeholder="Descipción de la empresa" readonly>
                       {{ $solicitudes->description }}
                    </textarea>
                    </div>
                </div>

            </div>
            <div class="form-group">
                <a href="{{ URL::previous() }}" class="btn btn-outline-info btn-lg">Cancelar</a>
                <button type="submit" class="btn btn-success btn-lg">Aprobar</button>

            </div>
        </form>


        <form id="eliminarSolicitud" action="{{ route('userEmployer.destroy', $solicitudes->id) }}"
            data-action="{{ route('userEmployer.destroy', $solicitudes->id) }}" method="POST">
            @method('DELETE')
            @csrf
            <button type="submit" class="btn btn-danger btn-lg">
                <i class="fas fa-trash-alt"></i>
                Rechazar
            </button>
        </form>

    </div>
@endsection
