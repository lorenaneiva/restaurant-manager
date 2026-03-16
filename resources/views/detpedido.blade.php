@extends('layout')

@section('content')
<form action="{{route('detalhes-pedido.attachProduto', $pedido->id)}}" method="POST" class="detalhes-form">
    @csrf
    <div class="form-group">
        <label for="produto">Produto:</label>
        <input list="produtos" name="produto" placeholder="Digite o nome do produto..." id='produtoesc' class="input-tn">
        <datalist name="produtos"  id='produtos' >
            @foreach($produtos as $produto)
            <option value="{{$produto->nome}}">
                {{ucfirst($produto->nome)}}
            </option>
            @endforeach
        </datalist>
    </div>
    <div class="form-group">
        <label for="quantidade">Quantidade:</label>
        <input type="number" name="quantidade" id="quantidadeesc" class="input-tn">
    </div>
    <div class="form-group">
        <label for="preco">Preço:</label>
        <p class="expPreco"></p>
    </div>
    <input type="hidden" name="id">
    <input type="submit" value="Adicionar a nota" class="submit">
</form>

<div class="pedido-container">
    <div class="container-main-details">
        <h1>Cliente: {{ $pedido->nome_cliente }}</h1>
        <h1>Mesa: {{ $pedido->idMesa }}</h1>
        <h1>Aberto: {{$pedido->pedido_aberto->format('d/m/Y H:i')}}</h1>
    </div>
    <ul class="produtos-list">
        <li class="head">
            <p>Produto</p>
            <p>Quantidade</p>
            <p>Valor</p>
        </li>
        @foreach($pedido->produtos as $produto)
        <li>
            <p>{{ucfirst($produto->nome)}}</p>
            <p>{{$produto->pivot->quantidade}}</p>
            <p>R$ {{$produto->preco*$produto->pivot->quantidade}}</p>
        </li>
        @endforeach
        <li class='footer'>
            <p></p>
            <p>Total:</p>
            <p>{{$pedido->valor}}</p>
        </li>
    </ul>
</div>

<script>
    const produtoInput = document.getElementById('produtoesc')
    const quantidadeInput = document.getElementById('quantidadeesc')
    const expPreco = document.querySelector('.expPreco')

    const produtos = @json($produtos)

    const idInput = document.querySelector('input[name="id"]');

    function atualizarPrecoEenviarId(){
        const prod = produtos.find(p => p.nome === produtoInput.value)
        const quantidade = parseFloat(quantidadeInput.value) || 0
        if(prod){
            expPreco.textContent = 'R$ ' + (quantidade * prod.preco).toFixed(2)
            idInput.value = prod.id
        } else {
            expPreco.textContent = 'R$ 0,00'
            idInput.value = ''
        }
    }



    produtoInput.addEventListener('input', atualizarPrecoEenviarId)
    quantidadeInput.addEventListener('input', atualizarPrecoEenviarId)
    idInput.addEventListener('input', atualizarPrecoEenviarId)
</script>
@endsection