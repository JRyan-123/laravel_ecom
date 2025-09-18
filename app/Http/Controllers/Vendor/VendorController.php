<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\OrderItem;
use App\Models\Order;
use App\Models\User;


use Carbon\Carbon;

class VendorController extends Controller
{
    // dashboard
    public function index()
    {       
        $user = auth()->user();
        


        $sales = OrderItem::where('vendor_id', $user->id) 
            ->whereHas('order', function($query) {
                $query->where('status', 'Completed');
            })->get()
        ->sum(fn($item) => $item->price * $item->quantity);

        $countOrders = OrderItem::where('vendor_id', $user->id) 
            ->whereHas('order', function($query) {
                $query->where('status', '!=', 'Completed');
            })->count();

        $completed = OrderItem::where('vendor_id', $user->id) 
            ->whereHas('order', function($query) {
                $query->where('status', 'Completed');
            })->count();


        $now = Carbon::now(); 

        $activeOrders = OrderItem::where('vendor_id', $user->id)
            ->whereHas('order', function($query) use ($now) {
                $query->where('status', 'Completed')
                      ->whereYear('created_at', $now->year)   
                      ->whereMonth('created_at', $now->month); 
            })
            ->get()
            ->sum(fn($item) => $item->price * $item->quantity);
           
        
        $salesData = OrderItem::where('vendor_id', $user->id)
        ->whereHas('order', function($query) {
            $query->where('status', 'Completed');
        })
        ->selectRaw('MONTH(created_at) as month, SUM(price * quantity) as total_sales')
        ->groupBy('month')
        ->pluck('total_sales', 'month');

        $months = [];
        $totals = [];

        foreach (range(1, 12) as $m) {
            $months[] = date('F', mktime(0, 0, 0, $m, 1));
            $totals[] = $salesData[$m] ?? 0;
        }

        return view('vendor.dashboard', compact('sales','countOrders','completed','activeOrders','months', 'totals'));
    }
    // end methid


    public function order_history()
    {
        $user = auth()->user();
        $orders = OrderItem::where('vendor_id', $user->id)->with('order.customer')->paginate(10); 
        $orders->map(function ($order) {
            $order->tax = $order->total * .12;
            $order->subtotal = $order->price * $order->quantity;
        }); 
        return view('vendor.order.history', compact('orders'));
    }
    // end methid


    public function order_update(Request $request, $id)
    {
        $order = Order::findOrFail($id);

        $order->status = 'In Transit';

        $order->save();
        
        return back()->with('success', 'Order now In Transit');
    }
    // end methid

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
    // end mrthod
}
