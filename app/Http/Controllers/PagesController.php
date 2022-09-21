<?php

namespace App\Http\Controllers;

use App\Models\student;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;


class PagesController extends Controller
{
    //
    public function  profile($id, $second) {
        $data = [
            'id'=> $id,
            'name'=> $second
        ] ;
        return view('profile')->with($data);
    }

    public function create() {
        return view("create") ;
    }
public function store(Request $request){
        $student = new Student();
    $student->name = $request->name ;
    $student ->address = $request->address ;
    $student -> dob = $request -> dob;

    $filenamewithExt = $request->file("image")->getClientOriginalName();
    $filename = pathinfo($filenamewithExt, PATHINFO_FILENAME);
    $extension = $request -> file('image')->getClientOriginalExtension();
    $filenameToStore = $filename . "_" . time() . ".". $extension ;
    $img = Image::make($request->file("image"));
    $img -> save("storage/image/". $filenameToStore );
    $student -> img = "storage/image/". $filenameToStore ;
    $student -> save();
    return redirect('/list');
}
public function list() {
        $students = Student::get();
        return view("list")->with("students", $students);

}
public function new() {
        return view("new");
}


}


