<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function AllCompanies()
    {
       $companies = Company::latest()->get();// Retrieve all clients from the database
        return view('backend.companies.all_companies', compact('companies'));//
    }

    public function AddCompany()
    {
        $companies = Company::latest()->get();// Retrieve all clients from the database
        return view('backend.companies.add_company', compact('companies'));
        // return view('backend.clients.add_client');
    }

    public function StoreCompany(Request $request)
    {
        $validatedData = $request->validate([
            'account_name' => 'required|string|max:100',
            'account_desc' => 'string',
            
        // Add more validation rules for other fields
        ]);

        $company = new Company($validatedData);
        $company->user_id = auth()->user()->id; // Associate the client with the logged-in user
        $company->save();

        return redirect('/all/companies')->with('success', 'Account created successfully');
        
        
      
    }

    public function ShowCompany($id)
    {
        $companies = Company::findOrFail($id);
        return view('backend.companies.show_company', compact('companies'));
    }

    public function EditCompany($id)
    {
        $companies = Company::findOrFail($id);
        return view('backend.companies.edit_company', compact('companies'));
    }

   
    public function UpdateCompany(Request $request, Company $companies)
    {
    
        
        $comp = $request->id;
        Company::findOrFail($comp)->update([
            'company_name' => $request->company_name,
            'company_desc' => $request->company_desc,
            
            // Add more validation rules for other fields
        ]);
        $companies->user_id = auth()->user()->id;
        

        return redirect('/all/companies')->with('success', 'Company updated successfully');
    }

    public function DeleteCompany(Company $company, $id)
    {
        // $company->delete();

        // $clt = $request->id;
        Company::findOrFail($id)->delete();
        return redirect('/all/companies')->with('success', 'Company deleted successfully');
    }
}
