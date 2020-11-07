<div class="col">
            
    <div class="card">
        <div class="card-header bg-primary text-white">
            <i class="fa fa-table"></i> <?php echo $title;?> <a href="/admin/products" class="float-right"><button class="btn btn-primary text-right"><span data-feather="arrow-left-circle"></span> Go Back</button></a>
        </div>
        <div class="card-body">
            <ul class="list-group">
                <li class="list-group-item active" aria-disabled="true"><?php echo $title;?></li>
                <li class="list-group-item">Name: <?=$product->name?></li>
                <li class="list-group-item">Status: <?=$product->status?></li>
                <li class="list-group-item">Picture: <?=$product->image?></li>
            </ul>
        </div>
    </div>
        
</div>
