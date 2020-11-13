<div class="col">
            
    <div class="card">
        <div class="card-header bg-primary text-white">
            <i class="fa fa-table"></i> <?php echo $title;?> <a href="/admin/products" class="float-right"><button class="btn btn-primary text-right"><span data-feather="arrow-left-circle"></span> Go Back</button></a>
        </div>
        <div class="card-body">
            <form action="/admin/products/update" method="POST">
            <input type="hidden" name="id" value="<?=$product->id;?>">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" aria-describedby="productHelp" value="<?=$product->name?>" required>
                    <small id="productHelp" class="form-text text-muted">product Name required.</small>
 
                </div>
                <div class="form-group">
                    <label for="price" class="control-label">Product Price</label>
                    <input type="text" class="form-control" id="price" name="price" value="<?=$product->price?>">
                </div>
                <div class="form-group">
                    <label for="category" class="control-label">Product Category</label>
                    <select class="form-control" id="category" name="category_id">
                            <?php if (is_array($categories)) : ?>
                            <?php foreach ($categories as $category): ?>
                            <option value="<?php echo $category->id; ?>" <?php echo ($product->category_id==$category->id)? 'selected': '' ?>>
                                <?php echo $category->name; ?>
                            </option>
                            <?php endforeach; ?>
                            <?php endif; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="brand" class="control-label">Product Brand</label>
                    <select class="form-control" id="brand" name="brand_id">
                            <?php if (is_array($brands)) : ?>
                            <?php foreach ($brands as $brand): ?>
                            <option value="<?php echo $brand->id; ?>" <?php echo ($product->brand_id==$brand->id)? 'selected': '' ?>>
                                <?php echo $brand->name; ?>
                            </option>
                            <?php endforeach; ?>
                            <?php endif; ?>
                    </select>
                </div>
                <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" id="is_new" name="is_new" <?php echo ($product->is_new==1)? 'checked': '' ?>>
                    <label for="is_new" class="form-check-label">Is New</label>
                    
                </div>
                <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" id="status" name="status" <?php echo ($product->status==1)? 'checked': '' ?>>
                    <label class="form-check-label" for="status">Check if active</label>
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <input type="text" class="form-control" id="description" name="description" aria-describedby="descriptionHelp" value="<?=$product->description?>" required>
                    <small id="descriptionHelp" class="form-text text-muted">product description required.</small>
 
                </div>

                <div class="form-group row" id="drop-area">
                    <div class="container-fluid">
                        <div class="card border-success text-center mb-3">
                            <div class="card-header bg-transparent border-success">
                                <label for="title">Change Image:</label>
                            </div>
                            <div class="card-body text-success">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="file" id="insert_image" multiple accept="image/*"
                                            name="image">
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-12" id="store_image">
                                    <input type="hidden" name="file_name" value="<?=$product->image?>">
                                    <div class="col-md-2" style="margin-bottom:16px;">
                                    <img src="/assets/images/products/<?=$product->image?>" class="img-thumbnail" />
                                    </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer bg-transparent border-success">Footer</div>
                        </div>
                    </div>
                </div>
                
                
                <div class="mx-auto">
                    <button type="submit" class="btn btn-primary text-right">Update</button>
                </div>
            </form>
        </div>
    </div>
        
</div>

<div id="insertimageModal" class="modal" role="dialog">
 <div class="modal-dialog">
  <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Crop & Insert Image</h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-8 text-center">
            <div id="image_crop" style="width:350px; margin-top:30px"></div>
          </div>
          <div class="col-md-4" style="padding-top:30px;">
        <br />
        <br />
        <br/>
            <button class="btn btn-success crop_image" data-model="products">Crop & Insert Image</button>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
