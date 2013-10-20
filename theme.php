<?php

global $newsletter; // Newsletter object

global $post; // Current post managed by WordPress



/*

 * Some variabled are prepared by Newsletter Plus and are available inside the theme,

 * for example the theme options used to build the email body as configured by blog

 * owner.

 *

 * $theme_options - is an associative array with theme options: every option starts

 * with "theme_" as required. See the theme-options.php file for details.

 * Inside that array there are the autmated email options as well, if needed.

 * A special value can be present in theme_options and is the "last_run" which indicates

 * when th automated email has been composed last time. Is should be used to find if

 * there are now posts or not.

 *

 * $is_test - if true it means we are composing an email for test purpose.

 */





// This array will be passed to WordPress to extract the posts

$filters = array();



// Maximum number of post to retrieve

$filters['showposts'] = (int)$theme_options['theme_max_posts'];

if ($filters['showposts'] == 0) $filters['showposts'] = 10;





// Include only posts from specified categories. Do not filter per category is no

// one category has been selected.

if (is_array($theme_options['theme_categories'])) {

    $filters['cat'] = implode(',', $theme_options['theme_categories']);

}



// Retrieve the posts asking them to WordPress

$posts = get_posts($filters);



?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>

<head>

  <title>Ruby Gettinger</title>
<style>

.read-more a{
	color:#A5007E;
	
}</style>
</head>



<body>

<table bgcolor="white" width="100%" cellpadding="20" cellspacing="0" border="0">

    <tr>

        <td align="center">

            <table width="700" bgcolor="#FFF8FD" align="center" cellspacing="10" cellpadding="0" style="border: 1px solid #666;">
<tr><td>    <p style="text-align: right; padding-right:20px; padding-top:10px;"><a target="_blank"  href="{email_url}" style="text-decoration:none; color:#60b224;">View this email online</a></p></td></tr>
          <tr>

              <td style="padding-left:10px;">

                                <img src="http://rubygettinger.net/assets/sites/23/2013/09/cropped-ruby_gettinger_facebook_twitter_logo_georgia_weightloss_visalus4.png" width="400"/>

              </td>

          </tr>


          <tr>

              <td style="font-size: 14px; color: #666; padding-left:10px;">

                  <p>Dear {name}, here's an update from <?php echo get_option('blogname'); ?>.</p>

              </td>

          </tr>

            <?php

            // Do not use &post, it leads to problems...

            foreach ($posts as $post) {



                // Setup the post (WordPress requirement)

                setup_postdata($post);



                // The theme can "suggest" a subject replacing the one configured, for example. In this case

                // the theme, is there is no subject, suggest the first post title.

                if (empty($theme_options['subject'])) $theme_options['subject'] = $post->post_title;



                // Extract a thumbnail, return null if no thumb can be found

                $image = nt_post_image(get_the_ID());

            ?>

          <tr><td><table width="100%"><tr>

              <td style="font-size: 14px; color: #666; padding-left:10px;">

                    <?php if ($image != null) { ?>

                    <img src="<?php echo $image; ?>" alt="picture" align="left" width="125"/>

                    <?php } ?>
</td><td valign="top" style="font-size: 14px; color: #666; padding-left:10px;">
                 <a target="_tab" href="<?php echo get_permalink(); ?>" style="font-size: 16px; text-decoration:none; color:#60b224; font-weight:bold;"><?php the_title(); ?></a><br/>



                  <?php the_excerpt(); ?>

              </td>

          </tr>

</table></td></tr>
          <?php

}

?>

<br/>


      </table>
   <!-- Social -->
                            <table cellpadding="5" align="center" width="700" style="background-color:#A5007E;">
                                <tr>
                                    <td style="text-align: center; vertical-align: top; " align="center" valign="top">
                                        <a href="https://www.facebook.com/RubysOfficialpage">
                                            <img src="<?php echo $theme_url?>/images/facebook.png">
                                        </a>
                                    </td>
                                    
                                    <td style="text-align: center; vertical-align: top" align="center" valign="top">
                                        <a href="http://twitter.com/RubyGettinger_">
                                            <img src="<?php echo $theme_url?>/images/twitter_white.png">
                                        </a>
                                    </td>
                                    
                                    <td style="text-align: center; vertical-align: top" align="center" valign="top">
                                        <a href="http://instagram.com/rubygettinger/">
                                            <img src="<?php echo $theme_url?>/images/instagram.png">
                                        </a>
                                    </td>
                                    
                                    <td style="text-align: center; vertical-align: top" align="center" valign="top">
                                        <a href="http://www.youtube.com/writerubygettinger">
                                            <img src="<?php echo $theme_url?>/images/youtube.png">
                                        </a>
                                    </td>
                               
                                    <td style="text-align: center; vertical-align: top" align="center" valign="top">
                                        <a href="http://pinterest.com/rubygettinger/">
                                            <img src="<?php echo $theme_url?>/images/pinterest.png">
                                        </a>
                                    </td>
                                    <td style="text-align: center; vertical-align: top" align="center" valign="top">
                                        <a href="http://www.whosay.com/rubygettinger">
                                            <img src="<?php echo $theme_url?>/images/whosay.png">
                                        </a>
                                    </td>
                                    <td style="text-align: center; vertical-align: top" align="center" valign="top">
                                        <a href="http://www.linkedin.com/pub/ruby-gettinger/28/4a4/468">
                                            <img src="<?php echo $theme_url?>/images/linkedin.png">
                                        </a>
                                    </td>

                                    
                                </tr>
                            </table>

<table width="700">          <tr>

              <td style="border-top: 1px solid #eee; border-bottom: 1px solid #eee; font-size: 12px; color:#999; text-align:center;">

                  You received this email because you subscribed for it as {email}. If you'd like, you can <a target="_tab" href="{unsubscription_url}" >unsubscribe</a>.

              </td>

          </tr></table>
        </td>

    </tr>

</table>

      </body>

</html>