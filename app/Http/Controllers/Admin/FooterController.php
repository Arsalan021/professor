<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FooterSection;
use Str;

class FooterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = FooterSection::orderBy('id','DESC')->get();

        return view('admin.footer_section.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


       return view('admin.footer_section.create');
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
            'name' => 'required',

            'email' => 'required',

        ]);

        $input = $request->except(['_token', 'image', 'bg_image'],$request->all());

        $data = FooterSection::create($input);

        return redirect()->route('footer.index')->with(['message'=>'Section created successfully','type'=>'success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = FooterSection::find($id);
        return view('admin.footer_section.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = FooterSection::find($id);

        return view('admin.footer_section.edit',compact('data'));
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
             'name' => 'required',

            'email' => 'required',
        ]);

        $input = $request->all();

        $data = FooterSection::find($id);

        $data->update($input);
        return redirect()->route('footer.index')->with(['message'=>'Section created successfully','type'=>'success']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        FooterSection::find($id)->delete();
        return redirect()->route('footer.index')
                        ->with(['message'=>'Section delete successfully','type'=>'success']);
    }

    public function change_status(Request $request)
    {
        $statusChange = FooterSection::where('id',$request->id)->update(['status'=>$request->status]);
        if($statusChange)
        {
            return array('message'=>'Status  has been changed successfully','type'=>'success');
        }else{
            return array('message'=>'Status has not changed please try again','type'=>'error');
        }

    }
}

