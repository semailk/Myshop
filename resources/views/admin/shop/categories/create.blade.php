@extends('layouts.admin')
@section('content')
    <h1>Создание категории</h1>
    <form action="{{route('categories.store')}}" method="post">
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1">Category Name</label>
            <input name="name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Slug</label>
            <input name="slug" type="text" class="form-control" id="exampleInputPassword1">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
