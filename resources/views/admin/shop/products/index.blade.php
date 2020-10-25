@extends('layouts.admin')
@section('content')

    <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Продукты</a>
            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Изображение</a>
            <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Загрузить изображение</a>
        </div>
    </nav>
    <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
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
            <div style="margin-left: 25%;margin-top: 30px;" class="paginate">
                {{ $products->links() }}
            </div>
        </div>
        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
            @foreach($img as $value)
                <img src="{{asset('/storage/'.$value->src)}}" width="200" height="200">
            @endforeach
        </div>

        <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">

        </div>

    </div>






@endsection

