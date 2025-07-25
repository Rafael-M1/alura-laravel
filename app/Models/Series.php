<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Series extends Model
{
    protected $table = 'series';

    protected $fillable = [
        'nome',
    ];

    public function seasons() {
        return $this->hasMany(Season::class, "series_id");
    }

    protected static function booted() {
        self::addGlobalScope("ordered", function (Builder $queryBuilder) {
            $queryBuilder->orderBy("nome", "asc");
        });
    }
}
