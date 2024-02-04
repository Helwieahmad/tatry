<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kabupaten;
use DataTables;

class KabupatenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //medapatkan semua data category
        $kabupaten = Kabupaten::all();
        //jika ada request ajax maka yang direturn adalah datatables
        if ($request->ajax()) {
            return Datatables::of($kabupaten)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    //kita tambahkan button edit dan hapus
                    $btn = '<a href="javascript:void(0)" data-id="' . $row->id . '"class="btn btn-slack btn-icon-only lihat-kabupaten mb-0"><i class="fa fa-view"></i></a>';
                    $btn = '<a href="javascript:void(0)" data-id="' . $row->id . '"class="btn btn-reddit btn-icon-only edit-kabupaten mb-0"><i class="fa fa-edit"></i></a>';
                    $btn = $btn . '<a href="javascript:void(0)" data-id="' . $row->id . '"class="btn btn-youtube btn-icon-only hapus-kabupaten mb-0"><i class="fa fa-trash"></i></a>';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('/kabupaten.kabupaten',compact('kabupaten'));
    }


    public function store(Request $request)
    {
        //kita gunakan laravel laravel eloquent untuk update dan create agar lebih mudah
        //jadi jika request ada id maka akan melakukan update
        Kabupaten::updateOrCreate(
            ['id' => $request->id],
            [
                'nama_kabupaten' => $request->nama_kabupaten,
                'keterangan' => $request->keterangan,
            ]
        );

        return response()->json(['success' => 'Data Sukses Ditambahkan.']);
    }


    public function edit($id)
    {
        //mengambil data sesuai id
        $kabupaten = Kabupaten::find($id);
        return response()->json($kabupaten);
    }


    public function destroy($id)
    {
        //delete Row
        Kabupaten::find($id)->delete();
        return response()->json(['success'=>'Data Kabupaten Sukses Dihapus']);
    }

}
