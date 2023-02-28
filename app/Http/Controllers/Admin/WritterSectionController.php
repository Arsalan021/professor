<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WritterSection;
use Str;

class WritterSectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = WritterSection::orderBy('id','DESC')->get();

        return view('admin.writter_section.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


       return view('admin.writter_section.create');
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
            'add_info' => 'required',
            'body' => 'required'
        ]);

        $input = $request->except(['_token', 'image'],$request->all());


        if($request->hasFile('image'))
        {
            $img = Str::random(20).$request->file('image')->getClientOriginalName();
            $input['image'] = $img;
            $request->image->move(public_path("documents/writter_section"), $img);
        }
        $data = WritterSection::create($input);

        return redirect()->route('writter.index')->with(['message'=>'Section created successfully','type'=>'success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = WritterSection::find($id);
        return view('admin.writter_section.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = WritterSection::find($id);

        return view('admin.writter_section.edit',compact('data'));
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
            'add_info' => 'required',
            'body' => 'required'
        ]);

        $input = $request->all();

        if($request->hasFile('image'))
        {
            $img = Str::random(20).$request->file('image')->getClientOriginalName();
            $input['image'] = $img;
            $request->image->move(public_path("documents/writter_section"), $img);
        }
        $data = WritterSection::find($id);

        $data->update($input);
        return redirect()->route('writter.index')->with(['message'=>'Section created successfully','type'=>'success']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        WritterSection::find($id)->delete();
        return redirect()->route('writter.index')
                        ->with(['message'=>'Section delete successfully','type'=>'success']);
    }
    public function change_status(Request $request)
    {

        $statusChange = WritterSection::where('id',$request->id)->update(['status'=>$request->status]);
        if($statusChange)
        {
            return array('message'=>'Status  has been changed successfully','type'=>'success');
        }else{
            return array('message'=>'Status has not changed please try again','type'=>'error');
        }

    }
}
