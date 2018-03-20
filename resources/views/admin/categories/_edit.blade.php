<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <div class="center">
                <h4 class="modal-title">Cập nhật</h4>
            </div>
        </div>
        <div class="modal-body">
            <div class="row">
              <div class="col-lg-12">
                <form action="{{ route('admin.category.update') }}" method="post" id="frm-edit">
                    <input type="hidden" name="id" value="{{ $category->id }}">
                    <div class="form-group">
                        <label for="title">Tiêu đề</label>
                        <input required type="text" class="form-control" value="{{ $category->title }}" name="title" placeholder="Tên tiêu đề">
                    </div>
                </form>
              </div>     
            </div>
        </div>
        <div class="modal-footer">
            <div class="center">
                <button type="button" class="btn btn-primary" onclick="editAction()">Cập nhật</button>
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

    $("#frm-edit").submit(function() {
        var data = $(this).serialize();
        var method = $("#frm-edit").attr('method');
        
        $.ajax({
            type: method,
            url: '{{ route('admin.category.update') }}',
            data: data,
            cache: false,
            dataType: 'json',
            success: function(mss){
                if(mss.status){
                    $("#edit-modal").modal("hide");
                    $("#edit-modal").empty();
                    $.notify(mss.message, "success");
                    reloadDataTable();
                }
                else {
                    $.notify(mss.message, "warn");
                }
            },
            error: function(data){
                $.notify("Cập nhật thất bại", "error");
            }
        });
        return false;
    });

    var editAction = function() {
        $("#frm-edit").submit();
    };

</script>
