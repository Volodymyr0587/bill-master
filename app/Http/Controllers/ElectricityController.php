<?php

namespace App\Http\Controllers;

use App\Models\Electricity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ElectricityController extends Controller
{
    public function index()
    {
        return view('payments.electricity');
    }

    public function store(Request $request)
    {
        $formFields = $this->validate($request, [
            'kwatts' => 'required',
            'price' => 'required'
        ]);


        $user = Auth::user();

        $electricity = new Electricity($formFields);

        // Associate the expense with the authenticated user
        $user->electricities()->save($electricity);

        return redirect('dashboard');
    }
}
