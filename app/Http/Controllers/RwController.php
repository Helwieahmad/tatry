<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rw;
use DataTables;

class RwController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //medapatkan semua data category
        $rw = Rw::all();
        //jika ada request ajax maka yang direturn adalah datatables
        if ($request->ajax()) {
            return Datatables::of($rw)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    //kita tambahkan button edit dan hapus
                    $btn = '<a href="javascript:void(0)" data-id="' . $row->id . '"class="btn btn-slack btn-icon-only lihat-rw mb-0"><i class="fa fa-view"></i></a>';
                    $btn = '<a href="javascript:void(0)" data-id="' . $row->id . '"class="btn btn-reddit btn-icon-only edit-rw mb-0"><i class="fa fa-edit"></i></a>';
                    $btn = $btn . '<a href="javascript:void(0)" data-id="' . $row->id . '"class="btn btn-youtube btn-icon-only hapus-rw mb-0"><i class="fa fa-trash"></i></a>';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('/rw.rw',compact('rw'));
    }


    public function store(Request $request)
    {
        //kita gunakan laravel laravel eloquent untuk update dan create agar lebih mudah
        //jadi jika request ada id maka akan melakukan update
        Rw::updateOrCreate(
            ['id' => $request->id],
            [
                'no_rw' => $request->no_rw,
                'keterangan' => $request->keterangan,
            ]
        );

        return response()->json(['success' => 'Data Sukses Ditambahkan.']);
    }


    public function edit($id)
    {
        //mengambil data sesuai id
        $rw = Rw::find($id);
        return response()->json($rw);
    }


    public function destroy($id)
    {
        //delete Row
        Rw::find($id)->delete();
        return response()->json(['success'=>'Data Desa Sukses Dihapus']);
    }

}
