<?php

namespace App\Http\Controllers;

use App\Cour;
use App\Note;
use App\Personne;
use Illuminate\Http\Request;

class NoteController extends Controller
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
         return view('notes.index',[
            'notes'=>Note::paginate(10),
            'personnes'=>Personne::whereHasMorph('personneable','App\Etudiant')->get(),
            'cours'=>Cour::all()
            
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('notes.create',[
            'personnes'=>Personne::whereHasMorph('personneable','App\Etudiant')->get(),
            'cours'=>Cour::all()

        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $note=new Note();
        $note->note=$request->input('note');
        $etud=$request->input('etud_id');
        $cour=$request->input('cour_id');
        $note->cour()->associate($cour);
        $note->etudiant()->associate($etud);
        $note->save();
        $request->session()->flash('status','note est  bien ajoute !!!!! ');
        return redirect()->route('notes.index');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('notes.edit',[
            'note'=>Note::findOrFail($id),
            'personnes'=>Personne::whereHasMorph('personneable','App\Etudiant')->get(),
            'cours'=>Cour::all(),
           
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
        $note=Note::findOrFail($id);
        $note->note=$request->input('note');
        $etud=$request->input('etud_id');
        $cour=$request->input('cour_id');
        $note->cour()->associate($cour);
        $note->etudiant()->associate($etud);
        $note->save();
        $request->session()->flash('status','Note bien modifier !!!!! ');
        return redirect()->route('notes.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,Request $request)
    {
        $note=Note::findOrFail($id);
        $note->delete();
        $request->session()->flash('status','Note bien supprimer !!!!! ');
        return redirect()->route('notes.index');
    }
}
