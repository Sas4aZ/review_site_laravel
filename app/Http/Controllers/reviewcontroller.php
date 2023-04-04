<?php

namespace App\Http\Controllers;

use App\Models\comments;
use App\Models\Review;
use App\Models\student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class reviewcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rev = Review::get();
        return view("reviews.index")->with("rev", $rev);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('reviews.post');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'review_name' => ['required', 'string', 'max:255' ],
            'review_foreword' => ['required', 'string',  'max:255'],
            'review_description' =>['required', 'string'],
            'image'=> ['required', 'image', 'max:1024', 'mimes:jpeg,png,jpg,gif' ]
        ]);
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
        return redirect()->back()->with('status', 'Post added succesfully') ;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $rev = Review::where('id', $id)->first();
        $data =[
            'rev'=> $rev
        ];
        return view("reviews.view")->with($data);


//        session('review_id') = $rev->id ;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rev = Review::where('id', $id)->first();
        return view ("reviews.edit")->with("rev", $rev);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'review_name' => ['required', 'string', 'max:255' ],
            'review_foreword' => ['required', 'string', 'max:255'],
            'review_description' =>['required', 'string'],
            'image'=> ['image', 'max:1024', 'mimes:jpeg,png,jpg,gif' ]
        ]);
        $rev = Review::where('id', $id)->first();
        $rev->review_name = $request->review_name;
        $rev->review_foreword = $request->review_foreword;
        $rev->review_description = $request->review_description;
        $rev->user_id = Auth::id();

        if ($request->hasFile('image')) {
            if (File::exists( $rev->img)) {
                File::delete( $rev->img);
            }
            $filenamewithExt = $request->file("image")->getClientOriginalName();
            $filename = pathinfo($filenamewithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $filenameToStore = $filename . "_" . time() . "." . $extension;
            $img = Image::make($request->file("image"));
            $img->save("storage/image/" . $filenameToStore);
            $rev->review_image = "storage/image/" . $filenameToStore;
        }
        $rev->save();
        return redirect()->back()->with('status', 'Post edited succesfully') ;

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rev = Review::where('id', $id)->first();
        if (File::exists($rev->img)) {
            File::delete($rev->img);

        }
        $rev->delete() ;
        return redirect()->back()->with('status','Post deleted succesfully.');
    }
}
