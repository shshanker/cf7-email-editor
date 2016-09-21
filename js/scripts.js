// A $( document ).ready() block.
jQuery( document ).ready(function($) {
	if(jQuery('#wpcf7-mail-use-html').is(":checked")) {
		init_cf7ee_tinyMCE();
	}
	$('#wpcf7-mail-use-html').change(function() {
       init_cf7ee_tinyMCE();
    });

});

function init_cf7ee_tinyMCE(){
	 if(jQuery('#wpcf7-mail-use-html').is(":checked")) {            
			tinyMCE.init({			        
			        mode : "exact",
			        elements : "wpcf7-mail-body",
			        height : "400", 
			        skin : "lightgray", 
			        theme : "modern", 
			        media_buttons : true, 
			        plugins: ["charmap,colorpicker,compat3x,directionality,hr,image,textcolor,wpautoresize,wpembed,wpemoji,wplink,wptextpattern,wpview,paste,media,fullscreen,tabfocus,wordpress,wpeditimage,wpgallery,wplink,wpdialogs" ],  
				    toolbar1: "formatselect,bold,italic,strikethrough,bullist,numlist,blockquote,hr,alignleft,aligncenter,alignright,link,unlink,wp_more,image,media,wp_adv",
				   	toolbar2: "fontselect,fontsizeselect,underline,alignjustify,forecolor,backcolor,pastetext,removeformat,charmap,outdent,indent,undo,redo,wp_help",
			        menubar: false,			       
			    });
        } else {
        	tinyMCE.remove();
        }
}