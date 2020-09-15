@extends('layouts.admin')
@section('content')
    <table style="color: white" class="table table-dark">
        <thead>
        <tr>
            <th scope="col">SLUG</th>
            <th scope="col">NAME</th>
            <th scope="col">PARENT_ID</th>
        </tr>
        </thead>
        @foreach($categories as $category)


            <tbody>
            <tr>
                <th scope="row">{{$category->id}}</th>
                <td>{{$category->name}}</td>
                <td>{{$category->slug}}
                    <a href="{{ route('categories.destroy', $id) }}">
                        <img style="float: right" src="../../images/delete.png" width="40" height="40">
                    </a>
                    <a href="#">
                        <img style="float: right" src="../../images/edit.png" width="40" height="40">
                    </a>
                </td>

            </tr>
            </tbody>

        @endforeach
    </table>
@endsection
