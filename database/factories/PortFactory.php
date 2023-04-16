<?php

namespace Database\Factories;

use App\Models\City;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Enumerable;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\port>
 */
class PortFactory extends Factory
{

    /**
     * @var Enumerable|null|City[]
     */
    private ?Enumerable $cities = null;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $coordinates = fake()->localCoordinates();

        return [
            'name' => fake()->word(),
            'code' => strtoupper(fake()->unique()->text(8)),
            'longitude' => $coordinates['longitude'],
            'latitude' => $coordinates['latitude'],
            'city_id' => $this->getCities()->random()->getKey(),
        ];
    }

    /**
     * Memory cache
     * @return City[]|Enumerable
     */
    private function getCities(): Enumerable
    {
        if ($this->cities == null) {
            $this->cities = City::query()->limit(100)->get();
            /** @var City $city */
        }

        return $this->cities;
    }
}
