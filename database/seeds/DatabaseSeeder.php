<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Equipo::class, 50)->create()->each(function ($u) {
            $u->mantenimientos()->save(factory(App\Mantenimiento::class)->make());
            $u->incidentes()->save(factory(App\Incidente::class)->make());
        });
    }
}
