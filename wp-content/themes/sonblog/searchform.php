<form class="form-horizontal" action="<?php echo home_url('/');?>" method="get">
    <div class="form-group">
        <input type="search" class="form-control" name="s" value="<?php echo get_search_query();?>">
    </div>
    <div class="form-group">
        <button class="btn btn-primary" type="submit">Ir</button>
    </div>
</form>