<?php

namespace App\Http\Controllers;

use App\Mail\DraftMail;
use App\Models\Review;
use App\Models\student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rules;
use Intervention\Image\Facades\Image;


class PagesController extends Controller
{
    //
    public function signUp() {
        return view("signUp");
    }

    public function signUpForm(Request $request) {

        $request->validate([
            'name' => ['required'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required',  Rules\Password::defaults()],
        ]);

        $user = new User();
        $user->email = $request->email;
        $user->name = $request-> name;
        $user->password=Hash::make($request->password);

        $user->save();
        Mail::to($request->email)->send(new DraftMail($request->name, $user->id));
        return redirect('login');
    }

    public function activateUser($id) {
        User::where('id',$id)->update(['active'=>1]);
        return redirect('login') ;
    }

    public function login() {
        return view("login");
    }

public function dashboard() {
        Mail::to('paudelsashwat16@gmail.com')->send(new DraftMail('Sashwat',1));
        $data   = [
            'name' => 'Sas',
            'user_id' => 8324
        ] ;
        return view('new');
}

public function loginForm(Request $request) {
    $request->validate([
        'email' => ['required'],
        'password' => ['required'],
    ]);
        $credentials = [
            'email'=> $request->email,
        'password'=> $request->password
        ];
        if(Auth::attempt($credentials)){
            if (Auth::user()->active==0) {
                Auth::logout();
                return redirect('login') ;
            }
            return redirect('review');
        }
        else{
            return redirect()->back()->with('status','Wrong credentials');
        }
        }
        public function test () {
        return view('test');
        }
        public function post () {
        return view('reviews/review_post');
        }
public function review_show() {
    $rev = Review::get();
    return view("reviews/review_show")->with("rev", $rev);

}
public function review_view($id) {

}
public function logout() {
        Auth::logout();
        return view('login');
}


}


