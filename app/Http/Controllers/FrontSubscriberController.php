<?php

namespace App\Http\Controllers;

use App\Models\Subscriber;
use Illuminate\Http\Request;

class FrontSubscriberController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request,[
            'email'=>'required|email|unique:subscribers',
        ]);

        $subscriber = new Subscriber();
        $subscriber->email = $request->email;
        $subscriber->save();
        return redirect()->back()->with('success','You added to our subscriber list');
    }
}
