<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use App\Models\location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Session::put('page','location');
        $location=location::orderBy('created_at','ASC')->paginate(20);
        return view('admin.Location.index', compact('location'));
       
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.location.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        //validation
        $this->validate($request,[
            'name' =>'required|unique:locations,name',
        ]);

        $location= location::create([
            'name'=>$request->name,
            'Address'=>$request->address,
        ]);

        Session::flash('success','Location created successfully');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(location $location)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(location $location)
    {
        return view('admin.Location.edit', compact('location'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, location $location)
    {
        // dd($request->all());
        $this->validate($request,[
            'name' =>"required",
        ]);

        $location->name = $request->name;
        $location->Address = $request->address;
        $location->save();

        Session::flash('success','Location updated successfully');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(location $location)
    {
        // return $location;
        If($location){
            $location->delete();
            Session::flash('success','Location deleted successfully');

            return redirect()->route('location.index');
                
        }
    }
}
