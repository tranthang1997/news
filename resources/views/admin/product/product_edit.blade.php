@extends('admin.master')
@section('content')
<!-- Page Content -->
<style type="text/css" media="screen">
    #insert{margin-top: 20px;}
</style>
<form action="" method="POST" enctype="multipart/form-data" name="frmEditproduct">
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Tin tức
                    <small>Sửa</small>
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
                                cate_parent($cate, 0, "--", $product["cate_id"]);
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
                        <input class="form-control" name="txtName" placeholder="Please Enter Username" value="{!! old('txtName', isset($product) ? $product['name'] : null) !!}" />
                        @if($errors -> first('txtName') != null)
                        <div class="alert alert-danger">
                            {!! $errors -> first('txtName') !!}
                        </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Giới thiệu</label>
                        <textarea class="form-control" rows="3" name="txtIntro">{!! old('txtIntro', isset($product) ? $product['intro'] : null) !!}</textarea>
                        <script type="text/javascript">CKEDITOR.replace( 'txtIntro' ) </script> 
                    </div>
                    <div class="form-group">
                        <label>Nội dung</label>
                        <textarea class="form-control" rows="3" name="txtContent">{!! old('txtContent', isset($product) ? $product['content'] : null) !!}</textarea>
                        <script type="text/javascript">CKEDITOR.replace( 'txtContent' ) </script> 
                    </div>
                    <div class="form-group">
                        <label>Ảnh đại diện</label>
                        <img src="{!! asset('resources/upload/' . $product['image']) !!}" alt="" width="150">
                        <input type="file" name="fImages" value="{!! old('fI', isset($product) ? $product['image'] : null) !!}">
                        <input type="hidden" name="img_current" value="{!! $product['image'] !!}">
                    </div>
                    <div class="form-group">
                        <label>Từ khóa</label>
                        <input class="form-control" name="txtKeywords" placeholder="Please Enter Category Keywords" value="{!! old('txtKeywords', isset($product) ? $product['keywords'] : null) !!}" />
                    </div>
                    <div class="form-group">
                        <label>Mô tả</label>
                        <textarea class="form-control" rows="3" name="txtDescription">{!! old('txtDescription', isset($product) ? $product['description'] : null) !!}</textarea>
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
                    <button type="submit" class="btn btn-default">Sửa</button>
                    <button type="reset" class="btn btn-default">Làm mới</button>
            </div>
            <div class="col-md-1"></div>
            <div class="col-md-4">
                <div class="form-group">
                    @foreach($product_image as $key => $item)
                    <label >Ảnh của tin tức </label>
                    <div class="form-group" id="{!! $key !!}">
                        <img id="{!! $key !!}" idHinh="{!! $item['id'] !!}" src="{!! asset('resources/upload/detail/'. $item['image']) !!}" alt="" width="150">
                        <a id="del_img" class="btn btn-danger btn-circle icon_del" type="button"><i class="fa fa-times"></i></a>
                    </div>
                    @endforeach
                    <button type="button" class="btn btn-primary" id="addImages">Add Images</button>
                    <div id="insert"></div>
                </div>
            </div>      
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
</form>
@endsection()
