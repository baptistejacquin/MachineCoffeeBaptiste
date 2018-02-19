@extends('template')

@section('title')
    VENTES
@endsection


@section('titrePage')
    Liste des ventes enregistrées

@endsection


@section('search')
    @if(Gate::allows("adminSuperAdmin"))
    <div class="container">
        <div class="row">
            <a href="{{route('listeVente')}}" class="btn btn-info col-lg-1">Sans Tri</a>
        </div>
        <br>
        <div class="row">
            <div class="col-lg-12">
                <form method="post" action="{{route("triVente")}}" class="search-form">
                    {{csrf_field()}}
                    <div class="form-group has-feedback">
                        <label for="search" class="sr-only">Search</label>
                        <input type="text" class="form-control" name="searchVente" id="search" placeholder="search Drinks">
                        <span class="glyphicon glyphicon-search form-control-feedback"></span>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endif
@endsection

@section('contenu')
    <div>
        {{--<table id="header" class="table-striped table-hover">--}}
            {{--<tr>--}}
                {{--<th><h3>Vente n° </h3></th>--}}
                {{--<th><h3>Boisson </h3></th>--}}
                {{--<th><h3>Nb Sucre </h3></th>--}}
                {{--<th><h3>Prix </h3></th>--}}
                {{--<th><h3>Client </h3></th>--}}
                {{--<th><h3>Date</h3></th>--}}
            {{--</tr>--}}
        {{--</table>--}}
        <div class="content scroll">
            <table id="tabVentes" class="table-striped col-md-12 table-hover ">
                {{--<thead>--}}
                {{--<tr>--}}
                {{--<td><h3>Vente n° </h3></td>--}}
                {{--<td><h3>Boisson </h3></td>--}}
                {{--<td><h3>Nb Sucre </h3></td>--}}
                {{--<td><h3>Prix </h3></td>--}}
                {{--<td><h3>Client </h3></td>--}}
                {{--<td><h3>Date</h3></td>--}}
                {{--</tr>--}}
                {{--</thead>--}}
                @foreach ($ventes as $vente)
                    <tbody>
                    <tr>
                        <td><h3>Vente n° {{$vente->id}}</h3></td>
                        <td><h3>Boisson {{$vente->boisson->nom}}</h3></td>
                        <td><h3>Nb Sucre {{$vente->nbSucre}}</h3></td>
                        <td><h3>Prix {{$vente->boisson_prix}} cts</h3></td>
                        <td><h3>Client {{$vente->user->name}} </h3></td>
                        <td><h3>Date {{$vente->created_at}}</h3></td>
                    </tr>
                    </tbody>
                @endforeach
            </table>
        </div>
    </div>
@endsection