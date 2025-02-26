<?php

namespace App\Http\Controllers;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Http\RedirectResponse;

class OrderController extends Controller
{
    public function index(): View
    {
        $orders = Order::latest()->paginate(6);

        return view('orders.index', compact('orders'));
    }
    public function listOrder()
    {
        $orders = Order::paginate(5);
        return view('categories.order', compact('orders'));
    }

    public function update(Request $request, Order $order)
{
    $request->validate([
        'quantity' => 'required|integer|min:1',
    ]);

    $order->quantity = $request->quantity;
    $order->save();

    return back()->with('success', 'Cập nhật số lượng thành công.');
}


    public function destroy($id): RedirectResponse
{
    $order = Order::findOrFail($id);
    $order->delete();

    return redirect()->route('orders.index')->with('success', 'Order removed successfully!');
}



}
