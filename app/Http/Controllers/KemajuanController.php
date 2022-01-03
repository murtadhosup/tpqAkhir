<?php

namespace App\Http\Controllers;

use App\Models\Kemajuan;
use App\Models\Pengurus;
use App\Models\Santri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;

class KemajuanController extends Controller
{
    public function index()
    {
        $data['kemajuans'] = Kemajuan::all();
        return view('dashboard.kemajuan', $data);
    }

    public function showFormTambah()
    {
        $data['santris'] = Santri::all();
        $data['pengurus'] = Pengurus::all();

        return view('dashboard.tambahKemajuan', $data);
    }

    public function tambah(Request $request)
    {
        $validation = $request->validate([
            "id_santri" => ["required"],
            "id_pengurus" => ["required"],
            "tanggal" => ["required", "date"],
            "status" => ["required", "in:Y,N"]
        ]);

        DB::beginTransaction();
        try {
            Kemajuan::create($validation);
            DB::commit();

            return redirect("/dashboard/kemajuan");
        } catch (QueryException $err) {
            DB::rollback();
            dd($err->errorInfo);
        }
    }

    public function showFormUpdate($id)
    {
        $data['santris'] = Santri::all();
        $data['pengurus'] = Pengurus::all();
        $data['kemajuan'] = Kemajuan::where('id_kemajuan', $id)->first();
        if ($data['kemajuan'] == null) {
            return redirect("dashboard/kemajuan");
        }

        return view("dashboard/updateKemajuan", $data);
    }

    public function update(Request $request, $id)
    {
        $validation = $request->validate([
            "id_santri" => ["required"],
            "id_pengurus" => ["required"],
            "tanggal" => ["required", "date"],
            "status" => ["required", "in:Y,N"]
        ]);

        DB::beginTransaction();
        try {
            $kemajuan = Kemajuan::findOrFail($id);
            $kemajuan->update($validation);
            DB::commit();

            return redirect("/dashboard/kemajuan");
        } catch (QueryException $err) {
            DB::rollback();
            dd($err->errorInfo);
        }
    }

    public function hapus($id){
        Kemajuan::findOrFail($id)->delete();
        return redirect('/dashboard/kemajuan');
    }
}
