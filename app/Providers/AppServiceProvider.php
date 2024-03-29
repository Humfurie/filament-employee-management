<?php

declare(strict_types=1);

namespace App\Providers;

use Domain\User\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /** Register any application services. */
    public function register(): void
    {

    }

    /** Bootstrap any application services. */
    public function boot(): void
    {
        Model::shouldBeStrict( ! $this->app->isProduction());

        Relation::enforceMorphMap([
            User::class,
        ]);
    }
}
