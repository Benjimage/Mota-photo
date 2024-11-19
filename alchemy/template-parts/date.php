<select name="date">
  <option value="" selected disabled>Date</option>
  <?php
  $args = array(
    'posts_per_page' => -1,
    'post_type' => 'photo',
    'orderby' => 'date',
    'order' => 'DESC',
    'date_query' => array(
      array(
        'column' => 'post_date_gmt',
        'before' => date('Y'), 
      ),
    ),
  );

  $posts = get_posts($args);

  foreach ($posts as $post) {
    setup_postdata($post);
    $date = get_the_date('Y', $post->ID);

    
    static $unique_dates = array();
    if (!in_array($date, $unique_dates)) {
      echo '<option value="' . $date . '">' . $date . '</option>';
      $unique_dates[] = $date;
    }
  }

  wp_reset_postdata();
  ?>
</select>