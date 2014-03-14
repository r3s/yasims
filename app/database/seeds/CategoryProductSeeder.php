<?php

class CategoryProductSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products_categories')->delete();

        $cat1 = Category::find(1);
        $cat2 = Category::find(2);
        $cat3 = Category::find(3);
        $cat4 = Category::find(4);

        $product1 = Product::find(1);
        $product2 = Product::find(2);
        $product3 = Product::find(3);
        $product4 = Product::find(4);

        $cat1->products()->attach($product1->id);
        $cat2->products()->attach($product2->id);
        $cat3->products()->attach($product3->id);
        $cat4->products()->attach($product4->id);
    }

}