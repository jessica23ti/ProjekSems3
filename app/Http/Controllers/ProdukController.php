<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Category;
use App\Models\ImageProduk;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->wantsJson()) {
            return response()->json('hallo F');
        }
        return view('product_detail');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['categories'] = Category::all();
        return view('Admin.input_produk', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data yang dikirim dari form
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'kategori_id' => 'required|exists:categorys,id',
            'ukuran' => 'nullable|string',
            'jumlah_stok' => 'required|integer|min:1',
            'harga' => 'required|numeric|min:0',
            'diskon' => 'nullable|numeric|min:0|max:100',
            // 'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',  // Validasi gambar
        ]);

        // Membuat instance model Produk
        $produk = new Produk(); // Menggunakan model Produk, bukan ProdukController

        // Mengisi data produk dengan data yang sudah divalidasi
        $produk->fill($validated);

        // Menyimpan data produk ke database
        if ($produk->save()) {
            session()->flash('success', 'Data berhasil disimpan.');
        } else {
            session()->flash('error', 'Data tidak bisa disimpan.');
        }

        // Proses upload gambar
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                // Simpan gambar ke storage dan ambil path-nya
                $imagePath = $image->store('products', 'public');  // Menyimpan di folder 'public/products'

                // Simpan data gambar di tabel product_images
                ImageProduk::create([
                    'product_id' => $produk->id,
                    'image_path' => $imagePath,
                ]);
            }
        }

        // Redirect atau kembali ke halaman sebelumnya setelah proses selesai
        // return redirect()->route('produk.index');
    }


    /**
     * Display the specified resource.
     */
    public function show(Request $produk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $produk)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Request $produk)
    {
        $validated = $request->validate([
            'nama' => 'required',
            'user_id' => 'required|integer',
            'kategori_id' => 'required|integer',
            'deskripsi' => 'required|string|max:255',
            'ukuran' => 'required|string|max:255',
            'jumlah_stok' => 'required|integer',
            'diskon' => 'required|integer',
            'harga' => 'required|integer',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $produk)
    {
        //
    }
}
