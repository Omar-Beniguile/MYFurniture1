<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;


class AuthController extends Controller
{
    public function VerifyCredentials(Request $request)
    {
        $username = $request->get("usernameInput");
        $mdp = $request->get("passwordInput");
        $user = collect(DB::select("select * from personne where personne.username = '$username' and  personne.mot_de_passe = '$mdp'"))
            ->first();
        if (isset($user) == true) {
            $request->session()->put('userObject', $user);
            return true;
        }
        return false;
    }

    public static function ManualVerifyCredentials($username, $mdp)
    {
        $user = collect(DB::select("select * from personne where personne.username = '$username' and  personne.mot_de_passe = '$mdp'"))
            ->first();
        if (isset($user) == true) {
            session()->put('userObject', $user);
            return true;
        }
        return false;
    }

    public function AuthentificatedGoingToPage(Request $request)
    {
        $this->VerifyCredentials($request);
        // if (AuthController::IsAuthentificated())
        //     if ($page != " ")
        //         return \redirect($page);
        //     else
        //         return \redirect("/");
        // else
        //     return \redirect("/");

        // if ($page == "home")
        //     return \redirect("/");
        // else
        //     return \redirect($page);
        return redirect(url()->previous());
    }

    public static function IsAuthentificated()
    {
        if (session()->has('userObject'))
            return true;
        return false;
    }

    public function LogOut()
    {
        \Auth::logout();
        \Session::flush();
        return \redirect("/");
    }
}
