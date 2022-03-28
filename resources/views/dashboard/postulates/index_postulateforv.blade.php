@extends('dashboard.master')
@section('content')

    <div class="container mt-4">
        @if (sizeof($lista) > 0)
            <h6>Postulaciones </h6>

            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>

                            <th scope="col">fechaPostulacion</th>
                            <th scope="col">Nombre postulado</th>
                            <th scope="col">Correo postulado</th>
                            <th scope="col">Carrera postulado</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($lista as $postulados)
                            <tr>

                                <td>{{ $postulados->created_at }}</td>
                                <td>{{ $postulados->name }}</td>
                                <td>{{ $postulados->email }}</td>
                                <td>{{ $postulados->career }}</td>


                                <td><a href="{{ route('postulates.show', $postulados->id) }}"
                                        class="btn btn-warning btn-sm">
                                        Ver
                                    </a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <br><br>
            <h2>Todavia no hay postulaciones ...</h2>
        @endif
        <a href="{{ URL::previous() }}" class="btn btn-outline-success btn-sm">Cancelar</a>
    </div>
@endsection
