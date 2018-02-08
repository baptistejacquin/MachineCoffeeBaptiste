@extends('template')

@section("title")
Edit {{$ingredients->nom}}
@endsection


@section('titrePage')
Ingrédient "{{$ingredients->nom}}" 
@endsection

@section('contenu')
		<h2><li>  Id : {{$ingredients->id}}</li></h2>
		<h2><li>  Code : {{$ingredients->code}}</li></h2>
    	<h2><li>  Nom : {{$ingredients->nom}}</li></h2>
    	<h2><li>  Stock : {{$ingredients->stock}} </li></h2>
@endsection

@section('form')
<br><br>
    <form action="{{route('IngredientSupp',['id' => $ingredients->id])}}" method="post">
    	{{csrf_field()}}
    	<input type="hidden" name="_method" value="delete">
    	<button type="submit" class="btn btn-danger">Supprimer</button> 
    </form><br>
    	<a href="{{route('ingredientModif',['id' => $ingredients->id])}}" class="btn btn-success">Modifier</a>
@endsection