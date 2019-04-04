@extends('admin.master')
@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Tin tức
                    <small>Danh sách</small>
                </h1>
            </div>
            <div class="col-md-12">
                @if(Session::has('flash_messages'))
                    <div class="alert alert-{!! Session::get('flash_level') !!}">
                        {!! Session::get('flash_messages') !!}
                    </div>
                @endif
            </div>  
            <!-- /.col-lg-12 -->
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>Tên</th>
                        <th>Trạng thái</th>
                        <th>Thời gian</th>
                        <th>Loại tin</th>
                        <th>Xóa</th>
                        <th>Sửa</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $stt = 1;
                    ?>
                    @foreach($product as $product)
                        <tr class="odd gradeX" align="center">
                            <td>{!! $stt !!}</td>
                            <td>{!! $product["name"] !!}</td>
                            <td>
                                @if($product["price"] == 1) 
                                    Tin mới
                                @else
                                    Bài viết mới
                                @endif
                            </td>
                            <td> {!! \Carbon\Carbon::createFromTimeStamp(strtotime($product["created_at"])) -> diffForHumans() !!}</td>
                            <td>
                                <?php
                                    $cate = DB::table('cates') -> where('id', $product["cate_id"]) -> first();
                                    if(!empty($cate -> name)) {
                                        echo $cate -> name;
                                    }
                                ?>
                            </td>
                            <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a onclick = "return xacNhanXoa('Bạn có chắc chắn muốn xóa không')" href="{!! URL::route('admin.product.getDelete', $product["id"]) !!}"> Xóa</a></td>
                            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{!! URL::route('admin.product.getEdit', $product["id"]) !!}">Sửa</a></td>
                        </tr>
                        <?php
                            $stt = $stt + 1;
                        ?>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection()