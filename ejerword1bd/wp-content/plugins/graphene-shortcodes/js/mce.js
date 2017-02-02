/* Handles the theme's shortcode buttons in the TinyMCE editor */
(function() {  

	tinyMCE.create('tinyMCE.plugins.grscShortCodes', {  
	
		init : function(ed, url) {  
			ed.addButton('warning', {  
				title : ed.getLang('grscmcebuttons.warning_title'),
				icon : 'exclamation-circle',
				onclick : function() {  
					 ed.selection.setContent('[warning]' + ed.selection.getContent() + '[/warning]');  
				}  
			});
			
			ed.addButton('error', {  
				title : ed.getLang('grscmcebuttons.error_title'), 
				icon : 'times-circle',  
				onclick : function() {  
					 ed.selection.setContent('[error]' + ed.selection.getContent() + '[/error]');  
				}  
			});
			
			ed.addButton('notice', {  
				title : ed.getLang('grscmcebuttons.notice_title'), 
				icon : 'info-circle', 
				onclick : function() {  
					 ed.selection.setContent('[notice]' + ed.selection.getContent() + '[/notice]');  
				}  
			});
			
			ed.addButton('important', {  
				title : ed.getLang('grscmcebuttons.important_title'), 
				icon : 'info-green-circle',
				onclick : function() {  
					 ed.selection.setContent('[important]' + ed.selection.getContent() + '[/important]');  
				}  
			});
			
			ed.addButton('pullquote', {  
				title : ed.getLang('grscmcebuttons.pullquote'), 
				image : url + '/images/pullquote.png',
				onclick : function() {  
					 ed.selection.setContent('[pullquote align="left|center|right" textalign="left|center|right" width="30%"]' + ed.selection.getContent() + '[/pullquote]');  
				}  
			});
		},  
		createControl : function(n, cm) {  
			return null;  
		},  
	});  
	tinyMCE.PluginManager.add('grscshortcodes', tinyMCE.plugins.grscShortCodes);  
})();