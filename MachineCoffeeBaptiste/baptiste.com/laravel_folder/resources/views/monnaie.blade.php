@extends('template')

@section("title")
    Monnaie
@endsection

@section("titrePage")
    Stock Monnaie
@endsection

@section('contenu')
    <table class="table-striped col-md-12 table-hover">
        @foreach ($stockPieces as $stockPiece)

            <tr>
                <td><h2>Pieces {{$stockPiece->type}} cts € </h2></td>
                <td><h2>{{$stockPiece->stock}} qt </h2></td>
                <td><a href="modifStock/{{$stockPiece->id}}" class="btn btn-success">Modifier Stock</a></td>
            </tr>

        @endforeach
    </table>
@endsection