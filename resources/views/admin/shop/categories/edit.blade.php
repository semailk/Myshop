@extends('layouts.admin')
@section('content')
    <h1>Редиктировать данные</h1>
    <form method="post" action="{{route('categories.update',$category->id)}}">
        @csrf
        <div class="col-md-6 mb-3">
            <label for="validationServer03">Name</label>
            <input name="name" type="text" class="form-control @error('name')is-invalid @enderror"
                   id="validationServer03" aria-describedby="validationServer03Feedback" value="{{ old('name') ?? $category->name }}">
            <div id="validationServer03Feedback" class=" ">
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>

                @endif
                @error('error')
                <div class="alert alert-danger">
                    <h1>{{$message}}</h1>
                </div>
                @enderror
            </div>
        </div>
        <div class="col-md-6 mb-3">
            <label for="validationServer02">Slug</label>
            <input name="slug" type="text" class="form-control @error('slug')is-invalid @enderror"
                   id="validationServer02" value="{{ old('slug') ?? $category->slug }}">
            <div class="is-invalid">
                @error('slug')
                <h5 style="color: red;">{{ $message }}</h5>
                @enderror
            </div>
        </div>
        <select name="parent_id" style="margin: 20px 0 20px 0" class="custom-select">
            <option value="0">Без категории</option>
            @foreach($categories as $category)
                <option value="{{$category->id}}">{{ $category->name }}</option>
            @endforeach
        </select>
        <button class="btn btn-outline-warning" type="submit">Submit form</button>

    </form>
@endsection
