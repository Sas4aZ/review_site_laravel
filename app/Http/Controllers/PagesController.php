<?php

namespace App\Http\Controllers;

use App\Models\student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
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

    }
    public function login() {
        return view("login");
    }

public function loginForm(Request $request) {
        $credentials = [
            'email'=> $request->email,
        'password'=> $request->password
        ];
        if(Auth::attempt($credentials)){
            return redirect('/list'); } else{
return 'wrong credentials';
            }
        }



}


