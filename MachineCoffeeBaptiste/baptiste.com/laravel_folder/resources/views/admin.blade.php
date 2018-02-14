@extends('template')

@section('title')
    Users
@endsection


@section('titrePage')
    Liste des Users enregistrés
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