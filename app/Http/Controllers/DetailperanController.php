<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\DetailPeran;
use App\Models\Peran;
use App\Models\Pengurus;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
class DetailperanController extends Controller{
public function index()
{
    $Detailperan = Detailperan::all();
    return view('/dashboard/Detailperan',["data"=>$Detailperan]);
}

public function showFormTambah()
{
    $data['peran'] = peran::all();
    $data['pengurus'] = Pengurus::all();

    return view('dashboard.tambahDetailperan', $data);
}

public function tambah(Request $request)
{
    $validation = $request->validate([
        "id_peran" => ["required"],
        "id_pengurus" => ["required"]
    ]);

    DB::beginTransaction();
    try {
        Detailperan::create($validation);
        DB::commit();

        return redirect("/dashboard/detailperan");
    } catch (QueryException $err) {
        DB::rollback();
        dd($err->errorInfo);
    }
}

public function showFormUpdate($id)
{
    $data['peran'] = peran::all();
    $data['pengurus'] = Pengurus::all();
    $data['Detailperan'] = Detailperan::where('id_detail_peran', $id)->first();
    if ($data['Detailperan'] == null) {
        return redirect("/dashboard/detailperan");
    }

    return view("dashboard/updateDetailPeran", $data);
}

public function update(Request $request, $id)
{
    $validation = $request->validate([
        "id_peran" => ["required"],
        "id_pengurus" => ["required"]
    ]);

    DB::beginTransaction();
    try {
        $detailperan = Detailperan::findOrFail($id);
        $detailperan->update($validation);
        DB::commit();

        return redirect("/dashboard/detailperan");
    } catch (QueryException $err) {
        DB::rollback();
        dd($err->errorInfo);
    }
}

public function hapus($id){
    Detailperan::findOrFail($id)->delete();
    return redirect('/dashboard/detailperan');
}
}