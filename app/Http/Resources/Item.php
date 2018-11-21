<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class Item extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
          'id' => $this->id,
          'task' => $this->task,
          'checklist_id' => $this->checklist_id,
          'created_at' => $this->created_at,
          'updated_at' => $this->updated_at,
        ];
    }
}
