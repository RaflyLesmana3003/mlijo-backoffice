<?php

namespace App\Http\Controllers;

use App\penarikan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PenarikanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mlijousers = DB::table('penarikans')->get();
        // $mlijousers = DB::table('users')
        //     ->join('mlijos', 'users.id', '=', 'mlijos.id_user')
        //     ->select('users.*', 'mlijos.*')
        //     ->get();
        return view('admin/penarikan/index',['mlijo' => $mlijousers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\penarikan  $penarikan
     * @return \Illuminate\Http\Response
     */
    public function show(penarikan $penarikan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\penarikan  $penarikan
     * @return \Illuminate\Http\Response
     */
    public function edit(penarikan $penarikan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\penarikan  $penarikan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, penarikan $penarikan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\penarikan  $penarikan
     * @return \Illuminate\Http\Response
     */
    public function destroy(penarikan $penarikan)
    {
        //
    }
}
