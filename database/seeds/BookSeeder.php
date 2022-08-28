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
                'book_statu_id' => 2,
                'name'=> 'mil años de soledad',
                'age' => 1992,
                'description' => 'Relata la historia del un hombre solitario',
                'created_by' => 1,
                'updated_by' => 1,
            ],
            [
                'book_statu_id' => 2,
                'name'=> 'El principito',
                'age' => 1800,
                'description' => 'Relata la historia del un niño aventurero',
                'created_by' => 1,
                'updated_by' => 1,
            ],
        ];

        foreach ($books as $book) {
            $large = Book::create($book);
            $large->users()->sync(1);
        }
    }
}
