/*keep tabs persistent */
$(document).ready(function() 
{ 

	var sectTitle = $( "section.title h4" ).html();

	if(sessionStorage['tab_id'] !== '' &&  sectTitle !== sessionStorage['section'])
	{
		sessionStorage['tab_id'] = 0;	
	}

	sessionStorage['section'] = sectTitle;

	$('.tabs').tabs({
		load:function(event,ui){
		}
	});
	
	$('.tab-menu a').each(function(){
		$(this).click(function(){
			index = $('.tabs a[href="' + $(this).attr('href') + '"]').parent().index();
			sessionStorage['tab_id']= index;
		});
	});

	
	$('.tabs').tabs('select', parseInt(sessionStorage['tab_id']));



// --------------------------------------------------------------------


$('textarea.wysiwyg-advanced[name^="multi_"]').each(function(){

if($(this).val() == '')
{
$(this).ckeditor({
toolbar: [
		['Maximize'],
		['pyroimages', 'pyrofiles'],
		['Cut','Copy','Paste','PasteFromWord'],
		['Undo','Redo','-','Find','Replace'],
		['Link','Unlink'],
		['Table','HorizontalRule','SpecialChar'],
		['Bold','Italic','StrikeThrough'],
		['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock','-','BidiLtr','BidiRtl'],
		['Format', 'FontSize', 'Subscript','Superscript', 'NumberedList','BulletedList','Outdent','Indent','Blockquote'],
		['ShowBlocks', 'RemoveFormat', 'Source']
	],
	extraPlugins: 'pyroimages,pyrofiles',
	width: '99%',
	height: 20,
	dialog_backgroundCoverColor: '#000',
	removePlugins: 'elementspath'

});
}
});

/*
$('textarea.wysiwyg-simple').ckeditor({
	toolbar: [
		['Italic', '-', 'NumberedList', 'BulletedList', '-', 'Link', 'Unlink']
	  ],
	width: '99%',
	height: 300,
	dialog_backgroundCoverColor: '#000'
});
*/

}); // end doc ready 

