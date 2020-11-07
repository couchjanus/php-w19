<div class="col">
            
    <div class="card">
        <div class="card-header bg-primary text-white">
            <i class="fa fa-table"></i> <?php echo $title;?> <a href="/admin/categories" class="float-right"><button class="btn btn-primary text-right"><span data-feather="arrow-left-circle"></span> Go Back</button></a>
        </div>
        <div class="card-body">
            <form action="/admin/categories/update" method="POST">
            <input type="hidden" name="id" value="<?=$category->id;?>">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" aria-describedby="categoryHelp" value="<?=$category->name?>" required>
                    <small id="categoryHelp" class="form-text text-muted">Category Name required.</small>
 
                </div>
                <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" id="status" name="status" <?php echo ($category->status==1)? 'checked': '' ?>>
                    <label class="form-check-label" for="status">Check if active</label>
                </div>
                
                <div class="mx-auto">
                    <button type="submit" class="btn btn-primary text-right">Update</button>
                </div>
            </form>
        </div>
    </div>
        
</div>
