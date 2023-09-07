<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use App\Models\Supplier;

class SupplierController extends Controller
{
    public function AllSupplier()
    {
       $suppliers = Supplier::latest()->get();// Retrieve all clients from the database
        return view('backend.suppliers.all_suppliers', compact('suppliers'));//
    }

    public function AddSupplier()
    {
        $suppliers = Supplier::latest()->get();// Retrieve all clients from the database
        return view('backend.suppliers.add_supplier', compact('suppliers'));
        // return view('backend.clients.add_client');
    }

    public function StoreSupplier(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:clients,email',
            'cci' => 'required|string|max:100',
            'description' => 'string|max:400',
        // Add more validation rules for other fields
        ]);

        $supplier = new Supplier($validatedData);
        $supplier->user_id = auth()->user()->id; // Associate the client with the logged-in user
        $supplier->save();

        return redirect('/all/suppliers')->with('success', 'Supplier created successfully');
        
        // Validate the incoming request data
        // $validatedData = $request->validate([
        //     'name' => 'required|string|max:100',
        //     'email' => 'required|email|unique:clients,email',
        //     'cci' => 'required|string|max:100',
        //     'description' => 'string|max:400',
        //     // Add more validation rules for other fields
        // ]);

        // Client::insert([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'cci' => $request->cci,
        //     'description' => $request->description,
        //     // Add more validation rules for other fields
        // ]);

        // // Create a new client using the validated data
        // $client = Client::create($validatedData);

        // return redirect('/all.clients')->with('success', 'Client created successfully');

////////////////////---------------------------------------------------
      
    }

    public function show($id)
    {
        $suppliers = Supplier::findOrFail($id);
        return view('backend.suppliers.show_client', compact('suppliers'));
    }

    public function EditSupplier($id)
    {
        $suppliers = Supplier::findOrFail($id);
        return view('backend.suppliers.edit_supplier', compact('suppliers'));
    }

   
    public function UpdateSupplier(Request $request, Supplier $suppliers)
    {
    
        
        $spl = $request->id;
        $suppliers =  Supplier::findOrFail($spl);
        $suppliers->update([
            'name' => $request->name,
            'email' => $request->email,
            'cci' => $request->cci,
            'description' => $request->description,
            
            // Add more validation rules for other fields
        ]);
        $suppliers->user_id = auth()->user()->id;
        $suppliers->save();
        

        return redirect('/all/suppliers')->with('success', 'Supplier updated successfully');
    }

    public function DeleteSupplier(Supplier $supplier, $id)
    {
        // $supplier->delete();

        // $clt = $request->id;
          Supplier::findOrFail($id)->delete();
        return redirect('/all/suppliers')->with('success', 'Supplier deleted successfully');
    }
}
