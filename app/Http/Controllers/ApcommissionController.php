<?php

namespace App\Http\Controllers;

use App\Models\Apcommission;
use Illuminate\Http\Request;

class ApcommissionController extends Controller
{
    public function AllAutoParticulierCommissions()
    {
       $apcommissions = Apcommission::latest()->get();// Retrieve all remunerations from the database
        return view('backend.apcommissions.all_auto_particulier_commissions', compact('apcommissions'));//
    }

    public function AddAutoParticulierCommission()
    {
        $apcommissions = Apcommission::latest()->get();// Retrieve all remunerations from the database
        return view('backend.apcommissions.add_auto_particulier_commission', compact('apcommissions'));
        
    }

    public function StoreAutoParticulierCommission(Request $request)
    {
        $validatedData = $request->validate([
            'ap_commission_name' => 'required|string|max:100',
            'ap_commission_desc' => 'string',
            
        // Add more validation rules for other fields
        ]);

        $apcommission = new Apcommission($validatedData);
        $apcommission->user_id = auth()->user()->id; // Associate the remuneration with the logged-in user
        $apcommission->save();

        return redirect('/all/auto-particulier-commissions')->with('success', 'Persona Commission created successfully');
        
        
      
    }

    public function ShowAutoParticulierCommission($id)
    {
        $apcommissions = Apcommission::findOrFail($id);
        return view('backend.apcommissions.show_auto_particulier_commission', compact('apcommissions'));
    }

    public function EditAutoParticulierCommission($id)
    {
        $apcommissions = Apcommission::findOrFail($id);
        return view('backend.apcommissions.edit_auto_particulier_commission', compact('apcommissions'));
    }

   
    public function UpdateAutoParticulierCommission(Request $request, Apcommission $apcommissions)
    {
    
        
        $auto = $request->id;
        Apcommission ::findOrFail($auto)->update([
            'ap_commission_name' => $request->ap_commission_name,
            'ap_commission_desc' => $request->ap_commission_desc,
            
            // Add more validation rules for other fields
        ]);
        $apcommissions->user_id = auth()->user()->id;
        

        return redirect('/all/auto-particulier-commissions')->with('success', 'Persona Commission updated successfully');
    }

    public function DeleteAutoParticulierCommission(Apcommission $apcommission, $id)
    {
        //PARTICULIERS
        // $apcommission->delete();

        // $clt = $request->id;
        Apcommission::findOrFail($id)->delete();
        return redirect('/all/auto-particulier-commissions')->with('success', 'Persona Commission deleted successfully');
    }
}
