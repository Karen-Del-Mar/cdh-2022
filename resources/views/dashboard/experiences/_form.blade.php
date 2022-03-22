@csrf
{{-- @extends('dashboard.master') --}}
{{-- @include('dashboard.partials.validation-error')
@include('dashboard.partials.nav-menu') --}}
{{-- @section('content') --}}
<div class="container mb-5">

    <div class="d-flex justify-content-center row">

        <div class="col-md-8  mt-3">

            @if (auth()->user() && auth()->user()->rol_id === 3)
                <div class="mt-3 d-flex flex-row align-items-center p-3 form-color">

                    <img src="https://i.imgur.com/zQZSWrt.jpg" width="50" class="rounded-circle mr-2">

                    <textarea type="text" class="form-control"
                        placeholder="{{ auth()->user()->name }}, cuentanos tu experiencia con Cadena de Honor..."
                        id="experience" name="experience"></textarea>

                    <div class="d-flex justify-content-end align-items-center comment-buttons mt-2 text-right">
                        <button class="btn btn-primary btn-sm border-0 px-3" type="submit">Publicar</button>
                    </div>

                </div>              
            @else
                <span>
                    Si quieres registrar un comentario sobre tu experiencia vivida
                    con el programa cadena de honor, por favor inicia sesión
                </span>
            @endif

        </div>
    </div>
</div>

<style>
    .form-color {
        background-color: #fafafa
    }

    .form-control {

        border-radius: 25px
    }

    .form-control:focus {
        color: #495057;
        background-color: #fff;
        border-color: #0069A3;
        outline: 0;
        box-shadow: none;
        text-indent: 10px
    }

</style>

{{-- @endsection --}}
