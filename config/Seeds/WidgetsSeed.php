<?php

use Migrations\AbstractSeed;

/**
 * Widgets seed.
 */
class WidgetsSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeds is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $data = [];
        for ($i = 0;$i < 100;$i++)
        {
            $data[] = [
                'name' => 'Widget '.$faker->word,
                'description' => $faker->paragraph,
                'price' => $faker->randomFloat(2, 0, 4),
                'created' => date('Y-m-d H:i:s'),
                'modified' => date('Y-m-d H:i:s'),
            ];
        }

        $this->insert('widgets', $data);
    }
}
