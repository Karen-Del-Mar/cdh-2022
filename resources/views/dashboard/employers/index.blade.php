@extends('dashboard.master')
@section('content')
    <div class="container">
        @if (sizeof($employers) == 0)
            <h1>Todavia no se registran empresas</h1>
        @endif

        <div class="container">
            <div class="row height d-flex justify-content-center align-items-center mt-4">
                <div class="col-md-6">
                    <div class="form-search">
                        <i class="bi bi-search"></i>
                        <input type="text" class="form-control form-input" placeholder="Buscar por nombre..." id="myInput" style=" border-color: #0069A3">
                    </div>
                </div>
            </div>
        </div>


        <div align="center" class="mt-4">

            <a class="btn btn-outline-primary filter-button" href="{{ route('employer.index') }}">All</a>
            <button class="btn btn-outline-primary filter-button" data-filter="Bar">Bar</button>
            <button class="btn  btn-outline-primary filter-button" data-filter="Restaurante">Restaurante</button>
        </div>

        <div id="myDIV">

            <div class="row px-sm-2 px-0 pt-3">
                <div class="d-none">{{$i = -1}}</div> 
                @foreach ($employers as $employer)
                <div class="d-none">{{$i = $i+1}}</div> 
                    <div class="col-md-4 offset-md-0 offset-sm-2 offset-1 col-sm-8 col-10 offset-sm-2 offset-1 mb-3"
                        data-role="recipe">
                        <div class="card" style="background-color: rgb(236, 236, 236);">
                            <div class="d-flex justify-content-center">

                                <img src="{{ asset('images/restaurants-logo/logo-example.png') }}" class="product"
                                    alt="">

                            </div>

                            <b class="px-2">
                                <h4 class="h4">{{ $employer->company }}</h4>
                            </b>
                            <div class="d-lg-flex d-sm-flex d-md-block align-items-center justify-content-start rating border-top border-bottom py-2">
                                <div class="text-muted text-uppercase px-2 border-right color-warning">Ofertas {{$count[$i]}}</div>
                                <div class="text-muted text-uppercase px-2 border-right sector">
                                    <h6>{{ $employer->sector }}</h6>
                                </div>
                                <div class="px-lg-2 px-1"> <span class="bi bi-star"></span> <span
                                        class="bi bi-star"></span> <span class="bi bi-star"></span> <span
                                        class="bi bi-star"></span> <span class="bi bi-star"></span> <a href="#"
                                        class="px-lg-2 px-1 reviews">{3 Reviews}</a>
                                </div>
                            </div>

                            <div class="d-flex align-items-center justify-content-between py-2 px-3">
                                <a href="{{ route('employer.show', $employer->id_user) }}"
                                    class="btn btn-dark text-uppercase"><i class="bi bi-eye"></i>
                                    Ver</a>
                                {{-- <div> <button class="btn btn-dark text-uppercase"> Ver </button> </div> --}}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>

    </div>

    <script>
        var original = $('div[data-role="recipe"]');

        $(document).ready(function() {
            $("#myInput").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $('div[data-role="recipe"]').filter(function() {
                    $(this).toggle($(this).find('h4').text().toLowerCase().indexOf(value) > -1)
                });
            });
        });

        $(document).ready(function() {

            $(".filter-button").click(function() {
                var value = $(this).attr('data-filter').toLowerCase();

                $('div[data-role="recipe"]').filter(function() {
                    $(this).toggle($(this).find('h6').text().toLowerCase().indexOf(value) > -1)
                });

            });

        });
    </script>
@endsection

<style>
    @import url('https://fonts.googleapis.com/css2?family=Lora&family=Roboto+Slab&display=swap');

    * {
        padding: 0;
        margin: 0;
        box-sizing: border-box
    }


    img.product {
        object-fit: contain;
        width: 100%;
        height: 200px;
        display: flex;
        align-items: center;
        justify-content: center
    }

    .rating {
        font-size: 0.7rem
    }

    .fa-star,
    .reviews {
        color: #daa520
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
        box-shadow: 3px 3px 30px rgba(196, 194, 196, 0.72);
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

   
    }

    .form-search {
        position: relative;
        border-radius: 25%;
        color: #0069A3;
        border-color: #0069A3;
    }

    .form-search .bi-search {
        position: absolute;
        top: 20px;
        left: 20px;
        color: #0069A3;
        border-color: #0069A3;

    }

    .form-search span {
        color: #0069A3;

        position: absolute;
        right: 17px;
        top: 13px;
        padding: 2px;
        border-left: 1px solid #0069A3;
        border-color: #0069A3;

    }

    .left-pan {
        color: #0069A3;

        padding-left: 7px
    }

    .left-pan i {
        color: #0069A3;

        padding-left: 10px
    }

    .form-input {
        color: #0069A3;
        height: 55px;
        text-indent: 33px;
        border-radius: 25%;
        border-color: #0069A3;
    }

    .form-input:focus {
        box-shadow: none;
        border: none
    }

</style>
