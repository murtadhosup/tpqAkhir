<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Kemajuan;
use App\Models\peran;
use App\Models\Santri;
use Illuminate\Database\QueryException;

class peranController extends Controller{
public function index()
{
    $peran = peran::all();
    return view('/dashboard/peran',["data"=>$peran]);
}

public function hapus($id){
    peran::findOrFail($id)->delete();
    return redirect('/dashboard/peran');
}

public function showFormTambah(){
    return view('dashboard.tambahperan');
}

public function showFormUpdate($id_peran){
    $peran = peran::where('id_peran', $id_peran)->first();
    if($peran == null){
        return redirect("dashboard/peran");
    }
    return view("/dashboard/updateperan", ["data" => $peran]);

}

public function tambah(Request $request){
    $validation = $request->validate([
        "peran" => ["required"],
        "aktif" => ["required"]
       
    ]);


    DB::beginTransaction();
    try{
        Peran::create($validation);
        DB::commit();

        return redirect("/dashboard/peran");
    }catch(QueryException $err){
        DB::rollback();
        dd($err->errorInfo);
    }
}


public function update(Request $request, $id){
    $validation = $request->validate([
        "peran" => ["required"],
        "aktif" => ["required"]
    ]);

    DB::beginTransaction();
    try{
        $peran = peran::findOrFail($id);
        $peran->update($validation);
        DB::commit();

        return redirect("/dashboard/peran");
    }catch(QueryException $err){
        DB::rollback();
        dd($err->errorInfo);
    }
}


}