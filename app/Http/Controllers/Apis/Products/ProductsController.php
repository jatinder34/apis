<?php

namespace App\Http\Controllers\Apis\Products;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;

class ProductsController extends Controller
{
    public function getAllProducts(Request $request)
    {
        $products = Product::get()->toArray();
        if($products){
            $message = array('success'=> true, 'message' => 'Product fetch successfully.', 'data'=>$products);
            return json_encode($message);
        }else{
            $message = array('success'=> true, 'message' => 'Products not found!', 'data'=>null);
            return json_encode($message);
        }
    }
}
