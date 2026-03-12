<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/layoutBase.css') }}">
    <link rel="stylesheet" href="{{ asset('css/formElements.css') }}">
    <link rel="stylesheet" href="{{ asset('css/table.css') }}">
    <title>Restaurante</title>

</head>
<body>
    <header>
        <nav>
            <h1 >Gerenciador de restaurante</h1>
            <ul class="nav-list">
                <li>
                    <a href="{{route('pedido.index')}}">Gerenciar pedidos</a>
                </li>
                <li>
                    <a href="{{route('mesa.index')}}">Gerenciar mesas</a>
                </li>
                <li>
                    <a href="{{route('produto.index')}}">Gerenciar produtos</a>
                </li>
            </ul>
        </nav>
    </header>
    <main>
        @if($errors->any())
            <ul>
                @foreach($errors->all() as $error)
                    <li style="color:red">{{ $error }}</li>
                @endforeach
            </ul>
        @endif
        @yield('content')
    </main>
</body>
</html>