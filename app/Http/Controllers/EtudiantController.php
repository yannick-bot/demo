<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Etudiant;
use App\Models\Filiere;

class EtudiantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Récupération de tous les étudiants
        $etudiants = Etudiant::all();

        // Retourne la vue 'etudiants.index' avec les données des étudiants
        return view('etudiants.index', compact('etudiants'));
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $filieres = Filiere::all();
        return view('etudiants.create', [
            'filieres'=> $filieres
        ]);
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $rules = [
            'nom' => 'required|string|min:3',
            'prenom' => 'required|string|min:3',
            'sexe' => 'required',
            'adresse' => 'required|string|min:4',
            'date_naissance' => 'required|date',
            'numero' => 'required|numeric'
        ];
        $validate_data = $request->validate($rules);
        $etudiant = new Etudiant;
        $etudiant->filieres_id = $request->input('filiere');
        $etudiant->nom = $request->input('nom');
        $etudiant->prenom = $request->input('prenom');
        $etudiant->sexe = $request->input('sexe');
        $etudiant->adresse = $request->input('adresse');
        $etudiant->date_naissance = $request->input('date_naissance');
        $etudiant->numero = $request->input('numero');
        $etudiant->save();
        return redirect()->route("etudiants.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
       // dd($id); //permet de voir le contenu de la variable et de voir si la variable est bien reçue
        $etudiant = Etudiant::findOrFail($id);
       // dd($etudiant);
        $filieres = Filiere::all();
       return view('etudiants.edit', compact('etudiant','filieres'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       // dd($request->all());
        $etudiant = Etudiant::findOrFail($id);
        $etudiant->filieres_id = $request->input('filiere');
        $etudiant->nom = $request->input('nom');
        $etudiant->prenom = $request->input('prenom');
        $etudiant->sexe = $request->input('sexe');
        $etudiant->adresse = $request->input('adresse');
        $etudiant->date_naissance = $request->input('date_naissance');
        $etudiant->numero = $request->input('numero');
        $etudiant->update();
        return redirect()->route('etudiants.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $etudiant = Etudiant::findOrFail($id);
        $etudiant->delete();
        return redirect()->route('etudiants.index');
    }

    public function byCodeFiliere(string $code) {
       // dd($code);
       $filiere = Filiere::firstWhere('code', $code);
        if(!isset($filiere))
            return redirect()->route('etudiants.index');

        $etudiant = $filiere->etudiants;
        dd($etudiant);

    }

    public function search()
    {
        $query = request()->input('search');

        $results = Etudiant::where('prenom', '=', "{$query}")
            ->orWhere('adresse', '=', "{$query}")
            ->orWhere('nom', '=', "{$query}")
            ->paginate(6);

        return view('etudiants.search_results', ['results' => $results]);
    }

    public function searchByF()
    {

        $category=request()->input('searchByF');
                $results = Etudiant::join(
                    'filieres',
                    'etudiants.filieres_id',
                    '=',
                    'filieres.id'
                )
                    ->where('filieres_id', '=', "{$category}")
                    ->select('etudiants.*', 'filieres.nom as nom_filiere')
                    ->get();
                return view('etudiants.search_results', ['results' => $results]);

    }


}

