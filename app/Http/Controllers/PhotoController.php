<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PhotoController extends Controller
{   
    //  Show all photos
    public function index(){
        return view('photos.index',[
            'photos' => Photo::latest()->filter(request(['tag','search']))->paginate(6)
            // ::all()
            // get() instead of paginate
        ]);
    }

    //  Show a photo
    public function show(Photo $photo){
        return view('photos.show',[
            'photo' => $photo
        ]);
    }

    //  Show a photo
    public function create(){
        return view('photos.create');
    }

    //  Store photo data
    public function store(Request $request){
        $formFields = $request->validate([
            'title' =>['required',Rule::unique('photos','title')],
            'tags' => 'required',
            'description' =>'required'
        ]);

        if($request->hasFile('photo')){
            $formFields['photo'] = $request->file('photo')->store('photos','public');
        }
        // create photos folder in storage>app>public>photos

        $formFields['user_id']=auth()->id();

        Photo::create($formFields);
        // mass assignment 
        

        return redirect('/')->with('message','Photo added successfully');    
    }

    //  show edit form

    public function edit(Photo $photo){
        return view('photos.edit',['photo' => $photo]);
    }

    //  Update
    public function update(Request $request, Photo $photo){
        //  The login user is the owner
        if($photo->user_id != auth()->id()){
            abort(403,'Unauthorized');
        }

        // request and photo because it use both retrieve and send data 
        $formFields = $request->validate([
            'title' =>'required',
            'tags' => 'required',
            'description' =>'required'
        ]);

        if($request->hasFile('photo')){
            $formFields['photo'] = $request->file('photo')->store('photos','public');
        }
        // create photos folder in storage>app>public>photos

        

        $photo->update($formFields);
        // mass assignment 
        

        return redirect('/')->with('message','Photo updated successfully');    
    }

    //  Destroy
    public function destroy(Photo $photo){

        //  The login user is the owner
        if($photo->user_id != auth()->id()){
            abort(403,'Unauthorized');
        }
        $photo->delete();
        return redirect('/')->with('message','Photo deleted successfully');
    }

    //  Manage Photos
    public function manage(){
        return view('photos.manage',['photos'=> auth()->user()->photo()->get()]);
        // using elequent model relationship to pass users' photo 
    }
}
