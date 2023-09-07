<?php

namespace App\Http\Controllers;

use App\Models\Typetransfer;
use Illuminate\Http\Request;

class TypetransfersController extends Controller
{
    public function AllTypetransfers()
    {
       $typetransfers = Typetransfer::latest()->get();// Retrieve all clients from the database
        return view('backend.typetransfers.all_typetransfers', compact('typetransfers'));//
    }

    public function AddTypetransfer()
    {
        $typetransfers = Typetransfer::latest()->get();// Retrieve all clients from the database
        return view('backend.typetransfers.add_typetransfer', compact('typetransfers'));
        // return view('backend.clients.add_client');
    }

    public function StoreTypetransfer(Request $request)
    {
        $validatedData = $request->validate([
            'type_transfer' => 'required|string|max:100',
            'description' => 'max:400',
        ]);

        $typetransfer = new Typetransfer($validatedData);
        $typetransfer->user_id = auth()->user()->id; 
        $typetransfer->save();


        return redirect('/all/types-transfers')->with('success', 'Supplier created successfully');
       
    }

    public function show($id)
    {
        $typetransfers = Typetransfer::findOrFail($id);
        return view('backend.typetransfers.show_typetransfer', compact('typetransfers'));
    }

    public function EditTypetransfer($id)
    {
        $typetransfers = Typetransfer::findOrFail($id);
        return view('backend.typetransfers.edit_typetransfer', compact('typetransfers'));
    }

   
    public function UpdateTypetransfer(Request $request, Typetransfer $typetransfers)
    {
    
            $typetrans = $request->id; // Assuming you're passing the ID through the request
            $typetransfer = Typetransfer::findOrFail($typetrans);

            // Update the checkbook record
            $typetransfer->update([
                'type_transfer' => $request->type_transfer,
                'description' => $request->description,
            ]);

            // Update the user ID associated with this checkbook
            $typetransfer->user_id = auth()->user()->id;
            $typetransfer->save();
            
        
        

        return redirect('/all/types-transfers')->with('success', 'Type of transfer updated successfully');
    }

    public function DeleteTypetransfer(Typetransfer $typetransfer, $id)
    {
        // $typetransfer->delete();

        // $clt = $request->id;
        Typetransfer::findOrFail($id)->delete();
        return redirect('/all/typetransfers')->with('success', 'Type of transfer deleted successfully');
    }
}
