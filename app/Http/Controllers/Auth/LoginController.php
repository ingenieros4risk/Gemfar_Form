<?php

namespace App\Http\Controllers\Auth;

use App\Models\User\CheckLogin;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Carbon\Carbon;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = 'notes';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {   
        $input = $request->all();
        $today = Carbon::now();
   
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
   
        if(auth()->attempt(array('email' => $input['email'], 'password' => $input['password'])))
        {
            /* Adding Log from succes Login*/
            $log = new CheckLogin([
                'id_user' => auth()->user()->id,
                'date_login' => $today
            ]);
            $log->save();

            if (auth()->user()->is_sanofi == 1) {
                return redirect()->route('login')
                ->with('error','Este Usuario es de Sanofi.');
            }elseif (auth()->user()->status_id > 1) {
                auth()->logout();
                return redirect()->route('login')
                ->with('error','Este Usuario está bloqueado.');
            }else{
                return redirect()->back();
            }
        }else{
            return redirect()->route('login')
                ->with('error','Correo Electrónico y contraseña son equivocados.');
        }
          
    }
}
