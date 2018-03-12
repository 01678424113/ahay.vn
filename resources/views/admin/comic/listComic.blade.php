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
            <span class="caption-subject uppercase">Tất cả truyện tranh</span>
        </div>
        <div class="actions">
            <a href="{{URL::action('Admin\ComicController@addComic')}}" class="btn blue uppercase">Thêm truyện</a>
        </div>
    </div>
    <div class="portlet-body">
        {!! Form::open(['action' => 'Admin\ComicController@listComic', 'method' => 'GET', 'id' => 'filter-form']) !!}
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <input type="text" name="name" class="form-control" placeholder="Tìm theo tên truyện"
                           value="{{ Request::has('name') ? Request::input('name') : '' }}"/>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <input type="text" name="id_comic" class="form-control" placeholder="Tìm theo ID"
                           value="{{ Request::has('id_comic') ? Request::input('id_comic') : '' }}"/>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <select name="suggest" class="form-control">
                        <option value="">Truyện nổi bật</option>
                        <option value="0">Không</option>
                        <option value="1">Có 3</option>
                        <option value="2">Có 5</option>
                        <option value="3">Có 3-5</option>
                    </select>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <select name="status" class="form-control">
                        <option value="">Chọn trạng thái</option>
                        <option value="1" 
                                {{ Request::has('status') && Request::input('status') == 1 ? 'selected' : '' }}
                                >
                                Công khai</option>
                        <option value="0" 
                                {{ Request::has('status') && Request::input('status') == 0 ? 'selected' : '' }}
                                >
                                Bản nháp</option>
                        <option value="-1" 
                                {{ Request::has('status') && Request::input('status') == -1 ? 'selected' : '' }}
                                >
                                Hủy đăng</option>
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
        @if(count($comics) > 0)
        <div class="table-responsive">
            <table class="table table-bordered table-hover td-middle">
                <thead>
                    <tr>
                        <th style="width:67px;"></th>
                        <th>Mã</th>
                        <th>Tên truyện</th>
                        <th>Tiêu đề SEO</th>
                        <th style="width: 150px;">Đơn giá</th>
                        <th style="width: 150px;">Giá mặc định</th>
                        <th style="width: 100px;">Trạng thái</th>
                        <th style="width: 70px;"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($comics as $comic)
                    <tr>
                        <td>
                            <img src="{{ env('APP_URL'). $comic->comic_featured }}"
                                 class="img-thumbnail featured-popover"
                                 style="max-width: 50px; display: block;"
                                 data-content="<img src='{{ env('APP_URL') . $comic->comic_featured }}' style='max-width:100%;'>"
                                 />
                        </td>
                        <td>{!! $comic->comic_id !!}</td>
                        <td>{!! $comic->comic_name !!}</td>

                        <td class="font-13">{!! $comic->comic_meta_title !!}</td>
                        <td>{{number_format($comic->comic_unit_price, 0, '', ',')}}</td>
                        <td>{{number_format($comic->comic_increase_price, 0, '', ',')}}</td>
                        <td class="font-12">
                            @if($comic->comic_status == 1)
                            <span class="text-success">Công khai</span>
                            @elseif($comic->comic_status == 0)
                            <span class="text-warning">Bản nháp</span>
                            @else
                            <span class="text-danger">Hủy đăng</span>
                            @endif
                        <td>
                            <a href="{{ URL::action('Admin\ComicController@editComic', ['comic_id' => $comic->comic_id]) }}"
                               class="btn green btn-xs"><i class="fa fa-pencil"></i></a>
                            <button type="button" data-id="{{ $comic->comic_id }}"
                                    class="btn btn-xs red-soft m-r-0 btn-delete"><i class="fa fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="text-right">
            {!!  $comics->appends(Request::all())->links() !!}
        </div>
        @else
        <h4 class="text-center">Không có dữ liệu</h4>
        @endif
    </div>
</div>
<div id="delete-modal" class="modal fade" tabindex="-1" data-keyboard="false">
    <div class="modal-dialog" style="margin-top: 5%">
        {!! Form::open(['action' => 'Admin\ComicController@doDeleteComic', 'method' => 'POST', 'id' => 'delete-form']) !!}
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"></button>
                <h4 class="modal-title uppercase">Xóa truyện tranh</h4>
            </div>
            <div class="modal-body">
                <input type="hidden" name="txt-id" value="">
                <div class="font-red-soft">Bạn có chắc chắn muốn xóa truyện tranh này?</div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn blue text-uppercase">Xác nhận</button>
                <button type="button" data-dismiss="modal" class="btn red-soft uppercase">Hủy bỏ</button>
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
    });
</script>
@endsection
