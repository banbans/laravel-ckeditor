<?php
return [	
	//上传配置
	'upload' => [
		//开启工具栏"图像"中文件上传功能
		'config.filebrowserImageUploadUrl' => '',
		//开启插入\编辑超链接中文件上传功能
		'config.filebrowserUploadUrl' => '',
		//工具栏"图像"中预览区域显示内容 
		'config.image_previewText' => '',
	],
	//工具栏
	'toolbar' => [
		'default' =>[
			"{ name: 'clipboard', groups: [ 'clipboard', 'undo' ] },",
			"{ name: 'editing', groups: [ 'find', 'selection', 'spellchecker' ] },",
			"{ name: 'links' },",
			"{ name: 'insert' },",
			"{ name: 'forms' },",
			"{ name: 'tools' },",
			"{ name: 'document', groups: [ 'mode', 'document', 'doctools' ] },",
			"{ name: 'others' },",
			"{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },",
			"'/',",
			"{ name: 'paragraph',   groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ] },",
			"{ name: 'styles' },",
			"{ name: 'colors' },",
			"{ name: 'about' }",
		]
	],
	'config.height' => '150',
	'config.width' => 'auto',
    'config.extraPlugins' => 'justify',
	'config.resize_enabled' => 'false',
	'config.removeDialogTabs' => 'image:advanced;link:advanced',
	'config.language' => 'zh-cn',
	'config.removeButtons' => 'Underline,Subscript,Superscript',
	'config.format_tags' => 'p;h1;h2;h3;pre',
	'config.mathJaxLib' => 'http://cdn.mathjax.org/mathjax/2.6-latest/MathJax.js?config=TeX-AMS_HTML'
];