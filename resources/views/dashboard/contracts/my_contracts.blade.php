<div class="container">
    @if (sizeof($my_contracts) > 0)
        <h6>Lista de contratos </h6>
        {{-- <a href="{{ route('admins.create') }}" class="btn btn-info btn-sm mb-3"></a> --}}
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">Empresa</th>
                        <th scope="col">Fecha inicio</th>
                        <th scope="col">Cargo</th>
                        <th scope="col">Salario</th>
                        <th scope="col">Contacto</th>
                        <th scope="col">Fecha finalización</th>
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
                            <td>{{ $contract->final_date }}</td>
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
