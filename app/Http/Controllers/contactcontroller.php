<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\URL;
use App\Models\contact;

class contactcontroller extends Controller
{
    public function Add(Request $request){
    	$this->validate($request, [
    		'Number' => 'required',
    		'Name' => 'required',
            'Fullname' => 'required',
    		'Email' => 'required',
            'Note' => 'required',
    		'Image' => 'required',
    	]);
    	$contact = new Contact;
    	$contact->Number = $request->input('Number');
    	$contact->Name = $request->input('Name');
        $contact->Fullname = $request->input('Fullname');
        $contact->Email = $request->input('Email');
        $contact->Note = $request->input('Note');

    	if ($request->hasfile('Image')) {
    		$file = $request->file('Image');
        $file->move(public_path(). '/uploads/', 
        $file->getClientOriginalName());
        $url = URL::to("/"). '/uploads/'.$file->getClientOriginalName();

}
    	$contact->Image = $url;
    	$contact->save();

    	return redirect('/contact')->with('response','Contact Added Successfully');
    	
    } 
    public function Edit(Request $request,$contact_id){
        $this->validate($request, [
    		'Number' => 'required',
    		'Name' => 'required',
            'Fullname' => 'required',
    		'Email' => 'required',
            'Note' => 'required',
    		'Image' => 'required',
    	]);
    	$contact = new Contact;
    	$contact->Number = $request->input('Number');
    	$contact->Name = $request->input('Name');
        $contact->Fullname = $request->input('Fullname');
        $contact->Email = $request->input('Email');
        $contact->Note = $request->input('Note');

    	if ($request->hasfile('Image')) {
    		$file = $request->file('Image');
        $file->move(public_path(). '/uploads/', 
        $file->getClientOriginalName());
        $url = URL::to("/"). '/uploads/'.$file->getClientOriginalName();

}   
    	$contact->Image = $url;
        $data = array(
            'Number'=> $contact->Number,
            'Name'=> $contact->Name,
            'Fullname'=> $contact->Fullname,
            'Email'=> $contact->Email,
            'Note'=> $contact->Note,
            'Image'=> $contact->Image
        );
    	contact::where('id',$contact_id)->update($data);
        $contact->update();

        return redirect('/contact')->with('response','Contact Updated Successfully');
    }
    public function Delete($contact_id){
        $contact = contact::where('id',$contact_id)->first();
        contact::where('id',$contact_id)->delete();

        return redirect("/contact")->with('response','Delete Contact Successfully');
    }   
}
