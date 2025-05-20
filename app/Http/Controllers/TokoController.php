<?php

namespace App\Http\Controllers;

use App\Models\Toko;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TokoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tokos = request()->user()->tokos()->latest()->paginate(8);
        //   return $tokos;

        return view('tokos.index', [
            'tokos' => $tokos,
        ]);
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
    }

    /**
     * Display the specified resource.
     */
    public function show(Toko $toko)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Toko $toko)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Toko $toko)
    {
        return "1111";
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Toko $toko)
    {
        //
    }

    public function notapprovetoko()
    {
        // $tokos = Toko::query()->latest()->where('status', 'inactive')->get();
        $tokos = Toko::query()->latest()->get();

        return view('tokos.approve', [
            'tokos' => $tokos,
        ]);
    }

    public function approveToko(Toko $toko)
    {
        // $toko->status = 'active';
        // $toko->save();
        return to_route('toko.index');
    }
}
