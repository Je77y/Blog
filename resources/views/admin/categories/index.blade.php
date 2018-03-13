@extends('admin.layouts.base') @section('title', 'Chủ đề' ) @section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Chủ đề</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Danh sách chủ đề
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
                        
                            <div class="form-group pull-right">
                                <div class="input-group">
                                    <input type="text" class="form-control" id="keySearch" placeholder="Từ khóa...">
                                </div>
                                
                            </div>
                       
                    </div>
                </div>
                <table width="100%" class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Tiêu đề</th>
                            <th>Ngày tạo</th>
                            <th>Ngày cập nhật</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody id="table_categories">
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
var dataObj = decodeURIComponent("<?php echo rawurlencode($categories); ?>");
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
        a += drawTable(index, obj);
    });
    $("#table_categories").html(a);
};

var reloadDataTable = function() {
    $.ajax({
        type: 'get',
        dataType: 'json',
        url: '{{ route("admin.category.reload") }}',
        success: function(data){
            loadDataTable(data);
        },
        error: function(){
            console.log("loi- lam moi that bai");
        }
    });
};

var drawTable = function(index, obj) {
    var str = '<tr><td>' + index + '</td>' +
            '<td>' + obj.title + '</td>' +
            '<td>' + obj.created_at + '</td>' +
            '<td>' + obj.updated_at + '</td>' +
            '<td><div class="btn-group dropleft"><button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-cog" aria-hidden="true"></i></button>' + 
            '<ul class="dropdown-menu"><li><a class="dropdown-item" href="javascript:void(0)" onclick="editModal('+ obj.id +')" class="btn btn-info">Cập nhật</a></li><li><a class="dropdown-item" href="javascript:void(0)" onclick="deleteModal(' + obj.id + ')" class="btn btn-danger">Xóa</a></li></ul></div></td></tr>';
    return str;
};

var editModal = function(id){
    var url = '{{ route("admin.category.edit", ":id") }}';
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
};

var addModal = function() {
    $.ajax({
        type: 'get',
        url: '{{ route("admin.category.store") }}' ,
        success: function(data) {
            $("#add-modal").html(data);
            $("#add-modal").modal("show");
        },
        error: function() {
            console.log("loi - them moi ");
        }
    });
};

var deleteModal = function(id) {
    var url = '{{ route("admin.category.delete", ":id") }}';
    url = url.replace(':id', id)
    $.ajax({
        type: 'get',
        dataType: 'json',
        url: url,
        success: function(data) {
            $.notify(data.message, "success");
            reloadDataTable();
        }, 
        error: function() {
            console.log("Loi - Xoa that bai");
        }
    });
}
</script>
@endsection
