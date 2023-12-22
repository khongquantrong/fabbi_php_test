@extends('layout')
@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col">
            <button class="btn btn-success">Step 1</button>
            <button class="btn btn-light">Step 2</button>
            <button class="btn btn-light">Step 3</button>
            <button class="btn btn-secondary">Review</button>
        </div>
    </div>

    <form method="POST" action="{{ route('step2') }}" class="mt-3">
        @csrf

        <div class="form-group">
            <label for="availableMeals">please slect a meal</label>
            <select style="width: 50%" class="form-control form-control-sm" name="availableMeals" id="availableMeals" required>
                @foreach ($meals as $meal => $mealName)
                <option value="{{$mealName}}">{{ $mealName }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="num_people">please Enter Number of people:</label>
            <input style="width: 50%" class="form-control form-control-sm" type="number" name="num_people" min="1" max="10" required>
        </div>

        <button type="submit" class="btn btn-danger">Nex</button>
    </form>
</div>
@endsection
