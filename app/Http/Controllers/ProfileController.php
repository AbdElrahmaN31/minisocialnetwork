<?php

    namespace App\Http\Controllers;

    use App\User;

    class ProfileController extends Controller
    {
        public function profile($username)
        {
            $user = User::whereUsername($username)->first();
            return view('user.profile', compact('user'));
            /*
             * Other ways to access the user data.
            $user = User::where('username',$username);
            $user = User::where('username', '=', $username);
            */

        }
    }
