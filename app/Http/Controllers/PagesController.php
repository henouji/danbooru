<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
        $title = 'Welcome to Guild Board.';
        // return view('pages.index', compact('title'));
        return view('pages.index')->with('title',$title);
    }

    public function about(){
        return view('pages.about');
    }

    public function services(){
        $data = array(
            'services' => ['Web Development', 'Web Design']
        );
        return view('pages.services')->with($data);
    }
}
