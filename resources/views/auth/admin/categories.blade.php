@extends('auth.admin.admin')

@section('content')
    <div class="container">
        <div class="section">
            <h1 class="section-heading">Категории <small>({{count($categories)}})</small></h1>
            <div class="table-responsive">
                @if (count($categories) > 0)
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Категория</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $category)
                            <tr>
                                <th scope="row">{{$loop->iteration}}</th>
                                <td>{{$category->name}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @else
                    <h2 class="text-center">Няма добавени категории!</h2>
                @endif
            </div>
        </div>
        <hr/>
        <div class="section">
            <h1 class="section-heading">Добавяне на нова категория</h1>
            <form id="add-category-form" action="{{route('post.admin.categories')}}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Име на категорията</label>
                    <input type="text" class="form-control" name="name" id="name" required>
                </div>
                <button type="submit" class="btn btn-primary d-block">Добави</button>
            </form>
        </div>
    </div>
@endsection
