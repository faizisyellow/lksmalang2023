<?php

namespace App\Http\Controllers;

use App\Models\fakultas;
use Carbon\Carbon;
use Illuminate\Http\Request;

class FakultasController extends Controller
{
    protected $fakultas;
     public function __construct( fakultas $fakultas) {
    $this->fakultas = $fakultas;
     }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    //  $all = fakultas::with('jurusan')->get();
        $all=$this->fakultas->all();
    return Controller::success('Menampilkan semua fakultas',$all);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
           $request->validate([
        'nama_fakultas' => 'required',
        'id_perguruantinggi' => 'required',
    ]);

    $create = collect($request->only($this->fakultas->getFillable()))
        ->put('fakultas', Carbon::now())
        ->toArray();

    $new = $this->fakultas->create($create);

    return Controller::success('Berhasil membuat fakultas', $new);
    }

    /**
     * Display the specified resource.
     */
   public function show($id)
    {
        //
        $data=collect($this->fakultas->with([
            'jurusan'
        ])->findOrFail($id));
        return Controller::success('Menampilkan fakultas',$data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(fakultas $fakultas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id,Request $request)
    {
        //
        $fakultas=$this->fakultas->findOrFail($id);
        $update = collect($request->only($this->fakultas->getFillable()))
        ->put('perguruan_tinggi',Carbon::now())
        ->toArray();
        $fakultas->update($update);

        return Controller::success('berhasil update',$fakultas);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $this->fakultas->findOrFail($id)->delete();
        return Controller::success('berhasil menghapus');

    }
}
