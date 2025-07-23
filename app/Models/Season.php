<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Season extends Model
{
    public $timestamps = false;
    protected $fillable = ["number"];

    public function series() {
        return $this->belongsTo(Series::class);
    }

    public function episodes() {
        return $this->hasMany(Episode::class, "seasons_id");
    }

    public function numberOfWatchedEpisodes() {
        return $this->episodes->filter(fn ($episode) => $episode->watched)->count();
    }
}
