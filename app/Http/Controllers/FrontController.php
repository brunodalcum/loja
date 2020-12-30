<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class FrontController extends Controller
{
    public function StoreNewslater(Request $request)
    {
        $validateData = $request->validate([
           'email' => 'required|unique:newslatters|max:55'
        ]);
        $data = array();
        $data['email'] = $request->email;
        DB::table('newslatters')->insert($data);
        $notification=array(
            'messege'=>'E-mail Inserido com Sucesso!',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }

}
