<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request){

        //dd($request->query('title', 'Valor Default'));//regresa el atributo con esa key que este en la request el segundo argumento es el el por default
        //dd Vardump y die incluido
        return view('test', [
            'title' => $request->query('title', 'Valor Default'),
        ]);
    }
}
