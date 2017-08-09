<?php get_header(); ?>

<div id="main_visual">
  <div id="main_background">
    <img src="http://change-to.com/wp-content/uploads/2017/08/changes.png" class="main_background_image"/>
  </div>
  </div>
  <!-- <div class="wrap">
    <h2><?php echo nl2br(get_option('top_catchcopy'));?></h2>
    <p><?php echo nl2br(get_option('top_description'));?></p>
  </div><!-- .wrap -->
</div>

<div id="content">

<div id="main">
  <div class="main-inner">

<div id="popular_post_content" class="front-loop">

<h2><i class="fa fa-flag"></i> 人気のある記事</h2>
<div class="wrap">
  <div class="front-loop-cont">
<?php
      $i = 1;
      if ( have_posts() ) :
        // wp_reset_query();

        $args=array(
            'meta_query'=>
            array(
              array(  'key'=>'bzb_show_toppage_flag',
                         'compare' => 'NOT EXISTS'
              ),
              array(  'key'=>'bzb_show_toppage_flag',
                        'value'=>'none',
                        'compare'=>'!='
              ),
             'relation'=>'OR'
          ),
            'showposts'=>3,
            'meta_key'=>'views',
            'orderby'=>'meta_value_num',
            'order'=>'DESC'
          );
        query_posts($args);
        // query_posts('showposts=5&meta_key=views&orderby=meta_value_num&order=DESC');
        while ( have_posts() ) : the_post();

        $cf = get_post_meta($post->ID);
        $rank_class = 'popular_post_box rank-'.$i;
        // print_r($cf);
?>

  <article id="post-<?php echo the_ID(); ?>" <?php post_class($rank_class); ?>>
    <a href="<?php the_permalink(); ?>" class="wrap-a">
      <div class="about-post">
      <?php if( get_the_post_thumbnail() ) { ?>
      <div class="post-thumbnail">
        <?php the_post_thumbnail('loop_thumbnail'); ?>
      </div>
      <?php } else{ ?>
        <figure class="eyecatch">
            <img src="<?php echo get_template_directory_uri(); ?>/lib/images/noimage.jpg" alt="noimage" width="800" height="533" />
        </figure>
      <?php } // get_the_post_thumbnail ?>
        <div class="detail-post">
          <h3><?php the_title(); ?></h3>
          <p class="p_category"><?php $cat = get_the_category(); $cat = $cat[0]; {
              echo $cat->cat_name;
            } ?></p>
          <p class="p_rank">NO.<span><?php echo $i; ?></span></p>
        </div>
      </div>
    </a>
  </article>

<?php
        $i++;
        endwhile;
      endif;
?>

</div><!-- /front-loop-cont -->

</div><!-- /wrap -->
</div><!-- popular_post_content -->

<div id="recent_post_content" class="front-loop">

<h2><i class="fa fa-clock-o"></i> 最近の投稿</h2>
<div class="wrap">
  <div class="front-loop-cont">
<?php
      $i = 1;
      wp_reset_query();

        $args=array(
            'meta_query'=>
            array(
              array(  'key'=>'bzb_show_toppage_flag',
                         'compare' => 'NOT EXISTS'
              ),
              array(  'key'=>'bzb_show_toppage_flag',
                        'value'=>'none',
                        'compare'=>'!='
              ),
             'relation'=>'OR'
          ),
            'showposts'=>10,
            'order'=>'DESC'
          );

      query_posts($args);

      if ( have_posts() ) :
        while ( have_posts() ) : the_post();

        $cf = get_post_meta($post->ID);
        $recent_class = 'popular_post_box recent-'.$i;
?>

  <article id="post-<?php echo the_ID(); ?>" <?php post_class($recent_class); ?>>
      <a href="<?php the_permalink(); ?>" class="wrap-a">
        <div class="about-post">
        <?php if( get_the_post_thumbnail() ) { ?>
        <div class="post-thumbnail">
        <?php the_post_thumbnail('loop_thumbnail'); ?>
        </div>
        <?php } else{ ?>
            <figure class="eyecatch">
              <img src="<?php echo get_template_directory_uri(); ?>/lib/images/noimage.jpg" alt="noimage" width="800" height="533" />
            </figure>
        <?php } // get_the_post_thumbnail ?>
        <div class="detail-post">
          <h3><?php the_title(); ?></h3>
          <p class="p_category"><?php $cat = get_the_category(); $cat = $cat[0]; {
          echo $cat->cat_name;
        } ?></p>
          <p class="p_date"><span class="date-y"><?php the_time('Y'); ?></span><span class="date-mj"><?php the_time('m/j'); ?></span></p></a>
        </div>
      </div>
  </article>

<?php
        $i++;
        endwhile;
      endif;
?>

</div><!-- /front-root-cont -->

</div><!-- /wrap -->
</div><!-- /recent_post_content -->



  </div><!-- /main-inner -->
</div><!-- /main -->

</div><!-- /content -->
<?php get_footer(); ?>
