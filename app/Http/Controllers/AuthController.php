<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Validator;

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
        // Rule validation bisa diliat di dokomentasi avaiable validation rule
        // Validation Cara pertama
        // $validated = $request->validate([
        //     'name' => 'required',
        //     'email' => 'required|email',
        //     'password' => 'required'
        // ]);
        //
        // Validation Custom message
        $rules = [
            'name' => 'required',
            'email' => 'required | email',
            'password' => 'required'
        ];
        $message = [
            'name.required' => 'We need to know your name',
            'email.required' => 'We need to know your email address',
            'password.required' => 'We need to know your password'
        ];

        $validator = Validator::make($request->all(), $rules, $message);

        if ($validator->fails()) {
            return response()->json([
                'status'=> false,
                'message'=> $validator->errors(),                
            ], 403);
        }

        // Cara pertama
        // $user = new User;
        // $user->name = $request->name;
        // $user->email = $request->email;
        // $user->password = Hash::make($request->password);
        // $user->save();

        // Cara kedua bisa dengan teknik mass assigment / Eloquent Query
        $user = User::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => Hash::make($request->password)
        ]);

        
        return response()->json([
            'status'=> true,
            'message'=> 'Data berhasil disimpan!!',
            'data'=> $user
        ]);
    }
    public function delete($id){
        $user = User::find($id);
        $user->delete();
        return response()->json([
            'status'=> true,
            'message'=> 'Data berhasil dihapus!!'            
        ]);
    }
    
}
