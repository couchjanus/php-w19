<div class="col">
            
    <div class="card">
        <div class="card-header bg-primary text-white">
            <i class="fa fa-table"></i> <?=$title;?> <a href="/admin/categories" class="float-right"><button class="btn btn-primary text-right"><span data-feather="arrow-left-circle"></span> Go Back</button></a>
        </div>
        <div class="card-body">
            <form action="/admin/categories/store" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" aria-describedby="categoryHelp" placeholder="Enter Category Name" required>
                    <small id="categoryHelp" class="form-text text-muted">Category Name required.</small>
 
                </div>
                <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" id="status" name="status">
                    <label class="form-check-label" for="status">Check if active</label>
                </div>

                <div class="form-group row" id="drop-area">
                    <div class="container-fluid">
                        <div class="card border-success text-center mb-3">
                            <div class="card-header bg-transparent border-success">
                                <label for="insert_image">Add Image:</label>
                            </div>
                            <div class="card-body text-success" id="store_image">
                                <div class="row">
                                    <div class="col-md-2" style="margin-bottom:16px;">
                                        <img id="file-image" src="#" alt="Preview" class="hidden img-thumbnail" width=200>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer bg-transparent border-success">
                                <input type="file" id="insert_image" multiple accept="image/*" name="image" onchange="readURL(this, 'file-image');">
                            </div>
                        </div>
                    </div>
                </div>
               
                <div class="mx-auto">
                    <button type="submit" class="btn btn-primary text-right">Save</button>
                </div>
            </form>
        </div>
    </div>
        
</div>

<?php require_once VIEWS.'/admin/partials/_modal_crop.php'; ?>