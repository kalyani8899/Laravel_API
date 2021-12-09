<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
class ProductController extends Controller
{
    public function getform()
    {
        return view('form');
    }
    public function submitForm(Request $request)
    {
          $store = new Product();
          $store->name = $request->name;
          $store->city = $request->city;
          $store->save();
          return redirect()->route('product.table');
          
    }
    public function getTable()
    {
        $data =Product::paginate(5);
        // dd($data);
          return view('table',compact('data'));
    }
    public function editForm($id)
    {
          $data = Product::find($id);
          return view('edit',compact('data'));
    }
    public function updateForm(Request $request,$id)
    {
        $store = Product::find($id);
        $store->name = $request->name;
        $store->city = $request->city;
        $store->update();
        return redirect()->route('product.table');
                         
    }
    public function deleteForm(Request $request,$id)
    {
        $store = Product::find($id);
        $store->name = $request->name;
        $store->city = $request->city;
        $store->delete();
        return redirect()->route('product.table');
    }
}
