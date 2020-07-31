<?php

use Illuminate\Database\Seeder;
use App\Pizza;

class PizzaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        $pizzas = [
            ['title' => 'Muzzarella', 'description' => 'Tomato sauce, mozzarella, olives, oregano.', 'price' => 15.50, 'image' => 'img/pizza-1.jpg', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['title' => 'Pepperoni','description' => 'Tomato sauce, mozzarella, slices of Pepperoni sausage, olives, chili, oregano.','price' => 17.20,'image' => 'img/pizza-2.jpg','created_at' => date('Y-m-d H:i:s'),'updated_at' => date('Y-m-d H:i:s')],
            ['title' => 'Caprese','description' => 'Tomato sauce, mozzarella, tomato slices, basil leaves, olives, oregano.','price' => 18,'image' => 'img/pizza-3.jpg','created_at' => date('Y-m-d H:i:s'),'updated_at' => date('Y-m-d H:i:s')],
            ['title' => 'Neapolitan','description' => 'Tomato sauce, mozzarella, tomato slices, olives, garlic, oregano.','price' => 19.40, 'image' => 'img/pizza-4.jpg','created_at' => date('Y-m-d H:i:s'),'updated_at' => date('Y-m-d H:i:s')],
            ['title' => 'Special Neapolitan','description' => 'Tomato sauce, mozzarella, ham, tomato slices, olives, garlic, oregano.','price' => 20, 'image' => 'img/pizza-5.jpg', 'created_at' => date('Y-m-d H:i:s'),'updated_at' => date('Y-m-d H:i:s')],
            ['title' => 'Carbonara', 'description' => 'Tomato sauce, mozzarella, bacon, black pepper, olives, oregano.', 'price' => 16.70, 'image' => 'img/pizza-6.jpg','created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['title' => 'Prosciutto','description' => 'Tomato sauce, mozzarella, prosciutto ham, olives, oregano.','price' => 17,'image' => 'img/pizza-7.jpg','created_at' => date('Y-m-d H:i:s'),'updated_at' => date('Y-m-d H:i:s')],
            ['title' => 'Funghi','description' => 'Tomato sauce, mozzarella, mushrooms, olives, oregano.', 'price' => 19.50,'image' => 'img/pizza-8.jpg', 'created_at' => date('Y-m-d H:i:s'),'updated_at' => date('Y-m-d H:i:s')],
        ];
    
        foreach ($pizzas as $key => $value) {
            if($pizza = Pizza::whereTitle($value['title'])->first() == null) {
                $pizza = new Pizza($value);
                $pizza->save();
            }
        }
    }
}
