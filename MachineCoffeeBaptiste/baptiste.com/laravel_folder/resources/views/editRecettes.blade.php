@extends('template')

@section("title")
    Edit {{$boisson->nom}}
@endsection


@section('titrePage')
    Recette "{{$boisson->nom}}"
@endsection

@section('contenu')
    <table class="table-striped col-md-12 table-hover">

        @foreach($recettes as $recette)

            <tr>
                <td><h2> {{$recette->ingredient->nom}}</h2></td>
                <td><h2> Qt : {{$recette->quantite}}</h2></td>
                <td><a href="{{route('ModifAvantFormRecette',['id'=>$recette->id])}}"
                       class="btn btn-success">Modifier</a></td>
                <td>
                    <form action="{{route('suppLigne',['id' => $recette->id])}}" method="post">
                        {{csrf_field()}}
                        <input type="hidden" name="_method" value="delete">
                        <button type="submit" class="btn btn-danger">Supprimer</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection

@section('form')
    <br><br>
    <form action="{{route('AjoutRecette')}}" method="POST" name="Formumlaire">
    {{ csrf_field() }}

    <!-- Form Name -->
        <legend>Ajout Recette</legend>

        <select name="boisson" id="selectbasic" class="form-control">
            <option selected disabled value="Drink selection">Drink selection</option>
            @foreach ($boissons as $element)
                <option value="{{ $element->id}}" label="{{ $element->nom}}">{{ $element->nom}}</option>
            @endforeach
        </select><br>

        <select name="ingredient" id="selecting" class="form-control">
            <option selected disabled value="Ingredient selection">Ingredient selection</option>
            @foreach ($ingredients as $element)
                <option value="{{ $element->id}}" label="{{ $element->nom}}">{{ $element->nom}}</option>
            @endforeach
        </select><br>

        <input id="quantite" name="quantite" type="text" placeholder="Qt Ingrédient" class="form-control input-md"><br>

        <input class="btn btn-success" type="submit" name="submit" value="Ajouter">
    </form>





    <br><br>
    <form action="{{route('RecetteSupp',['id' => $boisson->id])}}" method="post">
        {{csrf_field()}}
        <input type="hidden" name="_method" value="delete">
        <button type="submit" class="btn btn-danger">Supprimer Tout</button>
    </form><br>

@endsection