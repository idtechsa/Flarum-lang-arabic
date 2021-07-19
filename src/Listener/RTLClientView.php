<?php

namespace Flarumarabic\Langwithrtl\Listener;

use Flarum\Event\ConfigureClientView;
use Illuminate\Contracts\Events\Dispatcher;

class RTLClientView
{
    public function subscribe(Dispatcher $events)
    {
        $events->listen(ConfigureClientView::class, [$this, 'rtlClientView']);
    }
    
    public function rtlClientView(ConfigureClientView $event)
    {
        if ($event->isForum()) {
		$event->addAssets([__DIR__ . '/../../less/forum/extension.less']);
        }
        else if($event->isAdmin()) {
		$event->addAssets([__DIR__ . '/../../less/admin/extension.less']);
        }
    }
}

class LTRClientView
{
    public function subscribe(Dispatcher $events)
    {
        $events->listen(ConfigureClientView::class, [$this, 'ltrClientView']);
    }
    
    public function ltrClientView(ConfigureClientView $event)
    {
        if ($event->isForum()) {
		$event->addAssets([__DIR__ . '/../../less/forum/extension.less']);
        }
        else if($event->isAdmin()) {
		$event->addAssets([__DIR__ . '/../../less/admin/extension.less']);
        }
    }
}