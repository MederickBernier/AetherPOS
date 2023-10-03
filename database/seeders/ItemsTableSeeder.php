<?php

namespace Database\Seeders;

use App\Models\Item;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
            ["name" => "Acorn Cookie", "description" => "A delicious cookie made from acorns.", "quantity" => 1000, "threshold" => 100, "price" => 50],
            ["name" => "Aldgoat Steak", "description" => "A juicy steak made from Aldgoat.", "quantity" => 1000, "threshold" => 100, "price" => 50],
            ["name" => "Alligator Salad", "description" => "A fresh salad with alligator meat.", "quantity" => 1000, "threshold" => 100, "price" => 50],
            ["name" => "Almond Cream Croissant", "description" => "A flaky croissant with almond cream.", "quantity" => 1000, "threshold" => 100, "price" => 50],
            ["name" => "Amra Lassi", "description" => "A refreshing drink made from Amra.", "quantity" => 1000, "threshold" => 100, "price" => 50],
            ["name" => "Amra Salad", "description" => "A tangy salad with Amra as the main ingredient.", "quantity" => 1000, "threshold" => 100, "price" => 50],
            ["name" => "Angler Stew", "description" => "A hearty stew made from fresh angler fish.", "quantity" => 1000, "threshold" => 100, "price" => 50],
            ["name" => "Antelope Steak", "description" => "A tender steak made from antelope meat.", "quantity" => 1000, "threshold" => 100, "price" => 50],
            ["name" => "Antelope Stew", "description" => "A rich stew made from antelope.", "quantity" => 1000, "threshold" => 100, "price" => 50],
            ["name" => "Apkallu Omelette", "description" => "A fluffy omelette with Apkallu eggs.", "quantity" => 1000, "threshold" => 100, "price" => 50],
            ["name" => "Apple Juice", "description" => "A refreshing juice made from fresh apples.", "quantity" => 1000, "threshold" => 100, "price" => 50],
            ["name" => "Apple Strudel", "description" => "A sweet pastry filled with apple filling.", "quantity" => 1000, "threshold" => 100, "price" => 50],
            ["name" => "Apple Tart", "description" => "A delicious tart with apple filling.", "quantity" => 1000, "threshold" => 100, "price" => 50],
            ["name" => "Archon Burger", "description" => "A juicy burger with a special Archon touch.", "quantity" => 1000, "threshold" => 100, "price" => 50],
            ["name" => "Archon Loaf", "description" => "A loaf of bread with a unique Archon flavor.", "quantity" => 1000, "threshold" => 100, "price" => 50],
            ["name" => "Arros Negre", "description" => "A special dish made with black rice.", "quantity" => 1000, "threshold" => 100, "price" => 50],
            ["name" => "Baba Ghanoush", "description" => "A creamy dip made from roasted eggplants.", "quantity" => 1000, "threshold" => 100, "price" => 50],
            ["name" => "Bacon Bread", "description" => "A savory bread with bacon bits.", "quantity" => 1000, "threshold" => 100, "price" => 50],
            ["name" => "Bacon Broth", "description" => "A rich broth made from bacon.", "quantity" => 1000, "threshold" => 100, "price" => 50],
            ["name" => "Baguette", "description" => "A long, thin loaf of French bread.", "quantity" => 1000, "threshold" => 100, "price" => 50],
            ["name" => "Baked Alien Soup", "description" => "A mysterious soup with an otherworldly flavor.", "quantity" => 1000, "threshold" => 100, "price" => 50],
            ["name" => "Baked Eggplant", "description" => "A roasted eggplant dish with a smoky flavor.", "quantity" => 1000, "threshold" => 100, "price" => 50],
            ["name" => "Baked Megapiranha", "description" => "A baked dish made from Megapiranha.", "quantity" => 1000, "threshold" => 100, "price" => 50],
            ["name" => "Baked Onion Soup", "description" => "A rich soup made from baked onions.", "quantity" => 1000, "threshold" => 100, "price" => 50],
            ["name" => "Baked Pipira", "description" => "A baked dish made from Pipira fish.", "quantity" => 1000, "threshold" => 100, "price" => 50],
            ["name" => "Baked Sole", "description" => "A baked dish made from sole fish.", "quantity" => 1000, "threshold" => 100, "price" => 50],
            ["name" => "Baked Tarpon", "description" => "A baked dish made from tarpon fish.", "quantity" => 1000, "threshold" => 100, "price" => 50],
            ["name" => "Baked Tuna Pie", "description" => "A savory pie made from tuna.", "quantity" => 1000, "threshold" => 100, "price" => 50],
            ["name" => "Baked Whitefish", "description" => "A baked dish made from whitefish.", "quantity" => 1000, "threshold" => 100, "price" => 50],
            ["name" => "Baklava", "description" => "A sweet pastry made from layers of filo and filled with nuts and honey.", "quantity" => 1000, "threshold" => 100, "price" => 50],
            ["name" => "Balsamic Vinaigrette", "description" => "A tangy dressing made from balsamic vinegar.", "quantity" => 1000, "threshold" => 100, "price" => 50],
            ["name" => "Bamboo Shoot Soup", "description" => "A light soup made from bamboo shoots.", "quantity" => 1000, "threshold" => 100, "price" => 50],
            ["name" => "Banana Bread", "description" => "A moist bread made from ripe bananas.", "quantity" => 1000, "threshold" => 100, "price" => 50],
            ["name" => "Banana Cake", "description" => "A sweet cake made from bananas.", "quantity" => 1000, "threshold" => 100, "price" => 50],
            ["name" => "Banana Crepe", "description" => "A thin pancake filled with banana slices.", "quantity" => 1000, "threshold" => 100, "price" => 50],
            ["name" => "Banana Juice", "description" => "A sweet juice made from fresh bananas.", "quantity" => 1000, "threshold" => 100, "price" => 50],
            ["name" => "Banana Muffin", "description" => "A soft muffin made from bananas.", "quantity" => 1000, "threshold" => 100, "price" => 50],
            ["name" => "Banana Nut Bread", "description" => "A nutty bread made from bananas.", "quantity" => 1000, "threshold" => 100, "price" => 50],
            ["name" => "Banana Nut Muffin", "description" => "A muffin with bananas and nuts.", "quantity" => 1000, "threshold" => 100, "price" => 50],
            ["name" => "Banana Pancake", "description" => "A fluffy pancake with banana slices.", "quantity" => 1000, "threshold" => 100, "price" => 50],
            ["name" => "Banana Pie", "description" => "A sweet pie made from bananas.", "quantity" => 1000, "threshold" => 100, "price" => 50],
            ["name" => "Banana Pudding", "description" => "A creamy pudding made from bananas.", "quantity" => 1000, "threshold" => 100, "price" => 50],
            ["name" => "Banana Split", "description" => "A dessert made from bananas, ice cream, and toppings.", "quantity" => 1000, "threshold" => 100, "price" => 50],
            ["name" => "Banana Tart", "description" => "A tart with a banana filling.", "quantity" => 1000, "threshold" => 100, "price" => 50],
            ["name" => "Banana Wine", "description" => "A sweet wine made from bananas.", "quantity" => 1000, "threshold" => 100, "price" => 50],
            ["name" => "Barbecued Buzzard Wing", "description" => "A grilled wing from a buzzard.", "quantity" => 1000, "threshold" => 100, "price" => 50],
            ["name" => "Basilisk Egg", "description" => "A rare egg from a basilisk.", "quantity" => 1000, "threshold" => 100, "price" => 50],
            ["name" => "Bat Soup", "description" => "A soup made from bat meat.", "quantity" => 1000, "threshold" => 100, "price" => 50],
            ["name" => "Bat Wing", "description" => "A wing from a bat.", "quantity" => 1000, "threshold" => 100, "price" => 50],
            ["name" => "Battered Fish", "description" => "A fish coated in batter and fried.", "quantity" => 1000, "threshold" => 100, "price" => 50],
            ["name" => "Battered Haddock", "description" => "A haddock fish coated in batter and fried.", "quantity" => 1000, "threshold" => 100, "price" => 50],
            ["name" => "Battered Sausage", "description" => "A sausage coated in batter and fried.", "quantity" => 1000, "threshold" => 100, "price" => 50]
        ];

        // Loop through the data and insert into the 'items' table
        foreach($items as $item){
            Item::create($item);
        }
    }
}
