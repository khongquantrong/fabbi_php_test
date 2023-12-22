@extends('layout')
@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col">
            <button class="btn btn-light">Step 1</button>
            <button class="btn btn-success">Step 2</button>
            <button class="btn btn-light">Step 3</button>
            <button class="btn btn-secondary">Review</button>
        </div>
    </div>

    <form method="POST" action="{{ route('step3') }}" class="mt-3">
        @csrf
  
        <div class="form-group">
            <label for="restaurant">Chọn Nhà Hàng:</label>
            <select style="width: 50%"  class="form-control" name="restaurant" id="restaurant" required>
                @foreach($restaurants as $restaurant)
                    <option value="{{ $restaurant }}">{{ $restaurant }}</option>
                @endforeach
            </select>
        </div>

        <input type="hidden" name="num_people" value="{{ $num_people }}" >
        <input type="hidden" name="availableMeals" value="{{ $availableMeals }}">

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
        function goBack() {
            window.history.back();
        }
    </script>
</div>
@endsection
