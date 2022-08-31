@extends('auth.admin.admin')

@section('content')
    <div class="container">
        @if (\Session::has('msg'))
            <div class="alert">
                <ul>
                    <li>{!! \Session::get('msg') !!}</li>
                </ul>
            </div>
        @endif
        <div class="section">
            <h1 class="section-heading">График</h1>
            <h4 class="mb-4"><i>Днес е: {{\Illuminate\Support\Carbon::today()->format('d.m.Y')}}г.</i></h4>
            <div>
                <form action="{{route('admin.appointments')}}" method="GET">
                    @csrf
                    <label class="fw-bold" for="filter">Филтър</label>
                    <input type="date" id="filter" name="filter" required/>
                    <button type="submit" class="btn btn-info">Търси</button>
                    <a href="{{route('admin.appointments')}}" class="btn btn-dark text-white">Изчисти филтър</a>
                </form>
            </div>
            <div class="table-responsive">
                @if (count($appointments) > 0)
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Дата</th>
                            <th scope="col">Час от</th>
                            <th scope="col">Час до</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($appointments as $appointment)
                            <tr>
                                <th scope="row">{{$loop->iteration}}</th>
                                <td>
                                    {{\Illuminate\Support\Carbon::parse($appointment->day)->format('d.m.Y')}}
                                    {!!  \Illuminate\Support\Carbon::parse($appointment->day)->isToday() ? '<i>(днес)<i>' : ''!!}
                                    {!!  \Illuminate\Support\Carbon::parse($appointment->day)->isTomorrow() ? '<i>(утре)<i>' : ''!!}
                                </td>
                                <td> {{$appointment->from_h}}ч.</td>
                                <td>{{$appointment->until_h}}ч.</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @else
                    <div class="mb-3 mt-5">
                        <h4 class="fw-bold">Няма записани клиенти за тази дата</h4>
                    </div>
                @endif
            </div>
        </div>
        <hr/>
        <div class="section">
            <h1 class="section-heading">Запазване на час</h1>
            <form id="add-category-form" action="{{route('post.admin.appointments')}}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="client" class="form-label">Клиент</label>
                    <select class="form-control" name="client" id="client" required>
                        <option value="1">Анонимен</option>
                        <option value="2">Петър Хамамджиев</option>
                        <option value="3">Ангел Трампела</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="service" class="form-label">Услуга</label>
                    <select class="form-control" name="service" id="service" required>
                        <option value="1">Подстрижка</option>
                        <option value="2">Балеаж</option>
                        <option value="3">Официална прическа</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="date" class="form-label">Дата</label>
                    <input type="date" class="form-control" name="date" id="date" required>
                </div>
                <div class="mb-3">
                    <label for="hours_from" class="form-label">Час от</label>
                    <select class="form-control" name="hours_from" id="hours_from" required>
                        <option value="0" selected>Избери час</option>
                        <option value="11.00">11:00ч.</option>
                        <option value="11.30">11:30ч.</option>
                        <option value="12.00">12:00ч.</option>
                        <option value="12.30">12:30ч.</option>
                        <option value="13.00">13:00ч.</option>
                        <option value="13.30">13:30ч.</option>
                        <option value="14.00">14:00ч.</option>
                        <option value="14.30">14:30ч.</option>
                        <option value="15.00">15:00ч.</option>
                        <option value="15.30">15:30ч.</option>
                        <option value="16.00">16:00ч.</option>
                        <option value="16.30">16:30ч.</option>
                        <option value="17.00">17:00ч.</option>
                        <option value="17.30">17:30ч.</option>
                        <option value="18.00">18:00ч.</option>
                        <option value="18.30">18:30ч.</option>
                        <option value="19.00">19:00ч.</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="hours_to" class="form-label">Час до</label>
                    <select class="form-control" name="hours_to" id="hours_to" required disabled>
                        <option value="0" selected>Избери час</option>
                        <option value="11.00">11:00ч.</option>
                        <option value="11.30">11:30ч.</option>
                        <option value="12.00">12:00ч.</option>
                        <option value="12.30">12:30ч.</option>
                        <option value="13.00">13:00ч.</option>
                        <option value="13.30">13:30ч.</option>
                        <option value="14.00">14:00ч.</option>
                        <option value="14.30">14:30ч.</option>
                        <option value="15.00">15:00ч.</option>
                        <option value="15.30">15:30ч.</option>
                        <option value="16.00">16:00ч.</option>
                        <option value="16.30">16:30ч.</option>
                        <option value="17.00">17:00ч.</option>
                        <option value="17.30">17:30ч.</option>
                        <option value="18.00">18:00ч.</option>
                        <option value="18.30">18:30ч.</option>
                        <option value="19.00">19:00ч.</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary d-block">Запиши час</button>
            </form>
        </div>
    </div>

    <script>
        const hourFrom = document.getElementById('hours_from');
        const hourTo = document.getElementById('hours_to');

        const hoursFromChangeHandler = (e) => {
            const targetValueHoursFrom = Number(e.target.value);

            hourTo.removeAttribute('disabled');

            Object.values(hourTo).map(el => {
                const targetValueHoursTo = Number(el.value);
                el.removeAttribute('disabled');
                if (targetValueHoursTo < (targetValueHoursFrom + 0.1)) {
                    el.setAttribute('disabled', true);
                }
            })
        }
        hourFrom.addEventListener('change', hoursFromChangeHandler);
    </script>
@endsection
