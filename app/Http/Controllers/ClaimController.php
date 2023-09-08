<?php

namespace App\Http\Controllers;

use App\Models\Claim;
use Illuminate\Http\Request;

class ClaimController extends Controller
{
    public function AllClaims()
    {
       $claims = Claim::latest()->get();// Retrieve all clients from the database
        return view('backend.claims.all_claims', compact('claims'));//
    }

    public function AddClaim()
    {
        $claims = Claim::latest()->get();// Retrieve all clients from the database
        return view('backend.claims.add_claim', compact('claims'));
        // return view('backend.clients.add_client');
    }

    public function StoreClaim(Request $request)
    {
        $validatedData = $request->validate([
            'claim_name' => 'required|string|max:100',
            'claim_desc' => 'string',
            
        // Add more validation rules for other fields
        ]);

        $claim = new Claim($validatedData);
        $claim->user_id = auth()->user()->id; // Associate the client with the logged-in user
        $claim->save();

        return redirect('/all/claims')->with('success', 'House created successfully');
        
        
      
    }

    public function ShowClaim($id)
    {
        $claims = Claim::findOrFail($id);
        return view('backend.claims.show_claim', compact('claims'));
    }

    public function EditClaim($id)
    {
        $claims = Claim::findOrFail($id);
        return view('backend.claims.edit_claim', compact('claims'));
    }

   
    public function UpdateClaim(Request $request, Claim $claims)
    {
    
        
        $claim = $request->id;
        Claim::findOrFail($claim)->update([
            'claim_name' => $request->claim_name,
            'claim_desc' => $request->claim_desc,
            
            // Add more validation rules for other fields
        ]);
        $claims->user_id = auth()->user()->id;
        

        return redirect('/all/claims')->with('success', 'Claim updated successfully');
    }

    public function DeleteClaim(Claim $claim, $id)
    {
        // $claim->delete();

        // $clt = $request->id;
        Claim::findOrFail($id)->delete();
        return redirect('/all/claims')->with('success', 'Claim deleted successfully');
    }
}
