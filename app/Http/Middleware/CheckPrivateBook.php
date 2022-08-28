<?php

namespace App\Http\Middleware;

use App\Book;
use Closure;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckPrivateBook
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $bookId = $request->route('id');

        if ($bookId == null) return $next($request);

        $book = Book::find($bookId);

        if ($book == null) return $next($request);

        if ($book->book_statu_id == 1) {
          $permission = $book->users->search(function ($user) {
            return $user->id == Auth::user()->id;
          });
  
          if (!$permission) return redirect('books')->with(["error-message" => "Usted no tiene permisos para ver este libro"]);
        }

        return $next($request);
    }
}
