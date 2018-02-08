@extends('template')

@section("title")
    Edit {{$boissons->nom}}
@endsection


@section('titrePage')
    Boisson "{{$boissons->nom}}"
@endsection

@section('contenu')
    <h2>
        <li> Code : {{$boissons->code}}</li>
    </h2>
    <h2>
        <li> Nom : {{$boissons->nom}}</li>
    </h2>
    <h2>
        <li> Prix : {{$boissons->prix}} cts</li>
    </h2>
@endsection

@section('form')
    <br><br>
    <form action="{{route('boissonSupp',['id' => $boissons->id])}}" method="post">
        {{csrf_field()}}
        <input type="hidden" name="_method" value="delete">
        <button type="submit" class="btn btn-danger">Supprimer</button>
    </form><br>
    <a href="{{route('boissonModification',['id' => $boissons->id])}}" class="btn btn-success">Modifier</a>
@endsection