<?php

namespace App\Http\Controllers;
use App\Contact;
use App\Mobile;
use Illuminate\Http\Request;
use App\Http\Controllers\Contactcontroller;
use App\Http\Requests\ContactStoreRequest;
use Session;


class Contactcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $var=Contact::all();
        
        return view('index',compact('var'));

        

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
    private function storecontact(Contact $contactvar,array $request)
    {
        
          
           $contactvar->name=$request['name'];
           $contactvar->address=$request['address'];
           $contactvar->email=$request['email'];
           $contactvar->links=$request['links'];
           $contactvar->notes=$request['notes'];
           $contactvar->company=$request['company'];
           $contactvar->dob=$request['dob'];
           $contactvar->save();
    }

    private function storemobile($id,array $request)
    {   

        $mobilevar=new Mobile;
        
        $data = [['contact_id' => $id, 'number' => $request['number1']], ['contact_id' => $id, 'number' => $request['number2']], ['contact_id' => $id, 'number' => $request['number3']]];
        $mobilevar->insert($data);
        // $mobilevar->contact_id=$id;
        // $mobilevar->number=$request->number1;
        // $mobilevar->save();

        // if($request->number2!="")
        // {
        //     $mobilevar2=new Mobile;
        //     $mobilevar2->contact_id=$id;
        //     $mobilevar2->number=$request->number2;
        //     $mobilevar2->save();
        // }
        // if($request->number3!="")
        // {
        //     $mobilevar3=new Mobile;
        //     $mobilevar3->contact_id=$id;
        //     $mobilevar3->number=$request->number3;
        //     $mobilevar3->save();
        // }
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContactStoreRequest $request)
    {
        // $this->validate($request,[
        //     'number' => 'required',
        //     'name' =>'required'
        //    ]);
           
        //    $contactvar=new Contact;
        //    $contactvar->name=$request->name;
        //    $contactvar->address=$request->address;
        //    $contactvar->email=$request->email;
        //    $contactvar->links=$request->links;
        //    $contactvar->notes=$request->notes;
        //    $contactvar->company=$request->company;
        //    $contactvar->dob=$request->dob;
        //    $contactvar->save();
    
        //    $mobilevar=new Mobile;
        //    $mobilevar->contact_id=$contactvar->id;
        //    $mobilevar->home=$request->home;
        //    $mobilevar->personal=$request->personal;
        //    $mobilevar->work=$request->work;
        //    $mobilevar->save();

         
        
        // $var=$request;
        // return redirect()->route('Contact.storecontact',compact('var'));
        // return redirect()->route('Contact.storemobile',compact('var'));

        $validated = $request->validated();
        
        $var1=new Contact;
        

        $this->storecontact($var1,$request->all());

        $this->storemobile($var1->id,$request->all());

           Session::flash('success','contact saved');
            return redirect()->route('Contact.index');
    }

    
   

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
        // $var=DB::table('mobiles')->where('contact_id','=','$id')->get();
        // return view('show',compact('var'));

        // $var=Mobile::where('contact_id',$id)->get();
        $var2=Contact::where('id',$id)->with("mobiles")->first();
        return view('show',compact('var2'));
        
        // $mobiles = Contact::find($id)->mobiles;
        
 
        // return view('show',compact('mobiles','var2'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       // $var=Contact::find($id);




        $var=Contact::where('id',$id)->with("mobiles")->first();
        
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
        // $var=Contact::find($id);
        // $this->validate($request,[
        //     'number' => 'required',
        //     'name' =>'required'
        // ]);

       

        $var=Contact::where('id',$id)->with("mobiles")->first();

        
        $var->mobiles[0]['number']=$request->number1;
        $var->mobiles[1]['number']=$request->number2;
        $var->mobiles[2]['number']=$request->number3;


        $var->name=$request->name;
        $var->address=$request->address;
        $var->email=$request->email;
        $var->links=$request->links;
        $var->notes=$request->notes;
        $var->company=$request->company;
        $var->dob=$request->dob;
        $var->save();

        
       // dd($var->mobiles[0]['number']);

        session::flash('sucess','Updated Sucessfully');
        return redirect()->route('Contact.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) 
    {
        $var=Mobile::where('contact_id',$id)->get();
        
        for($i=0;$i<sizeof($var);$i++)
        $var[$i]->delete();

       

        Session::flash('sucess','deleted sucessfully');
        return redirect()->route('Contact.index');
    }
}
