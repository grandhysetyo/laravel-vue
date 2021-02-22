<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use App\Models\User;


class AuthController extends Controller
{
    //
    public function index(){
        // use static DB::table
        // $users = DB::table('users')->select('id','name')->get();            
        // use Eloquent ORM 
        $users = User::all();

        //dump($users); // or dd($users) dengan dd program tidak akan melanjutkan compile ke bawah
        return response()->json($users);
    }
    public function showById($id){
        // use static DB
        // $user = DB::table('users')->where('id',$id)->first();    
        // use Eloquent ORM
        $user = User::find($id);

        //dump($users); // or dd($users) dengan dd program tidak akan melanjutkan compile ke bawah
        return response()->json($user);
    }
    public function add(Request $request){
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        $user->save();
        return response()->json([
            'status'=> true,
            'message'=> 'Data berhasil disimpan!!',
            'data'=> $user
        ]);
    }
    
}
