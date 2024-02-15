<?php

namespace App\Http\Controllers;
use App\Models\Quote;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class QuoteController extends Controller
{
    public function index()
    {
        $user_id = Auth::id();
        $quote = Quote::where('user_id', $user_id)->get();
        return view('users.userQoutes', compact('quote'));
    }

    public function GutterCleaning()
    {
        return view('quoteGutterCleaning');
    }

    public function GutterGuardInstallation()
    {
        return view('quoteGutterGuardInstallation');
    }

    public function PowerWash()
    {
        return view('quotePowerWash');
    }

    public function RoofCleaning()
    {
        return view('quoteRoofCleaning');
    }

    public function SolarPanelCleaning()
    {
        return view('quoteSolarPanelCleaning');
    }

    public function WindowCleaning()
    {
        return view('quoteWindowCleaning');
    }


    public function store(Request $request)
    {

        $request->validate([
            'user_id' => 'string|max:20',
            'quote_date' => 'nullable',
            'service_type' => 'nullable',
            'property_address' => 'string|max:255',
            'type_of_roof' => 'nullable',
            'gutter_size' => 'nullable',
            'gutter_length' => 'nullable',
            'with_gutter_guard' => 'nullable',
            'window_qty' => 'nullable',
            'solar_qty' => 'nullable',
            'with_algae' => 'nullable',
            'type_of_area' => 'nullable',
            'area_size' => 'nullable',
            'photo' => 'nullable|mimes:png,jpg,jpeg,webp',
            'quote' => 'nullable',
            'comment' => 'nullable',
            'status' => 'nullable',
            'with_personal_info' => 'nullable'
        ]);

        $path = '';
        $filename = '';

        if($request->has('photo')){
            $file = $request->file('photo');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $path = 'uploads/quotes/';
            $file->move( $path, $filename);
        }    

         Quote::create([
            'user_id' => $request->user_id,
            'quote_date' => $request->quote_date,
            'service_type' => $request->service_type,
            'property_address' => $request->property_address,
            'type_of_roof' => $request->type_of_roof,
            'gutter_size' => $request->gutter_size,
            'gutter_length' => $request->gutter_length,
            'with_gutter_guard' => $request->with_gutter_guard,
            'window_qty' => $request->window_qty,
            'solar_qty' => $request->solar_qty,
            'with_algae' => $request->with_algae,
            'type_of_area' => $request->type_of_area,
            'area_size' => $request->area_size,
            'photo' =>  $path.$filename,
            'quote' => $request->quote ?? 'Pending',
            'comment' => $request->comment,
            'status' => $request->status ?? 'Pending',
            'with_personal_info' => $request->with_personal_info ?? 'no',
         ]);   

         return redirect('/my-quotes')->with('status', 'Quote Request Submitted Successfully');

    }

    public function GutterCleaningEdit(int $id){
        $quote = Quote::findOrFail($id);
        return view('quoteGutterCleaningEdit', compact('quote'));
    }

    public function GutterGuardInstallationEdit(int $id)
    {
        $quote = Quote::findOrFail($id);
        return view('quoteGutterGuardInstallationEdit', compact('quote'));
    }

    public function PowerWashEdit(int $id){
        $quote = Quote::findOrFail($id);
        return view('quotePowerWashEdit', compact('quote'));
    }

    public function RoofCleaningEdit(int $id){
        $quote = Quote::findOrFail($id);
        return view('quoteRoofCleaningEdit', compact('quote'));
    }

    public function SolarCleaningEdit(int $id){
        $quote = Quote::findOrFail($id);
        return view('quoteSolarPanelCleaningEdit', compact('quote'));
    }

    public function WindowCleaningEdit(int $id){
        $quote = Quote::findOrFail($id);
        return view('quoteWindowCleaningEdit', compact('quote'));
    }


    public function update(Request $request, int $id)
    {
        $request->validate([
            'user_id' => 'string|max:20',
            'quote_date' => 'nullable',
            'service_type' => 'nullable',
            'property_address' => 'string|max:255',
            'type_of_roof' => 'nullable',
            'gutter_size' => 'nullable',
            'gutter_length' => 'nullable',
            'with_gutter_guard' => 'nullable',
            'window_qty' => 'nullable',
            'solar_qty' => 'nullable',
            'with_algae' => 'nullable',
            'type_of_area' => 'nullable',
            'area_size' => 'nullable',
            'photo' => 'nullable|mimes:png,jpg,jpeg,webp',
            'quote' => 'nullable',
            'comment' => 'nullable',
            'status' => 'nullable',
            'with_personal_info' => 'nullable'
        ]);

        $path = '';
        $filename = '';

        if($request->has('photo')){
            $file = $request->file('photo');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $path = 'uploads/quotes/';
            $file->move( $path, $filename);
        }    

         Quote::findOrFail($id)->update([
            'user_id' => $request->user_id,
            'quote_date' => $request->quote_date,
            'service_type' => $request->service_type,
            'property_address' => $request->property_address,
            'type_of_roof' => $request->type_of_roof,
            'gutter_size' => $request->gutter_size,
            'gutter_length' => $request->gutter_length,
            'with_gutter_guard' => $request->with_gutter_guard,
            'window_qty' => $request->window_qty,
            'solar_qty' => $request->solar_qty,
            'with_algae' => $request->with_algae,
            'type_of_area' => $request->type_of_area,
            'area_size' => $request->area_size,
            'photo' =>  $path.$filename,
            'quote' => $request->quote ?? 'Pending',
            'comment' => $request->comment,
            'status' => $request->status ?? 'Pending',
            'with_personal_info' => $request->with_personal_info ?? 'no',
         ]);   

         return redirect('/my-quotes')->with('status', 'Quote Request Updated Successfully');

    }

    //ADMIN
    public function adminview()
    {
        $quote = Quote::get();
        return view('admin.adminQuotes', compact('quote'));
    }

    public function adminedit(int $id){
        $quote = Quote::findOrFail($id);
        return view('admin.adminQuotesEdit', compact('quote'));
    }

    public function adminupdate(Request $request, int $id)
    {
        $request->validate([
            'user_id' => 'string|max:20',
            'quote_date' => 'nullable',
            'service_type' => 'nullable',
            'property_address' => 'string|max:255',
            'type_of_roof' => 'nullable',
            'gutter_size' => 'nullable',
            'gutter_length' => 'nullable',
            'with_gutter_guard' => 'nullable',
            'window_qty' => 'nullable',
            'solar_qty' => 'nullable',
            'with_algae' => 'nullable',
            'type_of_area' => 'nullable',
            'area_size' => 'nullable',
            'photo' => 'nullable|mimes:png,jpg,jpeg,webp',
            'quote' => 'nullable',
            'comment' => 'nullable',
            'status' => 'nullable',
            'with_personal_info' => 'nullable'
        ]);

        $path = '';
        $filename = '';

        if($request->has('photo')){
            $file = $request->file('photo');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $path = 'uploads/quotes/';
            $file->move( $path, $filename);
        }    

         Quote::findOrFail($id)->update([
            'user_id' => $request->user_id,
            'quote_date' => $request->quote_date,
            'service_type' => $request->service_type,
            'property_address' => $request->property_address,
            'type_of_roof' => $request->type_of_roof,
            'gutter_size' => $request->gutter_size,
            'gutter_length' => $request->gutter_length,
            'with_gutter_guard' => $request->with_gutter_guard,
            'window_qty' => $request->window_qty,
            'solar_qty' => $request->solar_qty,
            'with_algae' => $request->with_algae,
            'type_of_area' => $request->type_of_area,
            'area_size' => $request->area_size,
            'photo' =>  $path.$filename,
            'quote' => $request->quote ?? 'Pending',
            'comment' => $request->comment,
            'status' => $request->status ?? 'Pending',
            'with_personal_info' => $request->with_personal_info ?? 'no',
         ]);   

         return redirect('/admin/quotes')->with('status', 'Quote Updated Successfully');

    }

    public function destroy(int $id)
    {
        $quote = Quote::findOrFail($id);
        $quote->delete();

        return redirect()->back()->with('status', 'Quote Request Deleted Successfully');
    }
}
