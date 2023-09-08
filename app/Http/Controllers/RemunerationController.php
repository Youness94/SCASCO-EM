<?php

namespace App\Http\Controllers;

use App\Models\Remuneration;
use Illuminate\Http\Request;

class RemunerationController extends Controller
{
    public function AllRemunerations()
    {
       $remunerations = Remuneration::latest()->get();// Retrieve all remunerations from the database
        return view('backend.remunerations.all_remunerations', compact('remunerations'));//
    }

    public function AddRemuneration()
    {
        $remunerations = Remuneration::latest()->get();// Retrieve all remunerations from the database
        return view('backend.remunerations.add_remuneration', compact('remunerations'));
        
    }

    public function StoreRemuneration(Request $request)
    {
        $validatedData = $request->validate([
            'remuneration_name' => 'required|string|max:100',
            'remuneration_desc' => 'string',
            
        // Add more validation rules for other fields
        ]);

        $remuneration = new Remuneration($validatedData);
        $remuneration->user_id = auth()->user()->id; // Associate the remuneration with the logged-in user
        $remuneration->save();

        return redirect('/all/remunerations')->with('success', 'Remuneration created successfully');
        
        
      
    }

    public function ShowRemuneration($id)
    {
        $remunerations = Remuneration::findOrFail($id);
        return view('backend.remunerations.show_remuneration', compact('remunerations'));
    }

    public function EditRemuneration($id)
    {
        $remunerations = Remuneration::findOrFail($id);
        return view('backend.remunerations.edit_remuneration', compact('remunerations'));
    }

   
    public function UpdateRemuneration(Request $request, Remuneration $remunerations)
    {
    
        
        $remun = $request->id;
        Remuneration::findOrFail($remun)->update([
            'remuneration_name' => $request->remuneration_name,
            'remuneration_desc' => $request->remuneration_desc,
            
            // Add more validation rules for other fields
        ]);
        $remunerations->user_id = auth()->user()->id;
        

        return redirect('/all/remunerations')->with('success', 'Remuneration updated successfully');
    }

    public function DeleteRemuneration(Remuneration $remuneration, $id)
    {
        // $remuneration->delete();

        // $clt = $request->id;
        Remuneration::findOrFail($id)->delete();
        return redirect('/all/remunerations')->with('success', 'Remuneration deleted successfully');
    }
}
