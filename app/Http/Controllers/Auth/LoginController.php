<?php
namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\StoreLogin;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function loginForm($type)
    {
        return view('auth.login',compact('type'));
    }

    public function chekGuard($request)
    {
        if($request->type == 'student'){
            $guardName= 'student';
        }
        elseif ($request->type == 'parentt'){
            $guardName= 'parentt';
        }
        elseif ($request->type == 'teacher'){
            $guardName= 'teacher';
        }
        else{
            $guardName= 'web';
        }
        return $guardName;
    }

    public function redirect($request)
    {
        if($request->type == 'student'){
            return redirect()->intended(RouteServiceProvider::STUDENT);
        }
        elseif ($request->type == 'parentt'){
            return redirect()->intended(RouteServiceProvider::PARENT);
        }
        elseif ($request->type == 'teacher'){
            return redirect()->intended(RouteServiceProvider::TEACHER);
        }
        else{
            return redirect()->intended(RouteServiceProvider::HOME);
        }
    }

    public function login(StoreLogin $request)
    {
        $validated = $request->validated();
        if (Auth::guard($this->chekGuard($request))->attempt(['email' => $request->email, 'password' => $request->password]))
        {
            return $this->redirect($request);
        }
        else
        {
            toastr()->error(trans('auth.failed'));
            return redirect()->back();
        }
    }

    public function logout(Request $request,$type)
    {
        Auth::guard($type)->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
