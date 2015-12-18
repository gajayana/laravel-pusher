<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PagesController extends Controller {
    public function about() {
        
        $data = [];
        $data['first'] = 'kocings';
        $data['last'] = 'geringgs';
        
        $data['people'] = [
            'jeki cen','andini menur'    
        ];
        
        return view('pages.about', $data);
    }
    
    public function contact() {
        return view('pages.contact');
    }
}
