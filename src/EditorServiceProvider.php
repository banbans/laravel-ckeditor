<?php
namespace Banbans\Ckeditor;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

/**
* CKEditor编辑器服务提供者
*/
class EditorServiceProvider extends ServiceProvider
{
	
	/**
	 * Perform post-registration booting of services.
	 *
	 * @return void
	 */
	public function boot(){
		if (! $this->app->routesAreCached()) {
	        require __DIR__.'/routes/routes.php';
	    }

	    $this->publishes([
	        __DIR__.'/vendor/ckeditor' => public_path('assets/ckeditor'),
	    ],'ckeditor');


	    //添加自定义标签
	    $this->publishes([
	        __DIR__.'/config/config.php' => config_path('ckeditor.php'),
	    ],'ckeditor');

	}
	
	/**
	 * 在容器中注册绑定
	 *
	 * @return void
	 */
	public function register(){
	    
	}
}