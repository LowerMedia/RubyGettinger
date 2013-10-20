<?php
/*
 * Some variables are already defined:
 *
 * - $theme_options An array with all theme options
 * - $theme_url Is the absolute URL to the theme folder used to reference images
 * - $theme_subject Will be the email subject if set by this theme
 *
 */

global $newsletter, $post;

$color = $theme_options['theme_color'];
if (empty($color)) $color = '#0088cc';

if (isset($theme_options['theme_posts'])) {
    $filters = array();
    
    if (empty($theme_options['theme_max_posts'])) $filters['showposts'] = 10;
    else $filters['showposts'] = (int)$theme_options['theme_max_posts'];
    
    if (!empty($theme_options['theme_categories'])) {
        $filters['category__in'] = $theme_options['theme_categories'];
    }
    
    if (!empty($theme_options['theme_tags'])) {
        $filters['tag'] = $theme_options['theme_tags'];
    }
    
    if (!empty($theme_options['theme_post_types'])) {
        $filters['post_type'] = $theme_options['theme_post_types'];
    }    
    
    $posts = get_posts($filters);
}

?><!DOCTYPE html>
<html>
    <head>
    </head>
    <body style="background-color: #ddd; font-family: Helvetica Neue, Helvetica, Arial, sans-serif; font-size: 14px; color: #666; margin: 0 auto; padding: 0;">
        <br>
        <table align="center" width="700">
            <tr>
                <td style="font-family: Helvetica Neue, Helvetica, Arial, sans-serif; font-size: 14px; color: #666;">
                    <div style="text-align: left; background-color: #fff; ">
                                                    <p style="text-align: right;"><a target="_blank"  href="{email_url}" style="text-decoration:none; color:#60b224;">View this email online</a></p>
                       
                        <div style="padding: 10px 20px; color: #000; font-size: 20px; background-color: #FFF8FD; border-bottom: 1px solid #ddd">
                          <img src="http://rubygettinger.net/assets/sites/23/2013/09/cropped-ruby_gettinger_facebook_twitter_logo_georgia_weightloss_visalus4.png" width="400"/>
                        </div>
                        
                        
                        <div style="padding: 20px; background-color: #FFF8FD; line-height: 18px">



                            <?php if (empty($posts)) { ?>
                            <p>Here you can start to write your message. Be polite with your readers! Do not forget the subsject of this message.</p>
                            <?php } else { ?>
                            <table cellpadding="5">
                                <?php foreach ($posts as $post) { setup_postdata($post); ?>
                                    <tr>
                                           <?php if ($image != null) { ?>
                                        <td>   <img src="<?php echo $image; ?>" alt="picture" align="left" width="75"/></td>
                                        <?php } ?>
                                        <td valign="top">
                                            <a target="_blank"  href="<?php echo get_permalink(); ?>" style="font-size: 20px; line-height: 26px; text-decoration:none; color:#60b224;"><?php the_title(); ?></a>
                                            <?php if (isset($theme_options['theme_excerpts'])) the_excerpt(); ?>
   <?php the_excerpt(); ?></td>
                                    </tr>
                                <?php } ?>
                            </table>
                            <?php } ?>
                            
                            <!-- Social -->
                            <table cellpadding="5" align="center" width="100%" style="background-color:#A5007E;">
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

                            <p>To change your subscription, <a target="_blank"  href="{profile_url}" style="text-decoration:none; color:#60b224;">click here</a>.
                        </div>

                    </div>
                </td>
            </tr>
        </table>
    </body>
</html>