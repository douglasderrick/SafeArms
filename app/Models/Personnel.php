<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Enums\Rank;
class Personnel extends Model
{
    use HasFactory;

    // public function getRankAttribute($value): Rank
    // {
    //     return Rank::from($value);
    // }

    // // Mutator to automatically cast the rank attribute from the Rank enum
    // public function setRankAttribute(Rank $rank): void
    // {
    //     $this->attributes['rank'] = $rank->value;
    // }

}
