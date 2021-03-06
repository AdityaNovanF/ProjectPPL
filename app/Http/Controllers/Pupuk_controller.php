<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\M_pupuk;

class Pupuk_controller extends Controller
{
    public function index()
    {
        $title = 'Data Master pupuk';
        $data = M_pupuk::orderby('nama', 'asc')->get();

        return view('pupuk.index', compact('title', 'data'));
    }

    public function add()
    {
        $title = 'Tambah Data pupuk';
        return view('pupuk.add', compact('title'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
            'manfaat' => 'required',
            'stock' => 'required',
            'harga' => 'required'
        ]);

        $a['nama'] = $request->nama;
        $a['manfaat'] = $request->manfaat;
        $a['stock'] = $request->stock;
        $a['harga'] = $request->harga;
        $a['created_at'] = date('Y-m-d H:1:s');
        $a['updated_at'] = date('Y-m-d H:1:s');

        M_pupuk::insert($a);

        \Session::flash('sukses', 'Data berhasil ditambah');
        return redirect('pupuk');
    }

    public function edit($id)
    {
        $title = 'Edit Data Pupuk';
        $dt = M_pupuk::find($id);

        return view('pupuk.edit', compact('title', 'dt'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama' => 'required',
            'manfaat' => 'required',
            'stock' => 'required',
            'harga' => 'required'
        ]);

        $a['nama'] = $request->nama;
        $a['manfaat'] = $request->manfaat;
        $a['stock'] = $request->stock;
        $a['harga'] = $request->harga;
        $a['updated_at'] = date('Y-m-d H:1:s');

        M_pupuk::where('id', $id)->update($a);

        \Session::flash('sukses', 'Data berhasil diupdate');
        return redirect('pupuk');
    }

    public function delete($id)
    {
        try {
            M_pupuk::where('id', $id)->delete();
            \Session::flash('sukses', 'Data berhasil dihapus');
        } catch (Exception $e) {
            \Session::flash('gagal', $e->getMessage());
        }

        return redirect('pupuk');
    }
}
