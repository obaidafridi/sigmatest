<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Service;
class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $services= [
            [
                'name' => 'Dentist Specialist',
                'image' =>  'uploads/service/dentist.png',
                'is_active' => 1,
                'status' =>1,
                'user_id'=>1,
                'price'=>50,
            ],
            [
                'name' => 'Eye Specialist',
                'image' =>  'uploads/service/eyeSpecialist.png',
                'is_active' => 1,
                'status' =>1,
                'user_id'=>1,
                'price'=>100,
            ],
        ];

        foreach ($services as $key => $service){
                 Service::create($service);
        }
    }
}
