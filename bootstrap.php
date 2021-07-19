<?php
namespace Flarumarabic\Arabic;

use Flarum\Event\ConfigureLocales;
use Flarum\Event\ConfigureClientView;
use Flarum\Forum\WebApp;
use Flarum\Locale\LocaleManager;
use Illuminate\Contracts\Events\Dispatcher;


return function (Dispatcher $events) {
	$events->subscribe(Listener\RTLClientView::class);
};
return function (Dispatcher $events) {
    $events->listen(ConfigureLocales::class, function (ConfigureLocales $event) {
        $event->loadLanguagePackFrom(__DIR__);
    });

    //Add assets
$events->listen(ConfigureClientView::class,  function(ConfigureClientView $event) {

  $webapp = app(WebApp::class);
  $assets = $webapp->getAssets();
  $assets->flushLocaleCss();

  $locales = app(LocaleManager::class);
  $isArabic = $locales->getLocale() == "ar";
  // dd($event->view->direction = 'rtl');

  if ($event->isForum() && $isArabic   ) {

     $event->addAssets([__DIR__ . '/less/forum/extension.less']);
     $event->view->direction = 'rtl';

  } elseif ($event->isAdmin() && $isArabic) {

     $event->addAssets([__DIR__ . '/less/admin/extension.less']);
     $event->view->direction = 'rtl';

  }

});
