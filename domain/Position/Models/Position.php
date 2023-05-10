<?php

namespace Domain\Position\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Position extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
    ];

    /**
     * The roles that belong to the Position
     */
    public function employee(): BelongsToMany
    {
        return $this->belongsToMany(Employee::class, 'employee_position');
    }
}
