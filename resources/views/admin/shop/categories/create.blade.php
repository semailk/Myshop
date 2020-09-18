@extends('layouts.admin')
@section('content')


    <form method="post" action="{{route('categories.store')}}">
        @csrf

        <div class="col-md-6 mb-3">
            <label for="validationServer03">Name</label>
            <input name="name" type="text" class="form-control @error('name')is-invalid @enderror"
                   id="validationServer03" aria-describedby="validationServer03Feedback">
            <div id="validationServer03Feedback" class=" ">
                @error('name')
                <h5 style="color: red;">{{ $message }}</h5>
                @enderror
            </div>
        </div>
        <div class="col-md-6 mb-3">
            <label for="validationServer02">Slug</label>
            <input name="slug" type="text" class="form-control @error('slug')is-invalid @enderror"
                   id="validationServer02" >
            <div class="is-invalid">
                @error('slug')
                <h5 style="color: red;">{{ $message }}</h5>
                @enderror
            </div>
        </div>
        <button class="btn btn-primary" type="submit">Submit form</button>
    </form>
@endsection
