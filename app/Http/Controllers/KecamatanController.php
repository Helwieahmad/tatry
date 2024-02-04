<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kecamatan;
use DataTables;

class KecamatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //medapatkan semua data category
        $kecamatan = Kecamatan::all();
        //jika ada request ajax maka yang direturn adalah datatables
        if ($request->ajax()) {
            return Datatables::of($kecamatan)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    //kita tambahkan button edit dan hapus
                    $btn = '<a href="javascript:void(0)" data-id="' . $row->id . '"class="btn btn-slack btn-icon-only lihat-kecamatan mb-0"><i class="fa fa-view"></i></a>';
                    $btn = '<a href="javascript:void(0)" data-id="' . $row->id . '"class="btn btn-reddit btn-icon-only edit-kecamatan mb-0"><i class="fa fa-edit"></i></a>';
                    $btn = $btn . '<a href="javascript:void(0)" data-id="' . $row->id . '"class="btn btn-youtube btn-icon-only hapus-kecamatan mb-0"><i class="fa fa-trash"></i></a>';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('/kecamatan.kecamatan',compact('kecamatan'));
    }


    public function store(Request $request)
    {
        //kita gunakan laravel laravel eloquent untuk update dan create agar lebih mudah
        //jadi jika request ada id maka akan melakukan update
        Kecamatan::updateOrCreate(
            ['id' => $request->id],
            [
                'nama_kecamatan' => $request->nama_kecamatan,
                'keterangan' => $request->keterangan,
            ]
        );

        return response()->json(['success' => 'Data Sukses Ditambahkan.']);
    }


    public function edit($id)
    {
        //mengambil data sesuai id
        $kecamatan = Kecamatan::find($id);
        return response()->json($kecamatan);
    }


    public function destroy($id)
    {
        //delete Row
        Kecamatan::find($id)->delete();
        return response()->json(['success'=>'Data Kecamatan Sukses Dihapus']);
    }

}
