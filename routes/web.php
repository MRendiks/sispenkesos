<?php

use App\Exports\DataPpksExport;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AddppksController;
use App\Http\Controllers\CetakExcelController;
use App\Http\Controllers\CetakPDFController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\JenisPpkController;
use App\Http\Controllers\KecamatanController;
use App\Http\Controllers\DetailJenisController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PpksController;

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

# LOGIN
route::get('/', [LoginController::class, 'index' ])->name('login')->middleware('guest');
// route::get('/registrasi', [LoginController::class, 'regis' ])->name('regis')->middleware('guest');
Route::post('postlogin', [LoginController::class, 'attempt'])->name('postlogin');
Route::post('postregis', [LoginController::class, 'create_regis'])->name('postregis');
Route::get('/logout', [LoginController::class, 'logout' ]);


Route::group(['middleware' => ['auth', 'ceklevel:operator, TKSK, TPSK']], function(){
    route::get('/registrasi', [LoginController::class, 'regis' ])->name('regis')->middleware('guest');
    
});

# 1.VIEW
# 1.1 Dashboard
route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

# 1.2 Master Data
route::get('/data-ppks', [PpksController::class, 'index'])->name('data-ppks');
route::post('/data-ppks', [PpksController::class, 'index'])->name('data-ppks2');

# 1.3 Form
Route::get('/forminput', [PpksController::class, 'input_data'])->name('input_data');

# 1.4 Data Disabilitas
route::get('/data-disabilitas', [PpksController::class, 'data_disabilitas'])->name('data_disabilitas');

# 1.5 Data Kedisabilitas
route::get('/data-kedisabilitas', [PpksController::class, 'data_kedisabilitas'])->name('data_kedisabilitas');

# 1.6 Jenis-Jenis PPKS
// Route::post('/filter_jenis', [PpksController::class, 'filter_jenis'])->name('filter_jenis');
Route::get('/filter_jenis/{id}', [PpksController::class, 'filter_jenis_2'])->name('filter_jenis_2');

# 1.7 Filter Data
# 1.7.1 Filter Data untuk Master Data
Route::get('/filter_data_ppks/{id}', [PpksController::class, 'filter_data_ppks'])->name('filter_data_ppks');
# 1.7.2 Filter Data untuk Data Jenis
Route::get('/filter_data/{id1}/{id2}', [PpksController::class, 'filter_data'])->name('filter_data');

// Route::get('/detail_data/{id}', [PpksController::class, 'detail_data'])->name('detail_data');

# SAVE DATA
Route::post('store_ppks', [PpksController::class, 'store_ppks'])->name('store_ppks');
route::post('/{id}/acc_data', [PpksController::class, 'acc'])->name('acc');

# DELETE DATA
route::delete('/{id}/delete_data', [PpksController::class, 'destroy'])->name('delete_data');

# UPDATE DATA
route::put('/{id}/update_data', [PpksController::class, 'update'])->name('update_data');

# CETAK PDF
route::get('/cetak_laporan', [CetakPDFController::class, 'cetak_laporan'])->name('cetak_laporan');

# CETAK EXCEL
route::get('/cetak_excel_all_ppks', [CetakExcelController::class, 'excel_all'])->name('excel_all');










// Route::get('/addppks', function () {
//     return view('/ppks/addppks');
// });

// route::get('/data-ppks', [PpksController::class, 'index'])->name('dashboard');

// Route::get('/adddisabilitas', function () {
//     return view('disabilitas/adddisabilitas');
// });

// Route::get('/data-disabilitas', function () {
//     return view('disabilitas/data-disabilitas');
// });



// Route::resource('jenis_ppks', JenisPpkController::class);


// Route::get('/kecamatan', [KecamatanController::class, 'index'])->name('kecamatan.index');
// Route::get('/kecamatan/create', [KecamatanController::class, 'create'])->name('kecamatan.create');
// Route::post('/kecamatan', [KecamatanController::class, 'store'])->name('kecamatan.store');
// Route::get('/kecamatan/{kecamatan}/edit', [KecamatanController::class, 'edit'])->name('kecamatan.edit');
// Route::put('/kecamatan/{kecamatan}', [KecamatanController::class, 'update'])->name('kecamatan.update');
// Route::delete('/kecamatan/{kecamatan}', [KecamatanController::class, 'destroy'])->name('kecamatan.destroy');


// Route::resource('detail-jenis', DetailJenisController::class);