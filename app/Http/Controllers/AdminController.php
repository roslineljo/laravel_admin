<?php

namespace App\Http\Controllers;

use App\Models\Admin;

use Illuminate\Http\Request;

class AdminController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admin = Admin::latest()->paginate(5);
  
        return view('admin.index',compact('admin'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
	/**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create');
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
            'title' => 'required',
            'description' => 'required',
            'username' => 'required',
            'password' => 'required',
            'usertype' => 'required',
        ]);
  
        Admin::create($request->all());
   
        return redirect()->route('admin.index')
                        ->with('success','created successfully.');
    }
   
    /**
     * Display the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        return view('admin.show',compact('admin'));
    }
   
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        return view('admin.edit',compact('admin'));
    }
  
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Admin $admin)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'username' => 'required',
            'password' => 'required',
            'usertype' => 'required',
        ]);
  
        $admin->update($request->all());
  
        return redirect()->route('admin.index')
                        ->with('success',' updated successfully');
    }
  
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        $admin->delete();
  
        return redirect()->route('admin.index')
                        ->with('success',' deleted successfully');
    }
}
