<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

/**
 * Class ProductController
 * @package App\Http\Controllers
 */
class ProductController extends Controller
{
    /**
     * ProductController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @param array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $uniqueRule =  array_key_exists('id', $data) ? 'unique:products,name,' . $data['id'] . ',id' : 'unique:products,name';

        return Validator::make($data, [
            'name' => ['required', 'string', 'max:32', $uniqueRule],
            'price' => ['required', 'regex:/^\d+(\.\d{1,2})?$/'],
            'stock' => ['required', 'numeric', 'min:1']
        ]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('product_create');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $data = $this->validator([
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'stock' => $request->input('stock'),
        ])->validate();
        Product::create($data);

        return redirect()->back()->with('success', 'Product was saved successfully')->withErrors('');
    }

    /**
     * @param Product $product
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Product $product)
    {
        return view('product_update_delete', ['product' => $product]);
    }

    /**
     * @param Request $request
     * @param Product $product
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Product $product)
    {
        $data = $this->validator([
            'id' => $product->id,
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'stock' => $request->input('stock'),
        ])->validate();

        $product->update($data);

        return back()->with('success', 'Product was updated successfully')->withErrors('');
    }

    /**
     * @param Product $product
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function delete(Product $product)
    {
        $product->delete();

        return redirect('home')->with('success', 'Product was deleted successfully');
    }
}
