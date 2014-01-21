(function() {
	   tinymce.create('tinymce.plugins.shortcodes', {

	      init : function(ed, url) {

	         ed.addButton('row', {
	            title : 'Row',
	            image : url+'/images/row.jpg',
	            onclick : function() {
	               ed.execCommand('mceInsertContent', false, '[row additional_class=""][/row]');
	            }
	         });

	         ed.addButton('columns', {
	            title : 'Columns',
	            image : url+'/images/col.jpg',
	            onclick : function() {
	               ed.execCommand('mceInsertContent', false, '[columns span="6" start_animation ="" end_animation="" animate_in="" animate_out="" additional_class="" animation_preset=""][/columns]');
	            }
	         });

	         ed.addButton('skillset', {
	            title : 'Skill Set',
	            image : url+'/images/favorites.png',
	            onclick : function() {
	               ed.execCommand('mceInsertContent', false, '[skillset][skill start_animation="" end_animation="" size="" color=""][/skill][/skillset]');
	            }
	         });

	         ed.addButton('portfolio', {
	            title : 'Portfolio Grid',
	            image : url+'/images/portfolio.png',
	            onclick : function() {
	               ed.execCommand('mceInsertContent', false, '[portfolio]');
	            }
	         });

	         ed.addButton('team', {
	            title : 'Add Team',
	            image : url+'/images/team.png',
	            onclick : function() {
	               ed.execCommand('mceInsertContent', false, '[team_member start_animation="" end_animation="" animate_in="" animate_out="" animation_preset=""][member_name designation=""][/member_name][member_image image="PATH"][/member_image][member_description][/member_description][member_social facebook="" twitter="" linkedin=""][/member_social][/team_member]');
	            }
	         });

	         ed.addButton('contact', {
	            title : 'Contact form',
	            image : url+'/images/contactform.png',
	            onclick : function() {
	               ed.execCommand('mceInsertContent', false, '[contactform]');
	            }
	         });

	         ed.addButton('testimonial', {
	            title : 'Testimonial',
	            image : url+'/images/chat.png',
	            onclick : function() {
	               ed.execCommand('mceInsertContent', false, '[testimonial start_animation="" end_animation="" client_name="" company=""]CONTENT HERE[/testimonial]');
	            }
	         });

	         ed.addButton('flipbox', {
	            title : 'Flip Box',
	            image : url+'/images/box_open.png',
	            onclick : function() {
	               ed.execCommand('mceInsertContent', false, '[flipbox start_animation="" end_animation="" type="01/02/03" title=""]CONTENT HERE[/flipbox]');
	            }
	         });

	         ed.addButton('carousel', {
	            title : 'Carousel',
	            image : url+'/images/carousel.png',
	            onclick : function() {
	               ed.execCommand('mceInsertContent', false, '[carousel unique_id="" slides_count="" pagination="" pagination_position="" nextprev=""][carousel_image active=""]Your Image[/carousel_image][/carousel]');
	            }
	         });

	         ed.addButton('project_spec', {
	            title : 'Project Spec',
	            image : url+'/images/project_spec.png',
	            onclick : function() {
	               ed.execCommand('mceInsertContent', false, '[project_specs][spec title=""]CONTENT[/spec][/project_specs]');
	            }
	         });

	         ed.addButton('amazebutton', {
	            title : 'Amaze Button',
	            image : url+'/images/btn.png',
	            onclick : function() {
	               ed.execCommand('mceInsertContent', false, '[amaze_link_btn link="full link"]TEXT[/amaze_link_btn]');
	            }
	         });

	         ed.addButton('twitterfeed', {
	            title : 'Twitter Feed',
	            image : url+'/images/twitter.png',
	            onclick : function() {
	               ed.execCommand('mceInsertContent', false, '[twitterfeed]');
	            }
	         });

	      },
	      createControl : function(n, cm) {
	         return null;
	      },
	      getInfo : function() {
	         return {
	            longname : "Shortcodes",
        };
	      }
	   });
   tinymce.PluginManager.add('shortcodes', tinymce.plugins.shortcodes);
})();



