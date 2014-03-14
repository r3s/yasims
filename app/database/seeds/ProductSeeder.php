<?php

class ProductSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->delete();

        $now = date('Y-m-d H:i:s');
        
        $product1 = Product::create(array(
                'name' => 'Product1',
                'stock' => 100,
                'active' => true,
                'created_at' => $now,
                'updated_at' => $now
            ));
        

        $product2 = Product::create(array(
                'name' => 'Product2',
                'stock' => 100,
                'active' => true,
                'created_at' => $now,
                'updated_at' => $now
            ));
        
        $product3 = Product::create(array(
                'name' => 'Product3',
                'stock' => 100,
                'active' => true,
                'created_at' => $now,
                'updated_at' => $now
            ));
        
        $product4 = Product::create(array(
                'name' => 'Product4',
                'stock' => 100,
                'active' => false,
                'created_at' => $now,
                'updated_at' => $now
            ));

    }

}