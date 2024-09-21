<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;
use App\Models\Contact;
use App\Models\ReadMessage;
class ContactController extends Controller
{

    public function index()
   {
    $messages = Contact::all(); // Unread messages
    $readMessages = ReadMessage::with('contact')->get(); // Read messages
    return view('admin.messages', compact('messages', 'readMessages'));
   }
    public function send(Request $request){

        $data = $request->validate([

            'name'=>'required|string|max:100',
            'email'=>'required|string|max:50',
            'subject'=>'required|string|max:50',
            'unread_message'=>'required|string|max:255',
           
        ]);
        Contact::create($data);
        Mail::to($data['email'])->send(new ContactMail($data));
        return('Thank you for your message');
    }
    
    public function store(Request $request){

        $data = $request->validate([

            'name'=>'required|string|max:100',
            'email'=>'required|string|max:50',
            'subject'=>'required|string|max:50',
            'unread_message'=>'required|string|max:255',
             
        ]);
     Contact::create($data);
    return view('mail.email',compact('data'));
    }

    public function show(string $id)
    {
        // Fetch the unread message
    $unreadMessage = Contact::findOrFail($id);
    // Check if the message has already been marked as read
    $readMessage = ReadMessage::where('contact_id', $id)->first();

    // If the message is not marked as read, create a new ReadMessage record
    if (!$readMessage) {
        $readMessage = new ReadMessage();
        $readMessage->contact_id = $id;
        $readMessage->save();
        //dd($readMessage);
        }
    // Return the view with the updated read message status
    return view('admin.message_details', compact('unreadMessage', 'readMessage'));
    }

     // in the blade i made relation 1 -> 1 between contact_id of read messages and id of contact table to make the use more easy 
     // inside the read messages they are supposed to be the same messages so thats way i think of making relation
     
     public function destroy(string $id)
    {
        Contact::where('id',$id)->delete();
        ReadMessage::where('id',$id)->delete();
         return redirect()->route('contact.messages');
    }
}
   


