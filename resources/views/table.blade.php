<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Hello, Bootstrap Table!</title>
    <style>
      .center {
  margin-left: auto;
  margin-right: auto;
}

    </style>
<!-- <style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style> -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.18.3/dist/bootstrap-table.min.css">
  
</head>
<body>

<h2>HTML Table</h2>
<form method="POST"  action="{{ route('product.table') }}">
				@csrf
        <p align="right">
        <a class="btn btn-primary" role="button" href={{route('product.form')}} >Add New</a>
</p>
<table  class= "center" border = 2>
  <tr>
    <th scope="col">id</th>
    <th scope="col">name</th>
    <th scope="col">city</th>
  </tr>
  @foreach($data as $d)
  <tr>
    <td scope="row">{{$d->id}}</td>
    <td scope="row"> {{$d->name}}</td>
    <td scope="row"> {{$d->city}}</td>

    <td>
   
    
    <a href={{route('product.form.delete',$d->id)}}> Delete</a>
    <a href={{route('product.form.edit',$d->id)}}> Edit</a>
  </td>
  </tr>
  @endforeach
  {{ $data->links() }}
</table>
    <script src="https://cdn.jsdelivr.net/npm/jquery/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/bootstrap-table@1.18.3/dist/bootstrap-table.min.js"></script>
</body>
</html>
