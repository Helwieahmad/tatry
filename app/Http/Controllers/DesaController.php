<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Desa;
use DataTables;

class DesaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //medapatkan semua data category
        $desa = Desa::all();
        //jika ada request ajax maka yang direturn adalah datatables
        if ($request->ajax()) {
            return Datatables::of($desa)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    //kita tambahkan button edit dan hapus
                    $btn = '<a href="javascript:void(0)" data-id="' . $row->id . '"class="btn btn-slack btn-icon-only lihat-desa mb-0"><i class="fa fa-view"></i></a>';
                    $btn = '<a href="javascript:void(0)" data-id="' . $row->id . '"class="btn btn-reddit btn-icon-only edit-desa mb-0"><i class="fa fa-edit"></i></a>';
                    $btn = $btn . '<a href="javascript:void(0)" data-id="' . $row->id . '"class="btn btn-youtube btn-icon-only hapus-desa mb-0"><i class="fa fa-trash"></i></a>';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('/desa.desa',compact('desa'));
    }


    public function store(Request $request)
    {
        //kita gunakan laravel laravel eloquent untuk update dan create agar lebih mudah
        //jadi jika request ada id maka akan melakukan update
        Desa::updateOrCreate(
            ['id' => $request->id],
            [
                'nama_desa' => $request->nama_desa,
                'keterangan' => $request->keterangan,
            ]
        );

        return response()->json(['success' => 'Data Sukses Ditambahkan.']);
    }


    public function edit($id)
    {
        //mengambil data sesuai id
        $desa = Desa::find($id);
        return response()->json($desa);
    }


    public function destroy($id)
    {
        //delete Row
        Desa::find($id)->delete();
        return response()->json(['success'=>'Data Desa Sukses Dihapus']);
    }

}
