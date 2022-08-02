
<form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ) ?>" >
    <div class="form-group d-flex">
        <label class="screen-reader-text" for="s">Поиск: </label>
    <input type="text" value="<?php echo get_search_query() ?>" name="s" id="s" class="form-control search_input" />
    <input type="submit" class="form-control btn btn-orange pt-1 pb-1" value="Искать">
    </div>
</form>
