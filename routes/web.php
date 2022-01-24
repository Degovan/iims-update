<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// homepage dimasukan dalam kontroller agar sinkron dengan table baru
Route::get('/', 'HomePageController@index');

Auth::routes();
//produk
Route::get('/produk', 'ProdukController@index')->name('produk');
Route::get('produk/edit/{id_produk}', 'ProdukController@edit')->name('produkEdit');
Route::post('produk/update', 'ProdukController@update')->name('produkUpdate');
Route::get('produk/hapus/{id_produk}', 'ProdukController@hapus')->name('produkHapus');
Route::get('/produk/cari', 'ProdukController@cari')->name('produkCari');
Route::get('produk/tambah', 'ProdukController@tambah')->name('produkTambah');
Route::post('/produk/simpan', 'ProdukController@simpan')->name('produkSimpan');
Route::delete('deleteAll_produk', ['list_unitController@deleteAll'])->name('deleteAll');




//vendor

Route::get('/vendor', 'VendorController@index')->name('vendor');
Route::get('vendor/edit/{id_vendor}', 'VendorController@edit')->name('vendorEdit');
Route::post('vendor/update', 'VendorController@update')->name('vendorUpdate');
Route::get('vendor/hapus/{id_vendor}', 'VendorController@hapus')->name('vendorHapus');
Route::get('/vendor/cari', 'VendorController@cari')->name('vendorCari');
Route::get('vendor/tambah', 'VendorController@tambah')->name('vendorTambah');
Route::post('vendor/simpan', 'VendorController@simpan')->name('vendorSimpan');

//cp

Route::get('/cp/{id_vendor}', 'CpController@index')->name('cp');
Route::get('/cp/tambah/{id_vendor}', 'CpController@create')->name('cpTambah');
Route::get('/cp/cari/{id_vendor}', 'CpController@search')->name('cpCari');
Route::get('/cp/edit/{id_cp}', 'CpController@edit')->name('cpEdit');
Route::get('/cp/hapus/{id_cp}', 'CpController@delete')->name('cpHapus');
Route::post('/cp/tambah', 'CpController@store')->name('cpSimpan');
Route::post('/cp/edit/{id_cp}', 'CpController@update')->name('cpUpdate');


//user
Route::resource('/users', UserController::class)->except('show');

//inventory
Route::get('/inventory', 'InventoryController@index')->name('inventory');
Route::get('inventory/edit/{id_inventory}', 'InventoryController@edit')->name('inventoryEdit');
Route::post('inventory/update', 'InventoryController@update')->name('inventoryUpdate');
Route::get('inventory/hapus/{id_inventory}', 'InventoryController@hapus')->name('inventoryHapus');
Route::get('/inventory/cari', 'InventoryController@cari')->name('inventoryCari');
Route::get('inventory/tambah', 'InventoryController@tambah')->name('inventoryTambah');
Route::post('inventory/simpan', 'InventoryController@simpan')->name('inventorySimpan');



//customer
Route::get('/customer', 'CustomerController@index')->name('customer');
Route::get('customer/edit/{id_customer}', 'CustomerController@edit')->name('customerEdit');
Route::post('customer/update', 'CustomerController@update')->name('customerUpdate');
Route::get('customer/hapus/{id_customer}', 'CustomerController@hapus')->name('customerHapus');
Route::get('/customer/cari', 'CustomerController@cari')->name('customerCari');
Route::get('customer/tambah', 'CustomerController@tambah')->name('customerTambah');
Route::post('/simpan', 'CustomerController@simpan')->name('customerSimpan');


// Routes from degovan
Route::resource('/roles', 'RoleController')->except('show');
    
Route::get('/permissions', 'PermissionController@index')->name('permissions.index');
Route::put('/permissions/{pid}/updates', 'PermissionController@mass_update')->name('permissions.mass_update');

// PR ITR
Route::get('purchase/create', 'PritControllers@craete_pr')->name('createPr');
Route::get('purchase/edit/{id}', 'PritControllers@update_pr')->name('updatePr');
Route::get('purchase/view/{id}', 'PritControllers@view_pr')->name('viewPr');
Route::get('purchase/cetak/{id}/{jenis}', 'PritControllers@print_pr_itr');
Route::get('purchase/hapus/{id}', 'PritControllers@delete_pr')->name('deletePr');
Route::get('purchase', 'PritControllers@index')->name('purchase');
Route::post('purchase/simpan', 'PritControllers@simpan_pr')->name('purchaseSimpan');
Route::post('ajax_dynamic', 'PritControllers@ajax_dyanmic')->name('ajax_dynamic');

Route::get('itr', 'PritControllers@itr')->name('itr');
Route::get('itr/create', 'PritControllers@create_itr')->name('createItr');
Route::post('itr/simpan', 'PritControllers@simpan_itr')->name('simpanItr');
Route::get('itr/hapus/{id}', 'PritControllers@delete_itr')->name('deleteItr');
Route::get('itr/edit/{id}', 'PritControllers@edit_itr')->name('updateItr');

// DO/OTR
Route::get('delivery_order', 'DoOtrControllers@delivery_order')->name('deliveryOrder');
Route::get('delivery_order/create', 'DoOtrControllers@create_do')->name('deliveryCreate');
Route::get('delivery_order/edit/{id}', 'DoOtrControllers@update_do')->name('deliveryUpdate');
Route::get('delivery_order/hapus/{id}', 'DoOtrControllers@hapus_do')->name('deliveryDelete');
Route::post('delivery_order/simpan', 'DoOtrControllers@simpan_do')->name('deliverySave');
Route::get('delivery_order/cetak/{id}/{jenis}', 'DoOtrControllers@print_do_otr');

Route::get('otr', 'DoOtrControllers@otr')->name('otr');
Route::get('otr/create', 'DoOtrControllers@create_otr')->name('otrCreate');
Route::get('otr/edit/{id}', 'DoOtrControllers@update_otr')->name('otrUpdate');
Route::get('otr/hapus/{id}', 'DoOtrControllers@hapus_otr')->name('otrDelete');
Route::post('otr/simpan', 'DoOtrControllers@simpan_otr')->name('otrSave');

// edit hompage
Route::get('/edit-homepage', 'HomePageController@edit');
Route::post('/edit-homepage', 'HomePageController@update');







