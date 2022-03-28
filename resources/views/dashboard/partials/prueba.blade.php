@extends('dashboard.master')
@section('content')
   
    <div class="card">
        <div class="row">
            <div class="col-2"> <img src="https://i.imgur.com/xELPaag.jpg" width="70" class="rounded-circle mt-2">
            </div>

            <div class="col-10">

                <div class="comment-box ml-2">
                    <h4>Add a comment</h4>
                    <div class="rating">
                        <input type="radio" name="rating" value="5" id="5"><label for="5">☆</label>
                        <input type="radio" name="rating" value="4" id="4"><label for="4">☆</label>
                        <input type="radio" name="rating" value="3" id="3"><label for="3">☆</label>
                        <input type="radio" name="rating" value="2" id="2"><label for="2">☆</label>
                        <input type="radio" name="rating" value="1" id="1"><label for="1">☆</label>
                    </div>

                    <div class="comment-area">
                        <textarea class="form-control" placeholder="what is your view?" rows="4"></textarea>
                    </div>

                    <div class="comment-btns mt-2">
                        <div class="row">

                            <div class="col-6">
                                <div class="pull-left"> <button class="btn btn-success btn-sm">Cancel</button> </div>
                            </div>

                            <div class="col-6">
                                <div class="pull-right"> <button class="btn btn-success send btn-sm">Send <i
                                            class="fa fa-long-arrow-right ml-1"></i></button> </div>
                            </div>

                        </div>
                    </div>

                </div>

            </div>

        </div>
    </div>
@endsection

<style>
    .card {
        position: relative;
        display: flex;
        flex-direction: column;
        min-width: 0;
        padding: 20px;
        width: 450px;
        word-wrap: break-word;
        background-color: #fff;
        background-clip: border-box;
        border-radius: 6px;
        -moz-box-shadow: 0px 0px 5px 0px rgba(212, 182, 212, 1)
    }

    .comment-box {
        padding: 5px
    }

    .comment-area textarea {
        resize: none;
        border: 1px solid #ad9f9f
    }

    .form-control:focus {
        color: #495057;
        background-color: #fff;
        border-color: #ffffff;
        outline: 0;
        box-shadow: 0 0 0 1px #0069A3 !important
    }

    .send {
        color: #fff;
        background-color: #F4D73B;
        border-color: #F4D73B
    }

    .send:hover {
        color: #fff;
        background-color: #5702f5;
        border-color: #0226f5
    }

    .rating {
        display: flex;
        margin-top: -10px;
        flex-direction: row-reverse;
        margin-left: -4px;
        float: left
    }

    .rating>input {
        display: none
    }

    .rating>label {
        position: relative;
        width: 19px;
        font-size: 25px;
        color: #F4D73B;
        cursor: pointer
    }

    .rating>label::before {
        content: "\2605";
        position: absolute;
        opacity: 0
    }

    .rating>label:hover:before,
    .rating>label:hover~label:before {
        opacity: 1 !important
    }

    .rating>input:checked~label:before {
        opacity: 1
    }

    .rating:hover>input:checked~label:before {
        opacity: 0.4
    }

</style>
