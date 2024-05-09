<?php

namespace App\Http\Controllers;

use App\Models\Virement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VirementController extends Controller
{
    public function create()
    {
        return view('virements.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'montant' => 'required|numeric|min:0',
            'motif' => 'required|string|min:5'
        ]);
        $client = Auth::user()->client;
        if ($client->solde >= $request->montant) {
            Virement::create([
                'montant' => $request->montant,
                'client_id' => $client->id,
                'motif' => $request->motif,
            ]);

            return redirect()->route('clients.index')->with('success','Virement validé');
        } else {
            return redirect()->back()->with('error','Votre sole est insuffisant');
        }
    }
}
