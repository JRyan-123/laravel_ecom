<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function cancel_order(Request $request, $id)
    {
        $user = auth()->user();

        $order = $user->orders()->findOrFail($id);

        $order->status = 'Cancelled';

        $order->save();

        return back()->with('success', 'Cancelled order!');
    }
}
