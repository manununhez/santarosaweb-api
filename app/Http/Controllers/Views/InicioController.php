<?php


namespace App\Http\Controllers\Views;

use Illuminate\Http\Request;
use App\Section;

class InicioController
{
        public function index()
        {
                return view('inicio', ['sections' => Section::all()]);
        }
        // public function viewindex(Request $request){
        // $events = Event::orderBy('id', 'desc')->get();
        // return response()->json($events);
        // }
}
