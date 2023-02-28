<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Section2;
use Str;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Section2::orderBy('id','DESC')->get();

        return view('admin.section2.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


       return view('admin.section2.create');
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

        $input = $request->except(['_token', 'image', 'bg_image'],$request->all());


        if($request->hasFile('image'))
        {
            $img = Str::random(20).$request->file('image')->getClientOriginalName();
            $input['image'] = $img;
            $request->image->move(public_path("documents/section2"), $img);
        }
        if($request->hasFile('bg_image'))
        {
            $img = Str::random(20).$request->file('bg_image')->getClientOriginalName();
            $input['bg_image'] = $img;
            $request->bg_image->move(public_path("documents/section2"), $img);
        }
        $data = Section2::create($input);

        return redirect()->route('section2.index')->with(['message'=>'Section created successfully','type'=>'success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Section2::find($id);
        return view('admin.section2.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Section2::find($id);

        return view('admin.section2.edit',compact('data'));
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
            $request->image->move(public_path("documents/section2"), $img);
        }
        $data = Section2::find($id);

        $data->update($input);
        return redirect()->route('section2.index')->with(['message'=>'Section created successfully','type'=>'success']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Section2::find($id)->delete();
        return redirect()->route('section2.index')
                        ->with(['message'=>'Section delete successfully','type'=>'success']);
    }

    public function change_status(Request $request)
    {
        $statusChange = Section2::where('id',$request->id)->update(['status'=>$request->status]);
        if($statusChange)
        {
            return array('message'=>'Status  has been changed successfully','type'=>'success');
        }else{
            return array('message'=>'Status has not changed please try again','type'=>'error');
        }

    }
}
