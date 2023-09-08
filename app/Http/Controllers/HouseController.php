<?php

namespace App\Http\Controllers;

use App\Models\House;
use Illuminate\Http\Request;

class HouseController extends Controller
{
    public function AllHouses()
    {
       $houses = House::latest()->get();// Retrieve all clients from the database
        return view('backend.houses.all_houses', compact('houses'));//
    }

    public function AddHouse()
    {
        $houses = House::latest()->get();// Retrieve all clients from the database
        return view('backend.houses.add_house', compact('houses'));
        // return view('backend.clients.add_client');
    }

    public function StoreHouse(Request $request)
    {
        $validatedData = $request->validate([
            'house_name' => 'required|string|max:100',
            'house_desc' => 'string',
            
        // Add more validation rules for other fields
        ]);

        $house = new House($validatedData);
        $house->user_id = auth()->user()->id; // Associate the client with the logged-in user
        $house->save();

        return redirect('/all/houses')->with('success', 'House created successfully');
        
        
      
    }

    public function ShowHouse($id)
    {
        $houses = House::findOrFail($id);
        return view('backend.houses.show_house', compact('houses'));
    }

    public function EditHouse($id)
    {
        $houses = House::findOrFail($id);
        return view('backend.houses.edit_house', compact('houses'));
    }

   
    public function UpdateHouse(Request $request, House $houses)
    {
    
        
        $house = $request->id;
        House::findOrFail($house)->update([
            'house_name' => $request->house_name,
            'house_desc' => $request->house_desc,
            
            // Add more validation rules for other fields
        ]);
        $houses->user_id = auth()->user()->id;
        

        return redirect('/all/houses')->with('success', 'House updated successfully');
    }

    public function DeleteHouse(House $house, $id)
    {
        // $house->delete();

        // $clt = $request->id;
        House::findOrFail($id)->delete();
        return redirect('/all/under-accounts')->with('success', 'House deleted successfully');
    }
}
