@extends('auth.admin.admin')

@section('content')
    <style>
        tbody td > div.no {
            background-color: #dc3545;
            color: white;
            font-weight: bold;
        }
    </style>
    <div class="container">
        @include('auth.admin.includes.session-message')
        <div class="section">
            <div class="accordion" id="accordionExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            <span style="font-size: 18px">График</span>
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse show collapse px-5 py-3"
                         aria-labelledby="headingOne"
                         data-bs-parent="#accordionExample">
                        <h4 class="mb-4"><i>В момента е: {{ date('d-m-Y ; H:i') }}ч.</i></h4>
                        <div>
                            <form action="{{route('admin.appointments')}}" method="GET">
                                @csrf
                                <label class="fw-bold" for="filter">Филтър</label>
                                <input type="date" value="{{ date('Y-m-d')}}" id="filter" name="filter" required/>
                                <button type="submit" class="btn btn-info">Търси</button>
                                <a href="{{route('admin.appointments')}}" class="btn btn-dark text-white">Изчисти
                                    филтър</a>
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
                                        <th scope="col">Клиент</th>
                                        <th scope="col">Услуга</th>
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
                                            <td>{{$appointment->cName}}</td>
                                            <td>{{$appointment->sName}}</td>
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
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            <span style="font-size: 18px">Запази час</span>
                        </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse px-5 py-3" aria-labelledby="headingTwo"
                         data-bs-parent="#accordionExample">
                        <form id="add-category-form" action="{{route('post.admin.appointments')}}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="customer" class="form-label">Клиент</label>
                                <select class="form-control" name="customer" id="customer" required>
                                    @foreach($customers as $customer)
                                        <option value="{{$customer->id}}">{{$customer->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="service" class="form-label">Услуга</label>
                                <select class="form-control" name="service" id="service" required>
                                    @foreach($services as $service)
                                        <option value="{{$service->id}}">{{$service->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="date" class="form-label">Дата</label>
                                <input type="date" value="{{ date('Y-m-d')}}" class="form-control" name="date" id="date"
                                       required>
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
            </div>
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
