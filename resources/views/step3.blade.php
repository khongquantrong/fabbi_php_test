
@extends('layout')
@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col">
            <button class="btn btn-light">Step 1</button>
            <button class="btn btn-light">Step 2</button>
            <button class="btn btn-success">Step 3</button>
            <button class="btn btn-light">Review</button>
        </div>
    </div>

    <form method="POST" action="{{ route('step4') }}" class="mt-3">
        @csrf
        <input type="hidden" name="num_people" value="{{ $num_people }}" >
        <input type="hidden" name="availableMeals" value="{{ $availableMeals }}">
        <input type="hidden" name="restaurant" value="{{ $restaurant }}">

        <div id="dishesList" class="mb-3">
            <div class="row g-3">
                <div class="col-md-6 ">
                    <label  style="width: 50%"  for="quantity" class="form-label">Chọn món ăn</label>
                </div>
                <div class="col-md-6">
                    <label for="dishes" class="form-label">Nhập số lượng</label>
                </div>
            </div>
            
            <div class="mon row g-3 mt-2">  
                <div class="col-md-6">
                    <select  style="width:50%;height:50px"   name="dishes[]" id="name" class="form-select" required>
                        @foreach($dishes as $dish)
                            <option value="{{ $dish }}">{{ $dish }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6">
                    <input  style="width: 50%"  type="number" name="quantity[]" id="quantity" class="form-control" min="1" max="10" required>
                </div>
            </div>
        </div>

        <button type="button" onclick="addDish()" class="btn btn-secondary">Thêm món ăn</button> <br>
        <div class="row mt-3">
            <div class="col-md-6">
                <button class="btn btn-primary" onclick="goBack()">Previos</button>
            </div>
            <div class="col-md-6">
                <button type="submit" class="btn btn-danger">Next</button>
            </div>
        </div>
       
    </form>

    <script>
        function addDish() {
            const dishesList = document.getElementById('dishesList');
            const newDiv = document.createElement('div');
            newDiv.classList.add('mon', 'row', 'g-3'); 
            const firstDiv = document.querySelector('.mon');
            newDiv.innerHTML = firstDiv.innerHTML;
            dishesList.appendChild(newDiv);
        }
    </script>

<script>
    function goBack() {
        window.history.back();
    }
</script>
</div>
@endsection
