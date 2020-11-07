<div class="col">
            
    <div class="card">
        <div class="card-header bg-primary text-white">
            <i class="fa fa-table"></i> <?php echo $title;?> <a href="/admin/brands" class="btn btn-info float-right"><span data-feather="arrow-left-circle"></span> Go Back</a>
        </div>
        <div class="card-body">
            <form action="/admin/brands/stote" method="POST">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" aria-describedby="brandHelp" placeholder="Enter brand Name" required>
                    <small id="brandHelp" class="form-text text-muted">brand Name required.</small>
 
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <input type="text" class="form-control" id="description" name="description" aria-describedby="brandHelp" placeholder="Enter brand Name" required>
                    <small id="brandHelp" class="form-text text-muted">brand Name required.</small>
 
                </div>
                <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" id="status" name="status">
                    <label class="form-check-label" for="status">Check if active</label>
                </div>
                
                <div class="mx-auto">
                    <button type="submit" class="btn btn-primary text-right">Save</button>
                </div>
            </form>
        </div>
    </div>
        
</div>
