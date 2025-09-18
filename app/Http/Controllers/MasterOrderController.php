<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use DB;

class MasterOrderController extends Controller
{
    public function add_order(Request $request)
    {   
        

        $validate_address = $request->validate([
            'recipient' => 'required|string|max:50',
            'line2'      => 'required|string|max:100',
            'line1'      => 'required|string|max:100',
            'city'        => 'required|string|max:50',
            'district'    => 'required|string|max:50',
            'phone'       => 'nullable|string|max:20', 
        ]);
        $validate_payment = $request->validate([
            'method'     => 'required|string',
        ]);

        $user = auth()->user();
        
        $cart = $user->carts()->with('product')->get();
        if ($cart->isEmpty()) {
            return back()->with('error', 'Your cart is empty.');
        }

        DB::transaction(function() use ($cart ,$user, $validate_address, $validate_payment) {
            $order = $user->orders()->create([
                'total' => $cart->sum( fn ($item) => $item->price * $item->quantity),
                'status' => 'pending',
                'shipping' => session('selected_shipping'),
            ]);

            $order->items()->createMany(
                $cart->map(fn($item) => [
                    'order_id' => $order->id,
                    'vendor_id' => $item->product->vendor_id,
                    'product_id' => $item->product_id,
                    'quantity' => $item->quantity,
                    'price' => $item->price,
                ])->toArray()
            );


            foreach ($cart as $item) {
                $item->product()->decrement('stock_quantity', $item->quantity);
            }

            
            $order->address()->create($validate_address);
            
            $order->payment()->create($validate_payment);
            $user->carts()->delete();
        });
        

        return redirect()->route('customer.account')->with('success', 'Order placed successfully!');
    }
    //end method


    

    
}
