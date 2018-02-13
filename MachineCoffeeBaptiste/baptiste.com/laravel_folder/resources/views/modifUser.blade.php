@extends('template')

@section('title')
    Edit Users
@endsection

@section('titrePage')
    User {{$user->name}}
@endsection

@section('form')

    <form action="{{route('admin.update',[$user->id])}}" method="POST" name="Formumlaire">
    {{method_field('PUT')}}
    {{ csrf_field() }}

    <!-- Form Name -->
        <legend>Modification User</legend>
    @if(Gate::allows('superadmin'))
        <select name="role" id="role" class="form-control">
            <option selected disabled value="role selection">Role selection</option>
                <option value="super admin">super admin</option>
                <option value="admin"> admin</option>
                <option value="user"> user</option>
    @elseif(Gate::allows('admin'))
                <select name="role" id="role" class="form-control">
                    <option selected disabled value="role selection">Role selection</option>
                    <option value="admin"> admin</option>
                    <option value="user"> user</option>
    @endif
        </select><br>

        <input id="nom" name="nom" type="nom" value="{{$user->name}}" class="form-control input-md"><br>

        <input class="btn btn-success" type="submit" name="submit" value="Ajouter">
    </form>

@endsection
