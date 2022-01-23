<?php

namespace Database\Seeders;

use App\Models\Item;
use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = storage_path() . '/app/public/seeders/items.json';
        $items = json_decode(file_get_contents($json), true);
        foreach ($items as $item) {
            Item::factory()->create(
                $item
            );
        }
        // Item::factory()->create([
        //     "name": "אננס חתוך מוסדי A9",
		// "catalog_number": "3101",
		// "scale": "קג",
		// "supplier_id": "1",
		// "price": "141",
		// "deposit": "0"
        // Item::factory()->create([
        //     "name": "אננס חתוך מוסדי A9",
		// "catalog_number": "3101",
		// "scale": "קג",
		// "supplier_id": "1",
		// "price": "141",
		// "deposit": "0"
        // Item::factory()->create([
        //     "name": "אננס חתוך מוסדי A9",
		// "catalog_number": "3101",
		// "scale": "קג",
		// "supplier_id": "1",
		// "price": "141",
		// "deposit": "0"
        // Item::factory()->create([
        //     "name": "אננס חתוך מוסדי A9",
		// "catalog_number": "3101",
		// "scale": "קג",
		// "supplier_id": "1",
		// "price": "141",
		// "deposit": "0"
        // Item::factory()->create([
        //     "name": "אננס חתוך מוסדי A9",
		// "catalog_number": "3101",
		// "scale": "קג",
		// "supplier_id": "1",
		// "price": "141",
		// "deposit": "0"
        // Item::factory()->create([
        //     "name": "אננס חתוך מוסדי A9",
		// "catalog_number": "3101",
		// "scale": "קג",
		// "supplier_id": "1",
		// "price": "141",
		// "deposit": "0"
        // Item::factory()->create([
        //     "name": "אננס חתוך מוסדי A9",
		// "catalog_number": "3101",
		// "scale": "קג",
		// "supplier_id": "1",
		// "price": "141",
		// "deposit": "0"
        // Item::factory()->create([
        //     "name": "אננס חתוך מוסדי A9",
		// "catalog_number": "3101",
		// "scale": "קג",
		// "supplier_id": "1",
		// "price": "141",
		// "deposit": "0"
        // Item::factory()->create([
        //     "name": "אננס חתוך מוסדי A9",
		// "catalog_number": "3101",
		// "scale": "קג",
		// "supplier_id": "1",
		// "price": "141",
		// "deposit": "0"
        // Item::factory()->create([
        //     "name": "אננס חתוך מוסדי A9",
		// "catalog_number": "3101",
		// "scale": "קג",
		// "supplier_id": "1",
		// "price": "141",
		// "deposit": "0"
        // Item::factory()->create([
        //     "name": "אננס חתוך מוסדי A9",
		// "catalog_number": "3101",
		// "scale": "קג",
		// "supplier_id": "1",
		// "price": "141",
		// "deposit": "0"
        // Item::factory()->create([
        //     "name": "אננס חתוך מוסדי A9",
		// "catalog_number": "3101",
		// "scale": "קג",
		// "supplier_id": "1",
		// "price": "141",
		// "deposit": "0"
        // Item::factory()->create([
        //     "name": "אננס חתוך מוסדי A9",
		// "catalog_number": "3101",
		// "scale": "קג",
		// "supplier_id": "1",
		// "price": "141",
		// "deposit": "0"
        // Item::factory()->create([
        //     "name": "אננס חתוך מוסדי A9",
		// "catalog_number": "3101",
		// "scale": "קג",
		// "supplier_id": "1",
		// "price": "141",
		// "deposit": "0"
        // Item::factory()->create([
        //     "name": "אננס חתוך מוסדי A9",
		// "catalog_number": "3101",
		// "scale": "קג",
		// "supplier_id": "1",
		// "price": "141",
		// "deposit": "0"
        // Item::factory()->create([
        //     "name": "אננס חתוך מוסדי A9",
		// "catalog_number": "3101",
		// "scale": "קג",
		// "supplier_id": "1",
		// "price": "141",
		// "deposit": "0"
        // Item::factory()->create([
        //     "name": "אננס חתוך מוסדי A9",
		// "catalog_number": "3101",
		// "scale": "קג",
		// "supplier_id": "1",
		// "price": "141",
		// "deposit": "0"
        // Item::factory()->create([
        //     "name": "אננס חתוך מוסדי A9",
		// "catalog_number": "3101",
		// "scale": "קג",
		// "supplier_id": "1",
		// "price": "141",
		// "deposit": "0"
        // Item::factory()->create([
        //     "name": "אננס חתוך מוסדי A9",
		// "catalog_number": "3101",
		// "scale": "קג",
		// "supplier_id": "1",
		// "price": "141",
		// "deposit": "0"
        // Item::factory()->create([
        //     "name": "אננס חתוך מוסדי A9",
		// "catalog_number": "3101",
		// "scale": "קג",
		// "supplier_id": "1",
		// "price": "141",
		// "deposit": "0"
        // Item::factory()->create([
        //     "name": "אננס חתוך מוסדי A9",
		// "catalog_number": "3101",
		// "scale": "קג",
		// "supplier_id": "1",
		// "price": "141",
		// "deposit": "0"
        // Item::factory()->create([
        //     "name": "אננס חתוך מוסדי A9",
		// "catalog_number": "3101",
		// "scale": "קג",
		// "supplier_id": "1",
		// "price": "141",
		// "deposit": "0"
        // Item::factory()->create([
        //     "name": "אננס חתוך מוסדי A9",
		// "catalog_number": "3101",
		// "scale": "קג",
		// "supplier_id": "1",
		// "price": "141",
		// "deposit": "0"
        // Item::factory()->create([
        //     "name": "אננס חתוך מוסדי A9",
		// "catalog_number": "3101",
		// "scale": "קג",
		// "supplier_id": "1",
		// "price": "141",
		// "deposit": "0"
        // Item::factory()->create([
        //     "name": "אננס חתוך מוסדי A9",
		// "catalog_number": "3101",
		// "scale": "קג",
		// "supplier_id": "1",
		// "price": "141",
		// "deposit": "0"
        // Item::factory()->create([
        //     "name": "אננס חתוך מוסדי A9",
		// "catalog_number": "3101",
		// "scale": "קג",
		// "supplier_id": "1",
		// "price": "141",
		// "deposit": "0"
        // Item::factory()->create([
        //     "name": "אננס חתוך מוסדי A9",
		// "catalog_number": "3101",
		// "scale": "קג",
		// "supplier_id": "1",
		// "price": "141",
		// "deposit": "0"
        // Item::factory()->create([
        //     "name": "אננס חתוך מוסדי A9",
		// "catalog_number": "3101",
		// "scale": "קג",
		// "supplier_id": "1",
		// "price": "141",
		// "deposit": "0"
        // Item::factory()->create([
        //     "name": "אננס חתוך מוסדי A9",
		// "catalog_number": "3101",
		// "scale": "קג",
		// "supplier_id": "1",
		// "price": "141",
		// "deposit": "0"
        // ]);
    }
}
