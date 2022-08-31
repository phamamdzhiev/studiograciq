@extends('auth.admin.admin')

@section('content')
    <div class="container">
        @include('auth.admin.includes.session-message')
        <div class="section">
            <h1 class="section-heading">Клиенти <small>({{count($customers)}})</small></h1>
            <div class="table-responsive">
                @if (count($customers) > 0)
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Клиент</th>
                            <th scope="col">Мобилен</th>
                            <th scope="col">Имейл</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($customers as $customer)
                            <tr>
                                <th scope="row">{{$loop->iteration}}</th>
                                <td>{{$customer->name}}</td>
                                <td>{{$customer->mobile}}</td>
                                <td>{{$customer->email}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @else
                    <h2 class="text-center">Няма добавени клиенти!</h2>
                @endif
            </div>
        </div>
        <hr/>
        <div class="section">
            <h1 class="section-heading">Добавяне на нов клиент</h1>
            <form id="add-category-form" action="{{route('post.admin.customers')}}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Име на клиента</label>
                    <input type="text" class="form-control" name="name" id="name" required>
                </div>
                <div class="mb-3">
                    <label for="mobile" class="form-label">Мобилен (незадължител)</label>
                    <input type="text" class="form-control" name="mobile" id="mobile">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Имейл (незадължител)</label>
                    <input type="text" class="form-control" name="email" id="email">
                </div>
                <button type="submit" class="btn btn-primary d-block">Добави</button>
            </form>
        </div>
    </div>
@endsection
