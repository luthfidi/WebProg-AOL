<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add new book</title>
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
      <h1>Add New Book</h1>
      <form action="/store-book" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Title</label>
          <input type="text" value="{{old('Title')}}" class="form-control @error('Title') is-invalid @enderror"  id="exampleInputPassword1" name="Title">
        </div>

        @error('Title')
        <div class="alert alert-danger" role="alert">{{$message}}</div>
        @enderror

        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Publication Date</label>
            <input type="date" value="{{old('PubDate')}}" class="form-control @error('PublicationDate') is-invalid @enderror" id="exampleInputPassword1" name="PubDate">
        </div>

        @error('PublicationDate')
        <div class="alert alert-danger" role="alert">{{$message}}</div>
        @enderror

        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Author</label>
            <input type="text" value="{{old('Author')}}" class="form-control @error('Author') is-invalid @enderror" id="exampleInputPassword1" name="Author">
        </div>

        @error('Author')
        <div class="alert alert-danger" role="alert">{{$message}}</div>
        @enderror

        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">ISBN</label>
            <input type="text" value="{{old('ISBN')}}" class="form-control @error('ISBN') is-invalid @enderror" id="exampleInputPassword1" name="ISBN">
        </div>

        @error('ISBN')
        <div class="alert alert-danger"role="alert">{{$message}}</div>
        @enderror

        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Publisher</label>
            <input type="text" value="{{old('Publisher')}}" class="form-control @error('Publisher') is-invalid @enderror" id="exampleInputPassword1" name="Publisher">
        </div>

        @error('Publisher')
        <div class="alert alert-danger" role="alert">{{$message}}</div>
        @enderror

        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Print Length</label>
            <input type="number" value="{{old('PrintLength')}}" class="form-control @error('PrintLength') is-invalid @enderror" id="exampleInputPassword1" name="PrintLength">
        </div>
        
        @error('PrintLength')
        <div class="alert alert-danger" role="alert">{{$message}}</div>
        @enderror

        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Stock</label>
            <input type="number" value="{{old('Stock')}}" class="form-control @error('Stock') is-invalid @enderror" id="exampleInputPassword1" name="Stock">
        </div>

        @error('Stock')
        <div class="alert alert-danger" role="alert">{{$message}}</div>
        @enderror

        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Category</label>
          <select class="form-select" aria-label="Default select example" name="CategoryName">
            @foreach ($categories as $category)
              <option value="{{$category->id}}">{{$category->CategoryName}}</option>
            @endforeach
          </select>
        </div>

        
  
        <div class="mb-3">
          <label for="formFile" class="form-label">Image</label>
          <input class="form-control @error('Image') is-invalid @enderror" type="file" id="formFile" name="Image">
        </div>

        @error('Image')
        <div class="alert alert-danger" role="alert">{{$message}}</div>
        @enderror

        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
</body>
</html>
