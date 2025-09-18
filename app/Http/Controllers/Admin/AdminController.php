<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;

use Carbon\Carbon;

class AdminController extends Controller
{
    // Dashboard
    public function index()
    {   
        
        // total sales
        $sales = Order::sum('total');

        // active orders
        $countOrders = Order::where('status','!=','Completed')->count();

        // completed orders
        $completed = Order::where('status','=','Completed')->count();

        $now = Carbon::now(); 
        // current month sales
        $monthlySales = Order::selectRaw('SUM(total) as total')
            ->whereMonth('orders.created_at', $now->month)
            ->whereYear('orders.created_at', $now->year)
            ->value('total');
           
        // get all sales per month
        $salesData = Order::selectRaw('MONTH(created_at) as month, SUM(total) as total_sales')
            ->groupBy('month')
            ->pluck('total_sales', 'month'); 

        $months = [];
        $totals = [];

        // sales and month to array
        foreach (range(1, 12) as $m) {
            $months[] = date('F', mktime(0, 0, 0, $m, 1));
            $totals[] = $salesData[$m] ?? 0;
        }
        return view('admin.dashboard', compact('sales','countOrders','completed','monthlySales','months', 'totals'));
    }
    // End method


    public function settings()
    {
        
        return view('admin.settings');
    }
    // end method


    public function manage_user()
    {
        return view('admin.manage.users');
    }
    // end mehtod


    public function manage_store()
    {
        return view('admin.manage.stores');
    }
    // end method


    public function order_active()
    {   
        $activeOrders = Order::with(['customer',  'items.product'])->whereIn('status', ['Pending', 'In Transit'])->paginate(10);
        return view('admin.order.active', compact('activeOrders'));
    }
    // End method


    public function order_history()
    {   
        $orders = Order::with(['customer', 'items.product'])->where('status','=','Completed')->paginate(10);
        return view('admin.order.history', compact('orders'));
    }
    // End mrtyhod


    public function order_update(Request $request, $id)
    {
        $order = Order::findOrFail($id);

        $order->status = 'Completed';

        $order->save();
        
        return back()->with('success', 'Order Completed!');
    }
    // end methid

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
    // End mrtyhod

       
}
