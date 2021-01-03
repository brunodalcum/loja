<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class WishListController extends Controller
{
    public function addWishList($id)
    {
        $userid = Auth::id();
        $check = DB::table('wishlists')->where('user_id',$userid)->where('product_id',$id)->first();
        $data = array(
            'user_id' => $userid,
            'product_id' => $id,

        );
        if (Auth::Check()) {

            if ($check) {
                return \Response::json(['error' => 'Produto já Existe em sua lista de Desejos']);
            }else{
                DB::table('wishlists')->insert($data);
                return \Response::json(['success' => 'Produto Adicionado em sua Lista de desejos!']);

            }


        }else{
            return \Response::json(['error' => 'Você deve logar em sua conta!']);

        }
    }
}
