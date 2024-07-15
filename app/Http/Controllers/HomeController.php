<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
class HomeController extends Controller
{
    public  function index() {
        $data= Product::all();

        return view('Home' , compact('data'));
    }
    public function create(Request $request)
    {

        $request -> validate([
            'title' => 'required',
            'image' => 'required|image|mimes:jpg,jpeg,png,gif,svg|max:5120'
        ]);

        $product = new Product;

        $product->title = $request->title;
        $product->description = $request->description;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('product'), $image_name);
            $product->image = $image_name;
        }

        $product->save();

        return redirect()->back()->with('success', 'Product created successfully.');
    }
    public function getData(Request $request)
    {
        $data = Product::all();
        // return view('products.index', ['products' => $data]);
    }
    public function edit($id){

        $product = Product::find($id);

        return  view('update_product' , compact('product'));
    }
    public function update(Request $request ,$id){
        $product = Product::find($id);

        if($product){
            $product->title = $request->title;
            $product->description = $request->description;
            if($request->hasFile('image')){
                $image = $request->file('image');
                $image_name = time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('product'), $image_name);
                $product->image = $image_name;
            }
            $product->save();
            return redirect('/');
        }else {
            return redirect()->back()->with('Message', 'Product Not Found .');
        }
    }
    public function delete($id){
        $data = Product::find($id);
        if($data){
            $data -> delete();
            return redirect()->back()->with('Message', 'Product Delete Success .');
        }else {
            return redirect()->back()->with('Message', 'Product Not Found.');
        }
    }

}
