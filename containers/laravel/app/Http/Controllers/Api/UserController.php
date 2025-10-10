<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;
use App\Models\User;

class UserController extends Controller
{
    public function index(){
      $users = QueryBuilder::for(User::class)
          ->allowedFilters(['name', 'email'])
          ->get();
      return response()->json($users);
    }
}