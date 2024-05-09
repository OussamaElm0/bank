<?php

namespace App\Http\Controllers;

use App\Models\Don;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dons.create', [
            'dons' => Don::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'montant' => 'required|numeric|min:0',
            'don_id' => 'required'
        ]);

        $client = Auth::user()->client;
        $don = Don::find($request->don_id);
        $don->clients()
            ->attach($client,['montant' => $request->montant]);

        ClientController::updateMontant($client,$request->montant);

        return $don->clients;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Don::find($id)
                    ->clients;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
