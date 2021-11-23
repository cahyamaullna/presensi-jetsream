<?php

namespace App\Http\Controllers;

use App\Models\Absen;
use App\Models\Rombel;
use App\Models\Rayon;
use Illuminate\Http\Request;

class AbsenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $absen = absen::latest()->paginate(5);
    
        return view('absen.index',compact('absen'))
            ->with('i', (request()->input('page', 1) - 1) * 5); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rayons = Rayon::all();
        $rombel = Rombel::all();
        return view('absen.create', compact('rayons', 'rombel', $rayons, $rombel));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nis' => 'required',
            'nama' => 'required',
            'rombel' => 'required',
            'rayon' => 'required',
            'jam_kedatangan' => 'required',
            'jam_kepulangan' => 'required',
            'keterangan' => 'required'
        ]);
    
        absen::create($request->all());
     
        return redirect()->route('absen.index')
                        ->with('success','Berhasil Menyimpan !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\absen  $studentGroup
     * @return \Illuminate\Http\Response
     */
    public function show(absen $absen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\absen  $studentGroup
     * @return \Illuminate\Http\Response
     */
    public function edit(absen $absen)
    {
        $rayons = Rayon::all();
        $rombel = Rombel::all();
        return view('absen.edit',compact('absen','rayons', 'rombel',$rayons, $rombel));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\absen  $studentGroup
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, absen $absen)
    {
        $request->validate([
            'nis' => 'required',
            'nama' => 'required',
            'rombel' => 'required',
            'rayon' => 'required',
            'jam_kedatangan' => 'required',
            'jam_kepulangan' => 'required',
            'keterangan' => 'required'
        ]);
            
        $absen->update($request->all());
    
        return redirect()->route('absen.index')
                        ->with('success','Berhasil Update !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\absen  $studentGroup
     * @return \Illuminate\Http\Response
     */
    public function destroy(absen $absen)
    {
        $absen->delete();
     
        return redirect()->route('absen.index')
                        ->with('success','Berhasil Hapus !');
    }
}