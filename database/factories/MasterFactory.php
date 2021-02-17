<?php

namespace Database\Factories;

use App\Models\City;
use App\Models\Master;

use App\Models\Service;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class MasterFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Master::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->email,
            'password' => Hash::make('123123123'),
            'status' => $this->faker->randomElement([1, 2, 3, 4]),
            'photo' => 'http://via.placeholder.com/640x360',
            'gender' => 1,
            'description' => $this->faker->sentence(30),
            'experience_from' => $this->faker->dateTimeBetween('-10 years'),
            'is_working_with_men' => $this->faker->boolean(80),
            'has_single_use_items' => $this->faker->boolean(80),
            'instagram' => 'https://www.instagram.com/stasyq.girls/',
            'education' => json_encode([
                'Краснодарская школа искусств',
                'Школа Иванова Иван Иваныча в Московской гостинице',
                'American Star MayCaper 2000'
            ]),
            'phone_number' => $this->faker->phoneNumber,
            'has_whatsapp' => $this->faker->boolean(80),
            'materials' => json_encode([
                'Стружка с рога единорога',
                'Слезы южноафриканских пингвинов',
                'Только самые свежие консервные банки от San Jhon',
                'Серийные блестки из шерсти домашних тараканов'
            ])
        ];
    }

    /**
     * Configure the model factory.
     *
     * @return $this
     */
    public function configure()
    {
        return $this->afterMaking(function (Master $master) {
            //
        })->afterCreating(function (Master $master) {

            $master->locations()->create([
                "lat" => $this->faker->latitude,
                "lng" => $this->faker->longitude,
                "city_id" => City::query()->inRandomOrder()->first()->id,
                "address" => $this->faker->address
            ]);

            for ($i = 0; $i < 5; $i++) {
                $master->photos()->create([
                    'url' => 'https://picsum.photos/200/300'
                ]);
            }

            for ($i = 0; $i < 3; $i++) {
                $master->services()->create([
                    'service_type' => $this->faker->numberBetween(1,2),
                    'name' => $this->faker->sentence(4),
                    'price' => $this->faker->numberBetween(10000, 1000000)
                ]);
            }

            for ($i = 0; $i < 3; $i++) {
                $review = $master->reviews()->create([
                    'user_id' => User::inRandomOrder()->first()->id,
                    'rating' => $this->faker->numberBetween(1, 5),
                    'content' => $this->faker->sentence(10),
                    'status' => $this->faker->numberBetween(1, 3)
                ]);
                $review->photos()->create([
                    'url' => 'https://picsum.photos/200/300'
                ]);
            }


        });
    }
}
