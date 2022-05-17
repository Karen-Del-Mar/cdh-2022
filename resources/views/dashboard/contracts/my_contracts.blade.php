<div class="container">
    @if (sizeof($my_contracts) > 0)
        <h6>Lista de contratos </h6>
        {{-- <a href="{{ route('admins.create') }}" class="btn btn-info btn-sm mb-3"></a> --}}
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr class="table-primary">
                        <th scope="col">Empresa</th>
                        <th scope="col">Fecha inicio</th>
                        <th scope="col">Cargo</th>
                        <th scope="col">Salario</th>
                        <th scope="col">Contacto</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Fecha finalización</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Opciones</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($my_contracts as $contract)
                        <tr>
                            <td>{{ $contract->company }}</td>
                            <td>{{ $contract->start_date }}</td>
                            <td>{{ $contract->job }} </td>
                            <td>{{ $contract->payment }}</td>
                            <td>{{ $contract->phone }}</td>
                            <td>{{ $contract->description }}</td>
                            <td>{{ $contract->final_date }}</td>
                            @if ($contract->state == 0)
                                <td><label class="badge rounded-pill bg-success">Vigente</label></td>
                            @else
                                <td><label class="badge rounded-pill bg-secondary">Finalizado</label></td>                                
                            @endif
                            <td>
                                <a href="{{ route('survey.createSurvey',[$contract->id_receiver]) }}" class="btn btn-info" title="Evaluar"><i class="bi bi-graph-up-arrow"></i></a>
                            </td>

                        </tr>
                    @endforeach
                    
                </tbody>
            </table>
        </div>
    @else
        <br><br>
        <h2>Todavía no tienes contratos ...</h2>
    @endif
</div>
