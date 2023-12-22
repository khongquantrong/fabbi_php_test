@extends('layout')
@section('content')

<div class="d-flex justify-content-center">
    <div class="step-buttons">
        <button class="btn btn-light">Step 1</button>
        <button class="btn btn-light">Step 2</button>
        <button class="btn btn-light">Step 3</button>
        <button class="btn btn-success">Review</button>
    </div>
</div>
<div class="container mt-5" style="margin-left: 300px;">
    <div class="row">
        <div class="col-md-6">
            <p>Meal</p>
            <p>Num</p>
            <p>restaurant</p>
            <p>Dishes</p>
        </div>
        <div class="col-md-6">
            <p>{{ $availableMeals }}</p>
            <p>{{ $num_people }}</p>
            <p>{{ $restaurant }}</p>
            <div class="border" style="width:50%">
                @foreach($menus as $name => $sl )
                    <p>{{ $name }} - {{  $sl  }}</p>
                @endforeach
            </div>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-6">
            <button class="btn btn-primary" onclick="goBack()">Previos</button>
        </div>
        <div class="col-md-6">
            <button onclick="alert('Your food has been ordered ')" class="btn btn-success">Submit</button>
        </div>
    </div>
</div>
<script>
    function goBack() {
        window.history.back();
    }
</script>


@endsection
