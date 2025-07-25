<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Episode extends Model
{
    public $timestamps = false;
    protected $fillable = ["number"];

    public function season() {
        return $this->belongsTo(Season::class, "seasons_id");
    }

    public function scopeWatched(Builder $query) {
        $query->where("watched", true);
    }
}
