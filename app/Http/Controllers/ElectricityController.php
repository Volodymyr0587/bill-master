<?php

namespace App\Http\Controllers;

use App\Models\Electricity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ElectricityController extends Controller
{
    public function index()
    {
        return view('payments.electricity.index');
    }

    public function store(Request $request)
    {
        $formFields = $this->validate($request, [
            'kwatts' => 'required',
            'price' => 'required',
            'payment_date' => 'required',
            'is_paid' => 'boolean',
        ]);


        $user = Auth::user();

        $electricity = new Electricity($formFields);

        // Associate the expense with the authenticated user
        $user->electricities()->save($electricity);

        return redirect('dashboard');
    }

    public function show()
    {
        $user = Auth::user();

        $electricity = $user->electricities()->get();

        return view('payments.electricity.show', ['user' => $user, 'electricity' => $electricity]);
    }


    public function edit(Electricity $electricity)
    {
        return view('payments.electricity.edit', ['electricity' => $electricity]);
    }


    public function update(Request $request, Electricity $electricity)
    {
        $formFields = $this->validate($request, [
            'kwatts' => 'required',
            'price' => 'required',
            'payment_date' => 'required',
            'is_paid' => 'boolean',
        ]);

        $electricity->update($formFields);

        return redirect('dashboard');
    }
}
