<?php

use Illuminate\Support\Facades\Route;
use App\Models\Bab;
use App\Models\Buku;
use App\Models\Santri;
use App\Models\Pengurus;
use App\Models\peran;


// panggil controller agar bisa digunakan pada route
// controller dipanggil sesuai nama dan lokasi filenya
use App\Http\Controllers\Dashboard\SantriController;
use App\Http\Controllers\Dashboard\BukuController;
use App\Http\Controllers\Dashboard\PengurusController;
use App\Http\Controllers\Dashboard\LoginController;
use App\Http\Controllers\DetailKemajuanController;
use App\Http\Controllers\KemajuanController;
use App\Models\Kemajuan;
use App\Http\Controllers\peranController;
use App\Http\Controllers\DetailperanController;
use App\Http\Controllers\babController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/buku', function () {
    $buku = Buku::all();
    return view('buku',['data'=>$buku]);
});

Route::get('/santri', function () {
    $santri = Santri::all();
    return view('santri',['data'=>$santri]);
});

Route::get('/pengurus', function () {
    $pengurus = Pengurus::all();
    return view('pengurus',['data'=>$pengurus]);
});

Route::get('/kemajuan', function() {
    $data['kemajuans'] = Kemajuan::all();
    return view('kemajuan', $data);
});

Route::get('/login', function () {
    return view('/dashboard/login');
});
Route::get('/register', function () {
    return view('/dashboard/register');
});
Route::get('/peran', function () {
    $peran = Peran::all();
    return view('peran',['data'=>$peran]);
});

Route::get('/dashboard/login', [LoginController::class, 'index'])->name('login');
Route::post('/dashboard/login/authenticate', [LoginController::class, 'authenticate']);

Route::middleware('auth')->group(function() {

    //santri
Route::get('/dashboard',[SantriController::class,'index']);
Route::get('/dashboard/santri/form',[SantriController::class,'showFormTambah']);
Route::get('/dashboard/santri/hapus/{id}',[SantriController::class,'hapus']);
Route::post('/dashboard/santri/tambah',[SantriController::class,'tambah']);
Route::get('/dashboard/santri/form/{id}',[SantriController::class,'showFormUpdate']);
Route::post('/dashboard/santri/update/{id}', [SantriController::class, 'update']);

//kemajuan
Route::get('/dashboard/kemajuan', [KemajuanController::class, 'index']);
Route::get('/dashboard/kemajuan/form', [KemajuanController::class, 'showFormTambah']);
Route::post('/dashboard/kemajuan/tambah', [KemajuanController::class, 'tambah']);
Route::get('/dashboard/kemajuan/form/{id}', [KemajuanController::class, 'showFormUpdate']);
Route::post('/dashboard/kemajuan/update/{id}', [KemajuanController::class, 'update']);
Route::get('/dashboard/kemajuan/hapus/{id}', [KemajuanController::class, 'hapus']);

//detailkemajuan
Route::get('/dashboard/detailKemajuan', [DetailKemajuanController::class, 'index']);
Route::get('/dashboard/detailKemajuan/form', [DetailKemajuanController::class, 'showFormTambah']);
Route::post('/dashboard/detailKemajuan/tambah', [DetailKemajuanController::class, 'tambah']);
Route::get('/dashboard/detailKemajuan/form/{id}', [DetailKemajuanController::class, 'showFormUpdate']);
Route::post('/dashboard/detailKemajuan/update/{id}', [DetailKemajuanController::class, 'update']);
Route::get('/dashboard/detailKemajuan/hapus/{id}', [DetailKemajuanController::class, 'hapus']);

//buku
Route::get('/dashboard/buku',[BukuController::class,'index']);
Route::get('/dashboard/buku/hapus/{id}',[BukuController::class,'hapus']);
Route::get('/dashboard/buku/form',[BukuController::class,'showFormTambah']);
Route::post('/dashboard/buku/tambah',[BukuController::class,'tambah']);
Route::get('/dashboard/buku/form/{id}',[BukuController::class,'showFormUpdate']);
Route::post('/dashboard/buku/update/{id}',[BukuController::class,'update']);

//pengurus
Route::get('/dashboard/pengurus',[PengurusController::class,'index']);
Route::get('/dashboard/pengurus/form', [PengurusController::class, 'showFormTambah']);
Route::post('/dashboard/pengurus/tambah', [PengurusController::class, 'tambah']);
Route::get('/dashboard/pengurus/hapus/{id}', [PengurusController::class, 'hapus']);
Route::get('/dashboard/pengurus/form/{id}', [PengurusController::class, 'showFormUpdate']);
Route::post('/dashboard/pengurus/update/{id}', [PengurusController::class, 'update']);

//bab
Route::get('/dashboard/bab', [babController::class, 'index']);
Route::get('/dashboard/bab/form', [babController::class, 'showFormTambah']);
Route::post('/dashboard/bab/tambah', [babController::class, 'tambah']);
Route::get('/dashboard/bab/form/{id}', [babController::class, 'showFormUpdate']);
Route::post('/dashboard/bab/update/{id}', [babController::class, 'update']);
Route::get('/dashboard/bab/hapus/{id}', [babController::class, 'hapus']);

//peran
Route::get('/dashboard/peran', [peranController::class, 'index']);
Route::get('/dashboard/peran/form', [peranController::class, 'showFormTambah']);
Route::post('/dashboard/peran/tambah', [peranController::class, 'tambah']);
Route::get('/dashboard/peran/form/{id}', [peranController::class, 'showFormUpdate']);
Route::post('/dashboard/peran/update/{id}', [peranController::class, 'update']);
Route::get('/dashboard/peran/hapus/{id}', [peranController::class, 'hapus']);

//Detailperan
Route::get('/dashboard/detailperan', [DetailperanController::class, 'index']);
Route::get('/dashboard/detailperan/form', [DetailperanController::class, 'showFormTambah']);
Route::post('/dashboard/detailperan/tambah', [DetailperanController::class, 'tambah']);
Route::get('/dashboard/detailperan/form/{id}', [DetailperanController::class, 'showFormUpdate']);
Route::post('/dashboard/detailperan/update/{id}', [DetailperanController::class, 'update']);
Route::get('/dashboard/detailperan/hapus/{id}', [DetailperanController::class, 'hapus']);

//bab
Route::get('/dashboard/bab', [babController::class, 'index']);
Route::get('/dashboard/bab/form', [babController::class, 'showFormTambah']);
Route::post('/dashboard/bab/tambah', [babController::class, 'tambah']);
Route::get('/dashboard/bab/form/{id}', [babController::class, 'showFormUpdate']);
Route::post('/dashboard/bab/update/{id}', [babController::class, 'update']);
Route::get('/dashboard/bab/hapus/{id}', [babController::class, 'hapus']);

Route::get('/dashboard/logout', [LoginController::class, 'logout']);
});
