<?php

namespace App\Http\Controllers;

use App\Cour;
use App\Personne;
use Illuminate\Http\Request;

class CourController extends Controller
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
        return view('cours.index',[
            'cours'=>Cour::paginate(10),
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
        return view('cours.create',[
            'personnes'=>Personne::whereHasMorph('personneable','App\Professeur')->get()
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
        $cour=new Cour();
        $cour->libele=$request->input('libele');
        $prof=$request->input('prof_id');
        $cour->professeur()->associate($prof)->save();
        $request->session()->flash('status','Cour bien Cree !!!!! ');
        return redirect()->route('cours.index');
    }

   

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $personnes=Personne::whereHasMorph('personneable','App\Professeur')->get();
        $cour=Cour::find($id);

        return view('cours.edit',[
            'cour'=>$cour,
            'personnes'=>$personnes

            
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
        $cour= Cour::findOrFail($id);
        $cour->libele=$request->input('libele');
        $prof=$request->input('prof_id');
        $cour->professeur()->associate($prof)->save();
        $request->session()->flash('status','Cour bien modifier !!!!! ');
        return redirect()->route('cours.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,Request $request)
    {
        $cour=Cour::findOrFail($id);
        $cour->delete();
        $request->session()->flash('status','cours bien supprimer !!!!! ');
        return redirect()->route('cours.index');
    }
}
