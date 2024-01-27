<?php

namespace App\Http\Controllers;

use App\Models\jurusan;
use Carbon\Carbon;
use Illuminate\Http\Request;

class JurusanController extends Controller
{
     protected $jurusan;
     public function __construct( jurusan $jurusan) {
    $this->jurusan = $jurusan;
     }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    $all = jurusan::all();
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
        'nama_jurusan' => 'required',
        'id_fakultas' => 'required',
    ]);

    $create = collect($request->only($this->jurusan->getFillable()))
        ->put('jurusan', Carbon::now())
        ->toArray();

    $new = $this->jurusan->create($create);

    return Controller::success('Berhasil membuat jurusan', $new);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $data=$this->jurusan->findOrFail($id);
        return Controller::success('Menampilkan jurusan',$data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(jurusan $jurusan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
     public function update($id,Request $request)
    {
        //
        $jurusan=$this->jurusan->findOrFail($id);
        $update = collect($request->only($this->jurusan->getFillable()))
        ->put('jurusan',Carbon::now())
        ->toArray();
        $jurusan->update($update);

        return Controller::success('berhasil update',$jurusan);
    }
    /**
     * Remove the specified resource from storage.
     */
   public function destroy($id)
    {
        //
        $this->jurusan->findOrFail($id)->delete();
        return Controller::success('berhasil menghapus');

    }
}
