@extends('template')

@section("title")
    Monnaie
@endsection

@section("titrePage")
    Stock Monnaie
@endsection

@section('contenu')
    <table class="table-striped col-md-12 table-hover">
        @foreach ($stockPieces as $key =>$table)

            <tr>
                <td><h2>Pieces {{$table["value"]}} € </h2></td>
                <td><h2>{{$table["stock"]}} qt </h2> <a href="#" class="btn btn-danger">-</a> <a href="#"
                                                                                                 class="btn btn-success">+</a>
                </td>
            </tr>

        @endforeach
    </table>
@endsection