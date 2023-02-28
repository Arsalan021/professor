<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\HomeSection;
use App\Models\AboutSection;
use App\Models\Section2;
use App\Models\BlogSection;
use App\Models\WritterSection;
use App\Models\ProfessorSection;
use App\Models\HumanSection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use DB;
use Hash;
use DataTables;
use Session;
use Carbon\Carbon;

class FrontController extends Controller
{
    public function index(){
        $data['home'] = HomeSection::where('status','1')->first();
        $data['about'] = AboutSection::where('status','1')->first();
        $data['section'] = Section2::where('status','1')->first();
        $data['blog'] = BlogSection::where('status','1')->take(2)->get();
        $data['writter'] = WritterSection::where('status','1')->first();
        $data['professor'] = ProfessorSection::where('status','1')->first();
        $data['human'] = HumanSection::where('status','1')->first();

        return view('front.pages.index',$data);
    }

    public function write(){
        $data = WritterSection::where('status','1')->first();


        return view('front.pages.writer',compact('data'));
    }

    public function professor(){
        $data  = ProfessorSection::where('status','1')->first();

        return view('front.pages.professor',compact('data'));
    }

    public function human(){
        $data = HumanSection::where('status','1')->first();
        return view('front.pages.human',compact('data'));
    }

}
