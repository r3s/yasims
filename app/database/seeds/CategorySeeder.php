<?php

class CategorySeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->delete();
        
        $now = date('Y-m-d H:i:s');
        
        $cat1 = Category::create(array(
                'name' => 'Category1',
                'active' => true,
                'created_at' => $now,
                'updated_at' => $now
            ));

        $cat2 = Category::create(array(
                'name' => 'Category2',
                'active' => true,
                'created_at' => $now,
                'updated_at' => $now
            ));

        $cat3 = Category::create(array(
                'name' => 'Category3',
                'active' => true,
                'created_at' => $now,
                'updated_at' => $now
            ));
        $cat4 = Category::create(array(
                'name' => 'Category4',
                'active' => false,
                'created_at' => $now,
                'updated_at' => $now
            ));
    }

}