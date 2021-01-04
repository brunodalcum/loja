<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Cart;
use Response;
use Auth;
use Session;


class CartController extends Controller
{
    public function AddCart($id){

        $product = \Illuminate\Support\Facades\DB::table('products')->where('id',$id)->first();

        $data = array();

        if ($product->discount_price == NULL) {
            $data['id'] = $product->id;
            $data['name'] = $product->product_name;
            $data['qty'] = 1;
            $data['price'] = $product->selling_price;
            $data['weight'] = 1;
            $data['options']['image'] = $product->image_one;
            $data['options']['color'] = '';
            $data['options']['size'] = '';
            \Gloudemans\Shoppingcart\Cart::add($data);
            return \Response::json(['success' => 'Adicionado com Sucesso ao Carrinho!']);
        }else{

            $data['id'] = $product->id;
            $data['name'] = $product->product_name;
            $data['qty'] = 1;
            $data['price'] = $product->discount_price;
            $data['weight'] = 1;
            $data['options']['image'] = $product->image_one;
            $data['options']['color'] = '';
            $data['options']['size'] = '';
            Cart::add($data);
            return \Response::json(['success' => 'Adicionado com Sucesso ao Carrinho!']);

        }

    }


    public function check(){
        $content = Cart::content();
        return response()->json($content);
    }


    public function ShowCart(){
        $cart = Cart::content();
        return view('pages.cart',compact('cart'));
    }


    public function removeCart($rowId){
        Cart::remove($rowId);
        $notification=array(
            'messege'=>'Product Remove form Cart',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);

    }


    public function UpdateCart(Request $request){

        $rowId = $request->productid;
        $qty = $request->qty;
        Cart::update($rowId,$qty);
        $notification=array(
            'messege'=>'Quantidade do Produto Atualizada',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);

    }



    public function ViewProduct($id){
        $product = \Illuminate\Support\Facades\DB::table('products')
            ->join('categories','products.category_id','categories.id')
            ->join('subcategories','products.subcategory_id','subcategories.id')
            ->join('brands','products.brand_id','brands.id')
            ->select('products.*','categories.category_name','subcategories.subcategory_name','brands.brand_name')
            ->where('products.id',$id)
            ->first();

        $color = $product->product_color;
        $product_color = explode(',', $color);

        $size = $product->product_size;
        $product_size = explode(',', $size);

        return response::json(array(
            'product' => $product,
            'color' => $product_color,
            'size' => $product_size,
        ));


    }



    public function insertCart(Request $request){
        $id = $request->product_id;
        $product = \Illuminate\Support\Facades\DB::table('products')->where('id',$id)->first();
        $color = $request->color;
        $size = $request->size;
        $qty = $request->qty;

        $data = array();

        if ($product->discount_price == NULL) {
            $data['id'] = $product->id;
            $data['name'] = $product->product_name;
            $data['qty'] = $request->qty;
            $data['price'] = $product->selling_price;
            $data['weight'] = 1;
            $data['options']['image'] = $product->image_one;
            $data['options']['color'] = $request->color;
            $data['options']['size'] = $request->size;
            Cart::add($data);
            $notification=array(
                'messege'=>'Produto Adicionado com Sucesso',
                'alert-type'=>'success'
            );
            return Redirect()->back()->with($notification);
        }else{

            $data['id'] = $product->id;
            $data['name'] = $product->product_name;
            $data['qty'] = $request->qty;
            $data['price'] = $product->discount_price;
            $data['weight'] = 1;
            $data['options']['image'] = $product->image_one;
            $data['options']['color'] = $request->color;
            $data['options']['size'] = $request->size;
            Cart::add($data);
            $notification=array(
                'messege'=>'Produto Adicionado com Sucesso',
                'alert-type'=>'success'
            );
            return Redirect()->back()->with($notification);

        }

    }



    public function Checkout(){
        if (\Illuminate\Support\Facades\Auth::check()) {

            $cart = Cart::content();
            return view('pages.checkout',compact('cart'));

        }else{
            $notification=array(
                'messege'=>'Faça o Login primeiro em sua conta!',
                'alert-type'=>'success'
            );
            return Redirect()->route('login')->with($notification);
        }

    }


    public function wishlist(){
        $userid = Auth::id();
        $product = DB::table('wishlists')
            ->join('products','wishlists.product_id','products.id')
            ->select('products.*','wishlists.user_id')
            ->where('wishlists.user_id',$userid)
            ->get();
        // return response()->json($product);
        return view('pages.wishlist',compact('product'));

    }


    public function Coupon(Request $request){
        $coupon = $request->coupon;

        $check = DB::table('coupons')->where('coupon',$coupon)->first();
        if ($check) {
            Session::put('coupon',[
                'name' => $check->coupon,
                'discount' => $check->discount,
                'balance' => Cart::Subtotal()-$check->discount
            ]);
            $notification=array(
                'messege'=>'Cupom Aplicado com Sucesso!',
                'alert-type'=>'success'
            );
            return Redirect()->back()->with($notification);


        }else{
            $notification=array(
                'messege'=>'Cupom Inválido',
                'alert-type'=>'success'
            );
            return Redirect()->back()->with($notification);
        }

    }


    public function CouponRemove(){
        \Illuminate\Support\Facades\Session::forget('coupon');
        $notification=array(
            'messege'=>'Cupom removido com Sucesso!',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);

    }



    public function PaymentPage(){

        $cart = Cart::Content();
        return view('pages.payment',compact('cart'));

    }


    public function Search(Request $request){

        $item = $request->search;
        // echo "$item";

        $products = DB::table('products')
            ->where('product_name','LIKE',"%$item%")
            ->paginate(20);

        return view('pages.search',compact('products'));


    }




}
