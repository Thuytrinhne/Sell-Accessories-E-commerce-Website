<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">

</head>
<body>
    <div class="container">
        <div class="table-responsive">
            <table class="table table-primary">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Des</th>
                    </tr>
                </thead>
                <tbody>
                <tr class="">
                        
                    
                    @foreach($data as $d)
                    <tr class="">
                        <td>{{$d->ID}}</td>
                        <td>{{$d->Name_Product}}</td>
                        <td>{{$d->Description}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <hr>
            {{$data->links()}}
        </div>
        
    </div>
</body>
</html>