@extends('layouts.admin')
@section('content')


    <form method="post" action="{{route('categories.store')}}">
        @csrf

            <div class="col-md-6 mb-3">
                <label for="validationServer03">Name</label>
                <input name="name" type="text" class="form-control is-invalid" id="validationServer03" aria-describedby="validationServer03Feedback" required>
                <div id="validationServer03Feedback" class="invalid-feedback">
                   <?php  $test = ''; ?>
                    @if ($errors->any())

                                @foreach ($errors->all() as $error)
                         <?php $test = $error ;
                         ?>
                                @endforeach
                    @endif
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <label for="validationServer02">Slug</label>
                <input name="slug" type="text" class="form-control is-valid" id="validationServer02" value="Otto" required>
                <div class="valid-feedback">
                </div>
            </div>
        <button class="btn btn-primary" type="submit">Submit form</button>
    </form>
@endsection
