<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    //to show all lisitngs
    public function index() {
         
        return view('listings.index', [
            'listings' => Listing::latest()->filter(request(['tag', 'search']))->paginate(6) 
        ]);
    }

    //single listing
    public function show(Listing $listing) {
        return view('listings.show',[
            'listing' => $listing
        ]);
    }
    //creat and store listing data
    public function create() {
        return view('listings.create');
    }
    public function store(Request $request) {
        $formFields = $request->validate([
            'title' => 'required',
            'company' => ['required', 'unique:listings'],
            'location' => 'required',
            'website' => 'required',
            'tags' => 'required',
            'email'=> ['required', 'email'],
            'description' => ['required']
    
        ]);

        if($request->hasFile('logo')){
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }
        $formFields['user_id'] = auth()->id();
        Listing::create($formFields);
        

        return redirect('/')->with('message', 'Listing created successfully');
    }

    //show edit form    
    public function edit (Listing $listing)
    { 
       return view('listings.edit', ['listing' =>$listing]);
    }

    //update
    public function update(Request $request, Listing $listing) {
        
        //make sure loggedin use ris the wner
        if($listing->user_id != auth()->id()){
            abort(403, 'Unauthorized action!');
        }
        
        $formFields = $request->validate([
            'title' => 'required',
            'company' => ['required'],
            'location' => 'required',
            'website' => 'required',
            'tags' => 'required',
            'email'=> ['required', 'email'],
            'description' => ['required']
    
        ]);

        if($request->hasFile('logo')){
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $listing->update($formFields);
        

        return back()->with('message', 'Listing created successfully');
    }

    //delete
    public function destroy(Listing $listing){
        //make sure loggedin use ris the wner
        if($listing->user_id != auth()->id()){
            abort(403, 'Unauthorized action!');
        }
        $listing->delete();
        return redirect('/')->with("message", "Listing deleted successfully!");
    }

    //manage 
    public function manage(){
        return view('listings.manage', ['listings' => auth()->user()->listings()->get()]);
    }
}
