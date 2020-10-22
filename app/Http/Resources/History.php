<?php declare(strict_types=1);

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class History extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'periods' => Period::collection($this->periods),
            'foci' => Focus::collection($this->foci),
            'palette' => Palette::collection($this->palettes),
            'legacies' => Legacy::collection($this->legacies),
        ];
    }
}
