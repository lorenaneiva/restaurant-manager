@extends('layout')

@section('content')
<form action="{{ route('pedido.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="nome_cliente">Nome do cliente:</label>
        <input type="text" name="nome_cliente" class="input-tn">
    </div>

    <div class="form-group">
        <label for="idMesa">Número da mesa:</label>
        <input type="number" name="idMesa" class="input-tn">
    </div>
    <input type="submit" value="Criar nota" class="submit">
</form>

<div class="container-table">
    <table class="exhibition-table">
        <thead>
            <th>Cliente</th>
            <th>Mesa</th>
            <th>Valor</th>
            <th>Data/Hora de abertura</th>
            <th>Data/Hora de fechamento</th>
            <th></th>
        </thead>
        <tbody>
            @foreach ($pedidos as $pedido)
                <tr>
                    <td>{{$pedido->nome_cliente}}</td>
                    <td>{{$pedido->idMesa}}</td>
                    <td>{{$pedido->valor}}</td>
                    <td>{{$pedido->pedido_aberto->format('d/m/Y H:i')}}</td>
                    @if ($pedido->pedido_fechado != null)
                    <td>{{$pedido->pedido_fechado->format('d/m/Y H:i')}}</td>
                    @else 
                    <td>...</td>
                    @endif
                    <td>
                        <div class="container-buttons-table">
                            <form action="{{route('detalhes-pedido.index', $pedido->id)}}" method="GET">
                                @csrf
                                <input type="submit" value="Detalhes" class="submit">
                            </form>
                            <form action="{{route('pedido.destroy', $pedido->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input type="submit" value="Excluir" class="submit delete">
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection