@extends('layout')
@section('content')

<form action="{{ route('produto.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" class="input-tn">
    </div>

    <div class="form-group">
        <label for="preco">Preço:</label>
        <input type="number" name="preco" class="input-tn">
    </div>

    <div class="form-group">
        <label for="categoria" name="categoria">Categoria: </label>
        <div class="select-container">
            <select name="categoria">
                @foreach ($categorias as $cat)
                <option value="{{ $cat }}">
                    {{ ucfirst($cat) }}
                </option>
                @endforeach
            </select>
        </div>
    </div>
    
    <div class="form-group">
        <label for="descricao">Descrição:</label>
        <textarea name="descricao" class="text-area" rows="4" cols="35"></textarea>
    </div>

    <input type="submit" value="Adicionar" class="submit" id="enterPress">
</form>

<div class="container-table">
    <table class="exhibition-table">
        <thead>
            <tr>
                <th>Nome</th><th>Preço</th><th>Categoria</th><th>Descrição:</th><th></th>
            </tr>
        </thead>
        <tbody>
                @foreach ($produtos as $produto)
                    <tr>
                        <td>{{$produto->nome}}</td>
                        <td>{{$produto->preco}}</td>
                        <td>{{$produto->categoria}}</td>
    
                        @if($produto->descricao != null)
                        <td>{{$produto->descricao}}</td>
                        @else
                        <td>...</td>
                        @endif
                        <td>
                            <form action="{{ route('produto.destroy', $produto->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="submit delete">Excluir</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
        </tbody>
    </table>
</div>
@endsection