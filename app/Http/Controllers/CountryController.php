<?php

namespace App\Http\Controllers;

use App\Country;
use Illuminate\Http\Request;
use Session;
use Storage;
use Auth;
use File;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countries = Country::whereStatus(1)->orderBy('id','DESC')->get();
        return view('country.create',compact('countries'));
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
        //dd($request->all());
        // if ($request->hasFile('image')) {
        //     if ($request->file('image')->isValid()) {
        //         //
        //         $validated = $request->validate([
        //             'name' => 'string|max:40|unique:countries',
        //             'image' => 'mimes:jpeg,png|max:1014',
        //         ]);
        //         $extension = $request->image->extension();
        //         $request->image->storeAs('/public', $validated['name'].".".$extension);
        //         $url = Storage::url($validated['name'].".".$extension);
        //         $country = Country::create([
        //            'name' => $validated['name'],
        //             'flag_image' => $url,
        //             'status'=>1
        //         ]);
        //         Session::flash('message', "Country Added successfully!");
        //         Session::flash('type', 'success');
        //         return \Redirect::back();
        //     }
        // }
        $user_id=Auth::user()->id;
        $documents_path='';
        $validated = $request->validate([
            'name' => 'string|max:40|unique:countries',
            'image' => 'mimes:jpeg,png|max:1014',
        ]);
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = 'country-'.$user_id.'-'.time() . '.' . $request->file('image')->extension();
            $filePath = 'files/country/';
            $file->move($filePath, $filename);
            $documents_path=$filePath.$filename;
        }
        $country = Country::create([
             'name' => $validated['name'],
             'flag_image' => $documents_path,
             'status'=>1
         ]);
         Session::flash('message', "Country Added successfully!");
        Session::flash('type', 'success');
        return \Redirect::back();
       // abort(500, 'Could not upload image :(');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function show(Country $country)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function edit(Country $country)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $country)
    {
        $user_id=Auth::user()->id;
        $documents_path='';
        $validated = $request->validate([
            // 'name' => 'string|max:40|unique:countries',
            'image' => 'mimes:jpeg,png|max:1014',
        ]);
        $country = Country::find($country);
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = 'university-'.$user_id.'-'.time() . '.' . $request->file('image')->extension();
            $filePath = 'files/country/';
            $file->move($filePath, $filename);
            $url=$filePath.$filename;
            // Storage::delete('files/country/'.$filename);
            
            // if (file_exists(public_path($name =  $file->getClientOriginalName()))) 
            // {
            //     File::delete('files/country/'.$country->flag_image);
            // };
            $country->flag_image = $url;
        }
        $country-> name = $request->name;

        $status = $country->update();
        if($status){Session::flash('message', "Country Updated Successfully!");
            Session::flash('type', 'success');
            return \Redirect::back();
        }
        
         
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function destroy(Country $country)
    {
        //
    }
}
