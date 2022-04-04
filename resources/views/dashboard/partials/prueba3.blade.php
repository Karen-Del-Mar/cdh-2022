@extends('dashboard.master')

@section('content')

    <div class="container">
        <div class="card">
            <div class="info"> <span>Edit form</span> 
                <button id="savebutton">edit</button> </div>
            <div class="forms">
                <div class="inputs"> <span>First Name</span> 
                    <input type="text" readonly value="John"> 
                </div>
                <div class="inputs"> <span>Last Name</span> 
                    <input type="text" readonly value="Doe"> 
                </div>
                <div class="inputs"> <span>Email</span> 
                    <input type="text" readonly value="john.doe12@gmail.com">
                </div>
                <div class="inputs"> <span>UserName</span> 
                    <input type="text" readonly value="johndoe12"> 
                </div>
                <div class="inputs"> <span>Country</span> 
                    <input type="text" readonly value="United States"> 
                </div>
            </div>
        </div>
    </div>

@endsection



<script>
   
</script>
