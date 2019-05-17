<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Role;

/**
 * Class HomeController
 * @package App\Http\Controllers
 */
class HomeController extends Controller
{

    /**
     * HomeController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        if (\Auth::user()->role == Role::findOrFail(1))
            $products = Product::where('stock', '>' , '0')->sortable(['name' => 'asc'])->paginate();
        else
            $products = Product::sortable(['name' => 'asc'])->paginate();

        return view('dashboard', [
            'products' => $products,
        ]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function search()
    {
        $query = request('search');
        if (\Auth::user()->role == Role::findOrFail(1))
            $products = Product::where('stock', '>', '0')
                ->where(function ($q) use ($query) {
                    $q->where('name', 'LIKE', '%' . $query . '%')
                        ->orWhere('price', 'LIKE', '%' . $query . '%');
                })


                ->sortable(['name' => 'asc'])->paginate();
        else
            $products = Product::where('name', 'LIKE', '%' . $query . '%')
                ->orWhere('price', 'LIKE', '%' . $query . '%')
                ->sortable(['name' => 'asc'])->paginate();
        return view('search',compact('products', $products));
    }

    /**
     * @param Product $product
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function delete(Product $product)
    {
        $product->delete();

        return back()->with('success', 'Product was deleted successfully')->withErrors('');
    }
}
