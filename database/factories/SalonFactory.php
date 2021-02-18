<?php

namespace Database\Factories;

use App\Models\City;
use App\Models\Salon;
use App\Models\Schedule;
use App\Models\User;
use App\Models\Workplace;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class SalonFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Salon::class;

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
            'description' => $this->faker->sentence(30),
            'is_working_with_men' => $this->faker->boolean(80),
            'has_single_use_items' => $this->faker->boolean(80),
            'instagram' => 'https://www.instagram.com/stasyq.girls/',
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
        return $this->afterMaking(function (Salon $salon) {
            //
        })->afterCreating(function (Salon $salon) {

            $salon->workplaces()->create([
                'place' => $this->faker->randomElement([
                        Workplace::AT_BEAUTY_SALON,
                        Workplace::AT_YOUR_HOME
                    ]
                )
            ]);

            $schedules = [
                [
                    'day' => Schedule::MONDAY,
                    'open_time' => 510,
                    'close_time' => 1080
                ],
                [
                    'day' => Schedule::TUESDAY,
                    'open_time' => 540,
                    'close_time' => 1080
                ],
                [
                    'day' => Schedule::WEDNESDAY,
                    'open_time' => 540,
                    'close_time' => 1080
                ],
                [
                    'day' => Schedule::THURSDAY,
                    'open_time' => 600,
                    'close_time' => 1170
                ],
                [
                    'day' => Schedule::FRIDAY,
                    'open_time' => 630,
                    'close_time' => 1170
                ]
            ];

            foreach ($schedules as $schedule) {
                $salon->schedules()->create($schedule);
            }


            $salon->locations()->create([
                "lat" => $this->faker->latitude,
                "lng" => $this->faker->longitude,
                "city_id" => City::query()->inRandomOrder()->first()->id,
                "address" => $this->faker->address
            ]);

            for ($i = 0; $i < 5; $i++) {
                $salon->photos()->create([
                    'url' => 'https://picsum.photos/200/300'
                ]);
            }

            for ($i = 0; $i < 3; $i++) {
                $salon->services()->create([
                    'service_type' => $this->faker->numberBetween(1, 2),
                    'name' => $this->faker->sentence(4),
                    'price' => $this->faker->numberBetween(10000, 1000000)
                ]);
            }

            for ($i = 0; $i < 3; $i++) {
                $review = $salon->reviews()->create([
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
