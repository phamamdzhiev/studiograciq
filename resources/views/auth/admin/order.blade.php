@extends('auth.admin.admin')
@section('content')
    <div class="container">
        @include('auth.admin.includes.session-message')
        <div class="section">
            <a href="{{route('admin.orders')}}" class="btn btn-info  d-inline-block">Назад</a>
            <h4 class="mb-2 mt-4"><i>({{$order[0]->status }})</i></h4>
            <h1 class="section-heading">Поръчка номер <strong>{{ $order[0]->orderId }}</strong></h1>
            <ul class="list-group mb-5">
                <h3>Детайли за клиента</h3>
                <li class="list-group-item"><strong>Име: </strong>{{$order[0]->customerName}}</li>
                <li class="list-group-item"><strong>Мобилен: </strong>{{$order[0]->customerMobile}}</li>
                <li class="list-group-item"><strong>Имейл: </strong>{{$order[0]->customerEmail}}</li>
                <li class="list-group-item">
                    <strong>Дата: </strong>{{\Illuminate\Support\Carbon::parse($order[0]->orderCreatedAt)->format('H:iч.  d-m-Yг.')}}
                </li>
            </ul>
            <ul class="list-group mb-5">
                <h3>Детайли за адрес</h3>

                @if($order[0]->shipping_type !== '1')
                    <li class="list-group-item">
                        <strong>
                            Начин на доставка:
                        </strong>
                        {{$order[0]->shipping_type === '2' ? 'Адрес на клиента' : 'Адрес на Еконт'}}
                    </li>
                    <li class="list-group-item"><strong>Улица: </strong>{{$order[0]->street}}</li>
                    <li class="list-group-item"><strong>Град: </strong>{{$order[0]->city}}</li>
                    <li class="list-group-item"><strong>Регион: </strong>{{$order[0]->region}}</li>
                    <li class="list-group-item"><strong>ПК: </strong>{{$order[0]->postal_code}}</li>
                @else
                    <li class="list-group-item"><strong>Взимане от салона</strong></li>
                @endif
            </ul>
            <div class="table-responsive">
                <h3>Продукти</h3>
                <table class="table table-striped text-center align-middle">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Продукти</th>
                        <th scope="col">Ед. Цена</th>
                        <th scope="col">Количество</th>
                        <th scope="col">Тотал</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php $totalOrderSum = 0 @endphp
                    @foreach($order as $product)
                        @php
                            $totalOrderSum += ((float)$product->productAmount * (float)$product->productPrice)
                        @endphp
                        <tr>
                            <th scope="row">{{$loop->iteration}}</th>
                            <td>{{$product->productName}}</td>
                            <td>{{$product->productPrice}} лева</td>
                            <td>{{$product->productAmount}}</td>
                            <td>{{(float)$product->productAmount * (float)$product->productPrice}} лева</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div>
                    Обща стойност на поръчката: <strong>{{$totalOrderSum}} лева</strong>
                </div>
                <div class="mt-5">
                    <form action="{{route('admin.order.status',$order[0]->orderId)}}" method="POST"
                          style="max-width: 300px">
                        @csrf
                        <label for="order_status" class="fw-bold">Статут на поръчката</label>
                        <select class="form-control" name="order_status" id="order_status">
                            <option {{ $order[0]->status === 'Обработва се' ? 'selected' : '' }} value="Обработва се">
                                Обработва се
                            </option>
                            <option {{ $order[0]->status === 'Изпратена' ? 'selected' : '' }} value="Изпратена">
                                Изпратена
                            </option>
                            <option {{ $order[0]->status === 'Отказана' ? 'selected' : '' }} value="Отказана">Отказана
                            </option>
                            <option {{ $order[0]->status === 'Завършена' ? 'selected' : '' }} value="Завършена">
                                Завършена
                            </option>
                        </select>
                        <button class="btn btn-success mt-3">Запиши</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
