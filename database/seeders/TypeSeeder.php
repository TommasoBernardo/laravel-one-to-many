<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use PhpParser\Node\Stmt\Foreach_;
use App\Models\Type;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        //
        $types = ['Front-end', 'Back-end', 'Full-stack'];

        foreach ($types as $typeName) {
            $type = new Type();
            $type->name = $typeName;
            $type->color = $faker->unique()->hexColor();
            $type->save();
        }
    }
}
