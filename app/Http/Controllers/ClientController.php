<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Client; // Make sure to import the Client model at the top

class ClientController extends Controller
{
    public function AllClients()
    {
       $clients = Client::latest()->get();// Retrieve all clients from the database
        return view('backend.clients.all_clients', compact('clients'));//
    }

    public function AddClient()
    {
        $clients = Client::latest()->get();// Retrieve all clients from the database
        return view('backend.clients.add_client', compact('clients'));
        // return view('backend.clients.add_client');
    }

    public function StoreClient(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:clients,email',
            'cci' => 'required|string|max:100',
            'description' => 'string|max:400',
        // Add more validation rules for other fields
        ]);

        $client = new Client($validatedData);
        $client->user_id = auth()->user()->id; // Associate the client with the logged-in user
        $client->save();

        return redirect('/all/clients')->with('success', 'Client created successfully');
        
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
        $clients = Client::findOrFail($id);
        return view('backend.clients.show_client', compact('clients'));
    }

    public function EditClient($id)
    {
        $clients = Client::findOrFail($id);
        return view('backend.clients.edit_client', compact('clients'));
    }

   
    public function UpdateClient(Request $request, Client $clients)
    {
    
        
        $clt = $request->id;
          Client::findOrFail($clt)->update([
            'name' => $request->name,
            'email' => $request->email,
            'cci' => $request->cci,
            'description' => $request->description,
            
            // Add more validation rules for other fields
        ]);
        $clients->user_id = auth()->user()->id;
        

        return redirect('/all/clients')->with('success', 'Client updated successfully');
    }

    public function DeleteClient(Client $client, $id)
    {
        // $client->delete();

        // $clt = $request->id;
          Client::findOrFail($id)->delete();
        return redirect('/all/clients')->with('success', 'Client deleted successfully');
    }
}
