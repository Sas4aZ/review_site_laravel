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
use Intervention\Image\Facades\Image;


class PagesController extends Controller
{
    //
    public function profile($id, $second)
    {
        $data = [
            'id' => $id,
            'name' => $second
        ];
        return view('profile')->with($data);
    }

    public function create()
    {
        return view("create");
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=> 'required',
            'age'=>'required',
            'location'=>'required|max:20',
            'dob'=>'required'
        ]) ;
        $student = new Student();
        $student->name = $request->name;
        $student->address = $request->address;
        $student->dob = $request->dob;

        $filenamewithExt = $request->file("image")->getClientOriginalName();
        $filename = pathinfo($filenamewithExt, PATHINFO_FILENAME);
        $extension = $request->file('image')->getClientOriginalExtension();
        $filenameToStore = $filename . "_" . time() . "." . $extension;
        $img = Image::make($request->file("image"));
        $img->save("storage/image/" . $filenameToStore);
        $student->img = "storage/image/" . $filenameToStore;
        $student->save();
        return redirect('/list');
    }

    public function update(Request $request){
        $student=student::where('id',$request->id)->first();
        $student->name = $request->name;
        $student->address = $request->address;
        $student->dob = $request->dob;

        if ($request->hasFile('image')) {
            if (File::exists('storage/image/'.$student-> img)){
                File::delete('storage/image/'.$student-> img);
            }
            $filenamewithExt = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($filenamewithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $filenameToStore = $filename . "-" . time() . "-" . $extension;
            $img = Image::make($request->file('image'));
            $img->save('storage/image/' . $filenameToStore);
            $student->img = $filenameToStore;
        }

        $student->save();
        return redirect('/list');
    }

    public function delete($id)
    {
        $student = student::where('id', $id)->first();
        if (File::exists('storage/image/' . $student->img)) {
            File::delete('storage/image/' . $student->img);
        }
        $student->delete() ;
        return redirect('list');
    }

    public function list()
    {
        $students = Student::get();
        return view("list")->with("students", $students);

    }

    public function new(){
        return view("new");
    }

    public function edit($id){
        $student = Student::where('id',$id)->first();
        return view('update')->with('student',$student);
    }

    public function signUp() {
        return view("signUp");
    }

    public function signUpForm(Request $request) {

        $user = new User();
        $user->email = $request->email;
        $user->name = $request-> name;
        $user->password=Hash::make($request->password);

        $user->save();
        Mail::to($request->email)->send(new DraftMail($request->name, $user->id));
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
        $credentials = [
            'email'=> $request->email,
        'password'=> $request->password
        ];
        if(Auth::attempt($credentials)){
            if (Auth::user()->active==0) {
                Auth::logout();
                return redirect('login') ;
            }
            return redirect('show');
        }
        else{
            return 'wrong credentials';
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
        public function review_post(Request $request) {
            $rev = new Review();
            $rev->review_name = $request->review_name;
            $rev->review_foreword = $request->review_foreword;
            $rev->review_description = $request->review_description;
            $rev->user_id = Auth::id();

            $filenamewithExt = $request->file("image")->getClientOriginalName();
            $filename = pathinfo($filenamewithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $filenameToStore = $filename . "_" . time() . "." . $extension;
            $img = Image::make($request->file("image"));
            $img->save("storage/image/" . $filenameToStore);
            $rev->review_image = "storage/image/" . $filenameToStore;

            $rev->save();
            return redirect('show') ;
        }
}


