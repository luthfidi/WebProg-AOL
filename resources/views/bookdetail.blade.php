<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$book->Title}}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{route('home')}}">EasyLib</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{route('custhome')}}">Home</a>
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
        <h1>{{$book->Title}}</h1>
        <div class="container-md">
          <div class="row flex-wrap">
            <div class="col">
              <div class="card" style="width: 15rem; align-items: center;">
                <img src="{{asset('/storage/image/'.$book->Image)}}" style="width: 120px; height :200px; " class="card-img-top" alt="...">
                <div class="card-body">
                  <h2 class="card-title">{{$book->Title}}</h2>
                  <h4 class="card-title">{{$book->Author}}</h4>
                  <p class="card-text" style="font-size: 15px; margin: 0 0 10px;">{{$book->PublicationDate}}</p>
                  <p class="card-text" style="font-size: 15px; margin: 0 0 10px;">{{$book->Publisher}}</p>
                  <p class="card-text" style="font-size: 15px; margin: 0 0 10px;">ISBN: {{$book->ISBN}}</p>
                  <p class="card-text" style="font-size: 15px; margin: 0 0 10px;">Print length: {{$book->PrintLength}}</p>
                  <p class="card-text" style="font-size: 15px; margin: 0 0 10px;">Category: {{$book->category->CategoryName}}</p>
                  {{-- <a href="#" class="btn btn-primary">edit</a> --}}
                  {{-- <a href="{{route('edit', $book->id)}}" class="btn btn-primary">Order</a> --}}
                </div>
              </div>
            </
            <div class="col">
              <h3>Book Description</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
              <a href="{{route('payment', $book->id)}}" class="btn btn-success">Order now</a>
            </div>
          </div>
    </div>
</body>
</html>
