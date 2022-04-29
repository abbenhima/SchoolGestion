<?php

namespace App\Http\Controllers;

use App\Etudiant;
use App\Personne;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class EtudiantController extends Controller
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
        return view('etudiants.index',[
            'personnes'=>Personne::whereHasMorph('personneable','App\Etudiant')->paginate(10),
            'etudiants'=>Etudiant::all()
           // 'pagination'=>
        ]);
    
        //    $personne =Personne::whereHasMorph('personneable','App\Etudiant')->get()->paginate(10);
        //   dd($personne);
         

    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()

    {
       return view('etudiants.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $etudiant=new Etudiant;
        $personne=new Personne;
        $personne->first_name=$request->input('first_name');
        $personne->last_name=$request->input('last_name');
        $personne->email=$request->input('email');
        $etudiant->anne_entre=$request->input('anne_entre');
        $etudiant->save();
        $etudiant->personnes()->save($personne);
        $request->session()->flash('status','Etudiant bien enregistré !!!!! ');
        return redirect()->route('etudiants.index');
     
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
        return view('etudiants.edit',[
            'personne' =>$personne,
            'etudiants'=>Etudiant::all()
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
        $etudiant=Etudiant::find($personne->personneable_id);
        $etudiant->anne_entre = $anne;
        $etudiant->update();
        $personne->update();
        $request->session()->flash('status','Etudiant bien modifier !!!!! ');
        return redirect()->route('etudiants.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $personne=Personne::findOrFail($id);
        $etudiant=Etudiant::findOrFail($personne->personneable_id);
        $etudiant->delete();
        $personne->delete();
        $request->session()->flash('status','Etudiant bien supprimer !!!!! ');
        return redirect()->route('etudiants.index');
    }
}
