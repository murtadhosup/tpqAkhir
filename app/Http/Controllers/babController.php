<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;
use App\Models\Bab;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
class babController extends Controller{
    public function index()
{
    $bab = bab::all();
    return view('/dashboard/bab',["data"=>$bab]);
}
public function hapus($id){
    bab::findOrFail($id)->delete();
    return redirect('/dashboard/bab');
}
public function showFormTambah(){
    $data['buku'] = buku::all();
return view('dashboard.tambahbab' ,$data );

}
public function showFormUpdate($id_bab){
    $bab = bab::where('id_bab', $id_bab)->first();
    if($bab == null){
        return redirect("dashboard/bab");
    }
    return view("/dashboard/updatebab", ["data" => $bab]);

}
public function tambah(Request $request){
    $validation = $request->validate([
        "id_buku" => ["required"],
        "bab" => ["required"],
        "judul" => ["required"],
        "keterangan" => ["required"]
       
    ]);


    DB::beginTransaction();
    try{
        bab::create($validation);
        DB::commit();

        return redirect("/dashboard/bab");
    }catch(QueryException $err){
        DB::rollback();
        dd($err->errorInfo);
    }
}

}
