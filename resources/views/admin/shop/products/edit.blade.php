@extends('layouts.admin')
@section('content')
    <h1>Редиктировать данные</h1>
    <form method="post" action="{{route('products.update',$product->id)}}">
        @csrf
        <div class="col-md-6 mb-3">
            <label for="validationServer03">Name</label>
            <input name="title" type="text" class="form-control @error('title')is-invalid @enderror"
                   id="validationServer03" aria-describedby="validationServer03Feedback" value="{{ old('title') ?? $product->title }}">
            <div id="validationServer03Feedback" class=" ">
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>

                @endif
                @error('error')
                <div class="alert alert-danger">
                    {{$message}}
                </div>
                @enderror
            </div>
        </div>
        <div class="col-md-6 mb-3">
            <label for="validationServer02">Slug</label>
            <input name="description" type="text" class="form-control @error('description')is-invalid @enderror"
                   id="validationServer02" value="{{ old('description') ?? $product->description }}">
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
        <button class="btn btn-outline-warning" type="submit">Submit form</button>

    </form>
@endsection
