<!DOCTYPE html>
<html>
<head>
    <title>Laravel 9 Create PDF File using DomPDF Tutorial - LaravelTuts.com</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <h1>{{ $title }}</h1>
    <p>{{ $date }}</p>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
    tempor incididunt ut labore et dolore magna aliqua.</p>
  
    <table class="table table-bordered">
        <tr>
            <th>Name</th>
            <th>Manager</th>
            <th>Email</th>
            <th>Status</th>
            <th>Starting date</th>
            <th>Province</th>
            <th>District</th>
            <th>Sector</th>
            <th>Cell</th>

        </tr>
        @foreach($cooperatives as $cooperative)
            <tr>
                <td>{{ $cooperative->name }}</td>
                <td>{{ $cooperative->manager_name }}</td>
                <td>{{ cooperative->email }}</td>
                <td>{{ $cooperative->status }}</td>
                <td>{{ $cooperative->starting_date }}</td>
                <td>{{ cooperative->province }}</td>
                <td>{{ cooperative->district }}</td>
                <td>{{ cooperative->sector }}</td>
                <td>{{ cooperative->cell }}</td>
            </tr>
        @endforeach
    </table>
</body>
</html>