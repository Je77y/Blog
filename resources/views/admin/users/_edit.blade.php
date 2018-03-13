<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <div class="center">
                <h4 class="modal-title">Cập nhật </h4>
            </div>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-lg-12">
                    <form action="#" method="post">
                        <input type="hidden" value="{{ $author->id }}">
                        <div class="form-group">
                            <label for="ten">Tên</label>
                            <input required type="text" value="{{ $author->name }}" class="form-control" name="ten" placeholder="Tên">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input required type="email" disabled value="{{ $author->email }}" class="form-control" name="email" placeholder="Email">
                        </div>
                    </form>
                </div> 
            </div>
        </div>
        <div class="modal-footer">
            <div class="center">
                <button type="button" class="btn btn-primary" onclick="editAction()">Lưu</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
            </div>
        </div>
    </div>
</div>