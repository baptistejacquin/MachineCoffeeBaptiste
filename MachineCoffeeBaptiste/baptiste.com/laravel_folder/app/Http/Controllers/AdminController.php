<?php

namespace App\Http\Controllers;

use App\Vente;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Gate;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


// fonction pour afficher la liste des User que si admin ou super admin
    public function index()
    {
        if (Gate::allows('adminSuperAdmin')) {
            $users = User::all();
            return view('admin', ["users" => $users]);
        } else {
            return abort(404);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }


    public function trier(){
        $users=User::where('role',request("searchUser"))->get();
        $usersName = User::select('id')->where("name", request("searchUser"))->get()->first();
        $emailUser = User::select('id')->where("email", request("searchUser"))->get()->first();
        if (!$users->isEmpty()) {
            return view('admin', compact('users'));

        }else if ($emailUser) {
            $Usersmail = User::where('id', $emailUser->id)->orderby("created_at", "DESC")->get();
            return view('admin', ['users'=>$Usersmail]);

        }else if ($usersName) {
            $nomUsers = User::where('id', $usersName->id)->orderby("created_at", "DESC")->get();
            return view('admin', ['users'=>$nomUsers]);

        }else{
            return redirect()->back()->with('error',"La rechercher ne correspond à rien" );

        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */


// fonction pour afficher le formulaire de modification des User que si super admin
    public function edit($id)
    {
        if (Gate::allows('superadmin')) {
            $user = User::find($id);
            return view('modifUser', ["user" => $user]);
        } else {
            return abort(404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */


// fonction pour modifier l'User en récupérant les infos du formulaire de modif que si super admin
    public function update($id)
    {
        if (Gate::allows('superadmin')) {
            $modif = User::find($id);
            $modif->role = request('role');
            $modif->name = request('nom');
            $modif->save();
            return redirect()->route('admin.index');
        } else {
            return abort(404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Gate::allows('superadmin')) {
            $supp = User::destroy($id);
            return redirect()->route('admin.index');
        }else{
            return abort(404);
        }
    }
}
