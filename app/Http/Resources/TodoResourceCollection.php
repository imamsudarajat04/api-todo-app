<?php

namespace App\Http\Resources;

use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class TodoResourceCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return $this->collection->transform(function (Todo $todo) {
            return [
                "id"          => $todo->id,
                "title"       => $todo->title,
                "description" => $todo->description,
                "created_at"  => $todo->created_at->toDateTimeString(),
                "updated_at"  => $todo->updated_at->toDateTimeString(),
            ];
        })->toArray();
    }
}
