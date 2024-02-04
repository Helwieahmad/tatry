<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pemilih;
use App\Models\Kabupaten;
use App\Models\Kecamatan;
use App\Models\Desa;
use App\Models\Rt;
use App\Models\Rw;
use App\Models\Tps;
use App\Models\Cordinator;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class PemilihController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //medapatkan semua data category

        $pemilih = Pemilih::with('kabupaten','kecamatan','desa','rt','rw','tps','kordinator');
                if ($request->ajax()) {
            return Datatables::of($pemilih)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    //kita tambahkan button edit dan hapus
                    $btn = '<a href="javascript:void(0)" data-id="' . $row->id . '"class="btn btn-slack btn-icon-only lihat-pemilih mb-0"><i class="fa fa-view"></i></a>';
                    $btn = '<a href="javascript:void(0)" data-id="' . $row->id . '"class="btn btn-icon-only btn-warning edit-pemilih m-0"><i class="fa fa-edit"></i></a>';
                    $btn = $btn . '<a href="javascript:void(0)" data-id="' . $row->id . '"class="btn btn-icon-only btn-danger hapus-pemilih  m-0 "><i class="fa fa-trash"></i></a>';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        $kabupaten = Kabupaten::all();
        $kecamatan = Kecamatan::all();
        $desa      = Desa::all();
        $rt        = Rt::all();
        $rw        = Rw::all();
        $tps       = Tps::all();
        $kordinator = Cordinator::all();

        return view('pemilih.pemilih',compact('pemilih','kabupaten','kecamatan','desa','rt','rw','tps','kordinator'));
    }

    public function store(Request $request)
    {
        Pemilih::updateOrCreate(
            ['id' => $request->id],
            [
                'nama_pemilih' => $request->nama_pemilih,
                'kabupaten' => $request->kabupaten,
                'kecamatan' => $request->kecamatan,
                'desa' => $request->desa,
                'no_rt' => $request->no_rt,
                'no_rw' => $request->no_rw,
                'no_tps' => $request->no_tps,
                'kordinator' => $request->kordinator,
                'keterangan' => $request->keterangan,
            ]
        );

        return response()->json(['success' => 'Data Sukses Ditambahkan.']);
    }


    public function edit($id)
    {
        //mengambil data sesuai id
        $pemilih = Pemilih::find($id);
        return response()->json($pemilih);
    }


    public function destroy($id)
    {
        //delete Row
        Pemilih::find($id)->delete();
        return response()->json(['success'=>'Data Pemilih Sukses Dihapus']);
    }

}
