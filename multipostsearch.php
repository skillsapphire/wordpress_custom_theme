<form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
<input type="text" name="s" id="s" 
    <?php if(is_search()) { ?>value="<?php the_search_query(); ?>" 
    <?php } else { ?>value="Enter keywords &hellip;" onfocus="if(this.value==this.defaultValue)this.value='';" 
    onblur="if(this.value=='')this.value=this.defaultValue;"<?php } ?> /><br />
     
<?php $query_types = get_query_var('post_type'); ?>
     
<input type="checkbox" name="post_type[]" value="doctor" 
<?php if (in_array('doctor', $query_types)) { echo 'checked="checked"'; } ?> /><label>Doctors</label>
<input type="checkbox" name="post_type[]" value="post" 
<?php if (in_array('post', $query_types)) { echo 'checked="checked"'; } ?> /><label>Blog</label>
<input type="checkbox" name="post_type[]" value="books" 
<?php if (in_array('books', $query_types)) { echo 'checked="checked"'; } ?> /><label>Books</label>
<input type="checkbox" name="post_type[]" value="videos" 
<?php if (in_array('videos', $query_types)) { echo 'checked="checked"'; } ?> /><label>Videos</label>
     
<input type="submit" id="searchsubmit" value="Search" />
</form>