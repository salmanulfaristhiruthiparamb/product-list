<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Database\Eloquent\Builder;

class ProductController extends Controller
{
    /**
     * Product Controller
     * List all products with filters
     */

    /**
     * @author Salman
     * Show list page of products
     * @param null
     * @return view
     */
    public function index()
    {
        return view('product.index');
    }

    /**
     * @author Salman
     * get list of products with specific rule set
     * @param null
     * @return response of html
     */
    public function withRule(Request $request)
    {
        $inputs = $request->all();

        $products = Product::where(function(Builder $query) use ($inputs){
            if($inputs['price_min'] != "")
            {
                $query->where('price','>=', $inputs['price_min']);
            }

            if($inputs['price_max'] != "")
            {
                $query->where('price','<=', $inputs['price_max']);
            }

            if($inputs['upload_speed_min'] != "")
            {
                $query->where('upload_speed','>=', $inputs['upload_speed_min']);
            }

            if($inputs['upload_speed_max'] != "")
            {
                $query->where('upload_speed','<=', $inputs['upload_speed_max']);
            }

            if($inputs['download_speed_min'] != "")
            {
                $query->where('download_speed','>=', $inputs['download_speed_min']);
            }

            if($inputs['download_speed_max'] != "")
            {
                $query->where('download_speed','<=', $inputs['download_speed_max']);
            }

            if($inputs['static_ip'] != "2")
            {
                $query->where('static_ip', $inputs['static_ip']);
            }

            if($inputs['technology'] != "0")
            {
                $query->where('technology', $inputs['technology']);
            }
        });

        $products = $products->get();

        $contents = view('product.product', compact('products'))->render();
        return response($contents)
            ->header('Content-Type', 'text/plain');
    }

    /**
     * @author Salman
     * create new rule set
     * @param request with param length
     * @return html of filter
     */
    public function createFilter(Request $request)
    {
        $count = $request->length;
        $content = view('product.filter', compact('count'))->render();
        return response($content)->header('Content-Type', 'text/plain');
    }
}
