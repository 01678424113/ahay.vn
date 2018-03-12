@extends('admin.layout')
@section('style')
    {{Html::style('assets/global/plugins/select2/css/select2.min.css')}}
    {{Html::style('assets/global/plugins/select2/css/select2-bootstrap.min.css')}}
    {{Html::style('assets/global/plugins/icheck/skins/all.css')}}
@endsection
@section('pagecontent')

    <div class="page-bar m-b-20">
        <ul class="page-breadcrumb">
            <li>
                <a href="{{URL::action('Admin\HomeController@index')}}">Bảng điều khiển</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <a href="{{URL::action('Admin\OrderController@listOrder')}}">Đơn hàng</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <span>{!! $title !!}</span>
            </li>
        </ul>
        <div class="page-toolbar">
            <a href="{{URL::previous()}}" class="btn default btn-sm uppercase"><i class="fa fa-arrow-left m-r-5"></i>Quay
                lại</a>
        </div>
    </div>
    <div class="portlet light">
        <div class="portlet-title">
            <div class="caption">
                <span class="caption-subject uppercase">{{$title}}</span>
            </div>
        </div>
        <div class="portlet-body">
            @if(count($order_details) > 0)
                <div class="table-responsive">
                    <table class="table table-bordered table-hover td-middle">
                        <thead>
                        <tr>
                            <th>Tên sản phẩm</th>
                            <th>Chữ cái</th>
                            <th>Đơn giá</th>
                            <th>Số lượng</th>
                            <th>Tổng tiền</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($order_details as $order_detail)
                            <tr>
                                <td>{{$order_detail->product_name}}</td>
                                <td>{{$order_detail->comic_keywords}}</td>
                                <td>{{$order_detail->unit_price}}</td>
                                <td>{{$order_detail->quantity}}</td>
                                <td>{{$order_detail->amount}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="text-right">
                </div>
            @else
                <h4 class="text-center">Không có dữ liệu</h4>
            @endif
        </div>
    </div>
@endsection
@section('script')
    {{ Html::script('assets/global/plugins/icheck/icheck.min.js') }}
    {{ Html::script('assets/global/plugins/select2/js/select2.full.min.js') }}
    {{ Html::script('assets/global/plugins/jquery-validation/js/jquery.validate.min.js') }}
@endsection