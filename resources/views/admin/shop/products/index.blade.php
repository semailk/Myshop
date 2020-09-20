@extends('layouts.admin')
@section('content')
    <table style="color: white" class="table table-dark">
        <thead>
        <tr>
            <th scope="col">CATEGORY_ID</th>
            <th scope="col">NAME</th>
            <th scope="col">DESCRIPTION</th>
            <th scope="col">DELETE</th>
            <th scope="col">EDIT</th>
        </tr>
        </thead>
        @foreach($products as $product)


            <tbody>
            <tr>
                <th scope="row">{{$product->category_id}}</th>
                <td>{{$product->title}}</td>
                <td>{{$product->description}}</td>


                <td> <a href="/admin/products/{{$product->id}}/destroy">
                        <img style="float: left" src="../images/delete.png" width="40" height="40">
                    </a>
                </td>
                <td>
                    <a href="{{route('products.edit',$product->id)}}">
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

