<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::all();
        if (Auth::user()->role != 'Retailer') {
            $order = Order::all();
        } else {
            $order = Order::where('retailer_id', Auth::user()->id)->get();
        }

        return view('pages.order.index', [
            'order' => $order,
            'product' => $product
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Order::create([
            'retailer_id' => $request->retailer_id,
            'product_id' => $request->product,
            'location' => $request->location,
            'quantity' => $request->quantity,
            'salesdata' => $request->salesdata,
            'order_date' => now(),
            'status_order' => 'Pending',
            'is_ordered' => 0
        ]);

        return redirect('order')->with('pesan_create', 'Order berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    }

    public function approved($id)
    {
        $order = Order::where('id', $id)->first();
        $product = Product::where('id', $order->product_id)->first();
        Order::where('id', $id)->update([
            'is_ordered' => 1
        ]);
        Product::where('id', $order->product_id)->update([
            'stock' => $product->stock - $order->quantity
        ]);
        return redirect('order')->with('pesan_edit', 'Ordered');
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function beUpdate()
    {
        $order = Order::where('retailer_id', Auth::user()->id)->get();
        $kuadrat_order = 0;
        $kuadrat_sales = 0;
        foreach ($order as $item) {
            if ($item->status_order == 'Pending') {
                $total_order = $order->sum('quantity');
                $total_sales = $order->sum('salesdata');
                $total_product = $order->count('product_id');
                $rata_order = $total_order / $total_product;
                $rata_sales = $total_sales / $total_product;
                $pengurangan_order = $item->quantity - $rata_order;
                $kuadrat_order += pow($pengurangan_order, 2);
                $pengurangan_sales = $item->salesdata - $rata_sales;
                $kuadrat_sales += pow($pengurangan_sales, 2);
                $deviation_order = sqrt($kuadrat_order / ($total_product - 1));
                $deviation_sales = sqrt($kuadrat_sales / ($total_product - 1));
                $cv_order = $deviation_order / $rata_order;
                $cv_sales = $deviation_sales / $rata_sales;
                $BE = $cv_order / $cv_sales;
                if ($BE < 1.0) {
                    Order::where('status_order', 'Pending')->update([
                        'status_order' => 'Approved'
                    ]);
                    return redirect('order')->with('pesan_edit', 'Order Approved,' . number_format($BE, 2) . ' Bullwhip Effect < 1');
                } else {

                    return redirect('order')->with('pesan_delete', 'Order Pending,' . number_format($BE, 2) . ' Bullwhip Effect >= 1');
                }
            } else {
                return redirect('order')->with('pesan_edit', 'Order Approved');
            }
        }
    }
    public function update(Request $request, $id)
    {
        Order::where('id', $id)->update([
            'quantity' => $request->quantity
        ]);
        return redirect('order')->with('pesan_edit', 'Order Berhasil di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order = Order::where('id', $id);
        $order->delete();

        return redirect('order')->with('pesan_delete', 'Order berhasil dihapus !');
    }
}
