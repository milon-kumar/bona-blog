<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subscriber;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    public function index()
    {
        return view('Backend.admin.subscriber.index',[
            'subscribers'=>Subscriber::all(),
        ]);
    }

    public function destroy(Request $request ,$id )
    {
        $sub =  Subscriber::find($id);
        $sub->delete();
        return redirect()->back()->with('success','Subscriber Deleted Successfully');
    }
}
