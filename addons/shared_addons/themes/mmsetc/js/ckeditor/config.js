/**
 * @license Copyright (c) 2003-2012, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.html or http://ckeditor.com/license
 */
var domain = document.domain;
var cssPath;
if(domain == 'localhost')
{
cssPath = domain +'/py_energieberater/addons/shared_addons/themes/ihre_energieberater/css/app.css';
}
else
{
cssPath = domain +'/addons/shared_addons/themes/ihre_energieberater/css/app.css';
}

CKEDITOR.editorConfig = function( config ) {
	config.enterMode = CKEDITOR.ENTER_BR;
	config.shiftEnterMode = CKEDITOR.ENTER_P;
	config.skin = 'moono-dark';
config.contentsCss = 'http://localhost/py_energieberater/addons/shared_addons/themes/ihre_energieberater/css/app.css';
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
};
