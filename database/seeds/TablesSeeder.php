<?php

use Illuminate\Database\Seeder;

class TablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(! \App\User::where('name', 'LIKE', 'admin')->first()) {
            $admin = factory(\App\User::class)->create([
                'name' => 'admin',
                'username' => 'admin',
                'email' => 'admin@admin.sales',
                'password' => \Illuminate\Support\Facades\Hash::make('secret'),
            ]);
            $admin->role()->dissociate();
            $admin->role()->associate(\App\Role::findOrFail(2));
            $admin->save();
        }

        factory(\App\Models\Order::class, 10)->create()->each(function ($order) {
            $products = factory(\App\Models\Product::class,2)->create()->pluck('id')->toArray();
            $pivotData = array_fill(0, count($products), ['articles' => random_int(1, 30)]);
            $syncData  = array_combine($products, $pivotData);
            $order->products()->sync($syncData);

        });
    }
}
