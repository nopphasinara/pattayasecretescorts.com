/**
 * @license Copyright (c) 2003-2012, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.html or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here.
	// For the complete reference:
	// http://docs.ckeditor.com/#!/api/CKEDITOR.config

	// The toolbar groups arrangement, optimized for two toolbar rows.
	config.toolbarGroups = [
		{ name: 'basicstyles' },
		//{ name: 'styles', items: ['JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock'] },		
		{ name: 'list', items: ['list', 'indent'] }
		//{ name: 'links' },
		//{ name: 'find' },
		//{ name: 'document', items: ['Source'] }
	];

	// Remove some buttons, provided by the standard plugins, which we don't
	// need to have in the Standard(s) toolbar.
	config.removeButtons = 'Subscript,Superscript,Strike,Anchor,Flash,Character,Styles,Format';
	// config.removeButtons = 'Underline,Subscript,Superscript';
	config.uiColor = '#FFFFFF';
};
