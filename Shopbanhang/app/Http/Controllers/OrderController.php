<?php

namespace App\Http\Controllers;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Http\RedirectResponse;
use App\Models\Transaction;
class OrderController extends Controller
{
    public function index(): View
    {
        $orders = Order::latest()->paginate(6);

        return view('orders.index', compact('orders'));
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
public function checkout(Request $request)
{
    $request->validate([
        'customer_name' => 'required|string|max:255',
        'customer_phone' => 'required|string|max:20',
        'customer_address' => 'required|string',
    ]);

    $orders = Order::all(); // Lấy tất cả sản phẩm trong giỏ hàng
    $totalPrice = $orders->sum(fn($order) => $order->price * $order->quantity);

    foreach ($orders as $order) {
        Transaction::create([
            'order_id' => $order->id,
            'customer_name' => $request->customer_name,
            'customer_phone' => $request->customer_phone,
            'customer_address' => $request->customer_address,
            'total_price' => $totalPrice,
            'payment_time' => now(),
        ]);
    }

    // Xóa giỏ hàng sau khi thanh toán
    Order::where('user_id', auth()->id())->delete(); // ✅ Xóa chỉ các đơn hàng của user hiện tại


    return redirect()->route('orders.index')->with('success', 'Thanh toán thành công!');
}

// public function listOrder()
//     {
//         $orders = Order::paginate(5);
//         return view('categories.order', compact('orders'));
//     }


public function listOrder()
{
    $orders = Transaction::with('order.product')->paginate(5);
    return view('categories.order', compact('orders'));
}
public function deleteTransaction($id)
{
    $transaction = Transaction::find($id);

    if (!$transaction) {
        return redirect()->route('orders.list')->with('error', 'Giao dịch không tồn tại!');
    }

    $transaction->delete();
    return redirect()->route('orders.list')->with('success', 'Xóa giao dịch thành công!');
}


}
