<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class productController extends Controller
{
    public function listProduct(){
        return Product::all();
    }
    public function listProductByid($id){
        return Product::find($id);
    }
    public function insert(Request $request){


       $validator = Validator::make($request->all(), [
           'name' => 'required|string',
           'price' => 'required|integer',
           'qnt' => 'required|integer',
           'description' => 'required|string',
           'image' => 'required|url',
        ]);

       if ($validator->fails()) {
          return response()->json([
              'status' => 422,
              'errors' => $validator->errors(),
          ], 422);
       }
        else{
           $product = Product::insert([
              'name' => $request->name,
              'price' => $request->price,
              'description' => $request->description,
              'image' => $request->image,
              'qnt' => $request->qnt,
              'created_at' => Carbon::now()
            ]);
            if($product){
                  return response()->json([
                'status' =>200,
                'message' =>"Created Product successfully",
              ], 200);
            }else{
                return response()->json([
                        'status' => 'problem',
                         'error' =>"Anithing Wrong!",
                  ]);
            }

        }
    }




    public function delete($id){
       Product::findorFail($id)->delete();
        return response()->json([
                'status' =>200,
                'message' =>"Deleted successfully",
              ], 200);
    }





    public function update(Request $request, $id){
         $price = intval($request->price);
         $qnt = intval($request->qnt);
         $validator = Validator::make($request->all(), [
           'name' => 'required|string',
           'price' => 'required',
           'qnt' => 'required',
           'description' => 'required|string',
           'image' => 'required|url',
        ]);

       if ($validator->fails()) {
          return response()->json([
              'status' => 422,
              'errors' => $validator->errors(),
          ], 422);
       }
        else{
           $product = Product::find($id)->update([
              'name' => $request->name,
              'price' => $price,
              'description' => $request->description,
              'image' => $request->image,
              'qnt' => $qnt,
              'Updated_at' => Carbon::now()
            ]);
            if($product){
                  return response()->json([
                'status' =>200,
                'message' =>"Updated Product successfully",
              ], 200);
            }else{
                return response()->json([
                        'status' => 'problem',
                         'error' =>"Anithing Wrong!",
                  ]);
            }

        }
    }
}
