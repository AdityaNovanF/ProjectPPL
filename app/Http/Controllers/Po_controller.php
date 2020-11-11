<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\M_po;
use App\Models\M_pupuk;
use PhpParser\Node\Stmt\TryCatch;

class Po_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'List Product';
        $data = M_po::orderBy('nama', 'asc')->get();

        return view('po.index', compact('title', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add()
    {
        $title = 'Tambah po';
        $pupuk = M_pupuk::get();
        $kode = rand();

        return view('po.add', compact('title', 'pupuk', 'kode'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'pupuk' => 'required',
            'nama' => 'required',
            'kode' => 'required',
            'jumlah' => 'required'
        ]);

        $data = $request->except(['_token']);
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['updated_at'] = date('Y-m-d H:i:s');

        M_po::insert($data);

        \Session::flash('sukses', 'Data berhasil ditambah');
        return redirect('po');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function detail($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = 'Edit po';
        $pupuk = M_pupuk::get();
        $dt = M_po::find($id);

        return view('po.edit', compact('title', 'pupuk', 'dt'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'pupuk' => 'required',
            'nama' => 'required',
            'kode' => 'required',
            'jumlah' => 'required'
        ]);

        $data = $request->except(['_token', '_method']);
        $data['updated_at'] = date('Y-m-d H:i:s');

        M_po::where('id', $id)->update($data);

        \Session::flash('sukses', 'Data berhasil diupdate');
        return redirect('po');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        try {
            M_po::where('id', $id)->delete();

            \Session::flash('sukses', 'Data berhasil dihapus');
        } catch (\Exception $e) {
            \Session::flash('gagal', $e->getMessage());
        }
        return redirect()->back();
    }
}
