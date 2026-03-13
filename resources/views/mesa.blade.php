@extends('layout')

@section('content')
<form action="{{ route('mesa.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="quantidade">Quantidade de mesas:</label>
        <input type="number" name="quantidade" class="input-tn" min="1" required>
    </div>
    <input type="submit" value="cadastrar" class="submit" id="enterPress">
</form>


<div class="container-table">
    <table class="exhibition-table">
        <thead>
            <th>Número</th>
            <th>Status</th>
        </thead>
        <tbody>
            @foreach ($mesas as $mesa)
                <tr>
                    <td>{{$mesa->id}}</td>
                    <td>{{ucfirst($mesa->status)}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
