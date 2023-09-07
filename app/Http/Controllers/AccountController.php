<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function AllAccounts()
    {
       $accounts = Account::latest()->get();// Retrieve all clients from the database
        return view('backend.accounts.all_accounts', compact('accounts'));//
    }

    public function AddAccount()
    {
        $accounts = Account::latest()->get();// Retrieve all clients from the database
        return view('backend.accounts.add_account', compact('accounts'));
        // return view('backend.clients.add_client');
    }

    public function StoreAccount(Request $request)
    {
        $validatedData = $request->validate([
            'account_name' => 'required|string|max:100',
            'account_desc' => 'string',
            
        // Add more validation rules for other fields
        ]);

        $account = new Account($validatedData);
        $account->user_id = auth()->user()->id; // Associate the client with the logged-in user
        $account->save();

        return redirect('/all/accounts')->with('success', 'Account created successfully');
        
        
      
    }

    public function ShowAccount($id)
    {
        $accounts = Account::findOrFail($id);
        return view('backend.accounts.show_account', compact('accounts'));
    }

    public function EditAccount($id)
    {
        $accounts = Account::findOrFail($id);
        return view('backend.accounts.edit_account', compact('accounts'));
    }

   
    public function UpdateAccount(Request $request, Account $accounts)
    {
    
        
        $accnt = $request->id;
        Account::findOrFail($accnt)->update([
            'account_name' => $request->account_name,
            'account_desc' => $request->account_name,
            
            // Add more validation rules for other fields
        ]);
        $accounts->user_id = auth()->user()->id;
        

        return redirect('/all/accounts')->with('success', 'Account updated successfully');
    }

    public function DeleteAccount(Account $account, $id)
    {
        // $account->delete();

        // $clt = $request->id;
        Account::findOrFail($id)->delete();
        return redirect('/all/accounts')->with('success', 'Account deleted successfully');
    }
}
