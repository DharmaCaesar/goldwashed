<?php

namespace Database\Factories;

use App\Models\Outlets;
use Illuminate\Database\Eloquent\Factories\Factory;

class PackagesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'outlet_id' => $this -> faker -> randomElement(Outlets::select('id') -> get()),
            'package_type' => $this -> faker -> randomElements(['HEAVY', 'BLANKET', 'BED_COVER', 'SHIRTS', 'OTHERS', 'SUIT']) [0],
            'package_name' => $this -> faker -> word,
            'package_price' => $this -> faker -> numberBetween(5, 5000)
        ];
    }
}
