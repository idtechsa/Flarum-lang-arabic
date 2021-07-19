<?php

use Flarum\Extend;
use Illuminate\Contracts\Events\Dispatcher;
use Flarumarabic\Arabic\Util\Str;
use Flarumarabic\Arabic\Listener;
use Flarum\Discussion\Event\Saving;
use Flarum\Foundation\Event\Validating;
 
return [
	new Flarum\Extend\LanguagePack(),
    (new Extend\Frontend('forum'))
        ->css(__DIR__ . '/less/forum/extension.less')
		->content(Listener\ChangeDirection::class),
	(new Extend\Frontend('admin'))
        ->css(__DIR__ . '/less/admin/extension.less')
		->content(Listener\ChangeDirection::class),
		
	
];	

