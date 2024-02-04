<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cordinator;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class CordinatorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //medapatkan semua data category
        $cordinator = Cordinator::all();
        if ($request->ajax()) {
            return Datatables::of($cordinator)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    //kita tambahkan button edit dan hapus
                    $btn = '<a href="javascript:void(0)" data-id="' . $row->id . '"class="btn btn-slack btn-icon-only lihat-kordinator mb-0"><i class="fa fa-view"></i></a>';
                    $btn = '<a href="javascript:void(0)" data-id="' . $row->id . '"class="btn btn-icon-only btn-warning edit-kordinator m-0"><i class="fa fa-edit"></i></a>';
                    $btn = $btn . '<a href="javascript:void(0)" data-id="' . $row->id . '"class="btn btn-icon-only btn-danger hapus-kordinator  m-0 "><i class="fa fa-trash"></i></a>';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('cordinator.cordinator',compact('cordinator'));
    }


    public function store(Request $request)
    {
        Cordinator::updateOrCreate(
            ['id' => $request->id],
            [
                'nama_kordinator' => $request->nama_kordinator,
                'username' => $request->username,
                'password' => $request->password,
                'nama_desa' => $request->nama_desa,
                'no_tlpn' => $request->no_tlpn,
                'keterangan' => $request->keterangan,
            ]
        );

        return response()->json(['success' => 'Data Sukses Ditambahkan.']);
    }


    public function edit($id)
    {
        //mengambil data sesuai id
        $cordinator = Cordinator::find($id);
        return response()->json($cordinator);
    }


    public function destroy($id)
    {
        //delete Row
        Cordinator::find($id)->delete();
        return response()->json(['success'=>'Data Kordinator Sukses Dihapus']);
    }

}
