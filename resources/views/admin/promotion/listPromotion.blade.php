@extends('admin.layout')
@section('style')
    <style>
        .popover {
            max-width: 360px;
        }
    </style>
    {{ Html::style('assets/global/plugins/select2/css/select2.min.css') }}
    {{ Html::style('assets/global/plugins/select2/css/select2-bootstrap.min.css') }}
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
                <span class="caption-subject bold uppercase">Danh sách khuyến mại</span>
            </div>
            <div class="actions">
                <a href = "{{URL::action('Admin\PromotionController@addPromotion')}}" class="btn blue uppercase">Thêm khuyến mại</a>
            </div>
        </div>
        <div class="portlet-body">
            {!! Form::open(['action' => 'Admin\PromotionController@listPromotion', 'method' => 'GET', 'id' => 'filter-form']) !!}
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <input type="text" name="title" class="form-control" placeholder="Tìm theo tiêu đề" value="{{ Request::has('title') ? Request::input('title') : '' }}" />
                    </div>
                </div>
                {{-- <div class="col-md-2">
                     <div class="form-group">
                         <select name="website" class="form-control">
                             <option value="">Chọn trang web</option>
                             @foreach($websites as $website)
                             <option value="{{ $website->website_id }}"
                                     {{ Request::has('website') && Request::input('website') == $website->website_id ? 'selected' : '' }}>
                                     {!! $website->website_domain !!}</option>
                             @endforeach
                         </select>
                     </div>
                 </div>--}}
               {{-- <div class="col-md-2">
                    <div class="form-group">
                        <select name="category" class="form-control" {{ Request::has('website') ? '' : 'disabled' }}>
                            <option value="">Chọn chuyên mục</option>
                            @include('admin.category.option', ['categories' => $categories, 'n' => 0, 'selected' => Request::input('category')])
                        </select>
                    </div>
                </div>--}}
                {{--<div class="col-md-2">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Ngày tạo" />
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <select name="status" class="form-control">
                            <option value="">Chọn trạng thái</option>
                            <option value="1" {!! Request::has('status') && Request::input('status') == 1 ? 'selected' : '' !!}>Hoạt động</option>
                            <option value="0" {!! Request::has('status') && Request::input('status') == 0 ? 'selected' : '' !!}>Chờ duyệt</option>
                            <option value="-1" {!! Request::has('status') && Request::input('status') == -1 ? 'selected' : '' !!}>Bị khóa</option>
                        </select>
                    </div>
                </div>--}}
                <div class="col-md-1">
                    <div class="form-group">
                        <button type="submit" class="btn uppercase yellow-lemon btn-block"><i class="fa fa-search"></i></button>
                    </div>
                </div>
            </div>
            {!! Form::close() !!}
            @if(count($promotions) > 0)
                <div class="table-responsive">
                    <table class="table table-bordered table-hover td-middle">
                        <thead>
                        <tr>
                            <th>Ảnh KM</th>
                            <th>Tên khuyến mại</th>
                            <th style="width: 80px">Kiểu KM</th>
                            <th>Điều kiện</th>
                            <th style="width: 50px">Giảm(%)</th>
                            <th style="width: 100px">T.gian bắt đầu</th>
                            <th style="width: 100px">T.gian kết thúc</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($promotions as $promotion)
                            <tr>
                                <td>
                                    <img src="{{ env('APP_URL').$promotion->promotion_featured }}" class="img-thumbnail featured-popover"
                                         style="max-width: 50px;width: 50px; height: 38px; display: block;"
                                         data-content="<img src='{{ env('APP_URL') .$promotion->promotion_featured }}' style='max-width:100%;'>"
                                    />
                                </td>
                                <td >{{$promotion->promotion_name}}</td>
                                <td >{{$promotion->promotion_type}}</td>
                                <td >{{$promotion->promotion_condition}}</td>
                                <td >{{$promotion->promotion_percent_discount}}</td>
                                <td >{{$promotion->promotion_start}}</td>
                                <td >{{$promotion->promotion_expired}}</td>
                                <td>
                                    <a href="{{ URL::action('Admin\PromotionController@editPromotion', ['promotion_id'=>$promotion->promotion_id]) }}" class="btn green btn-xs"><i class="fa fa-pencil"></i></a>
                                    <button type="button" data-id="{{$promotion->promotion_id}}"
                                            class="btn btn-xs red-soft m-r-0 btn-delete"><i class="fa fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="text-right">
                    {!!  $promotions->appends(Request::all())->links() !!}
                </div>
            @else
                <h4 class="text-center">Không có dữ liệu</h4>
            @endif
        </div>
    </div>
    <div id="delete-modal" class="modal fade" tabindex="-1" data-keyboard="false">
        <div class="modal-dialog"  style="margin-top: 5%">
            {!! Form::open(['action' => 'Admin\PromotionController@doDeletePromotion', 'method' => 'POST', 'id' => 'delete-form']) !!}
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"></button>
                    <h4 class="modal-title uppercase">Xóa tin tức</h4>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="txt-id" value="">
                    <div class="font-red-soft">Bạn có chắc chắn muốn xóa tin tức này?</div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn blue text-uppercase">Xác nhận</button>
                    <a href="{{URL::previous()}}" data-dismiss="modal" class="btn red-soft uppercase">Hủy bỏ</a>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
@section('script')
{{ Html::script('assets/global/plugins/select2/js/select2.full.min.js') }}
<script>
    $(document).ready(function () {
        $('#filter-form').find('select').change(function () {
            $('#filter-form').submit();
        });
        $('#filter-form').find('input, textarea').keyup(function (e) {
            var keyCode = e.keyCode || e.which;
            if (keyCode === 13) {
                $('#filter-form').submit();
            }
        });
        $('#filter-form').submit(function () {
            $(this).find('select, input, textarea').each(function () {
                if ($.trim($(this).val()) === "") {
                    $(this).prop('disabled', true);
                }
            });
        });
        $('#filter-form').find('select[name="category"]').select2({
            language: {
                noResults: function () {
                    return "Không tìm thấy chuyên mục nào";
                }
            }
        });
        $('#filter-form').find('select[name="website"]').select2({
            language: {
                noResults: function () {
                    return "Không tìm thấy trang web nào";
                }
            }
        });
        $('#filter-form').find('select[name="status"]').select2({
            minimumResultsForSearch: -1
        });
        $('.featured-popover').popover({
            container: '.portlet',
            placement: 'auto right',
            html: true,
            trigger: 'hover',
            content: ''
        });
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
        $('.featured-popover').popover({
            container: '.portlet',
            placement: 'auto right',
            html: true,
            trigger: 'hover',
            content: ''
        });
    });
</script>
@endsection
