<?php

namespace App\Http\Controllers;

use App\Models\Electricity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

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

        // Set a success toast, with a title
        toastr()->success('Data has been saved successfully!', 'Congrats');

        return redirect()->route('electricity.show')->with('message.create', 'Payment created successfully');
    }

    public function show()
    {
        $user = Auth::user();

        $electricity = $user->electricities()->orderBy('payment_date', 'desc')->simplePaginate(5);

        return view('payments.electricity.show', ['electricity' => $electricity]);
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

        $electricity->is_paid = $request->boolean('is_paid');

        $electricity->update($formFields);

        // // Debugging
        // Log::info('is_paid value: ' . $electricity->is_paid);

        toastr()->info('Data has been updated successfully!', 'Congrats');

        return redirect()->route('electricity.show')->with('message.update', 'Payment updated successfully');
    }

    public function destroy(Electricity $electricity)
    {
        $electricity->delete();

        toastr()->warning('Data has been deleted successfully!', 'Congrats');
        return redirect()->route('electricity.show')->with('message.destroy', 'Payment deleted successfully');
    }
}
