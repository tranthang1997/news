@extends('admin.master')
@section('content')
<!-- Page Content -->
<form action="{!! url('/admin/product/add') !!}" method="POST" enctype="multipart/form-data">
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Tin tức
                    <small>Thêm</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
                    <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                    <div class="form-group">
                        <label>Loại tin</label>
                        <select class="form-control" name="sltParent">
                            <option value="">Chọn loại tin</option>
                            <?php
                                cate_parent($cate, 0, "--", old('sltParent'));
                            ?>
                        </select>
                        @if($errors -> first('sltParent') != null)
                        <div class="alert alert-danger">
                            {!! $errors -> first('sltParent') !!}
                        </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Tên</label>
                        <input class="form-control" name="txtName" placeholder="Please Enter name" value="{!! old('txtName') !!}" />
                        @if($errors -> first('txtName') != null)
                        <div class="alert alert-danger">
                            {!! $errors -> first('txtName') !!}
                        </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Giới thiệu</label>
                        <textarea class="form-control" rows="3" name="txtIntro" >{!! old('txtIntro') !!}</textarea>
                        <script type="text/javascript">CKEDITOR.replace( 'txtIntro' ) </script> 
                    </div>
                    <div class="form-group">
                        <label>Nội dung</label>
                        <textarea class="form-control" rows="3" name="txtContent" >{!! old('txtContent') !!}</textarea>
                        <script type="text/javascript">CKEDITOR.replace( 'txtContent' ) </script>
                    </div>
                    <div class="form-group">
                        <label>Ảnh đại diện</label>
                        <input type="file" name="fImages" value="{!! old('fImages') !!}" >
                        @if($errors -> first('fImages') != null)
                            <div class="alert alert-danger">
                                {!! $errors -> first('fImages') !!}
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Từ khóa</label>
                        <input class="form-control" name="txtKeywords" placeholder="Please Enter Category Keywords" value="{!! old('txtKeywords') !!}" />
                    </div>
                    <div class="form-group">
                        <label>Mô tả</label>
                        <textarea class="form-control" rows="3" name="txtDescription" >{!! old('txtDescription') !!}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Trạng thái</label>
                        <label class="radio-inline">
                            <input name="rdoStatus" value="1" checked="" type="radio">Tin mới
                        </label>
                        <label class="radio-inline">
                            <input name="rdoStatus" value="2" type="radio">Bài viết mới
                        </label>
                    </div>
                    <button type="submit" class="btn btn-default">Thêm</button>
                    <button type="reset" class="btn btn-default">Làm mới</button>
            </div>
            <div class="col-md-1"></div>
            <div class="col-md-4">
                <div class="form-group">
                    @for($i = 0; $i < 10; $i++)
                    <label >Ảnh của tin tức {{$i + 1}} </label>
                    <input type="file" name="fProductDetail[]">
                    @endfor
                </div>
            </div>      
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
</form>
@endsection()
