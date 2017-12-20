<?php
namespace Banbans\Ckeditor\Controller;

use Response;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class CkeditorController extends Controller
{
	public function upload(Request $request) {

		if ($request->hasFile('upload')) {     //upload为ckeditor默认的file提交ID

           $file = $request->file('upload');   //从请求数据内容中取出图片的内容

           $allowed_extensions = ["png", "jpg", "gif"]; //允许的图片后缀

           if ($file->getClientOriginalExtension() && !in_array($file->getClientOriginalExtension(), $allowed_extensions)) {  
               return '图片后缀只支持png,jpg,gif,请检查！';  
           }

           $destinationPath = 'uploads/images/';  //图片存放路径
           $extension = $file->getClientOriginalExtension();  //获得文件后缀  
           $fileName = str_random(10) . '.' . $extension;  //创建图片名字  
           $file->move($destinationPath, $fileName); //存储图片到路径
		   $url='/'.$destinationPath.$fileName;//文件地址路径
		   return "<script type=\"text/javascript\">window.parent.CKEDITOR.tools.callFunction($request->CKEditorFuncNum, '{$url}', '');</script>";; //输出图片网站中浏览路径
  
       }
	}

	public function config() {
		$config = config('ckeditor');
		$script = "\r\n";
		foreach ($config['upload'] as $key => $value) {
			if($key !='upload' && $key !='toolbar'){
				$script.="{$key}='{$value}';\r\n";
			}
		}
		foreach ($config as $key => $value) {
			if($key !='upload' && $key !='toolbar'){
				if(strtolower($value) == 'false' || strtolower($value) =='true'){
					$script.="{$key}={$value};\r\n";
				}else{
					$script.="{$key}='{$value}';\r\n";
				}
				
			}
		}
		$script.= "config.toolbarGroups = [".implode("\r\n",config('ckeditor.toolbar.default'))."];\r\n";
		$script = 'CKEDITOR.editorConfig=function(config){'.$script.'};';
		return Response::make($script, 200, ['Content-Type' => 'text/javascript'])->header('Content-Type','text/html;charset=utf-8');
	}
}