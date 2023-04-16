<?php

namespace Database\Factories;

use App\Models\Port;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Enumerable;
use DateTime;
use DateInterval;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\flight>
 */
class FlightFactory extends Factory
{
    private ?Enumerable $ports = null;

    public function definition(): array
    {
        $flightDurationInHours = fake()->randomFloat(1, 3, 12);
        $flightDurationInMinutes = round($flightDurationInHours * 60);

        $departureTime = new DateTime(fake()->date());

        $interval = DateInterval::createFromDateString( sprintf('%s minutes', $flightDurationInMinutes));
        $arrivalTime = $departureTime->add($interval);

        $sourcePort = $this->getPorts()->random()->getKey();
        $destinationPort = $this->getPorts()->random()->getKey();

        return [
            'source_port' => $sourcePort,
            'destination_port' => $destinationPort,
            'departure_time' => $departureTime,
            'arrival_time' => $arrivalTime
        ];
    }

    public function getPorts() : Enumerable {
        if ( $this->ports == null ) {
            $this->ports = Port::query()->limit(100)->get();
        }

        return $this->ports;
    }
}
