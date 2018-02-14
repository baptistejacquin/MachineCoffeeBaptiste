@extends('template')

@section('title')
    VENTES
@endsection


@section('titrePage')
    Liste des ventes enregistrées
@endsection


@section('contenu')
    <table class="table-striped col-md-12 table-hover ">
        @foreach ($ventes as $vente)
            <tr>
                <td><h3>Vente n° {{$vente->id}}</h3></td>
                <td><h3>Boisson : {{$vente->boisson->nom}}</h3></td>
                <td><h3>Nb Sucre : {{$vente->nbSucre}}</h3></td>
                <td><h3>Prix : {{$vente->boisson_prix}} cts</h3></td>
                <td><h3>Client : {{$vente->user->name}} </h3></td>
                <td><h3>{{$vente->created_at}}</h3></td>
            </tr>
        @endforeach
    </table>
@endsection