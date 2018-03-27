<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

use App\Models\Users;
use App\Models\Pictures;
use Carbon\Carbon;

class LoginController extends BaseController
{
    //
    public function __construct()
    {
    	parent::__construct();
    	$this->data['menus'] = BaseController::menus();
    }
    public function getLogin()
    {
    	return view('pages.signup',$this->data);
    }
    public function checkLogin(Request $request)
    {
        $request->validate([
            'user' => ['required','alpha'],
        ], [
            'required' => 'Polje :attribute je obavezno!'
        ]);

        $username = $request->get('user');
        $password = $request->get('password');

        $users = new Users();
        $users->username = $username;
        $users->password = $password;

        $loginUser = $users->login();

        if(!empty($loginUser)){
            $request->session()->push('user', $loginUser);
            return redirect('/')->with('success','You are logged in successfully!');
        }
        return redirect()->back()->with('error','Niste registrovani!');
    }

    public function logout(Request $request){
        $request->session()->forget('user');
        $request->session()->forget('user_id');
        $request->session()->flush();
        return redirect('/');
    }

    public function showRegisterForm()
    {
        return view('pages.register',$this->data);
    }

    public function register(Request $request)
    {
        $request->validate([
            'user' => 'required| min:3 | max: 15',
            'fName' => 'required',
            'lName' => 'required',
            'email' => 'required | email',
            'profile' => 'mimes:jpg,jpeg,png,JPG,gif'
        ]);

        $name = $request->get('user');
        $first = $request->get('fName');
        $last = $request->get('lName');
        $email = $request->get('email');
        $pw = $request->get('pw');
        $re = $request->get('rePw');

        $slika = $request->file('profile');

        $tmp_putanja = $slika->getPathName(); // tmp putanja
        $ekstenzija = $slika->getClientOriginalExtension(); // vraca: jpg, png - bez .
        $ime_fajla = time().'.'.$ekstenzija;
        $putanja = 'images/'.$ime_fajla;
        
        if($pw == $re)
        {
            $putanja_server = public_path($putanja); 
            try {
                File::move($tmp_putanja, $putanja_server);

                // unos u bazu

                $user = new Users();
                $user->username = $name;
                $user->first_name = $first;
                $user->last_name = $last;
                $user->email = $email;
                $user->created_at = Carbon::now();
                $user->password = $pw;
                $user->rePw = $re;

                $pictures = new Pictures();
                $pictures->path = $putanja;
                $id = $pictures->savePicture();

                $user->picture_id = $id;

                $rez = $user->save();

                if($rez){
                    return redirect('/')->with('success','Uspesan unos!');
                }
                else {
                    return redirect('/')->with('error','Greska pri unosu!');
                }
            }
            catch (\Exception $ex){
                \Log::error('MOJA GRESKA: '.$ex->getMessage());
            }
        }
        else
        {
            return redirect()->back()->with('error','Password vam se ne poklapa!');
        }
    }
}
