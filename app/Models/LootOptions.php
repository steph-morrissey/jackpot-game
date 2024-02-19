<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LootOptions extends Model
{
    public function getKeyValues()
    {
        $lootOptions = LootOption::pluck('name', 'initial', 'points')->all();
    }
}
