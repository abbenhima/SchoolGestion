<?php

namespace App\Http\Controllers;

use App\Personne;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Nexmo\Laravel\Facade\Nexmo;
use Symfony\Component\HttpFoundation\Session\Session as SessionSession;

class SmsController extends Controller
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


    public function sendSms(Request $request,$id)
    {
       
      $personne=Personne::findOrFail($id);
      $first_name=$personne->first_name;
      $last_name=$personne->last_name;
        Nexmo::message()->send([  
            'to' => '212674361270',
             'from' => '212674361270',
            'text' => 'Votre Fils : '. $first_name.' '. $last_name.' a 40 h Non Justifiée  '
        ]);

        $request->session()->flash('status','Sms bien env !!!!! ');
        return redirect()->route('etudiants.index');
    }
}
