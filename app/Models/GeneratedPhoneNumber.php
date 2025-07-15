<?php

namespace App\Models;

use App\Enums\Table;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeneratedPhoneNumber extends Model
{
    use HasFactory, HasUuids;

    protected $table = Table::GENERATED_PHONE_NUMBERS->value;

    protected $fillable = [
        'number',
        'provider',
        'is_active',
    ];
}
