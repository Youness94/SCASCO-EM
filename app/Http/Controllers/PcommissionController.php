<?php

namespace App\Http\Controllers;

use App\Models\Pcommission;
use Illuminate\Http\Request;

class PcommissionController extends Controller 
{
    public function AllPersonalCommissions()
    {
       $pcommissions = Pcommission::latest()->get();// Retrieve all remunerations from the database
        return view('backend.pcommissions.all_personal_commissions', compact('pcommissions'));//
    }

    public function AddPersonalCommission()
    {
        $pcommissions = Pcommission::latest()->get();// Retrieve all remunerations from the database
        return view('backend.pcommissions.add_personal_commission', compact('pcommissions'));
        
    }

    public function StorePersonalCommission(Request $request)
    {
        $validatedData = $request->validate([
            'personal_commission_name' => 'required|string|max:100',
            'personal_commission_desc' => 'string',
            
        // Add more validation rules for other fields
        ]);

        $pcommission = new Pcommission($validatedData);
        $pcommission->user_id = auth()->user()->id; // Associate the remuneration with the logged-in user
        $pcommission->save();

        return redirect('/all/personal-commissions')->with('success', 'Persona Commission created successfully');
        
        
      
    }

    public function ShowPersonalCommission($id)
    {
        $pcommissions = Pcommission::findOrFail($id);
        return view('backend.pcommissions.show_personal_commission', compact('pcommissions'));
    }

    public function EditPersonalCommission($id)
    {
        $pcommissions = Pcommission::findOrFail($id);
        return view('backend.pcommissions.edit_personal_commission', compact('pcommissions'));
    }

   
    public function UpdatePersonalCommission(Request $request, Pcommission $pcommissions)
    {
    
        
        $pecommi = $request->id;
        Pcommission ::findOrFail($pecommi)->update([
            'personal_commission_name' => $request-> personal_commission_name,
            'personal_commission_desc' => $request-> personal_commission_desc,
            
            // Add more validation rules for other fields
        ]);
        $pcommissions->user_id = auth()->user()->id;
        

        return redirect('/all/personal-commissions')->with('success', 'Persona Commission updated successfully');
    }

    public function DeletePersonalCommission(Pcommission $pcommissions, $id)
    {
        // $pcommission->delete();

        // $clt = $request->id;
        Pcommission::findOrFail($id)->delete();
        return redirect('/all/personal-commissions')->with('success', 'Persona Commission deleted successfully');
    }
}
