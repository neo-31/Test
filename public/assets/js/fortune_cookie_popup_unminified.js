"use strict";
var translate = true; //set tot true to automatically translate content
var translatedElementName = 'fortune_popup'; //change the element name that should be translated
if(!window.jQuery)
{
   var script = document.createElement('script');
   script.type = "text/javascript";
   script.src = "https://code.jquery.com/jquery-3.1.1.min.js";
   ( document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0] ).appendChild( script );
   if(translate == true)
   {
       var script2 = document.createElement('script');
       script2.type = "text/javascript";
       script2.src = "//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit";
       ( document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0] ).appendChild( script2 );
       var userLang = navigator.language || navigator.userLanguage || navigator.languages; 
       if (userLang.substr(0,2) != "en"){
           function googleTranslateElementInit() {
               new google.translate.TranslateElement({pageLanguage: 'en', layout: 
               google.translate.TranslateElement.FloatPosition.TOP_LEFT}, translatedElementName);
           }
       }
       else 
       { 
           document.getElementById(translatedElementName).style.display="none";
       }
   }
}
function getCookie(cname) {
            var name = cname + "=";
            var ca = document.cookie.split(';');
            for(var i = 0; i < ca.length; i++) {
                var c = ca[i];
                while (c.charAt(0) == ' ') {
                    c = c.substring(1);
                }
                if (c.indexOf(name) == 0) {
                    return c.substring(name.length, c.length);
                }
            }
            return "";
}
function replaceAll(str, find, replace) {
  return str.replace(new RegExp(find, 'g'), replace);
}
$(document).ready(function() {
    
        if (!window.$useCookies) 
        {
            window.$useCookies = 'on'; //if you set this to 'false', you can disable cookie placement. In this case, the popup will be shown every time a visitor refreshes your website, regardless if he already accepted or not cookies
        }
        if (!window.$custom_css) 
        {
            window.$custom_css = ''; // custom css code that can be added here
        }
        if (!window.$auto_accept) 
        {
            window.$auto_accept = 'on'; // do you want to auto accept the cookies when popup is automatically hidden (if $auto_hide is set to 'on')?
        }
        if (!window.$auto_hide) 
        {
            window.$auto_hide = 'off'; // do you want to automatically hide the popup after a period of time?
        }
        if (!window.$auto_hide_time) 
        {
            window.$auto_hide_time = '5000'; // time in milliseconds after the popup is automatically closed, if $auto_accept is set to 'on'
        }
        if (!window.$button_border) 
        {
            window.$button_border = '3px'; //the border thickness of the buttons
        }
        if (!window.$fade_background) 
        {
            window.$fade_background = 'off'; // set this to 'on' to fade the background of the popup
        }
        if (!window.$cookie_exp) 
        {
            window.$cookie_exp = '14400';// time before cookie set by this script expires
        }
        if (!window.$animation) 
        {
            window.$animation = 'fortune_no_anim';//animation type when popup closes: 'fortune_no_anim' - no admin, 'fortune_fade_anim' - fade out, 'fortune_slide_anim' - slide up/slide down
        }
        if (!window.$outside_close) 
        {
            window.$outside_close = 'on';//do you want to close the popup if the user clicks outside the popup area (works only if '$fade_background' is set to 'on')
        }
        if (!window.$outside_accept) 
        {
            window.$outside_accept = 'on';//do you want to also accept cookies if popup is closed by clicking outside the popup (only if '$outside_close' is set to 'on')
        }
        if (!window.$background_style) 
        {
            window.$background_style = 'fortune_color';//background type of the popup - values are: 'fortune_color' - to display a solid color background, 'fortune_transparent' - to display a transparent background and 'fortune_image' - to display an image as the popup background
        }
        if (!window.$max_height) 
        {
            window.$max_height = '';//maximum height that the popup can reach
        }
        if (!window.$font_size) 
        {
            window.$font_size = '14px';//font size of the popup
        }
        if (!window.$font_type) 
        {
            window.$font_type = 'Poppins, sans-serif';//font type of the popup
        }
        if (!window.$stick) 
        {
            window.$stick = 'on';//do you want to make the popup stick to it's position when the user scrolls? set this to 'off' to place the popup on the page and the user can scroll and make it dissapear
        }
        if (!window.$dist_top) 
        {
            // window.$dist_top = '300px';//distance of the top margin of the popup to the top margin of the page - can be in pixels, % or any other value valid in CSS
            window.$dist_top = '270px';//distance of the top margin of the popup to the top margin of the page - can be in pixels, % or any other value valid in CSS
        }
        if (!window.$dist_bot) 
        {
            window.$dist_bot = 'auto';//distance of the bottom margin of the popup to the bottom margin of the page - can be in pixels, % or any other value valid in CSS
        }
        if (!window.$dist_left) 
        {
            window.$dist_left = '50px';//distance of the left margin of the popup to the left margin of the page - can be in pixels, % or any other value valid in CSS
        }
        if (!window.$dist_right) 
        {
            window.$dist_right = '50px';//distance of the right margin of the popup to the right margin of the page - can be in pixels, % or any other value valid in CSS
        }
        if (!window.$rounded_corners) 
        {
            window.$rounded_corners = 'on';//do you want to make the popup have round corners?
        }
        if (!window.$max_width) 
        {
            window.$max_width = '';//maximum width of the popup - applicable when the user has a wide screen
        }
        if (!window.$border) 
        {
            window.$border = 'off';//do you want to show a border for the popup?
        }
        if (!window.$border_width) 
        {
            window.$border_width = 'border_width';//the width of the popup border - only active when $border is set to 'on'
        }
        if (!window.$border_color) 
        {
            // window.$border_color = '#00ff00';// the color of the popup - only active when $border is set to 'on'
            window.$border_color = '#E0C463';// the color of the popup - only active when $border is set to 'on'
        }
        if (!window.$text_col) 
        {
            window.$text_col = '#000000';// the color of the text in the popup
        }
        if (!window.$background) 
        {
            window.$background = '#ffffff';//the background of the popup - only aplicable when $background_style is set to 'fortune_color'
        }
        if (!window.$center_popup) 
        {
            window.$center_popup = 'on';//enable this only if you want to center the popup in the middle of the screen. Note that for this to work, $dist_left must be set to 50%.
        }
        if (!window.$background_image) 
        {
            window.$background_image = '';//the URL of the image which will be set as the background of the popup - aplicable only when $background_style is set to 'fortune_image'
        }
        if (!window.$dist_padding) 
        {
            window.$dist_padding = '10px';// the padding of the text - increase this value to increase the size of the popup without inceasing font size
        }
        if (!window.$more_link) 
        {
            window.$more_link = 'http://www.whatarecookies.com/'; // the link where to user will be taken when he clicks on the 'More Info' button - only applicable when $more_info is set to 'on'
        }
        if (!window.$font_bold) 
        {
            window.$font_bold = 'on';//do you want to make fonts bold?
        }
        if (!window.$font_italic) 
        {
            window.$font_italic = 'off';//do you want to make fonts italic?
        }
        if (!window.$font_underline) 
        {
            window.$font_underline = 'off';//do you want to make fonts underlined?
        }
        if (!window.$message) 
        {
            window.$message = 'We use cookies to improve our site and your shopping experience. By continuing to browse our site you accept our cookie policy.';//the main message of the popup
        }
        if (!window.$buttons_on_new_line) 
        {
            window.$buttons_on_new_line = 'on';//do you want to put buttons on a new line in the popup?
        }
        if (!window.$more_info) 
        {
            window.$more_info = 'off';//do you want to enable the 'More Info' button in your popup?
        }
        if (!window.$buttons) 
        {
            window.$buttons = 'on';//do you want to show buttons in your popup? If you set this to 'off', links will be shown instead of buttons
        }
        if (!window.$button_background) 
        {
            window.$button_background = '#E0C463';//the background color of the buttons in your popup - only applicable when $buttons is set to 'on'
        }
        if (!window.$links_col) 
        {
            window.$links_col = '#000000';//the color of the links and button texts
        }
        if (!window.$more_info_text) 
        {
            window.$more_info_text = 'Find out more';// the text show in the 'More Info' button - only applicable when $more_info is set to 'on'
        }
        if (!window.$buttons_on_new_line_all) 
        {
            window.$buttons_on_new_line_all = 'off';//do you want to show EVERY button on a new line? Only applicable when $buttons_on_new_line is set to 'on'
        }
        if (!window.$deny_button) 
        {
            window.$deny_button = 'on';//do you want to enable the 'Deny' button?
        }
        if (!window.$deny_text) 
        {
            window.$deny_text = 'Decline';// the text of the 'Deny' button - only applicable when $deny_button is set to 'on'
        }
        if (!window.$close_message) 
        {
            window.$close_message = 'Accept';//the text of the 'Accept Cookies' button
        }
		var $body = $('body'), $modal;
        if($useCookies === 'on')
        {
            var cook = getCookie("fortune_show");
            if (cook != "") 
            {
                return;
            }
        }
        var $toFade = "";
        $modal = "";
        $modal += "&lt;style&gt;.link_button {-webkit-border-radius: 4px;-moz-border-radius: 4px;border-radius: 4px;border: solid 1px " + $button_border + ";text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.4);-webkit-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.4), 0 1px 1px rgba(0, 0, 0, 0.2);-moz-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.4), 0 1px 1px rgba(0, 0, 0, 0.2);box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.4), 0 1px 1px rgba(0, 0, 0, 0.2);background: #4479BA;color: #FFF;padding: 8px 10px;text-decoration: none;}";
        if($custom_css !== '' && $custom_css !== null)
        {
            $modal += $custom_css;
        }
        $modal += "&lt;/style&gt;&lt;script&gt;var myVar;&lt;/script&gt;";
        if($auto_hide === 'on')
        {
            if($auto_accept === 'on')
            {
                $modal += "&lt;script&gt;myVar=setTimeout(function() { clickClose(); }, " + $auto_hide_time + ")&lt;/script&gt;";
            }
            else
            {
                $modal += "&lt;script&gt;myVar=setTimeout(function() { clickDeny(); }, " + $auto_hide_time + ")&lt;/script&gt;";
            }
        }
        $modal += "&lt;script&gt;function setCookie(cname, cvalue, exminutes) {";
        $modal += "var d = new Date();d.setTime(d.getTime() + (exminutes*60*1000));var expires = 'expires='+d.toUTCString();document.cookie = cname + '=' + cvalue + ';' + expires + ';path=/';}function clickClose(){setCookie('fortune_show', 1, " + $cookie_exp + ");";
        if($fade_background === 'on')
        {
            $toFade = "#fortune-overlay";
        }
        else
        {
            $toFade = "#note";
        }
        if($animation === 'fortune_no_anim')
        {
            $modal += 'jQuery("' + $toFade + '").hide();';
        }
        else{
            if($animation === 'fortune_slide_anim')
            {
                $modal += 'jQuery("' + $toFade + '").slideUp();';
            }
            else
            {
                $modal += 'jQuery("' + $toFade + '").fadeOut();';
            }
        }
        $modal += '}function clickDeny(){';
        if($fade_background === 'on')
        {
            $toFade = "#fortune-overlay";
        }
        else
        {
            $toFade = "#note";
        }
        
        if($animation === 'fortune_no_anim')
        {
            $modal += 'jQuery("' + $toFade + '").hide();';
            if($toFade === "#fortune-overlay")
            {
                $modal += 'jQuery("#note").hide();';
            }
        }
        else
        {
            if($animation === 'fortune_slide_anim')
            {
                $modal += 'jQuery("' + $toFade + '").slideUp();';
                if($toFade === "#fortune-overlay")
                {
                    $modal += 'jQuery("#note").slideUp();';
                }
            }
            else
            {
                $modal += 'jQuery("' + $toFade + '").fadeOut();';
                if($toFade === "#fortune-overlay")
                {
                    $modal += 'jQuery("#note").fadeOut();';
                }
            }
        }
        $modal += '}function cancelBubble(e) {var evt = e ? e:window.event;if (evt.stopPropagation)    evt.stopPropagation();if (evt.cancelBubble!=null) evt.cancelBubble = true;}&lt;/script&gt;';
        if($fade_background == 'on')
        {
            $modal += '&lt;div class="fortune-overlay" id="fortune-overlay" style="z-index:9999999999;background: rgba(0,0,0,0.8)"';
            if($outside_close === 'on')
            {
                if($outside_accept === 'on')
                {
                    $modal += ' onclick="clickClose()"';
                }
                else
                {
                    $modal += ' onclick="clickDeny()"';
                }
            }
            $modal += '&gt;';
        }
        $modal += '&lt;div name="note" onclick="cancelBubble(event)" class="fortune_popup" id="note" style="';
        $modal += 'max-height:' + $max_height + ';';
        $modal += 'font-size:' + $font_size + ';';
        $modal += 'font-family:' + $font_type + ';';
        if($stick === 'on')
        {
            $modal += 'position: fixed;';
        }
        else
        {
            $modal += 'position: absolute;';
        }
        if($dist_top !== '')
        {
            $modal += 'top: '+ $dist_top + ';';
        }
        if($dist_bot !== '')
        {
            $modal += 'bottom: '+ $dist_bot + ';';
        }
        if($dist_left !== '')
        {
            $modal += 'left: '+ $dist_left + ';';
        }
        if($dist_right !== '')
        {
            $modal += 'right: '+ $dist_right + ';';
        }
        if($rounded_corners === 'on')
        {
            // $modal += 'border-radius: 25px;';
            $modal += 'border-radius: 20px;';
        }
        $modal += 'height:auto;max-width: ' + $max_width + ';';
        if($border === 'on')
        {
            $modal += 'border-style: solid;border-width: ' + $border_width + ';border-color: ' + $border_color + ';';
        }
        
        $modal += 'color: ' + $text_col + ';';
        if($background_style === 'fortune_color')
        {
            $modal += 'background: '+ $background + ';';
        }
        if($background_style === 'fortune_transparent')
        {
            $modal += 'background: transparent;';
        }
        if($background_style === 'fortune_image' && $background_image !== '')
        {
            $modal += 'background: '+ $background + ';background-image: url(&quot;' + $background_image + '&quot;);background-size: 100% 100%;-webkit-background-size: 100% 100%;-moz-background-size: 100% 100%;-o-background-size: 100% 100%;';
        }
        if($center_popup === 'on' && $dist_left === '50%')
        {
            $modal += 'transform: translate(-50%, 0);';
        }
        $modal += '"&gt;';
        $modal += '&lt;p style="';
        if($background_style === 'fortune_color')
        {
            $modal += 'background: '+ $background + ';';
        }
        if($background_style === 'fortune_transparent')
        {
            $modal += 'background: transparent;';
        }
        if($background_style === 'fortune_image' && $background_image !== '')
        {
            $modal += 'background: '+ $background + ';background-image: url(&quot;' + $background_image + '&quot;);background-size: 100% 100%;-webkit-background-size: 100% 100%;-moz-background-size: 100% 100%;-o-background-size: 100% 100%;';
        }
        $modal += 'font-size:' + $font_size + ';font-family:' + $font_type + ';color: ' + $text_col + ';margin: 0 0 0;';
        $modal += 'padding: ' + $dist_padding + '"&gt;';
        if($font_bold === 'on')
        {
            $modal += '&lt;b&gt;';
        }
        if($font_underline === 'on')
        {
            $modal += '&lt;u&gt;';
        }
        if($font_italic === 'on')
        {
            $modal += '&lt;i&gt;';
        }
        $modal += $message;
        if($font_italic === 'on')
        {
            $modal += '&lt;/i&gt;';
        }
        if($font_underline === 'on')
        {
            $modal += '&lt;/u&gt;';
        }
        if($font_bold === 'on')
        {
            $modal += '&lt;/b&gt;';
        }
        if($buttons_on_new_line === 'on')
        {
            $modal += '&lt;br/&gt;';
        }
        if($more_info === 'on')
        {
            $modal += ' &lt;a target="_blank" href="' + $more_link + '"';
            if($buttons === 'on')
            {
                $modal += ' class="link_button" ';
            }
            $modal += 'style="white-space: nowrap;cursor: pointer;';
            if($buttons === 'on')
            {
                $modal += 'background: ' + $button_background + ';';
            }
            $modal += 'color: ' + $links_col + '"&gt;' + $more_info_text + '&lt;/a&gt;';
        }
        if($buttons_on_new_line === 'on' && $buttons_on_new_line_all === 'on')
        {
            $modal += '&lt;br/&gt;';
        }
        $modal += ' &lt;a id="close" ';
        if($buttons === 'on')
        {
            $modal += 'class="link_button" ';
        }
        $modal += 'style="white-space: nowrap;cursor: pointer;';
        if($buttons === 'on')
        {
            $modal += 'background: ' + $button_background + ';';
        }
        $modal += 'color: ' + $links_col + '" onclick="clearTimeout(myVar);clickClose()"&gt;' + $close_message + '&lt;/a&gt;';
        if($deny_button === 'on')
        {
            if($buttons_on_new_line === 'on' && $buttons_on_new_line_all === 'on')
            {
                $modal += '&lt;br/&gt;';
            }
            $modal += ' &lt;a id="deny" ';
            if($buttons === 'on')
            {
                $modal += 'class="link_button" ';
            }
            $modal += 'style="white-space: nowrap;cursor: pointer;';
            if($buttons === 'on')
            {
                $modal += 'background: ' + $button_background + ';';
            }
            $modal += 'color: ' + $links_col + '" onclick="clearTimeout(myVar);clickDeny()"&gt;' + $deny_text + '&lt;/a&gt;';
        }
        $modal += '&lt;/p&gt;&lt;/div&gt;';
        if($fade_background == 'on')
        {
            $modal += '&lt;/div&gt;';
        }
        $modal = replaceAll($modal, "&gt;", ">");
        $modal = replaceAll($modal, "&lt;", "<");
        $body.append($modal);   
	});