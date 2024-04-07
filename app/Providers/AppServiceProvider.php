<?php

namespace App\Providers;

use App\Models\Language;
use Illuminate\Support\ServiceProvider;
use Schema;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        if (Schema::hasTable((new Language)->getTable())) {
            $this->setDefaultLanguage();
            $this->setFallbackLanguage();
        }
    }


    private function setDefaultLanguage(): void
    {
        $language = Language::findDefault();
        $language && app()->setLocale($language->id);
    }

    private function setFallbackLanguage(): void
    {
        $language = Language::findFallback();
        $language && app()->setFallbackLocale($language->id);
    }
}
