<?php

namespace App\Http\Controllers;

use App\Models\UnderAccount;
use Illuminate\Http\Request;

class UnderAccountController extends Controller
{
    public function AllUnderAccounts()
    {
       $underAccounts = UnderAccount::latest()->get();// Retrieve all clients from the database
        return view('backend.underAccounts.all_under_accounts', compact('underAccounts'));//
    }

    public function AddUnderAccount()
    {
        $underAccounts = UnderAccount::latest()->get();// Retrieve all clients from the database
        return view('backend.underAccounts.add_under_account', compact('underAccounts'));
        // return view('backend.clients.add_client');
    }

    public function StoreUnderAccount(Request $request)
    {
        $validatedData = $request->validate([
            'under_account_name' => 'required|string|max:100',
            'servicunder_account_desc' => 'string',
            
        // Add more validation rules for other fields
        ]);

        $underAccount = new UnderAccount($validatedData);
        $underAccount->user_id = auth()->user()->id; // Associate the client with the logged-in user
        $underAccount->save();

        return redirect('/all/under-ccounts')->with('success', 'Under Account created successfully');
        
        
      
    }

    public function ShowUnderAccount($id)
    {
        $services = UnderAccount::findOrFail($id);
        return view('backend.underAccounts.show_under-account', compact('underAccounts'));
    }

    public function EditUnderAccount($id)
    {
        $services = UnderAccount::findOrFail($id);
        return view('backend.underAccounts.edit_under_account', compact('underAccounts'));
    }

   
    public function UpdateUnderAccount(Request $request, UnderAccount $underAccounts)
    {
    
        
        $undrAcco = $request->id;
        UnderAccount::findOrFail($undrAcco)->update([
            'under_account_name' => $request->under_account_name,
            'under_account_desc' => $request->under_account_desc,
            
            // Add more validation rules for other fields
        ]);
        $underAccounts->user_id = auth()->user()->id;
        

        return redirect('/all/under-accounts')->with('success', 'Under Account updated successfully');
    }

    public function DeleteUnderAccount(UnderAccount $underAccounts, $id)
    {
        // $underAccount->delete();

        // $clt = $request->id;
        UnderAccount::findOrFail($id)->delete();
        return redirect('/all/under-accounts')->with('success', 'Under Account deleted successfully');
    }
}
