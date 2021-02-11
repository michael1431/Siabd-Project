<?php

namespace App\Http\Controllers;

use App\Country;
use App\University;
use Illuminate\Http\Request;
use Storage;
use Session;
use Auth;
use File;

class UniversityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countries = Country::whereStatus(1)->orderBy('id','DESC')->get();
        $universities = University::whereStatus(1)->orderBy('id','DESC')->get();
        return view('university.create',compact('countries','universities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //if ($request->hasFile('image')) {
            //  Let's do everything here
        //     if ($request->file('image')->isValid()) {
        //         //
        //         $validated = $request->validate([
        //             'name' => 'string|max:40|unique:universities',
        //             'country_id' => 'required',
        //             'image' => 'mimes:jpeg,png|max:1014',
        //         ]);
        //         $extension = $request->image->extension();
        //         $request->image->storeAs('/public', $validated['name'].".".$extension);
        //         $url = Storage::url($validated['name'].".".$extension);
        //         $country = University::create([
        //             'name' => $validated['name'],
        //             'country_id'=>$validated['country_id'],
        //             'logo_image' => $url,
        //             'status'=>1
        //         ]);
        //         Session::flash('message', "University Added successfully!");
        //         Session::flash('type', 'success');
        //         return \Redirect::back();
        //     }
        // }
        // abort(500, 'Could not upload image :(');
        $url='';
        $user_id=Auth::user()->id;
        $validated = $request->validate([
            'name' => 'string|max:40|unique:universities',
            'country_id' => 'required',
            'image' => 'mimes:jpeg,png,svg|max:1014',
        ]);
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = 'university-'.$user_id.'-'.time() . '.' . $request->file('image')->extension();
            $filePath = 'files/university/';
            $file->move($filePath, $filename);
            $url=$filePath.$filename;
        }
        $university = University::create([
            'name' => $validated['name'],
            'country_id'=>$validated['country_id'],
            'logo_image' => $url,
            'status'=>1
        ]);
        Session::flash('message', "University Added successfully!");
        Session::flash('type', 'success');
        return \Redirect::back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\University  $university
     * @return \Illuminate\Http\Response
     */
    public function show(University $university)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\University  $university
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $countries = Country::whereStatus(1)->orderBy('id','DESC')->get();
        $university = University::findOrfail($id);
        return view('university.edit',compact('countries','university'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\University  $university
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $university)
    {
        // return $request->all();
        $user_id=Auth::user()->id;
        $documents_path='';
        $validated = $request->validate([
            'name' => 'string|max:40|unique:countries',
            'image' => 'mimes:jpeg,png|max:1014',
        ]);
        $university = University::find($university);
        
        $university-> name = $request->name;
        $university-> country_id = $request->country_id;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = 'university-'.$user_id.'-'.time() . '.' . $request->file('image')->extension();
            $filePath = 'files/university/';
            $file->move($filePath, $filename);
            $url=$filePath.$filename;
            if (file_exists(public_path($name =  $file->getClientOriginalName()))) 
            {
                File::delete('files/university/'.$user->logo_image);
            };
            $university->logo_image = $url;
        }

        // if ($request->hasFile('image')) {
        //     $file = $request->file('image');
        //     $filename = 'university-'.$user_id.'-'.time() . '.' . $request->file('image')->extension();
        //     $filePath = 'files/university/';
        //     $file->move($filePath, $filename);
        //     $url=$filePath.$filename;
        //     $university-> logo_image = $url;
        // }
        $countries = Country::whereStatus(1)->orderBy('id','DESC')->get();
        $universities = University::whereStatus(1)->orderBy('id','DESC')->get();
        $status = $university->update();
        if($status){Session::flash('message', "University Updated Successfully!");
            Session::flash('type', 'message');
            return redirect()->route('setting.university.index')->with( ['countries' => $countries, 'universities' => $universities ] );
        // return route('setting.university.index')->with->(compact('countries','universities')));
        } 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\University  $university
     * @return \Illuminate\Http\Response
     */
    public function destroy(University $university)
    {
        //
    }
}
