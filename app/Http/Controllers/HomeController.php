<?php

namespace App\Http\Controllers;

use App\Note;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index($page)
    {
        if(!view()->exists('layouts.'. $page)) {
            return view('page-404');
        }

        $param = [
            'home' => [
                'title' => 'Home',
                'user'  => Note::where('user_id', auth()->user()->id)->orderByDesc('updated_at')->get(),
            ],
            'create' => [
                'title'    => 'Create Note',
            ],
            'generate' => [
                'title' => 'Generate Password',
            ]
        ];

        foreach ($param[$page] as $key => $value) {
            $data[$key] = $value;
        }

        return view('layouts.'. $page, $data);
    }
}
