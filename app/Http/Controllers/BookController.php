<?php

namespace App\Http\Controllers;

use App\Book;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Mail;

class BookController extends Controller
{

    public function pdf()
    {
        $books = Book::with(['users'])->get();
        $pdf = Pdf::loadView('pdf.book_pdf', ['books'=>$books]);
        // return $pdf->download('__books.pdf');
        return $pdf->stream();
    }

    public function index()
    {
        $books = Book::with(['users'])->get();
        // Log::info($books);
        return view('book.books', compact('books'));
    }


    public function create()
    {
        $estado = 'create';
        return view('book.books_form', compact('estado'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=> 'required',
            'age'=> 'required',
            'description'=> 'required',
            'image'=> 'image',
        ]);

        $book = new Book();
        $book->name = $request->name;
        $book->age = $request->age;
        $book->description = '';

        if($request->description) {
            $book->description = $request->description;
        }

        if($request->image) {
            $url = Storage::disk('public')->put('images/users/books', $request->file('image'));
            $book->image = $url;
        }

        $book->save();
        
        $book->users()->sync(Auth::user()->id);
        return redirect('books')->with(["success-message" => "El libro ha sido creado exitosamente."]);

    }

    public function show($id)
    {
        $libro = Book::find($id);
        return view('book.show', compact('libro'));
    }

    public function edit($id)
    {
        $estado = 'edit';
        $book = Book::find($id);
        return view('book.books_form', compact('estado','book'));
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'name'=> 'required',
            'age'=> 'required',
            'description'=> 'required',
            'image'=> 'image',
        ]);

        $book = Book::find($id);
        $book->name = $request->name;
        $book->age = $request->age;
        $book->description = '';

        if($request->description) {
            $book->description = $request->description;
        }

        if($request->image) {
            if ($book->image != null) {
                if (file_exists(public_path() . '/' . $book->image)) {
                  unlink( public_path() . '/' . $book->image );
                }
              }
            $url = Storage::disk('public')->put('images/users/books', $request->file('image'));
            $book->image = $url;
        }

        $book->save();
        $book->users()->attach(Auth::user()->id);


        if (Auth::user()->id != $book->created_by) {
          $user = Auth::user();
          $data = [
            "user" => $user,
            "book" => $book,
          ];
          Mail::send('book.emails.notification', $data, function ($message) use($book) {
            $message
              ->from('example@example.com')
              ->to($book->creator->email, $book->creator->name)
              ->subject("Tu libro $book->name ha sido editado");
          });
        }

        return redirect('books')->with(["success-message" => "El libro ha sido actualizado exitosamente."]);


    }

    public function destroy($id)
    {
        $book = Book::find($id);
        if($book) {
            $book->delete();
            return redirect('books')->with(["success-message" => "El libro ha sido eliminado."]);
        } else {
            return redirect('books')->with(["error-message" => "Por alguna razon este libro ya no existia antes de eliminarlo"]);
        }
    }
}
