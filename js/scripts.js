jQuery( document ).ready(function($) {
	
		//alert('changed');
	if(jQuery('#wpcf7-mail-use-html').is(":checked")) {
		init_cf7ee_tinyMCE();
		
	}
	$('#wpcf7-mail-use-html').change(function() {
       init_cf7ee_tinyMCE();
    });

});

function init_cf7ee_tinyMCE(){
	 if(jQuery('#wpcf7-mail-use-html').is(":checked")) {            
			
		tinymce.init( {
		        mode : "exact",
		        elements : 'wpcf7-mail-body',
		        theme: "modern",
		        skin: "lightgray",
		        menubar : false,
		        statusbar : false,
		        /*toolbar: [
		            "styleselect | bold italic | alignleft aligncenter alignright alignjustify | forecolor backcolor | bullist numlist | table | link image code"
		        ],*/
		        toolbar1 : 'template,|,bold,italic,strikethrough,bullist,numlist,blockquote,hr,alignleft,aligncenter,alignright,link,unlink,wp_more,spellchecker,wp_fullscreen,wp_adv',
		  		toolbar2 : 'formatselect,underline,alignjustify,forecolor,pastetext,removeformat,charmap,outdent,indent,undo,redo,wp_help',
		        plugins : "paste textcolor colorpicker wordpress fullscreen",
		        paste_auto_cleanup_on_paste : true,
		        paste_postprocess : function( pl, o ) {
		            o.node.innerHTML = o.node.innerHTML.replace( /&nbsp;+/ig, " " );
		        }
    } );
        } else {
        	tinymce.remove();
        }
}