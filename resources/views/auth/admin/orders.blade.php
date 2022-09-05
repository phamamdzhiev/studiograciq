@extends('auth.admin.admin')
{{--{{dd($orders)}}--}}
@section('content')
    <div class="container">
        <div class="section">
            <h1 class="section-heading">Поръчки <small>({{count($orders)}})</small></h1>
            <div class="table-responsive">
                @if (count($orders) > 0)
                    <table class="table table-striped text-center align-middle">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Клиент</th>
                            <th scope="col">Мобилен</th>
                            <th scope="col">Имейл</th>
                            <th scope="col">Статус</th>
                            <th scope="col">Дата</th>
                            <th scope="col"></th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($orders as $order)
                            <tr>
                                <th scope="row">{{$loop->iteration}}</th>
                                <td>{{$order->name}}</td>
                                <td>{{$order->mobile}}</td>
                                <td>{{$order->email}}</td>
                                <td>
                                    <div
                                        @if($order->status === 'Обработва се')
                                        class="order_status processing"
                                        @elseif($order->status === 'Изпратена')
                                        class="order_status sent"
                                        @elseif($order->status === 'Отказана')
                                        class="order_status rejected"
                                        @elseif($order->status === 'Завършена')
                                        class="order_status done"
                                        @else
                                        class="order_status"
                                        @endif
                                    >
                                        {{$order->status}}
                                    </div>
                                </td>
                                <td>{{\Carbon\Carbon::parse($order->created_at)->format('H:i:s d-m-Y')}}</td>
                                <td>
                                    <a href="{{route('admin.order', $order->orderId)}}"
                                       class="btn btn-primary text-white d-inline-block">Виж детайли</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @else
                    <h2 class="text-center">Няма направени поръчки!</h2>
                @endif
            </div>
        </div>
    </div>
@endsection
