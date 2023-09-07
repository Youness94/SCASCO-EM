<?php

namespace App\Http\Controllers;

use App\Models\Billexchange;
use Illuminate\Http\Request;

class BillexchangeController extends Controller
{
    public function AllBillexchanges()
    {
       $billexchanges = Billexchange::latest()->get();// Retrieve all clients from the database
        return view('backend.billexchanges.all_billexchanges', compact('billexchanges'));//
    }

    public function AddBillexchange()
    {
        $billexchanges = Billexchange::latest()->get();// Retrieve all clients from the database
        return view('backend.billexchanges.add_billexchange', compact('billexchanges'));
        // return view('backend.clients.add_client');
    }

    public function StoreBillexchange(Request $request)
    {
        

        $validatedData = $request->validate([
            'reception_date' => 'required|date',
            'series' => 'required|string',
            'start_number' => 'required|integer',
            'quantity' => 'required|integer',
        ]);

        $billexchange = new Billexchange($validatedData);
        $billexchange->user_id = auth()->user()->id; 
        $billexchange->save();

        return redirect('/all/billexchanges')->with('success', 'Billexchange created successfully');
        
        
      
    }

    public function ShowBillexchange($id)
    {
        $billexchanges = Billexchange::findOrFail($id);;// Retrieve all clients from the database
        return view('backend.billexchanges.show_billexchange', compact('billexchanges'));
        
    }

    public function EditBillexchange($id)
    {
        $billexchanges = Billexchange::findOrFail($id);
        return view('backend.billexchanges.edit_billexchange', compact('billexchanges'));
    }

   
    public function UpdateBillexchange(Request $request, Billexchange $checkbook)
    {
    
            $billex = $request->id; // Assuming you're passing the ID through the request
            $billexchange = Billexchange::findOrFail($billex);

            // Update the checkbook record
            $billexchange->update([
                'reception_date' => $request->reception_date,
                'series' => $request->series,
                'start_number' => $request->start_number,
                'quantity' => $request->quantity,
                'status' => $request->status,
            ]);

            // Update the user ID associated with this checkbook
            $billexchange->user_id = auth()->user()->id;
            $billexchange->save();
        
        

        return redirect('/all/billexchanges')->with('success', 'Billexchange updated successfully');
    }

    public function DeleteBillexchange(Billexchange $billexchange, $id)
    {
        // $billexchange->delete();

        // $clt = $request->id;
        Billexchange::findOrFail($id)->delete();
        return redirect('/all/checkbooks')->with('success', 'Billexchange deleted successfully');
    }
}
