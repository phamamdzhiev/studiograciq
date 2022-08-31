@extends('auth.admin.admin')

@section('content')
    <div class="container">
        @include('auth.admin.includes.session-message')
        <div class="section">
            <h1 class="section-heading">Услуги <small>({{count($services)}})</small></h1>
            <div class="table-responsive">
                @if (count($services) > 0)
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Услуга</th>
                            <th scope="col">Цена</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($services as $service)
                            <tr>
                                <th scope="row">{{$loop->iteration}}</th>
                                <td>{{$service->name}}</td>
                                <td>{{$service->price}} лева</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @else
                    <h2 class="text-center">Няма добавени услуги!</h2>
                @endif
            </div>
        </div>
        <hr/>
        <div class="section">
            <h1 class="section-heading">Добавяне на нова услуга</h1>
            <form id="add-category-form" action="{{route('post.admin.services')}}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Име на услугата</label>
                    <input type="text" class="form-control" name="name" id="name">
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">Цена (лева)</label>
                    <input type="text" class="form-control" name="price" id="price">
                </div>
                <button type="submit" class="btn btn-primary d-block">Добави</button>
            </form>
        </div>
    </div>
@endsection
