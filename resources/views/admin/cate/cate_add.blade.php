@extends('admin.master')
@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Loại tin
                    <small>Thêm</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
                <form action="{!! route('admin.cate.getAdd') !!}" method="POST">
                    <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                    <div class="form-group">
                        <label>Loại tin</label>
                        <select class="form-control" name="sltParent">
                            <option value="0">Chọn cha của loại tin</option>
                            <?php
                                cate_parent($parent);
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tên loại tin</label>
                        <input class="form-control" name="txtCateName" placeholder="Please Enter News Name" />
                        @if($errors -> first('txtCateName') != null)
                        <div class="alert alert-danger">
                            {!! $errors -> first('txtCateName') !!}
                        </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Thứ tự</label>
                        <input class="form-control" name="txtOrder" placeholder="Please Enter News Order" />
                        @if(count($errors) > 0 && $errors -> first('txtOrder') != null)
                        <div class="alert alert-danger">
                            {!! $errors -> first('txtOrder') !!}
                        </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Từ khóa</label>
                        <input class="form-control" name="txtKeywords" placeholder="Please Enter News Keywords" />
                    </div>
                    <div class="form-group">
                        <label>Mô tả</label>
                        <textarea class="form-control" rows="3" name="txtDescription"></textarea>
                    </div>
                    <button type="submit" class="btn btn-default">Thêm</button>
                    <button type="reset" class="btn btn-default">Làm mới</button>
                <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection()