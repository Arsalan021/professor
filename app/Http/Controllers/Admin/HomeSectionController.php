<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HomeSection;
use Str;

class HomeSectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = HomeSection::orderBy('id','DESC')->get();

        return view('admin.home_section.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('admin.home_section.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'name' => 'required',
            'body' => 'required'
        ]);

        $input = $request->except(['_token', 'image'],$request->all());


        if($request->hasFile('image'))
        {
            $img = Str::random(20).$request->file('image')->getClientOriginalName();
            $input['image'] = $img;
            $request->image->move(public_path("documents/home_section"), $img);
        }
        $data = HomeSection::create($input);

        return redirect()->route('home_section.index')->with(['message'=>'User created successfully','type'=>'success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = HomeSection::find($id);
        return view('admin.home_section.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = HomeSection::find($id);

        return view('admin.home_section.edit',compact('data'));
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

         $this->validate($request, [
            'title' => 'required',

            'name' => 'required',
            'body' => 'required'
        ]);

        $input = $request->all();

        if($request->hasFile('image'))
        {
            $img = Str::random(20).$request->file('image')->getClientOriginalName();
            $input['image'] = $img;
            $request->image->move(public_path("documents/home_section"), $img);
        }
        $data = HomeSection::find($id);

        $data->update($input);
        return redirect()->route('home_section.index')->with(['message'=>'Home Section created successfully','type'=>'success']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        HomeSection::find($id)->delete();
        return redirect()->route('home_section.index')
                        ->with(['message'=>'Home Section delete successfully','type'=>'success']);
    }

    public function change_status(Request $request)
    {
        $statusChange = HomeSection::where('id',$request->id)->update(['status'=>$request->status]);
        if($statusChange)
        {
            return array('message'=>'Status  has been changed successfully','type'=>'success');
        }else{
            return array('message'=>'Status has not changed please try again','type'=>'error');
        }

    }
}
