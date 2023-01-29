<?php

namespace App\Http\Controllers;
use App\crud;
use Illuminate\Http\Request;
use Session;
class crudcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  
        $phonebook=crud::all();
        return view('index',compact('phonebook'));
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
        'number' => 'required',
        'name' =>'required'
       ]);
       
       $phonebookvar=new crud;
       $phonebookvar->number=$request->number;
       $phonebookvar->name=$request->name;
       $phonebookvar->save();

       Session::flash('success','contact saved');
        return redirect()->route('crud.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $var=crud::find($id);
        return view('edit',compact('var'));
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
        $var=crud::find($id);
        $this->validate($request,[
            'number' => 'required',
            'name' =>'required'
        ]);

        $var->number=$request->number;
        $var->name=$request->name;
        $var->save();

        session::flash('sucess','Updated Sucessfully');
        return redirect()->route('crud.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $var=crud::find($id);
        $var->delete();

        Session::flash('sucess','deleted sucessfully');
        return redirect()->route('crud.index');
    }
}
