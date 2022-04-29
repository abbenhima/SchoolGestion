<?php

namespace App\Http\Controllers;

use App\Cour;
use App\Personne;
use App\Salle;
use Illuminate\Http\Request;

class SalleController extends Controller
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
        return view('salles.index',[
            'salles'=>Salle::paginate(10),
            'cours'=>Cour::all(),
            'personnes'=>Personne::whereHasMorph('personneable','App\Professeur')->get()
            
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('salles.create',[
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
        $salle=new Salle();
        $salle->name_salle=$request->input('name_salle');
        $cour=$request->input('cour_id');
        $salle->cour()->associate($cour)->save();
        $request->session()->flash('status','salle bien Cree !!!!! ');
        return redirect()->route('salles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $salle=Salle::findOrFail($id);
        $cours=Cour::all();
      
        return view('salles.edit',[
            'salle'=>$salle,
            'cours'=>$cours,
          
            

            
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
        $salle= Salle::findOrFail($id);
        $salle->name_salle=$request->input('name_salle');
        $cour=$request->input('cour_id');
        $salle->cour()->associate($cour)->save();
        $request->session()->flash('status','bien modifier !!!!! ');
        return redirect()->route('salles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,Request $request)
    {
        $salle=Salle::findOrFail($id);
        $salle->delete();
        $request->session()->flash('status','cours bien supprimer !!!!! ');
        return redirect()->route('salles.index');
    }
}
