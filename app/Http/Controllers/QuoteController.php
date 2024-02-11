<?php

namespace App\Http\Controllers;

use App\Models\Quote;
use Illuminate\Http\Request;

class QuoteController extends Controller
{
    /**
     * Display a listing of quotes.
     */
    public function index()
    {
        return view('users.userQoutes');
    }

    public function Guttercleaning(){
        return view('serviceGuttercleaning');
    }

    public function Gutterguardinstall(){
        return view('serviceGutterguardinstall');
    }

    public function Powerwash(){
        return view('servicePowerwash');
    }

    public function Roofcleaning(){
        return view('serviceRoofcleaning');
    }

    public function Solarpanelcleaning(){
        return view('serviceSolarpanelcleaning');
    }

    public function Windowcleaning(){
        return view('serviceWindowcleaning');
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'quote_date' => 'required|date',
            'service_type' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'type_of_roof' => 'nullable|string|max:255',
            'gutter_size' => 'nullable|string|max:255',
            'gutter_length' => 'nullable|string|max:255',
            'with_gutter_guard' => 'nullable|string|max:255',
            'window_qty' => 'nullable|integer|min:0',
            'solar_qty' => 'nullable|integer|min:0',
            'with_algae' => 'nullable|boolean',
            'type_of_area' => 'nullable|string|max:255',
            'area_size' => 'nullable|integer|min:0',
            'price' => 'nullable|numeric|min:0',
            'comments' => 'nullable|string',
            'status' => 'required|in:pending,accepted,cancelled',
        ]);

        Quote::create([
            'user_id' => $request->user_id,
            'quote_date' => $request->quote_date,
            'service_type' => $request->service_type,
            'address' => $request->address,
            'type_of_roof' => $request->type_of_roof,
            'gutter_size' => $request->gutter_size,
            'gutter_length' => $request->gutter_length,
            'with_gutter_guard' => $request->gutter_guard,
            'window_qty' => $request->window_qty,
            'solar_qty' => $request->solar_qty,
            'with_algae' => $request->with_algae,
            'type_of_area' => $request->type_of_area,
            'area_size' => $request->area_size,
            'price' => $request->price,
            'comments' => $request->comments,
            'status' => $request->status,
        ]);

        return redirect('/quotes')->with('status','Qoute request submitted');
    }

    /**
     * Display the specified quote.
     */
    public function show($id)
    {
        $quote = Quote::findOrFail($id);
        return response()->json($quote);
    }

    /**
     * Update the specified quote in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'quote_date' => 'sometimes|required|date',
            'service_type' => 'sometimes|required|string|max:255',
            'address' => 'sometimes|required|string|max:255',
            'type_of_roof' => 'nullable|string|max:255',
            'gutter_size' => 'nullable|string|max:255',
            'gutter_length' => 'nullable|string|max:255',
            'gutter_guard' => 'nullable|string|max:255',
            'window_qty' => 'nullable|integer|min:0',
            'solar_qty' => 'nullable|integer|min:0',
            'with_algae' => 'nullable|boolean',
            'type_of_area' => 'nullable|string|max:255',
            'area_size' => 'nullable|integer|min:0',
            'price' => 'nullable|numeric|min:0',
            'comments' => 'nullable|string',
            'status' => 'required|in:pending,accepted,cancelled',
        ]);

        $quote = Quote::findOrFail($id);
        $quote->update($validatedData);

        return response()->json($quote);
    }

    /**
     * Remove the specified quote from storage.
     */
    public function destroy($id)
    {
        Quote::destroy($id);
        return response()->json(null, 204);
    }
}
