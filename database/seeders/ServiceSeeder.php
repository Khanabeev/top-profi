<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $services = [
            [
                'name' => 'Маникюр',
                'type' => 'manicure'
            ],
            [
                'name' => 'Педикюр',
                'type' => 'pedicure'
            ]
        ];

        foreach ($services as $service) {
            Service::create($service);
        }
    }
}
