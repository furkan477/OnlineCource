<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function contactList(){
        $contacts = Contact::all();
        return view('admin.pages.contact.contactlist',compact('contacts'));
    }

    public function contactDelete(Contact $contact){
        $contact->delete();
        return redirect()->back();
    }
}
