<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tps;
use DataTables;

class TpsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //medapatkan semua data TPS
        $tps = Tps::all();
        //jika ada request ajax maka yang direturn adalah datatables
        if ($request->ajax()) {
            return Datatables::of($tps)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    //kita tambahkan button edit dan hapus
                    $btn = '<a href="javascript:void(0)" data-id="' . $row->id . '"class="btn btn-slack btn-icon-only lihat-tps mb-0"><i class="fa fa-view"></i></a>';
                    $btn = '<a href="javascript:void(0)" data-id="' . $row->id . '"class="btn btn-icon-only btn-warning edit-tps m-0"><i class="fa fa-edit"></i></a>';
                    $btn = $btn . '<a href="javascript:void(0)" data-id="' . $row->id . '"class="btn btn-icon-only btn-danger hapus-tps  m-0 "><i class="fa fa-trash"></i></a>';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('/tps.tps',compact('tps'));
    }


    public function store(Request $request)
    {
        //kita gunakan laravel laravel eloquent untuk update dan create agar lebih mudah
        //jadi jika request ada id maka akan melakukan update
        Tps::updateOrCreate(
            ['id' => $request->id],
            [
                'no_tps' => $request->no_tps,
                'lokasi_tps' => $request->lokasi_tps,
                'keterangan' => $request->keterangan,
            ]
        );

        return response()->json(['success' => 'Data Sukses Ditambahkan.']);
    }


    public function edit($id)
    {
        //mengambil data sesuai id
        $tps = Tps::find($id);
        return response()->json($tps);
    }


    public function destroy($id)
    {
        //delete Row
        Tps::find($id)->delete();
        return response()->json(['success'=>'Data Kordinator Sukses Dihapus']);
    }

}
