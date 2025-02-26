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

public function store(Request $request)
{
    $request->validate([
        'customer_name' => 'required|string|max:255',
        'customer_phone' => 'required|string|max:15',
        'customer_address' => 'required|string|max:500',
    ]);

    $cartItems = session()->get('cart', []);

    dd($cartItems, $request->all()); // Kiểm tra dữ liệu trước khi lưu

    foreach ($cartItems as $item) {
        Order::create([
            'product_id' => $item['id'],
            'name' => $item['name'],
            'price' => $item['price'],
            'img' => $item['img'],
            'quantity' => $item['quantity'],
            'order_time' => now(),
            'customer_name' => $request->customer_name,
            'customer_phone' => $request->customer_phone,
            'customer_address' => $request->customer_address,
        ]);
    }

    session()->forget('cart');

    return redirect()->route('orders.index')->with('success', 'Đặt hàng thành công!');
}


    public function destroy($id): RedirectResponse
{
    $order = Order::findOrFail($id);
    $order->delete();

    return redirect()->route('orders.index')->with('success', 'Order removed successfully!');
}



}
