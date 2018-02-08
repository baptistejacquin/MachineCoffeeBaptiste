@extends('template')

@section('title')
    Modification
@endsection

@section('titrePage')
    Modification {{$boisson->nom}}
@endsection

@section('form')
    <form action="{{route('boissonModification',['id'=>$boisson->id])}}" method="POST" name="Formumlaire">
    {{ csrf_field() }}

    <!-- Form Name -->
        <legend>Modifications boissons</legend>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-12 control-label" for="boisson">Modifications Boisson</label>
            <div class="col-md-12">
                <input id="boisson" name="boisson" type="text" placeholder="Nom Boisson" value="{{$boisson->nom}}"
                       class="form-control input-md">

            </div>
        </div>

        <!-- Text input-->
        <div class="formulaireboisson">
            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-12 control-label" for="prixboisson">Modifications Prix</label>
                <div class="col-md-12">
                    <input id="prixboisson" name="prixboisson" type="text" placeholder="Prix de la boisson"
                           value="{{$boisson->prix}}" class="form-control input-md" required="">

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