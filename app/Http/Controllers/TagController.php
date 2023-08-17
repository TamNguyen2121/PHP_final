<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Session;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $tagKey = request()->input('tagKey');
        $tagQuery = Tag::orderBy('created_at', 'ASC');
    
        if ($tagKey) {
            $tagQuery->where(function ($subQuery) use ($tagKey) {
                $subQuery->where('id', '=', $tagKey)
                         ->orWhere('name', 'like', '%' . $tagKey . '%')
                         ->orWhere('description', 'like', '%' . $tagKey . '%');
            });
        }
    
        $Tags = $tagQuery->paginate(20);    
        return view('admin.Tag.index', compact('Tags'));
      
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.Tag.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $this->validate($request,[
            'name' =>'required|unique:tags,name',
        ]);

        $Tag= tag::create([
            'name'=>$request->name,
            'description'=>$request->description,
        ]);

        Session::flash('success','Tag created successfully');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Tag $tag)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tag $Tag)
    {
        return view('admin.Tag.edit', compact('Tag'));
    }

    


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tag $Tag)
    {
        $this->validate($request,[
            'name' =>"required",
        ]);

        $Tag->name = $request->name;
        $Tag->description = $request->description;
        $Tag->save();

        Session::flash('success','Tag updated successfully');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tag $Tag)
    {
        if($Tag){
            $Tag->delete();
            Session::flash('success','Tag deleted successfully');
        }
        return redirect()->back();
    }
}
