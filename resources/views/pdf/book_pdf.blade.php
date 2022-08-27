
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

</head>
<body>
    <div>
        <h1>Libros</h1>
        <table class="table table-striped">
          <thead class="thead-dark">
            <tr>
              <th>#</th>
              <th>Nombre</th>
              <th>Año</th>
              <th>Autores</th>
              <th>Creado por</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($books as $book)
              <tr>
                <td>{{ $book->id }}</td>
                <td>{{ $book->name }}</td>
                <td>{{ $book->age }}</td>
                <td>@foreach ($book->users as $user )
                    {{$user->name}}. </br>
                @endforeach</td>
                <td>{{ $book->creator->name }}</td>
              </tr>
            @endforeach
          </tbody>
        </table>
    </div>
</body>
</html>

