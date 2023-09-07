<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\BillexchangeController;
use App\Http\Controllers\CheckbookController;
use App\Http\Controllers\CheckController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\RegulationsController;
use App\Http\Controllers\TypetransfersController;

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
    
    Route::controller( CheckController::class)->group(function(){
        Route::post('/add/fillChecks/{id}', 'FillChecks')->name('add.fillChecks');
    });

    

});// end group admin middleware





//  clients routes

