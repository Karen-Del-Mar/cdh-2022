@extends('dashboard.master')

@section('content')


    <div class="container">
        @if (sizeof($employers) == 0)
            <h1>Todavia no se registran empresas</h1>
        @endif
        <input class="form-control" id="myInput" type="text" placeholder="Search..">

        <div class="row px-sm-2 px-0 pt-3">
            @foreach ($employers as $employer)
                <div class="col-md-4 offset-md-0 offset-sm-2 offset-1 col-sm-8 col-10 offset-sm-2 offset-1 mb-3">
                    <div class="card" style="background-color: rgb(236, 236, 236);">
                        <div class="d-flex justify-content-center">

                            <img src="{{ asset('images/restaurants-logo/logo-example.png') }}" class="product"
                                alt="">

                        </div>
                        <div id="search">
                            <b class="px-2">
                                <p class="h4">{{ $employer->company }}</p>
                            </b>
                            <div
                                class="d-flex align-items-center justify-content-start rating border-top border-bottom py-2">
                                <div class="text-muted text-uppercase px-2 border-right">Ofertas 6</div>
                                <div class="px-lg-2 px-1"> <span class="fas fa-star"></span> <span
                                        class="fas fa-star"></span> <span class="fas fa-star"></span> <span
                                        class="fas fa-star"></span> <span class="fas fa-star"></span> <a href="#"
                                        class="px-lg-2 px-1 reviews">{3 Reviews}</a> </div>
                            </div>
                        </div>
                        <div class="d-flex align-items-center justify-content-between py-2 px-3">
                            <a href="{{ route('employer.show', $employer->id_user) }}"
                                class="btn btn-dark text-uppercase">
                                Ver</a>
                            {{-- <div> <button class="btn btn-dark text-uppercase"> Ver </button> </div> --}}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    
@endsection
<style>
    @import url('https://fonts.googleapis.com/css2?family=Lora&family=Roboto+Slab&display=swap');

    * {
        padding: 0;
        margin: 0;
        box-sizing: border-box
    }



    select {
        border-radius: 20px;
        outline: none;
        border: 1px solid #ddd;
        color: #555
    }

    img.product {
        object-fit: contain;
        width: 100%;
        height: 200px;
        display: flex;
        align-items: center;
        justify-content: center
    }

    p.h4 {
        font-family: 'Roboto Slab', serif
    }

    .rating {
        font-size: 0.7rem
    }

    .fa-star,
    .reviews {
        color: #daa520
    }

    div.h4 {
        font-size: 1.8rem;
        color: #d4a838;
        font-family: 'Lora', serif;
        margin: 0
    }

    .btn {
        border-radius: 20px;
        font-size: 0.8rem;
        font-weight: 600;
        padding: 8px 20px
    }

    .card {
        position: relative;
    }

    .card:hover {
        border: 1px solid #000;
        box-shadow: 3px 3px 30px rgb(142, 215, 248);
    }

    .red {
        background-color: #e03e3e;
        position: absolute;
        color: #fff;
        border-radius: 5px;
        right: 5px;
        top: 5px;
        font-size: 0.9rem
    }

    a:hover {
        text-decoration: none
    }

    @media(max-width:800px) {
        .wrapper {
            margin: 20px 10px
        }

        p.h4 {
            font-size: 1.35rem;
            padding-top: 10px
        }
    }

    @media(max-width:767px) {
        .wrapper {
            max-width: 500px;
            margin: 20px auto
        }
    }

    @media(max-width:424px) {
        .wrapper {
            width: 100%;
            margin: auto
        }

        div.text-muted {
            font-size: 0.75rem
        }
    }

</style>

<script>
    $(document).ready(function() {
        $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#search *").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
</script>
