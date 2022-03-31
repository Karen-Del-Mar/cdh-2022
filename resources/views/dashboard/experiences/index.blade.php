<div class="container mb-5">

    <div class="row d-flex justify-content-center">

        <div class="col-md-8">

            <div class="text-left">
                <h6>All comment(5)</h6>
            </div>

            @foreach ($lista as $experience)
                <div class="card p-3 mb-2 mt-2">

                    <div class="d-flex flex-row">

                        <img src="https://i.imgur.com/dwiGgJr.jpg" height="40" width="40" class="rounded-circle">

                        <div class="d-flex flex-column ms-2 ml-2">

                            <h6 class="mb-1">{{ $experience->name }} - {{ $experience->rol }} </h6>

                            <div class="d-flex flex-row">
                                <span class="text-muted fw-normal fs-10">{{ $experience->created_at }}</span>
                            </div>

                            <div class="comment-text text-justify mt-2">
                                <p class="comment-text">{{ $experience->experience }} </p>
                            </div>

                        </div>
                    </div>
                    @if (auth()->user())
                        @if (auth()->user()->id === $experience->id_user)
                            <div class="btn-group btn-group-sm">

                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal"
                                    data-bs-whatever="{{ $experience }}">Editar</button>

                                <form  class="formulario-eliminar" action="{{ route('experience.destroy', ['experience' => $experience->id]) }}"
                                    method="post">

                                    @method('DELETE')
                                    @csrf

                                    <button type="submit" class="btn btn-danger">Eliminar</button>

                                </form>

                            </div>
                        @endif
                    @endif
                </div>
            @endforeach

            <form action="{{ route('experience.update', ['experience' => $experience->id]) }}" method="post">

                @method('PUT')
                @csrf

                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">


                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>

                            <div class="modal-body">
                                <form>
                                    <div class="mb-3">
                                        <label for="recipient-name" class="col-form-label">Experiencia:</label>
                                        <textarea type="text" class="form-control" rows="5" id="experience"
                                            name="experience">{{ $experience->experience }}</textarea>
                                    </div>

                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Guardar cambios</button>
                            </div>
                        </div>

                    </div>
                </div>

            </form>

            <div class="p-3 bg-white mt-2 rounded text-center mb-5">
                <h5>¿Eres egresado? Contáctanos para compartir tu experiencia</h5>
                <a class="btn btn-primary btn-sm px-3" href="/contact">Contacto</a>
            </div>
        </div>

    </div>

</div>




<style>
    .index {
        background-color: #eee;

    }

    .card {
        border: none;
        -webkit-box-shadow: 0 2px 3px rgba(0, 0, 0, 0.03);
        box-shadow: 0 2px 3px rgba(0, 0, 0, 0.03)
    }

    h6 {
        color: #0069A3
    }

</style>

<script>
    $('.formulario-eliminar').submit(function(e) {
        e.preventDefault();

        Swal.fire({
            title: '¿Estás seguro?',
            text: "Esta experiencia se eliminará definitivamente",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: '¡Si, eliminar!',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {              
                this.submit();
            }
        })

    });
</script>
