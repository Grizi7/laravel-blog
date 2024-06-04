<?php

namespace App\Http\Controllers;

use App\Models\CallRequest;
use Illuminate\Http\Request;

class CallRequestController extends Controller
{
    public function index(){
        $requests = CallRequest::all();
        return view('admin.callRequests', [
            'do' => 'view',
            'requests' => $requests
        ]);
    }
    
    public function store(Request $request){
        
        $data = $request->validate([
            'name' => 'required|max:255|string',
            'email' => 'required|email',
            'phone' => 'required',
            'message' => 'required|string',
        ]);
        
        CallRequest::create($data);

        return redirect()->route('contact')->with('success', 'Message sent successfully, please wait for our reply.');
    }
}
