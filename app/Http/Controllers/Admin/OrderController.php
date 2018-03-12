<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use App\Models\OrderComicDetail;
use App\Models\OrderDetail;
use Exception;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    //
    public function listOrder(Request $request)
    {
        $response = [
            'title' => "Đơn hàng"
        ];
        $order_query = Order::select([
            'order_id',
            'order_email',
            'order_name',
            'order_phone',
            'order_destination',
            'order_total_price',
            'order_status',
            'order_created_at'
        ]);
        if(!empty($request->order_name)){
            $order_query = $order_query->where('order_name','LIKE','%'.$request->order_name.'%');
        }
        if(!empty($request->order_id)){
            $order_query = $order_query->where('order_id',$request->order_id);
        }
        if(!empty($request->order_phone)){
            $order_query = $order_query->where('order_phone','LIKE','%'.$request->order_phone.'%');
        }
        if(!empty($request->status)){
            $order_query = $order_query->where('order_status',$request->status);
        }
        $orders = $order_query->get();
        $response['orders'] = $orders;

        $order_details_query = OrderDetail::select([
            'order_details.product_name',
            'order_details.unit_price',
            'order_details.unit_price_sale',
            'order_details.quantity',
            'order_details.amount',
            'orders.order_id',
            'orders.order_name'
        ])->join('orders', 'orders.order_id', '=', 'order_details.order_id');
        $order_details = $order_details_query->get();

        $order_comic_details_query = OrderComicDetail::select([
            'order_comic_details.comic_name',
            'order_comic_details.comic_user',
            'order_comic_details.comic_message',
            'order_comic_details.product_price',
            'order_comic_details.product_sale_percent',
            'order_comic_details.product_sku',
            'order_comic_details.comic_id_story_present',
            'order_comic_details.comic_name_story_present',
            'orders.order_id',
            'orders.order_name'
        ])->join('orders', 'orders.order_id', '=', 'order_comic_details.order_id');
        $order_comic_details = $order_comic_details_query->get();
        if (count($order_details) > 0) {
            $response['order_details'] = $order_details;
        }else{
            $response['order_details'] = "";
        }
        if(count($order_comic_details) > 0){
            $response['order_comic_details'] = $order_comic_details;
        }else{
            $response['order_comic_details'] = "";
        }
        return view('admin.order.listOrder', $response);
    }

    public function editOrder($order_id)
    {
        $response = [
            'title' => 'Sửa đơn hàng'
        ];
        $order = Order::where('order_id', $order_id)->first();
        $response['order'] = $order;
        return view('admin.order.editOrder', $response);
    }


    public function doEditOrder(Request $request, $order_id)
    {
        $order = Order::where('order_id', $order_id)->first();
        $order->order_email = $request->input('txt-email');
        $order->order_name = $request->input('txt-name');
        $order->order_destination = $request->input('txt-destination');
        $order->order_phone = $request->input('txt-phone');
        $order->order_status = $request->input('rd-status');
        try {
            $order->save();
            return redirect()->back()->with('success', 'Sửa đơn hàng thành công');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Lỗi cơ sở dữ liệu');
        }
    }

    public function doDeleteOrder(Request $request)
    {
        $order_id = $request->input('txt-id');
        $order = Order::where('order_id', $order_id)->first();
        $order_details = OrderDetail::where('order_id', $order_id)->get();
        foreach ($order_details as $order_detail) {
            $order_detail->delete();
        }
        $order->delete();
        return redirect()->back()->with('success', 'Xóa đơn hàng thành công');
    }

}
