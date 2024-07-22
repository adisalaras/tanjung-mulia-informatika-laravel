<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Buku;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $peminjamans = Peminjaman::with(['anggota', 'buku'])->orderBy('created_at', 'desc')->get();

        return view('peminjaman.index', [
            'peminjamans' => $peminjamans,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $anggotas = Anggota::orderBy('id', 'desc')->get();
        $bukus = Buku::orderBy('id', 'desc')->get();
        return view('peminjaman.create', [
            'bukus'=> $bukus, //compact data
            'anggotas' => $anggotas
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Buku $buku, Anggota $anggotum)
    {
        $validated = $request->validate([
            'anggota_id' => 'required|integer|exists:anggotas,id',
            'buku_id' => 'required|integer|exists:bukus,id',
        ]);
    
        DB::beginTransaction();
        try {
            $assignPeminjaman = Peminjaman::create($validated); // Menggunakan create() untuk menyimpan data
            DB::commit();
            return redirect()->route('peminjaman.index')->with('success', 'Peminjaman Assigned Successfully!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'System error: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Peminjaman $peminjaman)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Peminjaman $peminjaman)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Peminjaman $peminjaman)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Peminjaman $peminjaman)
    {
        try{
            $peminjaman->delete();
            return redirect()->back()->with('succes','Projects deleted sussesfully');
        }
        catch(\Exception $e){
            DB::rollBack();

            return redirect()->back()->with('error', 'System eror'.$e->getMessage());
        }
    }

    
}
