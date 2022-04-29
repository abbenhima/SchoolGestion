<?php

namespace App\Http\Controllers;


use App\Personne;
use App\Professeur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfesseurController extends Controller
{

     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('professeurs.index',[
            'personnes'=>Personne::whereHasMorph('personneable','App\Professeur')->paginate(10),
            'professeurs'=>Professeur::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('professeurs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $professeur=new Professeur();
        $personne=new Personne;
        $personne->first_name=$request->input('first_name');
        $personne->last_name=$request->input('last_name');
        $personne->email=$request->input('email');
        $professeur->anne_entre=$request->input('anne_entre');
        $professeur->save();
        $professeur->personnes()->save($personne);
        $request->session()->flash('status','professeur bien enregistré !!!!! ');
        return redirect()->route('professeurs.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $personne=Personne::findOrFail($id);
        return view('professeurs.edit',[
            'personne' =>$personne,
            'professeurs'=>Professeur::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $personne=Personne::findOrFail($id);
        $personne->first_name=$request->input('first_name');
        $personne->last_name=$request->input('last_name');
        $personne->email=$request->input('email');
        $anne=$request->input('anne_entre');
        $professeur=Professeur::find($personne->personneable_id);
        $professeur->anne_entre = $anne;
        $professeur->update();
        $personne->update();
        $request->session()->flash('status','Etudiant bien modifier !!!!! ');
        return redirect()->route('professeurs.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $personne=Personne::findOrFail($id);
        $professeur=Professeur::findOrFail($personne->personneable_id);
        $professeur->delete();
        $personne->delete();
        //$professeur->session()->flash('status','professeur bien supprimer !!!!! ');
        return redirect()->route('professeurs.index');
    }
}
