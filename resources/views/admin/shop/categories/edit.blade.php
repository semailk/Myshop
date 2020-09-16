@extends('layouts.admin')
@section('content')
    <h1>Редиктировать данные</h1>
<form method="post" action="{{route('categories.update',$categories->id)}}">
    @csrf
    <input class="form-control" name="name" value="{{$categories->name}}" type="text">
    <input class="form-control" name="slug" value="{{$categories->slug}}" type="text"><br>
    <button class="btn btn-outline-warning">Обновить</button>
</form>
@endsection
