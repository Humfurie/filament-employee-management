<?php

declare(strict_types=1);

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Policies\EmployeePolicy;
use App\Policies\PositionPolicy;
use App\Policies\RolePolicy;
use App\Policies\UserPolicy;
use Domain\Employee\Models\Employee;
use Domain\Position\Models\Position;
use Domain\User\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Spatie\Permission\Models\Role;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        User::class => UserPolicy::class,
        Employee::class => EmployeePolicy::class,
        Position::class => PositionPolicy::class,
        Role::class => RolePolicy::class,
    ];

    /** Register any authentication / authorization services. */
    public function boot(): void
    {
        $this->registerPolicies();

        Gate::after(fn ($user) => $user instanceof User ? $user->hasRole('Admin') : null);
    }
}
