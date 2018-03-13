@extends('admin.layouts.base') @section('title', 'Bài viết' ) @section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Bài viết</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Danh sách bài viết
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-4">
                        <p>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add-modal" onclick="addModal()">Thêm mới</button>
                        </p>
                    </div>
                    <div class="col-lg-8">
                        <form action="#" method="post" class="form-inline pull-right">
                            <div class="form-group">
                                <div class="input-group">
                                    <input type="text" class="form-control" id="exampleInputAmount" placeholder="Từ khóa...">
                                </div>
                                <button class="btn btn-default"><i class="fa fa-search"></i> </button>
                            </div>
                        </form>
                    </div>
                </div>
                <table width="100%" class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th width="20%">Hình ảnh</th>
                            <th>Tiêu đề</th>
                            <th>Tác gỉa</th>
                            <th>Chủ đề</th>
                            <th>Chức năng</th>
                        </tr>
                    </thead>
                    <tbody id="table_posts">
                    </tbody>
                </table>
                <!-- /.table-responsive -->
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <div class="modal fade" id="add-modal"></div>
    <div class="modal fade" id="edit-modal"></div>
    <div class="modal fade" id="delete-modal"></div>
    <!-- /.col-lg-12 -->
</div>
@endsection @section('js')
<script>
var dataObj = decodeURIComponent("<?php echo rawurlencode($posts); ?>");
var jsData = JSON.parse(dataObj);

$(document).ready(function() {
    loadDataTable(jsData);
});

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

var loadDataTable = function(data) {
    // ('#table_posts').empty();
    var a = '';
    $.each(data, function(index, obj) {
        if(obj.image == 'null' || obj.image == null) {
            obj.image = "notfound.png";
        }
        a += drawTable(index, obj);
    });
    $("#table_posts").html(a);
};

var drawTable = function(index, obj) {
    var str = '<tr><td>' + index + '</td>' +
            '<td><img src="img/' + obj.image + '" alt="' + obj.title +
            '" width="100%" height="25%"></td>' +
            '<td>' + obj.title + '</td>' +
            '<td>' + obj.author.name + '</td>' +
            '<td>' + obj.category.title + '</td>' +
            '<td><p><button onclick="editModal('+ obj.id +')" class="btn btn-info">Cập nhật</button></p>' +
            '<p><a href="" class="btn btn-danger">Xóa</a></td></tr>';
    return str;
};

var editModal = function(id){
    var url = '{{ route("admin.post.edit", ":id") }}';
    url = url.replace(':id', id);
    $.ajax({
        type: 'get',
        url: url,
        success: function(data){
            $("#edit-modal").html(data);
            $("#edit-modal").modal("show");
        }, 
        error: function(){
            console.log("Loi- caap nhatj");
        }
    });
}

var addModal = function(){
    $.ajax({
        type: 'get',
        url: '{{ route("admin.post.add") }}' ,
        success: function(data){
            $("#add-modal").html(data);
            $("#add-modal").modal("show");
        },
        error: function(){
            console.log("loi - them moi bai viet");
        }
    });
}
</script>
@endsection
