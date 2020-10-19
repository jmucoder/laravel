<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Students;
use App\Models\Post;
use App\Models\user;
use resources\views;
use Illuminate\Support\Facades\DB;
//use Illuminate\Http\Request;
//use \Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class Listcontroller extends Controller
{
    public function index()
    {
        $students = Students::Simplepaginate(3);
        return view('list',compact('students'));
    }
}
