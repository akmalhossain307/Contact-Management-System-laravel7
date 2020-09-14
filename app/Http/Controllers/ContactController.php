<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts=Contact::latest()->paginate(3);
        return view('contact.index',compact('contacts'))->with('i', (request()->input('page', 1) - 1) * 3);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('contact.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
                'name' => 'required',
                'phone_no' => 'required|min:6',
                'email' => 'required|email|unique:contacts'
            ], [
                'name.required' => 'Name is required',
                'phone_no.min' => 'Phone no. should be at least 6 character long.'
            ]);
   
        $input = $request->all();
        $contact = Contact::create($input);
    
        return redirect()->route('create')->with('success', 'Contact created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {  
       $data=Contact::find($id);
       return view('contact.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $contact=Contact::find($id);

        $contact->name            =$request->name;
        $contact->phone_no        =$request->phone_no;
        $contact->email           =$request->email;
        $contact->address         =$request->address;
        $contact->save();
        //Supplier::create($request->all());
        return redirect()->route('home')->with('success','Contact Updated Successfully!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contact=Contact::find($id);
        $contact->delete();
        //Supplier::create($request->all());
        return redirect()->route('home')->with('success','Contact Deleted Successfully!');
    }
}
