@extends('template')

@section('title')
    Modification Pièces
@endsection

@section('titrePage')
    Modification Pièces de {{$piece->type}}
@endsection

@section('form')
    <form action="{{route('CoinModification',['id'=>$piece->id])}}" method="POST" name="Formumlaire">
    {{ csrf_field() }}
        {{method_field('put')}}

    <!-- Form Name -->
        <legend>Modifications boissons</legend>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-12 control-label" for="coin">Modifications Coin</label>
            <div class="col-md-12">
                <input id="coin" name="coin" type="text" placeholder="Valeur de pièce" value="{{$piece->type}}"
                       class="form-control input-md">

            </div>
        </div>

        <!-- Text input-->
        <div class="formulaireboisson">
            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-12 control-label" for="stock">Modifications Stock</label>
                <div class="col-md-12">
                    <input id="stockpiece" name="stock" type="text" placeholder="Stock de la pièce de {{$piece->type}} "
                           value="{{$piece->stock}}" class="form-control input-md" required="">

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