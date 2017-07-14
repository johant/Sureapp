<?php

namespace App\Http\Controllers\Admin;

use Auth;
Use App\Schedule;
use App\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SchudelesController extends Controller
{
    public function store(Request $request, Customer $customer)
    {
         $this->validate($request, [
        'started_at' => 'required',
        'followup_option_id' => 'required',
        ]);
        // remove the token
        $arr = $request->except('_token');
        $arr = $request->all();
        // $request->all()['user_id'] = Auth::id();
        $arr['user_id'] = Auth::id();
        $arr['customer_id'] = $customer->id;
        $schudel = Schedule::create($arr);
        return back()->with('flash', 'Se ha programado el evento!!');
    }
}
