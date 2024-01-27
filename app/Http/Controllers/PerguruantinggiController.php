<?php

namespace App\Http\Controllers;

use App\Models\perguruantinggi;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PerguruantinggiController extends Controller
{
     protected $perguruantinggi;
     public function __construct( perguruantinggi $perguruantinggi) {
    $this->perguruantinggi = $perguruantinggi;
}
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // show all perguruan tinggi

    // $all = perguruantinggi::with('fakultas')->get();
    $all=$this->perguruantinggi->all();
    // $all=$this->perguruantinggi->with(['fakultas'])->get();
    return Controller::success('Menampilkan semua Perguruan Tinggi',$all);
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
    $request->validate([
        'nama_perguruan_tinggi' => 'required',
        'alamat' => 'required',
        'website' => 'required',
        'email' => 'required',
        'akreditasi' => 'required',
        'biaya' => 'required',
        'kategori' => 'required',
    ]);

    $create = collect($request->only($this->perguruantinggi->getFillable()))
        ->put('perguruantinggi', Carbon::now())
        ->toArray();

    $new = $this->perguruantinggi->create($create);

    return Controller::success('Berhasil membuat perguruan tinggi', $new);
}


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $data=collect($this->perguruantinggi->findOrFail($id));
        return Controller::success('Menampilkan perguruan tinggi',$data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(perguruantinggi $perguruantinggi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id, Request $request)
    
    {
        //
        $perguruantinggi = $this->perguruantinggi->findOrFail($id);

        $update = collect($request->only($this->perguruantinggi->getFillable()))
        ->put('perguruan_tinggi', Carbon::now())
        ->toArray();
        $perguruantinggi->update($update);

        return Controller::success('berhasil update', $perguruantinggi);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $this->perguruantinggi->findOrFail($id)->delete();
        return Controller::success('berhasil menghapus');

    }
}
