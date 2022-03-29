@extends('dashboard.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="gallery col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <h1 class="gallery-title">BBBootstrap Restaurant</h1>
            </div>
            <div align="center"> <button class="btn btn-default filter-button" data-filter="all">All</button> <button
                    class="btn btn-default filter-button" data-filter="hdpe">Vegetarian</button> <button
                    class="btn btn-default filter-button" data-filter="sprinkle">Non Vegetarian</button> <button
                    class="btn btn-default filter-button" data-filter="spray">Sides</button> <button
                    class="btn btn-default filter-button" data-filter="irrigation">Meal below 99</button> </div> <br />
            <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter hdpe"><a href=""> <img
                        src=https://res.cloudinary.com/dxfq3iotg/image/upload/v1564033828/Restaurant/img-1.jpg
                        class="img-responsive"></a> </div>
            <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter sprinkle"><a href=""> <img
                        src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1564033829/Restaurant/img-6.jpg"
                        class="img-responsive"></a> </div>
            <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter hdpe"><a href=""> <img
                        src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1564033828/Restaurant/img-3.jpg"
                        class="img-responsive"></a> </div>
            <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter irrigation"><a href=""> <img
                        src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1564033828/Restaurant/img-4.jpg"
                        class="img-responsive"></a> </div>
            <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter spray"><a href=""> <img
                        src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1564033828/Restaurant/img-5.jpg"
                        class="img-responsive"></a> </div>
            <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter irrigation"><a href=""> <img
                        src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1564033829/Restaurant/img-2.jpg"
                        class="img-responsive"></a> </div>
            <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter spray"><a href=""> <img
                        src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1564033829/Restaurant/img-7.jpg"
                        class="img-responsive"></a> </div>
            <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter irrigation"><a href=""> <img
                        src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1564033828/Restaurant/img-3.jpg"
                        class="img-responsive"></a> </div>
            <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter irrigation"><a href=""> <img
                        src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1564033828/Restaurant/img-5.jpg"
                        class="img-responsive"></a> </div>
        </div>
    </div>
@endsection

<style>
    .gallery-title {
        font-size: 36px;
        color: #FFA500;
        text-align: center;
        font-weight: 500;
        margin-bottom: 70px
    }

    .gallery-title:after {
        content: "";
        position: absolute;
        width: 22.5%;
        left: 38.5%;
        height: 45px;
        border-bottom: 1px solid #5e5e5e
    }

    .filter-button {
        font-size: 18px;
        border: 1px solid #FFA500;
        border-radius: 5px;
        text-align: center;
        color: #FFA500;
        margin-bottom: 30px
    }

    .filter-button:hover {
        font-size: 18px;
        border: 1px solid #FFA500;
        border-radius: 5px;
        text-align: center;
        color: #ffffff;
        background-color: #FFA500
    }

    .btn-default:active .filter-button:active {
        background-color: #FFA500;
        color: white
    }

    .port-image {
        width: 100%
    }

    .gallery_product {
        margin-bottom: 30px
    }

    img {
        box-shadow: 1px 1px 5px 1px rgba(0, 0, 0, 0.1);
        border-radius: 5px
    }

</style>

<script>
    $(document).ready(function() {

        $(".filter-button").click(function() {
            var value = $(this).attr('data-filter');


            if (value == "all") {

                $('.filter').show('1000');
            }

            $('div[data-role="recipe"]').filter(function() {
                $(this).toggle($(this).find('h4').text().toLowerCase().indexOf(value) > -1)
            });

        });

    });

    $(document).ready(function() {
        $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $('div[data-role="recipe"]').filter(function() {
                $(this).toggle($(this).find('h4').text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
</script>
