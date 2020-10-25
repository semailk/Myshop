@extends('layouts.admin')
@section('content')


<nav>
    <div class="nav nav-tabs" id="nav-tab" role="tablist">
        <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Home</a>
        <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Profile</a>
        <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Contact</a>
    </div>
</nav>
<div class="tab-content" id="nav-tabContent">
    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
        <h1>Редиктировать данные</h1>
        <form method="post" action="{{route('products.update',$product->id)}}">
            {{csrf_field()}}
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
            <input name="img" type="file" class="form-control-file">
            <select name="category_id" style="margin-top: 30px" class="custom-select">
                <option value="0">Без категории</option>
                @foreach($categories as $category)
                    <option value="{{$category->id}}">{{ $category->name }}</option>
                @endforeach
            </select>
            <button class="btn btn-outline-warning" type="submit">Submit form</button>
        </form>
    </div>
    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">

    </div>
    <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">...</div>
</div>
@endsection
