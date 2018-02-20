@extends('template')


@section('titrePage')

    <!--    --><?php //stockSucre(); ?>
    COFFEE MACHINE

@endsection

@section('contenu')
    <h3><?= date("l,j,F,Y H i A");?></h3> <!-- Affichage de l'heure -->
    <h3> Boissons disponibles</h3>
@endsection

@section('form')
    <form action="" method="POST" name="Formumlaire">
    {{ csrf_field() }}

    <!-- Form Name -->
        <br>
        <legend>Achat Boisson</legend>
        <select name="boisson" id="selectbasic" class="form-control">
            <option selected disabled value="Drink selection">Drink selection</option>
            @foreach ($boissons as $boisson)
                @if($boisson->available() == true)
                    <option value="{{ $boisson->id}}" label="{{ $boisson->nom}}"</option>
                @endif
            @endforeach
        </select><br>

        <select name="sucre" id="selecting" class="form-control">
            <option selected disabled value="Nb Sucre">Nb Sucre</option>

            @for($i=0; $i <= $nbSucres->stock && $i <= 5; $i++)
                <option value="{{$i}}" label="{{$i}}">{{$i}}</option>
            @endfor
        </select><br>

        <input class="btn btn-success" type="submit" name="submit" value="Ajouter">
    </form>

@endsection

