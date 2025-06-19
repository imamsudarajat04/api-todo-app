<?php

namespace App\Models;

use App\Enums\Table;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property string id
 * @property string title
 * @property string description
 * @property Carbon created_at
 * @property Carbon updated_at
 */
class Todo extends Model
{
    use HasFactory, HasUuids;

    protected $table = Table::TODOS->value;

    protected $fillable = [
        "title", "description",
    ];
}
