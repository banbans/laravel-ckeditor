<?php
namespace Banbans\Ckeditor;

/**
* ckeditor编辑器呈现
*/
class Ckeditor
{
	private static $id;
	/**
     * 编辑器DOM
     * @param string $content
     * @param array  $config
     */
    public static function content($content='', $config=[]) {
        $attr = Ckeditor::ConvertAttrib($config);
        echo "<textarea {$attr}>{$content}</textarea>";
    }
    /**
     * 生成编辑器的参数
     * @param $config
     *
     * @return string
     */
    private static function ConvertAttrib($config) {

        $string = '';
        if(is_array($config)) {
            if($config===[]) {
                $string = "id='myEditor'";
                self::$id = 'myEditor';
            }
            foreach($config as $k=>$v) {
                $string .= " {$k}='{$v}'";
                if($k=='id'){
                    self::$id = $v;
                }
            }
        } else {
            
            $string = "id='{$config}'";
            self::$id = '$config';
        }
        return $string;
    }

    /**
     *	编辑器的JS资源
     */
    public static function js($id=null) {
        if(is_null($id)){
            $id=self::$id;
        }
        echo '<script type="text/javascript" charset="utf-8" src="'.asset('assets/ckeditor/ckeditor.js').'"></script>'."\r\n";
        echo '<script type="text/javascript">'."\r\n";
        echo "CKEDITOR.replace('".self::$id."', { customConfig: '".route('ckeditor.config')."'});\r\n";
		echo '</script>';
    }
}
