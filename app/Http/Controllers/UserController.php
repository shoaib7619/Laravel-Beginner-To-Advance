<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;

class UserController extends Controller
{
   public function index(){
    return 'Controller';
   }
   public function show($id){
    return 'Show method user id is'.$id;
   }
} 
