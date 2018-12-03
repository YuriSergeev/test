<?php

use Illuminate\Database\Seeder;
use App\Achievement;

class AchievementTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $achievement = new Achievement();
        $achievement->name = 'Multitasking';
        $achievement->description = 'multitasking_lang';
        $achievement->make = 30;
        $achievement->save();

        $achievement = new Achievement();
        $achievement->name = 'The first went';
        $achievement->description = 'first_went_lang';
        $achievement->make = 1;
        $achievement->save();

        $achievement = new Achievement();
        $achievement->name = 'Measure seven times cut once';
        $achievement->description = 'measure_seven_lang';
        $achievement->make = 0;
        $achievement->save();

        $achievement = new Achievement();
        $achievement->name = 'Cleaner';
        $achievement->description = 'cleaner_lang';
        $achievement->make = 10;
        $achievement->save();

        $achievement = new Achievement();
        $achievement->name = 'Scheduler';
        $achievement->description = 'scheduler_lang';
        $achievement->make = 10;
        $achievement->save();
    }
}
