<?php

declare(strict_types=1);

namespace Domain\Position\Models;

use Domain\Employee\Models\Employee;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Position extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
    ];

    /** The roles that belong to the Position */
    public function employees(): HasMany
    {
        return $this->hasMany(Employee::class);
    }
}
