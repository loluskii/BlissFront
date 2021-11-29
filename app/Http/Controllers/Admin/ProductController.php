<?php

namespace App\Http\Controllers\Admin;

use Exception;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Actions\Products\StoreProduct;

class ProductController extends Controller
{
    public function index(){
        $products = Product::all();
        $categories = Category::all();
        return view('admin.products.index')->with('products',$products)->with('categories',$categories);

    }

    public function create(){
        return view('admin.products.create');
    }

    public function store(Request $request){
        // dd($request);
        try{
            // $request->validated();
            $store = (new StoreProduct())->run($request);
            if($store){
                return back()->with(
                    'success',
                    'Product added successfully'
                );
            }else{
                return back()->with('error','Please add an image!');
            }
        }catch(\Exception $e){
            return back()->with(
                'error',
                $e->getMessage()
            );
        }
    }

    public function makeCategory(){
        $categories = Category::all();
        return view('admin.category.index')->with('categories',$categories);
    }

    public function addCategory(Request $request){
        try{
            $category = new Category;
            $category->name = $request->name;
            $category->slug = Str::random(8);
            $category->description = $request->desc;
            $category->save();

            return back()->with('success', 'Category added successfully');
        }catch(\Exception $e){
            return back()->with('error', $e->getMessage());
        }
    }

    public function deleteCategory(Category $id){
        $id->delete();
        return back()->with('success','Deleted successfully');
    }
}
