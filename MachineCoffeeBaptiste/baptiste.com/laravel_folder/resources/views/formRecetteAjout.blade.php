@extends('template')

@section('form')

    <form action="{{route('ModifApresFormRecette',['id'=>$recette->id])}}" method="POST" name="Formumlaire">
    {{ csrf_field() }}

    <!-- Form Name -->
        <legend>Modification Recette</legend>

        <select name="boisson" id="selectbasic" class="form-control">
            <option selected disabled value="Drink selection">Drink selection</option>
            @foreach ($boissons as $element)
                <option value="{{ $element->id}}" label="{{ $element->nom}}"</option>
            @endforeach
        </select><br>

        <select name="ingredient" id="selecting" class="form-control">
            <option selected disabled value="Ingredient selection">Ingredient selection</option>
            @foreach ($ingredients as $element)
                <option value="{{ $element->id}}" label="{{ $element->nom}}"</option>
            @endforeach
        </select><br>

        <input id="quantite" name="quantite" type="text" placeholder="Qt Ingrédient" class="form-control input-md"><br>

        <input class="btn btn-success" type="submit" name="submit" value="Ajouter">
    </form>

@endsection


