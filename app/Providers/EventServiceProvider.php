<?php

namespace App\Providers;

use App\Models\Atom\Article;
use App\Models\Atom\Menu;
use App\Models\Atom\MenuItem;
use App\Models\Atom\Page;
use App\Models\Atom\SimpleItem;
use App\Models\TranslatorModels\ArticleTranslation;
use App\Models\TranslatorModels\MenuItemTranslation;
use App\Models\TranslatorModels\MenuTranslation;
use App\Models\TranslatorModels\PageTranslation;
use App\Models\TranslatorModels\SimpleItemTranslation;
use App\Observers\GlobalObserver;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        $this->checkTypeFileManager();


        $this->observer();


    }

    protected function checkTypeFileManager() {

        \Event::listen('Alexusmai\LaravelFileManager\Events\Rename',
            function ($event) {

                $ext=explode('.',$event->newName());
                $ext=end($ext);

                if (config('file-manager.allowFileTypes')
                    && !in_array(
                        $ext,
                        config('file-manager.allowFileTypes')
                    )
                ){
                    die() ;
                }

            }

        );


        \Event::listen('Alexusmai\LaravelFileManager\Events\FileCreating',
            function ($event) {

                $ext=explode('.',$event->name());
                $ext=end($ext);

                if (config('file-manager.allowFileTypes')
                    && !in_array(
                        $ext,
                        config('file-manager.allowFileTypes')
                    )
                ){
                    die() ;
                }

            }

        );
    }




    protected function observer()
    {
        $MODELS = [
            //Classes
            Article::class,
            ArticleTranslation::class,
            Page::class,
            PageTranslation::class,
            Menu::class,
            MenuTranslation::class,
            MenuItem::class,
            MenuItemTranslation::class,
            SimpleItem::class,
            SimpleItemTranslation::class,
            //.....
        ];

        foreach ($MODELS as $MODEL) {
            $MODEL::observe(GlobalObserver::class);
        }
    }
}
