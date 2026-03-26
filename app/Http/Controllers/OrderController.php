<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    function store(Request $request){
        $order = new Order();
        $order->user_id = 1;
        $order->metodo_pago = 'tarjeta';
        $order->save();

  if ($request->has('product_id') && is_array($request->product_id)) {
    foreach ($request->product_id as $index => $productId) {
        DB::table('order_product')->insert([
            'order_id' => $order->id,
            'product_id' => $productId,
            'price' => $request->price[$index],
            'cantidad' => $request->cantidad[$index],
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}

    return "Orden creada ";
    }
}
