<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
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
        return view('front.pages.index');
    }

    public function write(){
        return view('front.pages.writer');
    }

    public function professor(){
        return view('front.pages.professor');
    }

    public function human(){
        return view('front.pages.human');
    }

}
