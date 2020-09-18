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
        @foreach($products as $product)


            <tbody>
            <tr>
                <th scope="row">{{$product->category->id}}</th>
                <td>{{$product->title}}</td>
                <td>{{$product->description}}</td>

{{--                                        <form action="{{ route('categories.destroy', $product->id) }}" method="post">--}}
{{--                                            @csrf--}}
{{--                                            <input type="hidden" name="_method" value="DELETE">--}}
{{--                                            <button class="btn btn-danger" type="submit"><i class="fa fa-trash"> </button>--}}
{{--                                        </form>--}}

                <td> <a href="/admin/categories/{{$product->id}}/destroy">
                        <img style="float: left" src="../images/delete.png" width="40" height="40">
                    </a>
                </td>
                <td>
                    <a href="{{route('categories.edit',$product->id)}}">
                        <img src="../../images/edit.png" width="40" height="40">
                    </a>
                </td>
            </tr>
            </tbody>

        @endforeach

    </table>
<div style="margin-left: auto; margin-right: auto; margin-top: 30px;" class="paginate">
{{ $products->links() }}
</div>
@endsection

