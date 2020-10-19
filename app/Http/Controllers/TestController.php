<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Students;
use App\Models\Post;
use App\Models\user;
use resources\views;
//use Illuminate\Http\Request;
//use \Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Students::all();
        return view('welcome',compact('students'));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $this->validate($request,[
        'firstname' => 'required',
        'lastname' => 'required',
        'email' => 'required',
        'phone' => 'required'

       ]); 

       $students = new Students;
       $students->firstname = $request -> firstname;
       $students->lastname = $request-> lastname;
       $students->email = $request-> email;
       $students->phone = $request-> phone;
       $students-> save();
       return redirect(route ('home'))-> with('successMsg','Successfully Added');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $students = Students::find($id);
        return view('edit', compact('students'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
        'firstname' => 'required',
        'lastname' => 'required',
        'email' => 'required',
        'phone' => 'required'

       ]); 

       $students = Students::find($id);
       $students->firstname = $request -> firstname;
       $students->lastname = $request-> lastname;
       $students->email = $request-> email;
       $students->phone = $request-> phone;
       $students-> save();
       return redirect(route ('list'))-> with('successMsg','Record Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
       Students::find($id)->delete();
        return redirect(route('list'))->with('successMsg','deleted');
    }
}
