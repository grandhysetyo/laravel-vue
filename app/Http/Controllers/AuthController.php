<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    //
    public function index(){
        $users = DB::table('users')->select('id','name')->get();    
        //dump($users); // or dd($users) dengan dd program tidak akan melanjutkan compile ke bawah
        return response()->json($users);
    }
    
}
