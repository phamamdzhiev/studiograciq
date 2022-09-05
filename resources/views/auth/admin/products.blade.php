@extends('auth.admin.admin')

@section('content')
    <div class="container">
        @include('auth.admin.includes.session-message')
        <div class="section">
            <h1 class="section-heading">Продукти <small>({{count($products)}})</small></h1>
            <div class="table-responsive">
                @if (count($products) > 0)
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Продукт</th>
                            <th scope="col">Цена</th>
                            <th scope="col">Снимка</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $product)
                            <tr>
                                <th scope="row">{{$loop->iteration}}</th>
                                <td>{{$product->name}}</td>
                                <td>{{$product->price}} лева</td>
                                <td>{{$product->image_big}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @else
                    <h2 class="text-center">Няма добавени продукти!</h2>
                @endif
            </div>
        </div>
        <hr/>
        <div class="section">
            <h1 class="section-heading">Добавяне на нов продукт</h1>
            <form id="add-product-form" action="{{route('post.admin.products')}}" method="POST" enctype='multipart/form-data'>
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Име на продукта</label>
                    <input type="text" class="form-control" name="name" id="name" required>
                </div>
                <div class="mb-3">
                    <label for="desc" class="form-label">Описание</label>
                    <textarea class="form-control" name="desc" id="desc" cols="7" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">Цена (лева)</label>
                    <input type="text" class="form-control" name="price" id="price" required>
                </div>
                <div class="mb-3">
                    <label for="brand" class="form-label">Марка</label>
                    <select class="form-control" name="brand" id="brand" required>
                        <option selected>Избери марка</option>
                        <option value="Alfaparf">Alfaparf</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="category" class="form-label">Категория</label>
                    <select class="form-control" name="category_id" id="category" required>
                        <option selected>Избери категория</option>
                        @foreach($categories as $category)
                            <option class="text-capitalize" value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="image_big" class="form-label">Голяма снимка</label>
                    <input type="file" class="form-control" name="image_big" id="image_big" required>
                </div>
                <div class="mb-3">
                    <label for="catalogue_number" class="form-label">Каталожен номер</label>
                    <input type="text" class="form-control" name="catalogue_number" id="catalogue_number" required>
                </div>
                <button type="submit" class="btn btn-primary d-block">Добави</button>
            </form>
        </div>
    </div>
@endsection
