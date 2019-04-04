@extends('admin.master')
@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">User
                    <small>List</small>
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
                        <th>Username</th>
                        <th>Level</th>
                        <th>Delete</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $stt = 1;
                    ?>
                    @foreach($user as $user)
                    <tr class="odd gradeX" align="center">
                        <td>
                            <?php
                                echo $stt;
                                $stt++;
                            ?>
                        </td>
                        <td>{!! $user["username"] !!}</td>
                        <td>
                            @if ($user["id"] == 1 && $user["level"] == 1)
                                Superadmin
                            @elseif ($user["level"] == 1)
                                Admin
                            @else
                                Member
                            @endif
                        </td>
                        <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a onclick = "return xacNhanXoa('Bạn có chắc chắn muốn xóa không')" href="{!! URL::route('admin.user.getDelete', $user["id"]) !!}"> Delete</a></td>
                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{!! URL::route('admin.user.getEdit', $user["id"]) !!}">Edit</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection()
