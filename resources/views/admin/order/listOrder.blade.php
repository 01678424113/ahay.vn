@extends('admin.layout')
@section('style')
    {{Html::style('assets/global/plugins/select2/css/select2.min.css')}}
    {{Html::style('assets/global/plugins/select2/css/select2-bootstrap.min.css')}}
    {{Html::style('assets/global/plugins/icheck/skins/all.css')}}
    {{Html::style('assets/global/plugins/datatables/datatables.min.css')}}
@endsection
@section('pagecontent')

    <div class="page-bar m-b-20">
        <ul class="page-breadcrumb">
            <li>
                <a href="{{URL::action('Admin\HomeController@index')}}">Bảng điều khiển</a>
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
                <span class="caption-subject uppercase">Danh sách đơn hàng</span>
            </div>
        </div>
        <div class="portlet-body">
            {!! Form::open(['action' => 'Admin\OrderController@listOrder', 'method' => 'GET', 'id' => 'filter-form']) !!}
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <input type="text" name="order_name" class="form-control" placeholder="Tìm theo tên người mua"
                               value="{{ Request::has('order_name') ? Request::input('order_name') : '' }}"/>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <input type="text" name="order_id" class="form-control" placeholder="Tìm theo id đơn  hàng"
                               value="{{ Request::has('order_id') ? Request::input('order_id') : '' }}"/>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <input type="text" name="order_phone" class="form-control" placeholder="Tìm theo số điện thoại"
                               value="{{ Request::has('order_phone') ? Request::input('order_phone') : '' }}"/>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <select name="status" class="form-control">
                            <option value="">Chọn trạng thái</option>
                            <option value="1"
                                    {{ Request::has('status') && Request::input('status') == 1 ? 'selected' : '' }}
                            >
                                Thành công
                            </option>
                            <option value="0"
                                    {{ Request::has('status') && Request::input('status') == 0 ? 'selected' : '' }}
                            >
                                Đang chờ
                            </option>
                            <option value="-1"
                                    {{ Request::has('status') && Request::input('status') == -1 ? 'selected' : '' }}
                            >
                                Bị hủy bỏ
                            </option>
                        </select>
                    </div>
                </div>
                <div class="col-md-1">
                    <div class="form-group">
                        <button type="submit" class="btn uppercase yellow-lemon btn-block"><i class="fa fa-search"></i>
                        </button>
                    </div>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
        <div class="portlet-body">
            @if(count($orders) > 0)
                <div class="table-responsive">
                    <table class="table table-bordered table-hover td-middle">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Email</th>
                            <th>Người mua</th>
                            <th>Số điện thoại</th>
                            <th>Địa chỉ</th>
                            <th>Tổng tiền</th>
                            <th>Ngày tạo</th>
                            <th style="width: 100px;">Trạng thái</th>
                            <th>Chi tiết</th>
                            <th style="width: 70px;">Sửa</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($orders as $order)
                            <tr class="order" data-id="#order-detail-{{$order->order_id}}">
                                <td>{{$order->order_id}}</td>
                                <td>{{$order->order_email}}</td>
                                <td>{{$order->order_name}}</td>
                                <td>{{$order->order_phone}}</td>
                                <td>{{$order->order_destination}}</td>
                                <td>{{$order->order_total_price}}</td>
                                <td>{{date('d/m/Y',$order->order_created_at)}}</td>
                                <td class="font-13">
                                    @if($order->order_status == 1)
                                        <span class="text-success">Thành công</span>
                                    @elseif($order->order_status == 0)
                                        <span class="text-warning">Đang chờ</span>
                                    @elseif($order->order_status == -1)
                                        <span class="text-danger">Bị hủy bỏ</span>
                                    @endif
                                </td>
                                <td>
                                    <button type="button" class="btn btn-info" data-toggle="modal"
                                            data-target="#order-detail-{{$order->order_id}}">
                                        <i class="fa fa-hand-pointer-o" aria-hidden="true"></i>
                                    </button>
                                </td>
                                <td>
                                    <button type="button" data-id="{{ $order->order_id }}"
                                            class="btn btn-xs red-soft m-r-0 btn-delete">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                    <a href="{{URL::action('Admin\OrderController@editOrder',['order_id'=>$order->order_id])}}"
                                       class="btn green btn-xs btn-loaduser">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                </td>
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
            @foreach($orders as $order)
                <div id="order-detail-{{$order->order_id}}" class="modal fade" role="dialog">
                    <div class="modal-dialog" style="width: 75%;">
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Khách hàng: {{$order->order_name}} - Mã đơn hàng: {{$order->order_id}}</h4>
                            </div>
                            <div class="modal-body">
                                <p>
                                <table class="table table-bordered table-hover td-middle">
                                    <thead>
                                    <tr>
                                        <th style="width: 20%">Tên sản phẩm</th>
                                        <th style="width: 40%">Lời nhắn</th>
                                        <th>Danh sách chữ cái</th>
                                        <th>Đơn giá</th>
                                        <th>Giá khuyến mại</th>
                                        <th>Số lượng</th>
                                        <th>Tổng tiền</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(!empty($order_details))
                                        @foreach($order_details as $order_detail)
                                            @if($order->order_id == $order_detail->order_id)
                                                <tr>
                                                    <td>{{$order_detail->product_name}}</td>
                                                    <td>Không có</td>
                                                    <td>Không có</td>
                                                    <td>{{$order_detail->unit_price}}</td>
                                                    <td>{{$order_detail->unit_price_sale}}</td>
                                                    <td>{{$order_detail->quantity}}</td>
                                                    <td>{{$order_detail->amount}}</td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    @endif
                                    @if(!empty($order_comic_details))
                                        @foreach($order_comic_details as $order_comic_detail)
                                            @if($order->order_id == $order_comic_detail->order_id)
                                                <tr>
                                                    <td>{{$order_comic_detail->comic_name . " - " . $order_comic_detail->comic_user}}</td>
                                                    <td>{{$order_comic_detail->comic_message}}</td>
                                                    <td>
                                                        {{$order_comic_detail->comic_user}}<br>
                                                        @foreach(json_decode($order_comic_detail->comic_name_story_present) as $word)
                                                            {{$word}}
                                                        @endforeach
                                                    </td>
                                                    <td>{{$order_comic_detail->product_price}}</td>
                                                    <td>{{$order_comic_detail->product_price - $order_comic_detail->product_price*$order_comic_detail->product_sale_percent/100}}</td>
                                                    <td>1</td>
                                                    <td>{{$order_comic_detail->product_price - $order_comic_detail->product_price*$order_comic_detail->product_sale_percent/100}}</td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    @endif
                                    </tbody>
                                </table>
                                <p style="font-size: 18px;text-align: right;"><strong>Tổng tiền: {{number_format($order->order_total_price)}} VNĐ</strong></p>
                                </p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div id="delete-modal" class="modal fade" tabindex="-1" data-keyboard="false">
        <div class="modal-dialog" style="margin-top: 5%">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"></button>
                    <h4 class="modal-title uppercase">Xóa đơn hàng</h4>
                </div>
                {!! Form::open(['action' => 'Admin\OrderController@doDeleteOrder', 'method' => 'POST', 'id' => 'delete-form']) !!}
                <div class="modal-body">
                    <input type="hidden" name="txt-id" value=""/>
                    <div class="font-red-soft">Bạn có chắc chắn muốn xóa đơn hàng này?</div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn blue text-uppercase">Xác nhận</button>
                    <button type="button" data-dismiss="modal" class="btn red-soft uppercase">Hủy bỏ</button>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
@section('script')
    {{ Html::script('assets/global/plugins/icheck/icheck.min.js') }}
    {{ Html::script('assets/global/plugins/select2/js/select2.full.min.js') }}
    {{ Html::script('assets/global/plugins/jquery-validation/js/jquery.validate.min.js') }}
    <script>
        $(document).ready(function () {
            $('.btn-delete').click(function () {
                var id = $.trim($(this).data('id'));
                if (id !== "") {
                    $('#delete-modal').find('input[name="txt-id"]').val(id);
                    $('#delete-modal').modal('show');
                }
            });
            $('#delete-modal').on('hidden.bs.modal', function () {
                $(this).find('#delete-form').trigger('reset');
            });
        });
    </script>
@endsection