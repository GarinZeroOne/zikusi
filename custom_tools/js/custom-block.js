//add block

jQuery('body').append('<!-- Custom options --><div id="custom_options"><a href="#" id="co_toggle" class="icon-cog"></a><div class="co_header"><h4 class="co_title"> Your Style</h4></div><div class="co_options"><form name="co_form"><div class="co_form_row"><span class="co_label">Select color theme:</span><div class="co_form_subrow"><select id="co_blog_theme" class="co_theme_selector"><option value="default" data-color="default" selected="selected">default</option><option value="yellowlight" data-color="yellowlight">Yellowlight</option><option value="yellowdark" data-color="yellowdark">Yellowdark</option><option value="orange" data-color="orange">Orange</option><option value="redlight" data-color="redlight">redlight</option><option value="green" data-color="green">Green</option><option value="regular" data-color="regular">Regular</option><option value="blue" data-color="blue">Blue</option><option value="dark" data-color="dark">Dark</option><option value="red" data-color="red">Red</option></select><span class="co_label_light">Content</span></div><div class="co_form_subrow"><select id="co_sidebar_main_theme" class="co_theme_selector"><option value="default" data-color="default" selected="selected">default</option><option value="yellowlight" data-color="yellowlight">Yellowlight</option><option value="yellowdark" data-color="yellowdark">Yellowdark</option><option value="orange" data-color="orange">Orange</option><option value="redlight" data-color="redlight">Redlight</option><option value="green" data-color="green">Green</option><option value="regular" data-color="regular">Regular</option><option value="blue" data-color="blue">Blue</option><option value="dark" data-color="dark">Dark</option><option value="red" data-color="red">Red</option></select><span class="co_label_light">Main sidebar</span></div><div class="co_form_subrow"><select id="co_sidebar_advert_theme" class="co_theme_selector"><option value="default" data-color="default" selected="selected">default</option><option value="yellowlight" data-color="yellowlight">Yellowlight</option><option value="yellowdark" data-color="yellowdark">Yellowdark</option><option value="orange" data-color="orange">Orange</option><option value="redlight" data-color="redlight">Redlight</option><option value="green" data-color="green">Green</option><option value="regular" data-color="regular">Regular</option><option value="blue" data-color="blue">Blue</option><option value="dark" data-color="dark">Dark</option><option value="red" data-color="red">Red</option></select><span class="co_label_light">Advert sidebar</span></div><div class="co_form_subrow"><select id="co_sidebar_footer_theme" class="co_theme_selector"><option value="default" data-color="default" selected="selected">default</option><option value="yellowlight" data-color="yellowlight">Yellowlight</option><option value="yellowdark" data-color="yellowdark">Yellowdark</option><option value="orange" data-color="orange">Orange</option><option value="redlight" data-color="redlight">Redlight</option><option value="green" data-color="green">Green</option><option value="regular" data-color="regular">Regular</option><option value="blue" data-color="blue">Blue</option><option value="dark" data-color="dark">Dark</option><option value="red" data-color="red">Red</option></select><span class="co_label_light">Footer sidebar</span></div></div><div class="co_form_row"><span class="co_label">Puzzles style:</span><div class="co_theme_apply"><a href="index3.html">Light</a><a href="index.html">Heavy</a></div></div><div class="co_form_row"><span class="co_label one_row">Page style:</span><select id="co_body_style" class="co_theme_selector"><option value="boxed" data-style="boxed">Boxed</option><option value="wide" data-style="wide" selected="selected">Wide</option><option value="fullwidth" data-style="fullwidth">Fullwidth</option></select></div><div class="co_form_row"><span class="co_label one_row">Background color:</span><div id="co_bg_color" class="iColorPicker"></div></div><div class="co_form_row"><span class="co_label">Background pattern:</span><div id="co_bg_pattern_list"  class="pattern_list"><a href="#" id="pattern_1" data-pat="bg_pattern_1" class="co_pattern_wrapper"><img src="images/bg/pattern_1_thumb2.png" /></a><a href="#" id="pattern_2" data-pat="bg_pattern_2" class="co_pattern_wrapper"><img src="images/bg/pattern_2_thumb2.png" /></a><a href="#" id="pattern_3" data-pat="bg_pattern_3" class="co_pattern_wrapper"><img src="images/bg/pattern_3_thumb2.png" /></a><a href="#" id="pattern_4" data-pat="bg_pattern_4" class="co_pattern_wrapper"><img src="images/bg/pattern_4_thumb2.png" /></a><a href="#" id="pattern_5" data-pat="bg_pattern_5" class="co_pattern_wrapper"><img src="images/bg/pattern_5_thumb2.png" /></a></div></div><div class="co_form_row"><span class="co_label">Background image:</span><div id="co_bg_images_list" class="pattern_list"><a href="#" id="image_1" data-pat="bg_image_1" class="co_image_wrapper"><img src="images/bg/image_1_thumb2.jpg" /></a><a href="#" id="image_2" data-pat="bg_image_2" class="co_image_wrapper"><img src="images/bg/image_2_thumb2.jpg" /></a><a href="#" id="image_3" data-pat="bg_image_3" class="co_image_wrapper"><img src="images/bg/image_3_thumb2.jpg" /></a></div></div></form></div></div><!-- End Custop Options -->');


//set cookie
jQuery(window).ready(function() {

    //Color Themes
    var co_blog_theme = jQuery.cookie('content_color');
    if (co_blog_theme != '' && co_blog_theme != undefined) {
        jQuery('#co_blog_theme option').removeAttr('selected');
        jQuery('#co_blog_theme option[data-color='+co_blog_theme+']').attr('selected', 'selected' );
        
    }

    var co_sidebar_main_theme = jQuery.cookie('main_sidebar_color');
    if (co_sidebar_main_theme != '' && co_sidebar_main_theme != undefined) {
        jQuery('#co_sidebar_main_theme option').removeAttr('selected');
        jQuery('#co_sidebar_main_theme option[data-color='+co_sidebar_main_theme+']').attr('selected', 'selected' );
    }

    var co_sidebar_advert_theme = jQuery.cookie('sidebar_advert_color');
    if (co_sidebar_advert_theme != '' && co_sidebar_advert_theme != undefined) {
        jQuery('#co_sidebar_advert_theme option').removeAttr('selected');
        jQuery('#co_sidebar_advert_theme option[data-color='+co_sidebar_advert_theme+']').attr('selected', 'selected' );
    }

    var co_sidebar_footer_theme = jQuery.cookie('footer_color');
    if (co_sidebar_footer_theme != '' && co_sidebar_footer_theme != undefined) {
        jQuery('#co_sidebar_footer_theme option').removeAttr('selected');
        jQuery('#co_sidebar_footer_theme option[data-color='+co_sidebar_footer_theme+']').attr('selected', 'selected' );
    }

        jQuery('#co_blog_theme').change(function() {
            jQuery('#co_blog_theme option:selected').each(function() {
                jQuery('body').removeClass('theme_regular theme_yellowlight theme_yellowdark theme_regular theme_orange theme_redlight theme_green theme_blue theme_dark theme_red');
                var theme_color = jQuery(this).attr('data-color');
                var theme_color2 = theme_color;
                if(theme_color == "default") theme_color2 = "regular";
                jQuery('body').addClass('theme_'+theme_color2);
                if(jQuery('#'+theme_color2+''.length)){
                    document.getElementById(theme_color2).remove();
                    var linkCss = '<link rel="stylesheet" href="css/themes/'+theme_color2+'.css" type="text/css" media="all" id="'+theme_color2+'" class="main_css" />';
                }
                jQuery('#main_style').after(linkCss); 
                setCookie('content_color', theme_color, 9999, '/');
                return false;
            });
        }).change();

        jQuery('#co_sidebar_main_theme').change(function() {
            jQuery('#co_sidebar_main_theme option:selected').each(function() {
                jQuery('#sidebar_main').removeClass('theme_regular theme_yellowlight theme_yellowdark theme_orange theme_redlight theme_green theme_blue theme_dark theme_red');
                var theme_color = jQuery(this).attr('data-color');
                var theme_color2 = theme_color;
                if(theme_color == "default") theme_color2 = "blue";
                jQuery('#sidebar_main').addClass('theme_'+theme_color2);                
                if(jQuery('#'+theme_color2+''.length)){
                    if(!jQuery('#'+theme_color2+'').hasClass('main_css')){
                        document.getElementById(theme_color2).remove();
                        var linkCss = '<link rel="stylesheet" href="css/themes/'+theme_color2+'.css" type="text/css" media="all" id="'+theme_color2+'" />';
                        jQuery('head').append(linkCss); 
                    }
                }
                setCookie('main_sidebar_color', theme_color, 9999, '/');
                return false;
            });
        }).change();

        jQuery('#co_sidebar_advert_theme').change(function() {
            jQuery('#co_sidebar_advert_theme option:selected').each(function() {
                jQuery('#advert_sidebar').removeClass('theme_regular theme_yellowlight theme_yellowdark theme_orange theme_redlight theme_green theme_blue theme_dark theme_red');
                var theme_color = jQuery(this).attr('data-color');
                var theme_color2 = theme_color;
                if(theme_color == "default") theme_color2 = "blue";
                jQuery('#advert_sidebar').addClass('theme_'+theme_color2);                
                if(jQuery('#'+theme_color2+''.length)){
                    if(!jQuery('#'+theme_color2+'').hasClass('main_css')){
                        document.getElementById(theme_color2).remove();
                        var linkCss = '<link rel="stylesheet" href="css/themes/'+theme_color2+'.css" type="text/css" media="all" id="'+theme_color2+'" />';
                        jQuery('head').append(linkCss); 
                    }
                }
                setCookie('sidebar_advert_color', theme_color, 9999, '/');
                return false;
            });
        }).change();

        jQuery('#co_sidebar_footer_theme').change(function() {
            jQuery('#co_sidebar_footer_theme option:selected').each(function() {
                jQuery('#footer_sidebar').removeClass('theme_yellowlight theme_yellowdark theme_orange theme_redlight theme_green theme_blue theme_dark theme_red');
                jQuery('#footer_copyright').removeClass('theme_yellowlight theme_yellowdark theme_orange theme_redlight theme_green theme_blue theme_dark theme_red');
                var theme_color = jQuery(this).attr('data-color');
                var theme_color2 = theme_color;
                if(theme_color == "default") theme_color2 = "dark";
                jQuery('#footer_sidebar').addClass('theme_'+theme_color2);
                jQuery('#footer_copyright').addClass('theme_'+theme_color2);
                if(jQuery('#'+theme_color2+''.length)){
                    if(!jQuery('#'+theme_color2+'').hasClass('main_css')){
                        document.getElementById(theme_color2).remove();
                        var linkCss = '<link rel="stylesheet" href="css/themes/'+theme_color2+'.css" type="text/css" media="all" id="'+theme_color2+'" />';
                        jQuery('head').append(linkCss); 
                    }
                }
                setCookie('footer_color', theme_color, 9999, '/');
                return false;
            });
        }).change();

    //Page Style

    var co_body_style = jQuery.cookie('body_style');
    if (co_body_style != '' && co_body_style != undefined) {
        jQuery('#co_body_style option').removeAttr('selected');
        jQuery('#co_body_style option[data-style='+co_body_style+']').attr('selected', 'selected' );
        puzzlesDimensions();
       
    }

     jQuery('#co_body_style').change(function() {
        jQuery('#co_body_style option:selected').each(function() {
            jQuery('body').removeClass('boxed wide fullwidth');
            var pageStyle = jQuery(this).attr('data-style');

            var pageHref = window.location.href;
            var lastSlash = pageHref.lastIndexOf("/");
            var readyHref = pageHref.substring(lastSlash+1);
            if(readyHref == 'index5.html'){
                jQuery('body').removeClass('boxed wide fullwidth');
                jQuery('body').addClass('fullwidth');
                jQuery('#advert_sidebar').addClass('theme_article');
                jQuery('.logo_text').addClass('logo-margin');
                puzzlesDimensions();
            }else{
                jQuery('body').addClass(pageStyle);
            }
            setCookie('body_style', pageStyle, 9999, '/');
            return false;
        });
    }).change();


    //Patterns

    var main_bg = jQuery.cookie('main_bg');
    if (main_bg != '' && main_bg != undefined ) {
        jQuery('body').removeClass('bg_image_1 bg_image_2 bg_image_3 bg_pattern_1 bg_pattern_2 bg_pattern_3 bg_pattern_4 bg_pattern_5');
        jQuery('#custom_options .pattern_list a').removeClass('selected');
        jQuery('#custom_options .pattern_list a[data-pat='+main_bg+']').addClass('current');
        jQuery('body').addClass(main_bg);
        jQuery('body').removeAttr("style");
    }

    jQuery('#custom_options .pattern_list a').click(function(){
        jQuery.removeCookie('main_color');
        var src = jQuery(this).attr('data-pat');
        jQuery('body').removeAttr("style");
        setCookie('main_bg', src, 9999, '/');
        return false;
    });


     //Main Color

    var main_color = jQuery.cookie('main_color');
    if (main_color != '' &&  !main_bg ) {
        jQuery('body').removeClass('bg_image_1 bg_image_2 bg_image_3 bg_pattern_1 bg_pattern_2 bg_pattern_3 bg_pattern_4 bg_pattern_5');
        jQuery('body').css('backgroundColor', main_color);
        jQuery('#co_bg_color').css('backgroundColor', main_color);
    }

    jQuery('.iColorPickerTable td').click(function(){
        jQuery('body').removeClass('bg_image_1 bg_image_2 bg_image_3 bg_pattern_1 bg_pattern_2 bg_pattern_3 bg_pattern_4 bg_pattern_5');
        jQuery.removeCookie('main_bg',{ path: '/' });
        var mainColor = jQuery(this).css('backgroundColor');
        jQuery('body').css('backgroundColor', mainColor);
        jQuery('#co_bg_color').css('backgroundColor', mainColor);
        setCookie('main_color', mainColor, 9999, '/');
        return false;
    });



});
