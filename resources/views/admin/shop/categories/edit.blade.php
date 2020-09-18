@extends('layouts.admin')
@section('content')
    <h1>Редиктировать данные</h1>
<form method="post" action="{{route('categories.update',$categories->id)}}">
    @csrf
    <div class="col-md-6 mb-3">
        <label for="validationServer03">Name</label>
        <input name="name" type="text" class="form-control @error('name')is-invalid @enderror"
               id="validationServer03" aria-describedby="validationServer03Feedback" value="{{ $categories->name }}" >
        <div id="validationServer03Feedback" class=" ">
            @error('name')
            <h5 style="color: red;">{{ $message }}</h5>
            @enderror
        </div>
    </div>
    <div class="col-md-6 mb-3">
        <label for="validationServer02">Slug</label>
        <input name="slug" type="text" class="form-control @error('slug')is-invalid @enderror"
               id="validationServer02" value="{{ $categories->slug }}" >
        <div class="is-invalid">
            @error('slug')
            <h5 style="color: red;">{{ $message }}</h5>
            @enderror
        </div>
    </div>
    <button class="btn btn-outline-warning" type="submit">Submit form</button>

</form>
@endsection
