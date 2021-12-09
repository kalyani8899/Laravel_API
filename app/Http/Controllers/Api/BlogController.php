<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
class BlogController extends Controller
{
    public function getTable()
    {
        $data =Product::paginate(5);
        
          return $data;  
    }
    public function storeBlog(Request $request)
    {
          $store = new Product();
          $store->name = $request->name;
          $store->city = $request->city;
          $store->save();
          return response()->json(['data' => $store, 'success' => 1, 'message' => 'Blog inserted successfully'], 200);
         
          
    }
    public function updateBlog(Request $request)
    {
          $store = Product::where('id',$request->id)->first();
          $store->name = $request->name;
          $store->city = $request->city;
          $store->update();
          return response()->json(['data' => $store, 'success' => 1, 'message' => 'Blog updated successfully'], 200);     
    }
    public function deleteBlog(Request $request)
    {
      //     $store = Product::find($id);
          $store = Product::where('id',$request->id)->first();
          $store->name = $request->name;
          $store->city = $request->city;
          $store->delete();
          return response()->json(['data' => $store, 'success' => 1, 'message' => 'Blog deleted successfully'], 200);     
    }
}
