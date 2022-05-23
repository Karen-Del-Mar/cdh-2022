<div class="container">
    @if (sizeof($lista_student) > 0)
        <h6>Lista de contratos </h6>
        {{-- <a href="{{ route('admins.create') }}" class="btn btn-info btn-sm mb-3"></a> --}}
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr class="table-primary">
                        <th scope="col">Nombre empleado</th>
                        <th scope="col">Fecha de inicio</th>
                        <th scope="col">Cargo</th>
                        <th scope="col">Salario</th>
                        <th scope="col">Contacto</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Fecha finalización</th>
                        <th scope="col">Opciones</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($lista_student as $list_student)
                        <tr>
                            @if ($list_student->state == 0)
                                <td id="name">{{ $list_student->name }}</td>
                                <td>{{ $list_student->start_date }}</td>
                                <td>{{ $list_student->job }} </td>
                                <td>{{ $list_student->payment }}</td>
                                <td>{{ $list_student->phone }}</td>
                                <td>{{ $list_student->description }}</td>
                                <td>{{ $list_student->final_date }}</td>
                                <td>
                                    <div class="d-flex">

                                        <a href="{{ route('contracts.edit', $list_student->id_contract) }}"
                                            class="btn btn-warning btn-sm" title="Editar"><i
                                                class="bi bi-pencil-fill"></i></a>
                                        <a href="{{ route('survey.createSurvey', [$list_student->id_receiver]) }}"
                                            class="btn btn-success" title="Evaluar"><i
                                                class="bi bi-graph-up-arrow"></i></a>
                                        <form class="formulario-finalizar-contracto"
                                            action="{{ route('userContract.change_state', ['id' => $list_student->id]) }}"
                                            method="POST">
                                            @method('PUT')
                                            @csrf

                                            <button id="hideButton" type="submit" class="btn btn-danger"
                                                title="Finalizar"><i class="bi bi-hand-index-thumb"></i></button>
                                        </form>
                                    </div>


                                </td>
                            @endif
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

<script>
    $('.formulario-finalizar-contracto').submit(function(e) {

        e.preventDefault();
        Swal.fire({
            title: '¿Finalizar contrato?',
            text: "El estudiante ya no hará parte de su empresa",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: '¡Si, Finalizar!',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                this.submit();
            }
        })

    });
</script>
