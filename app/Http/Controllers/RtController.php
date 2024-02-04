<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rt;
use DataTables;

class RtController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //medapatkan semua data category
        $rt = Rt::all();
        //jika ada request ajax maka yang direturn adalah datatables
        if ($request->ajax()) {
            return Datatables::of($rt)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    //kita tambahkan button edit dan hapus
                    $btn = '<a href="javascript:void(0)" data-id="' . $row->id . '"class="btn btn-slack btn-icon-only lihat-rt mb-0"><i class="fa fa-view"></i></a>';
                    $btn = '<a href="javascript:void(0)" data-id="' . $row->id . '"class="btn btn-reddit btn-icon-only edit-rt mb-0"><i class="fa fa-edit"></i></a>';
                    $btn = $btn . '<a href="javascript:void(0)" data-id="' . $row->id . '"class="btn btn-youtube btn-icon-only hapus-rt mb-0"><i class="fa fa-trash"></i></a>';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('/rt.rt',compact('rt'));
    }


    public function store(Request $request)
    {
        //kita gunakan laravel laravel eloquent untuk update dan create agar lebih mudah
        //jadi jika request ada id maka akan melakukan update
        Rt::updateOrCreate(
            ['id' => $request->id],
            [
                'no_rt' => $request->no_rt,
                'keterangan' => $request->keterangan,
            ]
        );

        return response()->json(['success' => 'Data Sukses Ditambahkan.']);
    }


    public function edit($id)
    {
        //mengambil data sesuai id
        $rt = Rt::find($id);
        return response()->json($rt);
    }


    public function destroy($id)
    {
        //delete Row
        Rt::find($id)->delete();
        return response()->json(['success'=>'Data Desa Sukses Dihapus']);
    }

}
