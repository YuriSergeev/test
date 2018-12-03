<?php

namespace App;

use App\Item;
use Illuminate\Database\Eloquent\Model;

class Checklist extends Model
{
    public function items()
    {
        return $this->hasMany('App\Item', 'checklist_id', 'id');
    }

    protected static function boot()
    {
      parent::boot();

      self::deleting(function($checklist) {
        Item::query()
        ->where('checklist_id', '=', $checklist->id)
        ->delete();
      });
    }
}
