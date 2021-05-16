<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\URL;
use App\Models\contact;

class addcontroller extends Controller
{
    public function Create(Request $request){
        return redirect('/contact')->with('response','Contact Added Successfully');
        exit();
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
    	$contact->save($contact);

    	return redirect('/contact')->with('response','Contact Added Successfully');
    	
    }   
}
