<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>reader view</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{route('custhome')}}">EasyLib (Admin)</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{route('home')}}">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="create-book">Add Book</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="create-category">Add category</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="view-reader">Reader List</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="view-book">Book List</a>
          </li>
        </ul> 
        <form class="d-flex" role="search">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
      </div>
    </div>
  </nav>
 
    <div class="m-5">
        <h1>View Reader</h1>
        <table class="table">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Name</th>
              <th scope="col">Book</th>
              <th scope="col">Email</th>
              <th scope="col">Address</th>
              <th scope="col">Shipping</th>
              <th scope="col">PaymentMethod</th>
            </tr>
          </thead>
          <tbody>
              @foreach ( $readers as $reader)
              <tr>
                  <td>{{$loop->iteration}}</td>
                  <td>{{$reader->ReaderName}}</td>
                  <td>
                      @foreach ($reader->books as $item)
                          {{$item->Title}} <br>
                      @endforeach
                  </td>
                  <td>{{$reader->ReaderEmail}}</td>
                  <td>{{$reader->Address}}</td>
                  <td>{{$reader->Shipping}}</td>
                  <td>{{$reader->PaymentMethod}}</td>
              </tr>
              @endforeach
          </tbody>
        </table>
    </div>

 
    
</body>
</html>
