<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <div class="center">
                <h4 class="modal-title">Thêm mới</h4>
            </div>
        </div>
        <div class="modal-body">
            <div class="row">
              <div class="col-lg-12">
                <form action="{{ route('admin.user.create') }}" method="post" id="frm-create">
                    <div class="form-group">
                        <label for="ten">Tên</label>
                        <input required type="text" class="form-control" name="name" placeholder="Tên">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input required type="email" class="form-control" name="email" placeholder="Email">
                    </div>
                </form>
              </div>     
            </div>
        </div>
        <div class="modal-footer">
            <div class="center">
                <button type="button" class="btn btn-primary" onclick="createAction()">Thêm mới</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
            </div>
        </div>
    </div>
</div>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $("#frm-create").submit(function() {
        var data = $(this).serialize();
        var method = $("#frm-create").attr('method');
        
        $.ajax({
            type: method,
            url: '{{ route('admin.user.create') }}',
            data: data,
            cache: false,
            dataType: 'json',
            success: function(mss){
                if(mss.status){
                    $("#add-modal").modal("hide");
                    $("#add-modal").empty();
                    $.notify(mss.message, "success");
                    reloadDataTable();
                }
                else {
                    $.notify("Kiểm tra du lieu nhap", "warn");
                }
            },
            error: function(data){
                $.notify("Thêm mới thất bại", "error");
            }
        });
        return false;
    });

    var createAction = function() {
        $("#frm-create").submit();
    };

</script>
