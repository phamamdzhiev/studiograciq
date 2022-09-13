<html lang="bg">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Вход в админ панел</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        #page_login {
            display: flex;
            align-items: center;
            flex-direction: column;
            width: 100%;
            max-width: 400px;
            margin: 1rem auto;
        }

        .heading {
            text-align: center;
        }

        #page_login form {
            width: 100%;
        }

        #page_login form input {
            width: 100%;
            padding: 5px 10px;
            margin-top: 1rem;
        }

        .invalid-feedback {
            color: #dc3545;
            text-align: center;
        }

        button[type="submit"] {
            width: 100%;
            padding: 5px 10px;
            margin-top: 1rem;
            color: white;
            font-weight: bold;
            background-color: #659498;
            border: 2px solid #659498;
        }
    </style>
</head>
<body>
<section id="page_login">
    <h3 class="heading">Вход в админ панел</h3>
    @error('email')
    <div class="invalid-feedback" role="alert">
        <strong>Грешен имейл адрес или парола. Опитайте отново!</strong>
    </div>
    @enderror
    @error('password')
    <div class="invalid-feedback" role="alert">
        <strong>Грешен имейл адрес или парола. Опитайте отново!</strong>
    </div>
    @enderror
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <input id="email" placeholder="Имейл адрес" type="email"
               class="form-control @error('email') is-invalid @enderror"
               name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

        <input id="password" placeholder="Парола" type="password"
               class="form-control @error('password') is-invalid @enderror"
               name="password" required autocomplete="current-password">
        <button type="submit" class="btn btn-primary">
            Вход
        </button>
    </form>
</section>
</body>
</html>



