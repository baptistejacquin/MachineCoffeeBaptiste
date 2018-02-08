@extends('template')

@section('title')
    Modification
@endsection

@section('titrePage')
    Ingrédients {{$ingredient->nom}}
@endsection

@section('form')
    <form action="{{route('ingredientModification',['id'=>$ingredient->id])}}" method="POST" name="Formumlaire">
    {{ csrf_field() }}

    <!-- Form Name -->
        <legend>Modifications ingrédient</legend>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-12 control-label" for="boisson">Modifications Nom</label>
            <div class="col-md-12">
                <input id="nom" name="Ingredient" type="text" placeholder="Nom Ingredient" value = "{{$ingredient->nom}}" class="form-control input-md">

            </div>
        </div>

        <!-- Text input-->
        <div class="formulaireboisson">
            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-12 control-label" for="prixboisson">Modifications Stock</label>
                <div class="col-md-12">
                    <input id="stock" name="stockIngredient" type="text" placeholder="Stock de l'ingredient" value = "{{$ingredient->stock}}" class="form-control input-md" required="">

                </div>
            </div>

            <!-- Button -->
            <div class="form-group">
                <label class="col-md-12 control-label" for="valider"></label>
                <div class="col-md-12">
                    <button class="btn btn-success" type="submit">Valider</button>
                </div>
            </div>
        </div>

    </form>
@endsection