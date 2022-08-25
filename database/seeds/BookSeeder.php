<?php

use App\Book;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $books = [
            [
                'name'=> 'mill anos de soledad',
                'age' => 1992,
                'description' => 'Relata la historia del un hombre solitario',
            ],
            [
                'name'=> 'El principito',
                'age' => 1800,
                'description' => 'Relata la historia del un niño aventurero',
            ],
        ];

        foreach ($books as $book) {
            Book::create($book);
        }
    }
}
