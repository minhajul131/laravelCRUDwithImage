<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use File;

class PageController extends Controller
{
    public function first(){
        $product = Product::all();
        return view('first',compact('product'));
    }

    public function addProducts(){
        return view('addProducts');
    }
    
    public function storeProducts(Request $request){

            $request->validate([
                'name'=>'required',
                'image'=>'required'
            ]);

            $imageName = "";
            if($image = $request -> file('image')){
                $imageName = time().'-'.uniqid().'.'.$image->getClientOriginalExtension();
                $image->move('images',$imageName);
            }


            Product::create([
                'name'=>$request->name,
                'image'=>$imageName,
            ]);
            return redirect('/');
    }

    public function editProducts($id){
        $product = Product::find($id);
        return view('editProducts',compact('product'));
    }

    public function updateProducts(Request $request, $id){
        $product = Product::find($id);
        $request->validate([
            'name'=>'required',
        ]);

        $imageName = "";
        $deleteOldImage = 'images/'.$product->image;
        if($image = $request -> file('image')){
            if(file_exists($deleteOldImage)){
                File::delete($deleteOldImage);
            }
            $imageName = time().'-'.uniqid().'.'.$image->getClientOriginalExtension();
            $image->move('images',$imageName);
        }else{
            $imageName = $product->image;
        }


        Product::where('id',$id)->update([
            'name'=>$request->name,
            'image'=>$imageName,
        ]);
        return redirect('/');
    }

    public function deleteProducts(Request $request, $id){
        $product = Product::find($id);
        $deleteOldImage = 'images/'.$product->image;
        if(file_exists($deleteOldImage)){
            File::delete($deleteOldImage);
        }
        $product->delete();
        return redirect('/');
    }
}