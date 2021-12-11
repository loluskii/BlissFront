<?php

namespace App\Services\Filters;

use DB;
use Exception;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;


class FilterQueries{

    public function filter()
    {
        return Product::where('category_id', request()->category)->get();
                        // ->orWhere('description', 'LIKE', '%' . request()->search . '%');
    }


}

?>



