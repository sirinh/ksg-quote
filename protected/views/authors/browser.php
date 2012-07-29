<?php
$this->widget('application.extensions.elfinder.ElFinderWidget',array(
    'lang'=>'ru',
    'url'=>CHtml::normalizeUrl(array('main/fileManager')),
    'editorCallback'=>'js:function(url) {
        var funcNum = window.location.search.replace(/^.*CKEditorFuncNum=(\d+).*$/, "$1");
        window.opener.CKEDITOR.tools.callFunction(funcNum, url);
        window.close();
    }',
))?>