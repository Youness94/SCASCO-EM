<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function AllServices()
    {
       $services = Service::latest()->get();// Retrieve all clients from the database
        return view('backend.services.all_services', compact('services'));//
    }

    public function AddService()
    {
        $services = Service::latest()->get();// Retrieve all clients from the database
        return view('backend.services.add_service', compact('services'));
        // return view('backend.clients.add_client');
    }

    public function StoreService(Request $request)
    {
        $validatedData = $request->validate([
            'service_name' => 'required|string|max:100',
            'service_desc' => 'string',
            
        // Add more validation rules for other fields
        ]);

        $service = new Service($validatedData);
        $service->user_id = auth()->user()->id; // Associate the client with the logged-in user
        $service->save();

        return redirect('/all/services')->with('success', 'Service created successfully');
        
        
      
    }

    public function ShowService($id)
    {
        $services = Service::findOrFail($id);
        return view('backend.services.show_service', compact('services'));
    }

    public function EditService($id)
    {
        $services = Service::findOrFail($id);
        return view('backend.services.edit_service', compact('services'));
    }

   
    public function UpdateService(Request $request, Service $services)
    {
    
        
        $serv = $request->id;
        Service::findOrFail($serv)->update([
            'service_name' => $request->service_name,
            'service_desc' => $request->service_name,
            
            // Add more validation rules for other fields
        ]);
        $services->user_id = auth()->user()->id;
        

        return redirect('/all/services')->with('success', 'Service updated successfully');
    }

    public function DeleteService(Service $service, $id)
    {
        // $service->delete();

        // $clt = $request->id;
        Service::findOrFail($id)->delete();
        return redirect('/all/accounts')->with('success', 'Service deleted successfully');
    }
}
