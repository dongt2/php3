<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ThongtinsvController extends Controller
{
    public function index(){
        $data = [
            [
                'id' => 1,
                'name' => 'Nguyen Van A',
                'age' => 20,
                'address' => 'Ha Noi'
            ],
            [
                'id' => 2,
                'name' => 'Nguyen Van B',
                'age' => 20,
                'address' => 'Ha Noi'
            ]
        ];

        return view('thongtinsv',compact('data'));
    }
}
