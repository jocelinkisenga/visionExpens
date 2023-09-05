<?php

namespace App\Http\Controllers;


use App\Http\Repositorie\UserRepository;
use App\Models\Commande;
use App\Models\Precommande;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
 protected $user_repo;

    public function __construct()
    {
        $this->user_repo = new UserRepository;
    }

    /**
     * Summary of index
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(){
        return view('pages.users');
    }



    /**
     * Summary of show
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * @return ['data'=>user-detail','precommande']
     */
    public function show(int $id){
        $data = User::find($id);


        return view('pages.userdetail',compact('data'));
    }

    public function update(Request $request){
        $user = User::find($request->user_id);
        $user->update([
            "name"=>$request->name,
            "email"=>$request->email,
            "password"=> Hash::make($request->password),
            "phone"=> $request->phone,
            "sexe" => $request->sexe,
            "role_id" => $request->role_id
        ]);

        return redirect()->back();
    }
}
