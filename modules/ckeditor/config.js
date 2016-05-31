/**
 * @license Copyright (c) 2003-2014, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.html or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
};

CKEDITOR.editorConfig = function(config) {
   config.filebrowserBrowseUrl = 'themes/default/plugins/ckeditor/filemanager/browse.php?type=files';
   config.filebrowserImageBrowseUrl = 'themes/default/plugins/ckeditor/filemanager/browse.php?type=images';
   config.filebrowserFlashBrowseUrl = 'themes/default/plugins/ckeditor/filemanager/browse.php?type=flash';
   config.filebrowserUploadUrl = 'themes/default/plugins/ckeditor/filemanager/upload.php?type=files';
   config.filebrowserImageUploadUrl = 'themes/default/plugins/ckeditor/filemanager/upload.php?type=images';
   config.filebrowserFlashUploadUrl = 'themes/default/plugins/ckeditor/filemanager/upload.php?type=flash';
};