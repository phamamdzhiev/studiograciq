<header>
    <nav class="navbar navbar-expand-lg bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand text-white" href="{{route('admin')}}">Админ панел</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                    aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
{{--                    <a class="nav-link" href="{{route('admin')}}">Начало</a>--}}
                    <a class="nav-link" href="{{route('admin.appointments')}}">График</a>
                    <a class="nav-link" href="{{route('admin.customers')}}">Клиенти</a>
                    <a class="nav-link" href="{{route('admin.services')}}">Услуги</a>
                    <a class="nav-link" href="{{route('admin.products')}}">Продукти</a>
                    <a class="nav-link" href="{{route('admin.categories')}}">Категории</a>
                    <form action="{{route('logout')}}" method="POST">
                        @csrf
                        <button type="submit" class="nav-link text-danger">Изход</button>
                    </form>
                </div>
            </div>
        </div>
    </nav>
</header>
