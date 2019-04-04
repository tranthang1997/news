@extends('admin.master')
@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Loại tin
                    <small>Sửa</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
                <form action="" method="POST">
                    <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                    <div class="form-group">
                        <label>Loại tin</label>
                        <select class="form-control" name="sltParent">
                            <option value="0">Chọn cha của loại tin</option>
                            <?php
                                cate_parent($parent, 0, "--", $data["parent_id"]);
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tên loại tin</label>
                        <input class="form-control" name="txtCateName" placeholder="Please Enter News Name" value="{!! old('txtCateName', isset($data) ? $data['name'] : null) !!}" />
                        @if(count($errors) > 0 && $errors -> first('txtCateName') != null)
                            <div class="alert alert-danger">
                            {!! $errors -> first('txtCateName') !!}
                        </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Thứ tự</label>
                        <input class="form-control" name="txtOrder" placeholder="Please Enter News Order" value="{!! old('txtOrder', isset($data) ? $data['order'] : null) !!}" />
                        @if(count($errors) > 0 && $errors -> first('txtOrder') != null)
                            <div class="alert alert-danger">
                            {!! $errors -> first('txtOrder') !!}
                        </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Từ khóa</label>
                        <input class="form-control" name="txtKeywords" placeholder="Please Enter News Keywords" value="{!! old('txtKeywords', isset($data) ? $data['keywords'] : null) !!}"/>
                    </div>
                    <div class="form-group">
                        <label>Mô tả</label>
                        <textarea class="form-control" rows="3" name="txtDescription" >{!! old('txtDescription', isset($data) ? $data['description'] : null) !!}</textarea>
                    </div>
                    <button type="submit" class="btn btn-default">Sửa</button>
                    <button type="reset" class="btn btn-default">Làm mới</button>
                <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection()
