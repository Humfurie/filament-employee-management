<?php

declare(strict_types=1);

namespace Domain\Role;

use Illuminate\Support\ServiceProvider;

class RoleConfigServiceProvider extends ServiceProvider
{
    /** Register services. */
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__. '/config/role.php', 'domain.role');
    }

    /** Bootstrap services. */
    public function boot(): void
    {

    }
}
