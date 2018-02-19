@extends('template')

@section('title')
    Users
@endsection


@section('titrePage')
    Liste des Users enregistrés
@endsection


@section('search')
    <div class="container">
        <div class="row">
            <a  href="{{route('triUser')}}" class="btn btn-info col-lg-1">Sans Tri</a>
        </div><br>
        <div class="row">
            <div class="col-lg-12">
                <form method="post" action="{{route("triUser")}}" class="search-form">
                    {{csrf_field()}}
                    <div class="form-group has-feedback">
                        <label for="search" class="sr-only">Search</label>
                        <input type="text" class="form-control" name="searchUser" id="search" placeholder="search role">
                        <span class="glyphicon glyphicon-search form-control-feedback"></span>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('contenu')
    <table class="table-striped col-md-12 table-hover ">
        @foreach ($users as $user)
            <tr>
                <td><h3>n° {{$user->id}}</h3></td>
                <td><h3>Nom : {{$user->name}}</h3></td>
                <td><h3>Role : {{$user->role}}</h3></td>
        @if(Gate::allows('superadmin'))
                <td><a href="{{route('admin.edit',[$user->id])}}"
                       class="btn btn-sm btn-success">Modifier</a></td>
                @if($user->role != "super admin")
                <td>
                    <form action="{{route('admin.destroy',[$user->id])}}" method="post">
                        {{method_field('DELETE')}}
                        {{csrf_field()}}
                        <button type="submit" class="btn btn-sm btn-danger">Supprimer</button>
                    </form>
                </td>
                @endif
        @endif
                {{--<td><h3>{{$vente->created_at}}</h3></td>--}}
            </tr>
        @endforeach
    </table>
@endsection