<?php

namespace App\Http\Controllers;

use App\Models\Rekening;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function myrek()
    {
        $id = Auth()->user()->id;
        $rekening = Rekening::where('user_id', $id)->get();
        return view('users.myrek', compact('rekening'));
    }

}
