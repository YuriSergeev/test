<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Checklist;
use App\Item;

class ChecklistTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testCreateList()
    {
          $list = new Checklist();
          $list->title = 'title';
          $list->user_id = 1;

          try {
            $list->save();
          } catch (\Exception $exception)
          {
            return $exception;
          }

          $this->assertTrue($list->exists);

          $list->delete();
    }

    public function testCreateChecklist()
    {
          $list = new Checklist();
          $list->title = 'title';
          $list->user_id = 1;
          $list->save();
          $size = 5;

          for($i = 1; $i <= $size; $i++) {
            $item = new Item();
            $item->task = 'task'.$i;
            $item->checklist_id = $list->id;
            try {
              $item->save();
            } catch (\Exception $exception)
            {
              return $exception;
            }
            $this->assertTrue($item->exists);
            $item->delete();
          }



          $list->delete();
    }
}
