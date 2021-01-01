<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Model\Admin\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function category()
    {
        $category = Category::all();
        return view('admin.category.category',compact('category'));
    }

    public function storecategory(Request $request)
    {
        $validadeData = $request->validate([
           'category_name' => 'required|unique:categories|max:255',
        ]);

        //$data = array();
        //$data['category_name'] = $request->category_name;
        //DB::table('categories')->insert($data);

        $category = new Category();
        $category->category_name =$request->category_name;
        $category->save();
        $notification=array(
            'messege'=>'Categoria Adicionada com sucesso',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function Detelecategory($id)
    {
        DB::table('categories')->where('id', $id)->delete();
        $notification=array(
            'messege'=>'Categoria Excluída com sucesso',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function Editcategory($id){
        $category = DB::table('categories')->where('id',$id)->first();
        return view('admin.category.edit_category',compact('category'));
    }

    public function Updatecategory(Request $request, $id){
        $validateData = $request->validate([
            'category_name' => 'required|max:255',
        ]);

        $data=array();
        $data['category_name']=$request->category_name;
        $update=DB::table('categories')->where('id',$id)->update($data);
        if ($update) {
            $notification=array(
                'messege'=>'Categoria Alterada com sucesso!',
                'alert-type'=>'success'
            );
            return Redirect()->route('categories')->with($notification);
        }else{
            $notification=array(
                'messege'=>'Não houve alteração!',
                'alert-type'=>'error'
            );
            return Redirect()->route('categories')->with($notification);
        }


    }
}
