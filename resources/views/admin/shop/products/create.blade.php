@extends('layouts.admin')
@section('content')
    <h1>Добавления товара</h1>
    <form method="post" action="{{route('products.store')}}">
        @csrf

        <div class="col-md-6 mb-3">
            <label for="validationServer03">Название</label>
            <input name="title" type="text" class="form-control @error('title')is-invalid @enderror"
                   id="validationServer03" aria-describedby="validationServer03Feedback">
            <div id="validationServer03Feedback" class=" ">

                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @error('title')
                <h5 style="color: red;">{{ $message }}</h5>
                @enderror

            </div>
        </div>
        <div class="col-md-6 mb-3">
            <label for="validationServer02">Описание</label>
            <input name="description" type="text" class="form-control @error('description')is-invalid @enderror"
                   id="validationServer02" >
            <div class="is-invalid">
                @error('description')
                <h5 style="color: red;">{{ $message }}</h5>
                @enderror
            </div>
        </div>
        <select name="category_id" style="margin-top: 30px" class="custom-select">
            <option value="0">Без категории</option>
            @foreach($categories as $category)
                <option value="{{$category->id}}">{{ $category->name }}</option>
            @endforeach
        </select>
        <button class="btn btn-primary" type="submit">Submit form</button>


    </form>

@endsection
