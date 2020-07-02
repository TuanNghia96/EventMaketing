@extends('layouts.backend.admin')

@section('title', 'Chi tiết sự kiện')

@section('content')
    <div class="card-header">
        <div class="card-title">Chi tiết sự kiện</div>
    </div>
    <div class="card-body">
        <table class="table table-typo">
            <tbody>
            <tr>
                <td>
                    <p>id</p>
                </td>
                <td><p>{{ $event->id }}</p></td>
            </tr>
            <tr>
                <td>
                    <p>name</p>
                </td>
                <td><p>{{ $event->name }}</p></td>
            </tr>
            <tr>
                <td>
                    <p>title</p>
                </td>
                <td><p>{{ $event->title }}</p></td>
            </tr>
            <tr>
                <td>
                    <p>code</p>
                </td>
                <td><p>{{ $event->code }}</p></td>
            </tr>
            <tr>
                <td>
                    <p>location</p>
                </td>
                <td><p>{{ $event->location }}</p></td>
            </tr>
            <tr>
                <td>
                    <p>summary</p>
                </td>
                <td><p>{!! $event->summary !!}</p></td>
            </tr>
            <tr>
                <td>
                    <p>avatar</p>
                </td>
                <td><img src="{{ asset($event->avatar) }}" alt="" width="50%"></td>
            </tr>
            <tr>
                <td>
                    <p>Thời gian công bố</p>
                </td>
                <td><p>{{ $event->public_date }}</p></td>
            </tr>
            <tr>
                <td>
                    <p>Thời gian bắt đầu</p>
                </td>
                <td><p>{{ $event->start_date }}</p></td>
            </tr>
            <tr>
                <td>
                    <p>Thời gian kết thúc</p>
                </td>
                <td><p>{{ $event->end_date }}</p></td>
            </tr>
            <tr>
                <td>
                    <p>Coupon</p>
                </td>
                <td><p>{{ $event->coupon_id }}</p></td>
            </tr>
            <tr>
                <td>
                    <p>Điểm</p>
                </td>
                <td><p>{{ $event->point }}</p></td>
            </tr>
            <tr>
                <td>
                    <p>Thể loại</p>
                </td>
                <td><p>{{ $event->type->name }}</p></td>
            </tr>
            <tr>
                <td>
                    <p>Danh mục</p>
                </td>
                <td><p>{{ $event->category->name }}</p></td>
            </tr>
            <tr>
                <td>
                    <p>Tình trạng</p>
                </td>
                <td><p>{{ $event->status }}</p></td>
            </tr>
            <tr>
                <td>
                    <p>Hình ảnh</p>
                </td>
                <td>
                    <table class="table table-typo">
                        <tbody>
                        @isset($event->images)
                            @foreach($event->images as $image)
                                <td>
                                    {{ $image->title }}
                                </td>
                                <td>
                                    <img src="{{ asset($image->image) }}" alt="" width="50%">
                                </td>
                            @endforeach
                        @endisset
                        </tbody>
                    </table>
                </td>
            
            </tr>
            <tr>
                <td>
                    <p>Vé</p>
                </td>
                <td><p>{{ $event->ticket_number }}</p></td>
            </tr>
            <tr>
                <td>
                    <p>Đánh giá trung bình</p>
                </td>
                <td>
                    <div class="col-md-6">
                        <div class="demo">
                            <div class="progress-card">
                                <div class="progress-status">
                                    {{--<span class="text-muted">Open Rate</span>--}}
                                    <span class="text-muted fw-bold"> {{ $event->rating * 20 }}%</span>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-striped bg-warning" role="progressbar" style="width: {{ $event->rating * 20 }}%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" data-toggle="tooltip" data-placement="top" title="" data-original-title="60%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <p>Nhà cung cấp chủ quản</p>
                </td>
                <td>
                    @foreach($event->mainSupplier->pluck('name', 'id')->toArray() as $key => $value)
                        <a href="{{ route('suppliers.show', $key) }}">{{ $value }}</a>&nbsp;&nbsp;&nbsp;
                    @endforeach
                </td>
            </tr>
            <tr>
                <td>
                    <p>Các nhà cung cấp</p>
                </td>
                <td>
                    @foreach($event->suppliers->pluck('name', 'id')->toArray() as $key => $value)
                        <a href="{{ route('suppliers.show', $key) }}">{{ $value }}</a>&nbsp;&nbsp;&nbsp;
                    @endforeach
                </td>
            </tr>
            <tr>
                <td>
                    <p>Trạng thái</p>
                </td>
                <td>{{ $statuses[$event->status] }}</td>
            </tr>
            @isset($event->note)
                <tr>
                    <td>
                        <p>Lý do xin hủy</p>
                    </td>
                    <td>{{ $event->note }}</td>
                </tr>
            @endisset
            <tr>
                <td>
                    <p>Hành động</p>
                </td>
                <td>
                    @if($event->status == \App\Models\Event::$status[0])
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
                            <span class="btn-label">
                                <i class="fa fa-times"></i>
                            </span>Hủy bỏ
                        </button>
                        
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <form action="{{ route('events.cancel') }}" method="post">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Nhập lý do</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $event->id }}">
                                            <label for="">Lý do</label>
                                            <input type="text" class="form-control" name="reason" required>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                                            <button type="submit" class="btn btn-primary">Hủy bỏ</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <a class="btn btn-success" href="{{ route('events.success', $event->id) }}">
                            <span class="btn-label">
                                <i class="fa fa-check"></i>
                            </span>Xác nhận
                        </a>
                    @endif
                </td>
            </tr>
            </tbody>
        </table>
    </div>
    @if($event->buyer->count())
        {{-- buyer table --}}
        <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Vé tham gia</h4>
                </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="multi-filter-select" class="display table table-striped table-hover">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Tên người mua</th>
                            <th>Sử dụng</th>
                            <th>Thời gian có</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Id</th>
                            <th>Tên người mua</th>
                            <th>Sử dụng</th>
                            <th>Thời gian có</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @foreach($event->buyer as $key => $buyer)
                            <tr>
                                <th>{{ $key + 1 }}</th>
                                <th><a href="{{ route('buyers.show', $buyer->id) }}">{{ $buyer->name }}</a></th>
                                <th>
                                    @if($buyer->supplier_id)
                                        <p class="text-success">Chưa sử dụng</p>
                                    @else
                                        <p class="text-danger">Đã sử dụng</p>
                                    @endif
                                </th>
                                <th>{{ date_format(date_create($buyer->created_at) ,"d/m/Y") }}</th>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @else
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Không có vé nào nào</h4>
            </div>
        </div>
    @endif
@endsection

@section('inline_scripts')
    @include('layouts.backend.table_script')
@endsection

