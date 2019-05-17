<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OrderProductsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * @param array $data
     * @return mixed
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'client_name' => ['required', 'string', 'max:32'],
            'client_address' => ['required', 'string', 'max:300'],
            'quantity' => ['required', 'integer', 'min:1']
        ]);
    }

    public function create(Product $product)
    {
        return view('order', ['product' => $product->id,]);
    }

    public function store(Request $request, Product $product)
    {
        $data = $this->validator([
            'client_name' => $request->input('client_name'),
            'client_address' => $request->input('client_address'),
            'quantity' => $request->input('quantity'),
        ])->validate();
        $stock = $product->stock - $data['quantity'];
        $msg =  $stock >= 0 ?
            'Your order was sent with success' :
            'It appears that our stock is limited to ' . $product->stock . ' of Product: ' . $product->name;
        if ($stock < 0) {
            return redirect()->back()->with('error', $msg);
        }

        $product->setStock($data['quantity']);
        $product->orders()->attach(
            Order::create([
                'client_name' => $data['client_name'],
                'client_address' => $data['client_address'],
                'issued_by' => \Auth::id(),
                'arrival_date' => today()->addDays(10),
            ]),
            [
                'articles' => $data['quantity'],
            ]);
        $product->save();

        return redirect()->back()->with('success',$msg)->withErrors('');
    }
}
