@extends('auth.admin.admin')

@section('content')
    <div class="container">
        <div class="section">
            <h1 class="section-heading">Запазване на час</h1>
            <form id="add-category-form" action="/" method="POST">
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
                        <option value="9">09:00ч.</option>
                        <option value="9.30">09:30ч.</option>
                        <option value="10">10:00ч.</option>
                        <option value="10.30">10:30ч.</option>
                        <option value="11">11:00ч.</option>
                        {{--                        <option value="3">11:30ч.</option>--}}
                        {{--                        <option value="3">12:00ч.</option>--}}
                        {{--                        <option value="3">12:30ч.</option>--}}
                        {{--                        <option value="3">13:00ч.</option>--}}
                        {{--                        <option value="3">13:30ч.</option>--}}
                        {{--                        <option value="3">14:00ч.</option>--}}
                        {{--                        <option value="3">14:30ч.</option>--}}
                        {{--                        <option value="3">15:00ч.</option>--}}
                        {{--                        <option value="3">15:30ч.</option>--}}
                        {{--                        <option value="3">16:00ч.</option>--}}
                        {{--                        <option value="3">16:30ч.</option>--}}
                        {{--                        <option value="3">17:00ч.</option>--}}
                        {{--                        <option value="3">17:30ч.</option>--}}
                        {{--                        <option value="3">18:00ч.</option>--}}
                        {{--                        <option value="3">18:30ч.</option>--}}
                        {{--                        <option value="3">19:00ч.</option>--}}
                    </select>
                </div>
                <div class="mb-3">
                    <label for="hours_to" class="form-label">Час до</label>
                    <select class="form-control" name="hours_to" id="hours_to" required disabled>
                        <option value="0" selected>Избери час</option>
                        <option value="9">09:00ч.</option>
                        <option value="9.30">09:30ч.</option>
                        <option value="10">10:00ч.</option>
                        <option value="10.30">10:30ч.</option>
                        <option value="11">11:00ч.</option>
                        {{--                        <option value="3">11:30ч.</option>--}}
                        {{--                        <option value="3">12:00ч.</option>--}}
                        {{--                        <option value="3">12:30ч.</option>--}}
                        {{--                        <option value="3">13:00ч.</option>--}}
                        {{--                        <option value="3">13:30ч.</option>--}}
                        {{--                        <option value="3">14:00ч.</option>--}}
                        {{--                        <option value="3">14:30ч.</option>--}}
                        {{--                        <option value="3">15:00ч.</option>--}}
                        {{--                        <option value="3">15:30ч.</option>--}}
                        {{--                        <option value="3">16:00ч.</option>--}}
                        {{--                        <option value="3">16:30ч.</option>--}}
                        {{--                        <option value="3">17:00ч.</option>--}}
                        {{--                        <option value="3">17:30ч.</option>--}}
                        {{--                        <option value="3">18:00ч.</option>--}}
                        {{--                        <option value="3">18:30ч.</option>--}}
                        {{--                        <option value="3">19:00ч.</option>--}}
                    </select>
                </div>
                <button type="submit" class="btn btn-primary d-block">Добави</button>
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
