<?php

namespace Flarumarabic\Arabic\Listener;

use Flarum\Frontend\Document;
use Flarum\Locale\LocaleManager;
use Illuminate\Contracts\Events\Dispatcher;

class ChangeDirection
{
    public function __invoke(Document $view)
    {
  		$locales = app(LocaleManager::class);

        if ($locales->getLocale() == 'ar'){
            $view->language = 'ar';
            $view->direction = 'rtl';
        }else{
            $view->language = 'en';
            $view->direction = 'ltr';
        }
		
		$locales = app(LocaleManager::class);

        if ($locales->getLocale() == 'en'){
            $view->language = 'en';
            $view->direction = 'ltr';
        }else{
            $view->language = 'ar';
            $view->direction = 'rtl';
        }
    }
	
	
}
