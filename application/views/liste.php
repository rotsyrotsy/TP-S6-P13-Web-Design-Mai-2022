<section class="u-align-center u-clearfix u-palette-4-base u-section-2" id="carousel_be38">
      <div class="u-clearfix u-sheet u-valign-middle u-sheet-1">
        <h2 class="u-text u-text-default u-text-1" data-animation-name="customAnimationIn" data-animation-duration="1750" data-animation-delay="500">Actualités</h2><!--blog--><!--blog_options_json--><!--{"type":"Recent","source":"","tags":"","count":""}--><!--/blog_options_json-->
        <div class="u-blog u-expanded-width u-blog-1">
          <div class="u-repeater u-repeater-1"><!--blog_post-->
            
          <?php for($i=0; $i<count($liste); $i++){ ?>
          <div class="u-align-left u-blog-post u-container-style u-radius-15 u-repeater-item u-shape-round u-video-cover u-white u-repeater-item-1">
          <a href="<?php echo $liste[$i]['url']; ?>">    
          <div class="u-container-layout u-similar-container u-valign-top-sm u-valign-top-xs u-container-layout-1"><!--blog_post_image-->
                <img alt="" class="u-blog-control u-expanded-width-xs u-image u-image-default u-image-1" src="<?php echo site_url(); ?>assets/img/<?php echo $liste[$i]['image']; ?>" data-image-width="567" data-image-height="696" data-animation-name="customAnimationIn" data-animation-duration="1750" data-animation-delay="500"><!--/blog_post_image--><!--blog_post_header-->
                <h4 class="u-blog-control u-text u-text-body-color u-text-2">
                  <a class="u-post-header-link" href="#"><!--blog_post_header_content--><?php echo $liste[$i]['titre']; ?><!--/blog_post_header_content--></a>
                </h4><!--/blog_post_header--><!--blog_post_metadata-->
                <div class="u-blog-control u-metadata u-text-grey-30 u-metadata-1"><!--blog_post_metadata_date-->
                  <span class="u-meta-date u-meta-icon"><!--blog_post_metadata_date_content--><?php echo $liste[$i]['date']; ?><!--/blog_post_metadata_date_content--></span><!--/blog_post_metadata_date--><!--blog_post_metadata_comments-->
                  <span class="u-meta-comments u-meta-icon"><!--blog_post_metadata_comments_content-->Commentaires (0)<!--/blog_post_metadata_comments_content--></span><!--/blog_post_metadata_comments-->
                </div><!--/blog_post_metadata-->

              </div>
            </div><!--/blog_post--><!--blog_post-->
          </a>
          <?php } ?>
          
          </div>
        </div><!--/blog-->
        <a href="#" class="u-active-white u-border-2 u-border-active-white u-border-hover-white u-border-white u-btn u-btn-round u-button-style u-hover-white u-none u-radius-15 u-text-active-palette-4-base u-text-body-alt-color u-text-hover-palette-4-base u-btn-1">En voir plus</a>
      </div>
    </section>