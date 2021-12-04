<?php
namespace App\Actions\Products;

use Exception;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class StoreProduct
{
    public static function run($request){
        if($request->file()) {
            DB::beginTransaction();
                $product = new Product;
                $product->product_ref = mt_rand(1000,9999);
                $product->name = $request->product_name;
                $product->description = $request->desc;
                $product->price = $request->price;
                $product->category_id = $request->category;
                $fileName = Str::slug($request['product_name']).'-'.time().'.'.$request->file('featured_image')->extension();
                $filePath = $request->file('featured_image')->move(public_path('images/products'), $fileName);
                $product->cover_img = $fileName;
                $product->cover_img = $fileName;
                $product->save();
            DB::commit();

            return true;
        }else{
            return false;
        }
    }

}
?>
