@extends('admin.layouts.base') @section('title', 'Tác gỉa' ) @section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Tác gỉa</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Danh sách tác gỉa
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-3">
                        <p>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add-modal" onclick="addModal()">Thêm mới</button>
                        </p>
                    </div>
                    <div class="col-lg-9">
                        
                        <div class="form-group pull-right">
                            <div class="input-group">
                                <input id="keySearch" type="text" class="form-control" name="search" placeholder="Từ khóa...">
                            </div>
                        </div>
                       
                    </div>
                </div>
                <table width="100%" class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Tên</th>
                            <th>Email</th>
                            <th>Ngày tạo</th>
                            <th>Ngày cập nhật</th>
                            <th>Chức năng</th>
                        </tr>
                    </thead>
                    <tbody id="table_users">
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
var dataObj = decodeURIComponent("<?php echo rawurlencode($authors); ?>");
var jsData = JSON.parse(dataObj);

$(document).ready(function() {
    loadDataTable(jsData);
});

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function loadDataTable(data) {
    // ('#table_posts').empty();
    var a = '';
    $.each(data, function(index, obj) {
        a += drawTable(index, obj);
    });
    $("#table_users").html(a);
};

function reloadDataTable() {
    $.ajax({
        type: 'get',
        url: '{{ route("admin.user.reload") }}',
        dataType: 'json', 
        success: function(data){
            loadDataTable(data);
        },
        error: function(){
            console.log("Loi - Lam moi lai du lieu");
        }
    });
};

function drawTable(index, obj) {
    var str = '<tr><td>' + index + '</td>' +
            '<td>' + obj.name + '</td>' +
            '<td>' + obj.email + '</td>' +
            '<td>' + obj.created_at + '</td>' +
            '<td>' + obj.updated_at + '</td>' +
            '<td><a href="javascript:void(0)" onclick="editModal('+ obj.id +')" style="color: blue"><i class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i></a> ' +
            ' <a href="javascript:void(0)" onclick="deleteModal(' + obj.id + ')" style="color: red"><i class="fa fa-trash-o fa-2x" aria-hidden="true"></i></a ></td></tr>';
    return str;
};

var editModal = function(id){
    var url = '{{ route("admin.user.edit", ":id") }}';
    url = url.replace(':id', id);
    $.ajax({
        type: 'get',
        url: url,
        success: function(data){
            $("#edit-modal").html(data);
            $("#edit-modal").modal("show");
        }, 
        error: function(data){
            console.log("Loi- caap nhatj");
            console.log(data)
        }
    });
};

function addModal() {
    $.ajax({
        type: 'get',
        url: '{{ route("admin.user.add") }}' ,
        success: function(data){
            $("#add-modal").html(data);
            $("#add-modal").modal("show");
        },
        error: function(){
            console.log("loi - them moi bai viet");
        }
    });
};

var deleteModal = function(id){
    var url = '{{ route("admin.user.delete", ":id") }}';
    url = url.replace(':id', id);
    $.ajax({
        type: 'get',
        url: url,
        dataType: 'json',
        success: function(mss){
            $.notify(mss.message, "success");
            reloadDataTable();
        },
        error: function(){
            console.log("Loi - Xoa tac giar");
        }
    });
};

$("#keySearch").keyup(function() {
    $value = $(this).val();
    $.ajax({
        type: 'get',
        url: '{{ route("admin.user.search") }}',
        dataType: 'json',
        data: {'search': $value},
        success: function(data){
            loadDataTable(data);
        },
        error: function(){
            console.log("Loi - Timf kiem");
        }
    });
});

</script>
@endsection
