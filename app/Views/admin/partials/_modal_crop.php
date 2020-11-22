
<div class="modal fade" id="insertimageModal" aria-labelledby="insertimageModalLabel">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="insertimageModalLabel">Crop & Insert Image</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-md-11 text-center">
                <div id="image_crop" style="width:100%"></div>
            </div>
        </div>  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary crop_image" data-model="<?=$resource?>">Crop & Insert Image</button>
      </div>
    </div>
  </div>
</div>