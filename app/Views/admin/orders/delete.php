<div class="col">
            
    <div class="card">
        <div class="card-header bg-primary text-white">
            <i class="fa fa-table"></i>  <?= $title;?> <?= $category->name; ?> <a href="/admin/categories" class="float-right"><button class="btn btn-primary text-right"><span data-feather="arrow-left-circle"></span> Go Back</button></a>
        </div>
        <div class="card-body">
            <form class="form-horizontal" role="form" method="POST" action="/admin/categories/delete">
                <input type="hidden" name="id" value="<?=$category->id;?>">
                <div class="panel-body">
                    <div class="form-group">
                        <label class="col-sm-12 control-label"><h2>This category will be deleted! Are You Sure?</h2></label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                    <button name="submit" type="submit" class="save btn btn-danger">Delete Category</button>
                    <button name="reset" class="save btn btn-info">Cansel</button>
                    </div>
                </div>
            </form>
            
        </div>
    </div>
        
</div>
