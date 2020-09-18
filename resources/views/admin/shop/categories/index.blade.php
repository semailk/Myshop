@extends('layouts.admin')
@section('content')
    <table style="color: white" class="table table-dark">
        <thead>
        <tr>
            <th scope="col">PARENT_ID</th>
            <th scope="col">NAME</th>
            <th scope="col">SLUG</th>
            <th scope="col">DELETE</th>
            <th scope="col">EDIT</th>
        </tr>
        </thead>
        @foreach($categories as $category)


            <tbody>
            <tr>
                <th scope="row">{{$category->id}}</th>
                <td>{{$category->name}}</td>
                <td>{{$category->slug}}</td>

{{--                        <form action="{{ route('categories.destroy', $category->id) }}" method="post">--}}
{{--                            @csrf--}}
{{--                            <input type="hidden" name="_method" value="DELETE">--}}
{{--                            <button class="btn btn-danger" type="submit"><i class="fa fa-trash"> </button>--}}
{{--                        </form>--}}

                   <td> <a href="/admin/categories/{{$category->id}}/destroy">
                        <img style="float: left" src="../images/delete.png" width="40" height="40">
                    </a>
                   </td>
                <td>
                    <a href="{{route('categories.edit',$category->id)}}">
                        <img src="../../images/edit.png" width="40" height="40">
                    </a>
                </td>
            </tr>
            </tbody>

        @endforeach
    </table>
@endsection
