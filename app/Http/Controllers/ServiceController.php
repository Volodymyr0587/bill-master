<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('payments.services.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('payments.services.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $formFields = $this->validate($request, [
            'name' => 'required',
            'amount' => 'required',
            'price' => 'required',
            'payment_date' => 'required',
            'is_paid' => 'boolean',
        ]);


        $user = Auth::user();

        $service = new Service($formFields);

        // Associate the expense with the authenticated user
        $user->services()->save($service);

        return redirect()->route('service.show')->with('message.create', 'Payment created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Service $service)
    {
        $user = Auth::user();

        $service = $user->services()->orderBy('payment_date', 'desc')->simplePaginate(5);

        return view('payments.services.show', ['service' => $service]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {
        return view('payments.services.edit', ['service' => $service]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Service $service)
    {
        $formFields = $this->validate($request, [
            'name' => 'required',
            'amount' => 'required',
            'price' => 'required',
            'payment_date' => 'required',
            'is_paid' => 'boolean',
        ]);

        $service->is_paid = $request->boolean('is_paid');

        $service->update($formFields);

        // // Debugging
        // Log::info('is_paid value: ' . $service->is_paid);

        return redirect()->route('service.show')->with('message.update', 'Payment updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        $service->delete();
        return redirect()->route('service.show')->with('message.destroy', 'Payment deleted successfully');
    }
}
