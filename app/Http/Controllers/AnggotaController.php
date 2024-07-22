<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $anggotas= Anggota::orderBy('id','desc')->get();
        return view('anggota.index', [
            'anggotas'=> $anggotas
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('anggota.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated= $request->validate([
            'nama'=> 'required|string|max:255',
            'alamat'=> 'required|string|max:255',
            'kota'=> 'required|string|max:255',
            'email'=> 'required|string|max:255',
            'profile' => 'required|image|mimes:png|max:2048',
        ]);
        DB::beginTransaction();
        try{
            if($request->hasFile('profile')){
                $path = $request->file('profile')->store('anggotas','public');
                $validated['profile']=$path;
            }
            $newAnggota= Anggota::create($validated);

            DB::commit();
            return redirect()->route('anggota.index')->with('succes', 'Anggota Created Succesfully');
        }catch(\Exception $e){
            DB::rollBack();

            return redirect()->back()->with('error', 'System eror'.$e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Anggota $anggota)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Anggota $anggotum)
    {
        return view('anggota.edit', [
            'anggota' => $anggotum
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Anggota $anggotum)
    {
        $validated= $request->validate([
            'nama'=> 'required|string|max:255',
            'alamat'=> 'required|string|max:255',
            'kota'=> 'required|string|max:255',
            'email'=> 'required|string|max:255',
            'profile' => 'sometimes|image|mimes:png|max:2048',
        ]);
        DB::beginTransaction();
        try{
            if($request->hasFile('profile')){
                $path = $request->file('profile')->store('anggotas','public');
                $validated['profile']=$path;
            }
            $anggotum->update($validated);

            DB::commit();
            return redirect()->route('anggota.index')->with('succes', 'Anggota Edited Succesfully');
        }catch(\Exception $e){
            DB::rollBack();

            return redirect()->back()->with('error', 'System eror'.$e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Anggota $anggotum)
    {
        try{
            $anggotum->delete();
            return redirect()->back()->with('succes','Anggota deleted sussesfully');
        }
        catch(\Exception $e){
            DB::rollBack();

            return redirect()->back()->with('error', 'System eror'.$e->getMessage());
        }
        
    }
}
