@extends('layout')

@section('content')
<form action="{{route('detalhes-pedido.attachProduto', $pedido->id)}}" method="POST" class="detalhes-form">
    @csrf
    <div class="form-group">
        <label for="produto">Produto:</label>
        <input list="produtos" name="produto" placeholder="Digite o nome do produto..." id='produtoesc' class="input-tn">
        <datalist name="produtos"  id='produtos' >
            @foreach($produtos as $produto)
            <option value="{{$produto->id}}">
                {{ucfirst($produto->id)}}
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

    <input type="submit" value="Adicionar a nota" class="submit">
</form>

<div class="pedido-container">
    <div class="container-main-details">
        <h1>Cliente: {{ $pedido->nome_cliente }}</h1>
        <h1>Mesa: {{ $pedido->idMesa }}</h1>
        <h1>Aberto: {{$pedido->pedido_aberto->format('d/m/Y H:i')}}</h1>
    </div>
    <ul>
        
    </ul>
</div>

<script>
    const produtoInput = document.getElementById('produtoesc')
    const quantidadeInput = document.getElementById('quantidadeesc')
    const expPreco = document.querySelector('.expPreco')

    const produtos = @json($produtos)

    function atualizarPreco(){
        const prod = produtos.find(p => p.nome === produtoInput.value)
        const quantidade = parseFloat(quantidadeInput.value) || 0
        if(prod){
            expPreco.textContent = 'R$ ' + (quantidade * prod.preco).toFixed(2)
        } else {
            expPreco.textContent = 'R$ 0,00'
        }
    }

    produtoInput.addEventListener('input', atualizarPreco)
    quantidadeInput.addEventListener('input', atualizarPreco)
</script>
@endsection