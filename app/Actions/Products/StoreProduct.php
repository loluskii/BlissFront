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
                $path = cloudinary()->upload($request->file('featured_image')->getRealPath())->getSecurePath();

                $product = new Product;
                $product->product_ref = mt_rand(1000,9999);
                $product->name = $request->product_name;
                $product->description = $request->desc;
                $product->price = $request->price;
                $product->category_id = $request->category;
                $product->cover_img = $path;
                $product->save();
            DB::commit();

            return true;
        }else{
            return false;
        }
    }

}
?>
