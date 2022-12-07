<!-- Update Photo -->
<!-- Modal -->
<div class="modal top fade" id="order_details_model" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-mdb-backdrop="true" data-mdb-keyboard="true">
    <div class="modal-dialog modal-xl ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Order Details</h5>
                <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="">
                <div class="modal-body">
                    <div class="form-outline mb-4">
                        <input class="form-control form-control-sm" id="formFileSm" type="file" />
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal"><i class="fa fa-close"></i>Close</button>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-check-square-o"></i>Update</button>
                </div>
            </form>
        </div>
    </div>
</div>












<div class="modal fade" id="edit_photo">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><b><span class="name"></span></b></h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="products_photo.php" enctype="multipart/form-data">
                    <input type="hidden" class="prodid" name="id">
                    <div class="form-group">
                        <label for="photo" class="col-sm-3 control-label">Photo</label>

                        <div class="col-sm-9">
                            <input type="file" id="photo" name="photo" required>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                <button type="submit" class="btn btn-success btn-flat" name="upload"><i class="fa fa-check-square-o"></i> Update</button>
                </form>
            </div>
        </div>
    </div>
</div>