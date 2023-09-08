<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\ApcommissionController;
use App\Http\Controllers\BillexchangeController;
use App\Http\Controllers\CheckbookController;
use App\Http\Controllers\CheckController;
use App\Http\Controllers\ClaimController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\HouseController;
use App\Http\Controllers\PcommissionController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\RegulationsController;
use App\Http\Controllers\RemunerationController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\TypetransfersController;
use App\Http\Controllers\UnderAccountController;

// use App\Http\Controllers\CheckbookController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// start group admin middleware
Route::middleware(['auth', 'role:admin'])->group(function(){
    Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');
    Route::get('/admin/logout', [AdminController::class, 'AdminLogout'])->name('admin.logout');
    Route::get('/admin/profile', [AdminController::class, 'AdminProfile'])->name('admin.profile');
    Route::post('/admin/profile/store', [AdminController::class, 'AdminProfileStore'])->name('admin.profile.store');
    Route::get('/admin/change/password', [AdminController::class, 'AdminChangePassword'])->name('admin.change.password');
    Route::post('/admin/update/password', [AdminController::class, 'AdminUpdatePassword'])->name('admin.update.password');



});// end group admin middleware

Route::middleware(['auth', 'role:agent'])->group(function(){
    Route::get('/agent/dashboard', [AgentController::class, 'AgentDashboard'])->name('agent.dashboard');
});// end group agent middleware3


Route::get('/admin/login', [AdminController::class, 'AdminLogin'])->name('admin.login');

Route::middleware(['auth', 'role:admin'])->group(function(){
    
    Route::controller(ClientController::class)->group(function(){
        Route::get('/all/clients', 'AllClients')->name('all.clients');
        Route::get('/add/client', 'AddClient')->name('add.client');
        Route::post('/store/client', 'StoreClient')->name('store.client');
        Route::get('/edit/client/{id}', 'EditClient')->name('edit.client');
        Route::post('/update/client', 'UpdateClient')->name('update.client');
        Route::get('/delete/client/{id}', 'DeleteClient')->name('delete.client');
    });
});// end group admin middleware

Route::middleware(['auth', 'role:admin'])->group(function(){
    
    Route::controller(SupplierController::class)->group(function(){
        Route::get('/all/suppliers', 'AllSupplier')->name('all.suppliers');
        Route::get('/add/supplier', 'AddSupplier')->name('add.supplier');
        Route::post('/store/supplier', 'StoreSupplier')->name('store.supplier');
        Route::get('/edit/supplier/{id}', 'EditSupplier')->name('edit.supplier');
        Route::post('/update/supplier', 'UpdateSupplier')->name('update.supplier');
        Route::get('/delete/supplier/{id}', 'DeleteSupplier')->name('delete.supplier');
    });
});// end group admin middleware

// Route::middleware(['auth', 'role:admin'])->group(function(){
    
//     Route::controller(RegulationsController::class)->group(function(){
//         Route::get('/all/regulations', 'AllRegulations')->name('all.regulations');
//         Route::get('/add/regulation', 'AddRegulation')->name('add.regulation');
//         Route::post('/store/regulation', 'StoreRegulation')->name('store.regulation');
//         Route::get('/edit/regulation/{id}', 'EditRegulation')->name('edit.regulation');
//         Route::post('/update/regulation', 'UpdateRegulation')->name('update.regulation');
//         Route::get('/delete/regulation/{id}', 'DeleteRegulation')->name('delete.regulation');
//     });
// });// end group admin middleware

Route::middleware(['auth', 'role:admin'])->group(function(){
    
    Route::controller(CheckbookController::class,)->group(function(){
        Route::get('/all/checkbooks', 'AllCheckbooks')->name('all.checkbooks');
        Route::get('/add/checkbook', 'AddCheckbook')->name('add.checkbook');
        Route::post('/store/checkbook', 'StoreCheckbook')->name('store.checkbook');
        Route::get('/show/checkbook/{id}', 'ShowCheckbook')->name('show.checkbook');
        Route::get('/edit/checkbook/{id}', 'EditCheckbook')->name('edit.checkbook');
        Route::post('/update/checkbook', 'UpdateCheckbook')->name('update.checkbook');
        Route::get('/delete/checkbook/{id}', 'DeleteCheckbook')->name('delete.checkbook');

      
    });
});// end group admin middleware

Route::middleware(['auth', 'role:admin'])->group(function(){

    Route::controller(BillexchangeController::class)->group(function(){
        Route::get('/all/billexchanges', 'AllBillexchanges')->name('all.billexchanges');
        Route::get('/add/billexchange', 'AddBillexchange')->name('add.billexchange');
        Route::post('/store/billexchange', 'StoreBillexchange')->name('store.billexchange');
        Route::get('/show/billexchange/{id}', 'ShowBillexchange')->name('show.billexchange');
        Route::get('/edit/billexchange/{id}', 'EditBillexchange')->name('edit.billexchange');
        Route::post('/update/billexchange', 'UpdateBillexchange')->name('update.billexchange');
        Route::get('/delete/billexchange/{id}', 'DeleteBillexchange')->name('delete.billexchange');
    });
});// end group admin middleware

Route::middleware(['auth', 'role:admin'])->group(function(){
    
    Route::controller(TypetransfersController::class)->group(function(){
        Route::get('/all/types-transfers', 'AllTypetransfers')->name('all.types-transfers');
        Route::get('/add/type-transfer', 'AddTypetransfer')->name('add.type-transfer');
        Route::post('/store/type-transfer', 'StoreTypetransfer')->name('store.type-transfer');
        Route::get('/show/type-transfer/{id}', 'Showypetransfer')->name('show.type-transfer');
        Route::get('/edit/type-transfer/{id}', 'EditTypetransfer')->name('edit.type-transfer');
        Route::post('/update/type-transfer', 'UpdateTypetransfer')->name('update.type-transfers');
        Route::get('/delete/type-transfers/{id}', 'DeleteTypetransfer')->name('delete.type-transfer');
    });
});// end group admin middleware

Route::middleware(['auth', 'role:admin'])->group(function(){
    
    Route::controller(CheckController::class)->group(function(){
        Route::post('/add/fillChecks/{id}', 'FillChecks')->name('add.fillChecks');
    });
});// end group admin middleware

Route::middleware(['auth', 'role:admin'])->group(function(){
    
    Route::controller(AccountController::class)->group(function(){
        Route::get('/all/accounts', 'AllAccounts')->name('all.accounts');
        Route::get('/add/account', 'AddAccount')->name('add.account');
        Route::post('/store/account', 'StoreAccount')->name('store.account');
        Route::get('/edit/account/{id}', 'EditAccount')->name('edit.account');
        Route::post('/update/account', 'UpdateAccount')->name('update.account');
        Route::get('/delete/account/{id}', 'DeleteAccount')->name('delete.account');
    });
});// end group admin middleware

Route::middleware(['auth', 'role:admin'])->group(function(){
    
    Route::controller(CompanyController::class)->group(function(){
        Route::get('/all/companies', 'AllCompanies')->name('all.companies');
        Route::get('/add/company', 'AddCompany')->name('add.company');
        Route::post('/store/company', 'StoreCompany')->name('store.company');
        Route::get('/edit/company/{id}', 'EditCompany')->name('edit.company');
        Route::post('/update/company', 'UpdateCompany')->name('update.company');
        Route::get('/delete/company/{id}', 'DeleteCompany')->name('delete.company');
    });
});// end group admin middleware

Route::middleware(['auth', 'role:admin'])->group(function(){
    
    Route::controller(ServiceController::class)->group(function(){
        Route::get('/all/services', 'AllServices')->name('all.services');
        Route::get('/add/service', 'AddService')->name('add.service');
        Route::post('/store/service', 'StoreService')->name('store.service');
        Route::get('/edit/service/{id}', 'EditService')->name('edit.service');
        Route::post('/update/service', 'UpdateService')->name('update.service');
        Route::get('/delete/service/{id}', 'DeleteService')->name('delete.service');
    });
});// end group admin middleware


Route::middleware(['auth', 'role:admin'])->group(function(){
    
    Route::controller(UnderAccountController::class)->group(function(){
        Route::get('/all/under-accounts', 'AllUnderAccounts')->name('all.under-accounts');
        Route::get('/add/under-account', 'AddUnderAccount')->name('add.under-account');
        Route::post('/store/under-account', 'StoreUnderAccount')->name('store.under-account');
        Route::get('/edit/under-account/{id}', 'EditUnderAccount')->name('edit.under-account');
        Route::post('/update/under-account', 'UpdateUnderAccount')->name('update.under-account');
        Route::get('/delete/under-account/{id}', 'DeleteUnderAccount')->name('delete.under-account');
    });
});// end group admin middleware


Route::middleware(['auth', 'role:admin'])->group(function(){
    
    Route::controller(HouseController::class)->group(function(){
        Route::get('/all/houses', 'AllHouses')->name('all.houses');
        Route::get('/add/house', 'AddHouse')->name('add.house');
        Route::post('/store/house', 'StoreHouse')->name('store.house');
        Route::get('/edit/house/{id}', 'EditHouse')->name('edit.house');
        Route::post('/update/house', 'UpdateHouse')->name('update.house');
        Route::get('/delete/house/{id}', 'DeleteHouse')->name('delete.house');
    });
});// end group admin middleware
Route::middleware(['auth', 'role:admin'])->group(function(){
    
    Route::controller(ClaimController::class)->group(function(){
        Route::get('/all/claims', 'AllClaims')->name('all.claims');
        Route::get('/add/claim', 'AddClaim')->name('add.claim');
        Route::post('/store/claim', 'StoreClaim')->name('store.claim');
        Route::get('/edit/claim/{id}', 'EditClaim')->name('edit.claim');
        Route::post('/update/claim', 'UpdateClaim')->name('update.claim');
        Route::get('/delete/claim/{id}', 'DeleteClaim')->name('delete.claim');
    });
});// end group admin middleware

Route::middleware(['auth', 'role:admin'])->group(function(){
    
    Route::controller(RemunerationController::class)->group(function(){
        Route::get('/all/remunerations', 'AllRemunerations')->name('all.remunerations');
        Route::get('/add/remuneration', 'AddRemuneration')->name('add.remuneration');
        Route::post('/store/remuneration', 'StoreRemuneration')->name('store.remuneration');
        Route::get('/edit/remuneration/{id}', 'EditRemuneration')->name('edit.remuneration');
        Route::post('/update/remuneration', 'UpdateRemuneration')->name('update.remuneration');
        Route::get('/delete/remuneration/{id}', 'DeleteRemuneration')->name('delete.remuneration');
    });
});// end group admin middleware  
Route::middleware(['auth', 'role:admin'])->group(function(){
    
    Route::controller(PcommissionController::class)->group(function(){
        Route::get('/all/personal-commissions', 'AllPersonalCommissions')->name('all.personal-commissions');
        Route::get('/add/personal-commission', 'AddPersonalCommission')->name('add.personal-commission');
        Route::post('/store/personal-commission', 'StorePersonalCommission')->name('store.personal-commission');
        Route::get('/edit/personal-commission/{id}', 'EditPersonalCommission')->name('edit.personal-commission');
        Route::post('/update/personal-commission', 'UpdatePersonalCommission')->name('update.personal-commission');
        Route::get('/delete/personal-commission/{id}', 'DeletePersonalCommission')->name('delete.personal-commission');
    });
});// end group admin middleware 
Route::middleware(['auth', 'role:admin'])->group(function(){
    
    Route::controller(ApcommissionController::class)->group(function(){
        Route::get('/all/auto-particulier-commissions', 'AllAutoParticulierCommissions')->name('all.auto-particulier-commissions');
        Route::get('/add/auto-particulier-commission', 'AddAutoParticulierCommission')->name('add.auto-particulier-commission');
        Route::post('/store/auto-particulier-commission', 'StoreAutoParticulierCommission')->name('store.auto-particulier-commission');
        Route::get('/edit/auto-particulier-commission/{id}', 'EditAutoParticulierCommission')->name('edit.auto-particulier-commission');
        Route::post('/update/auto-particulier-commission', 'UpdateAutoParticulierCommission')->name('update.auto-particulier-commission');
        Route::get('/delete/auto-particulier-commission/{id}', 'DeleteAutoParticulierCommission')->name('delete.auto-particulier-commission');
    });
});// end group admin middleware  