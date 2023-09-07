<?php

namespace App\Http\Controllers;
use App\Models\Checkbook;

use Illuminate\Http\Request;

class CheckbookController extends Controller
{
    public function AllCheckbooks()
    {
       $checkbooks = Checkbook::latest()->get();// Retrieve all clients from the database
        return view('backend.checkbooks.all_checkbooks', compact('checkbooks'));//
    }

    public function AddCheckbook()
    {
        $checkbooks = Checkbook::latest()->get();// Retrieve all clients from the database
        return view('backend.checkbooks.add_checkbook', compact('checkbooks'));
        // return view('backend.clients.add_client');
    }

    public function StoreCheckbook(Request $request)
    {
        

        $validatedData = $request->validate([
            'reception_date' => 'required|date',
            'series' => 'required|string',
            'start_number' => 'required|integer',
            'quantity' => 'required|integer',
        ]);

        $checkbook = new Checkbook($validatedData);
        $checkbook->user_id = auth()->user()->id; 
        $checkbook->save();

        return redirect('/all/checkbooks')->with('success', 'Checkbook created successfully');
        
        
      
    }

    public function ShowCheckbook($id)
    {
        $checkbooks = Checkbook::findOrFail($id);;// Retrieve all clients from the database
        return view('backend.checkbooks.show_checkbook', compact('checkbooks'));
        
    }

    public function EditCheckbook($id)
    {
        $checkbooks = Checkbook::findOrFail($id);
        return view('backend.checkbooks.edit_checkbook', compact('checkbooks'));
    }

   
    public function UpdateCheckbook(Request $request, Checkbook $checkbook)
    {
    
            $cbkId = $request->id; // Assuming you're passing the ID through the request
            $checkbook = Checkbook::findOrFail($cbkId);

            // Update the checkbook record
            $checkbook->update([
                'reception_date' => $request->reception_date,
                'series' => $request->series,
                'start_number' => $request->start_number,
                'quantity' => $request->quantity,
                'status' => $request->status,
            ]);

            // Update the user ID associated with this checkbook
            $checkbook->user_id = auth()->user()->id;
            $checkbook->save();
        
        

        return redirect('/all/checkbooks')->with('success', 'Checkbook updated successfully');
    }

    public function DeleteCheckbook(Checkbook $checkbook, $id)
    {
        // $checkbook->delete();

        // $clt = $request->id;
        Checkbook::findOrFail($id)->delete();
        return redirect('/all/checkbooks')->with('success', 'Checkbook deleted successfully');
    }
}
