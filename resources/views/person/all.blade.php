<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>All Persons</h2>
        <span><a class="btn btn-success" href="{{ url('create-person') }}">Create Person</a></span>
        <table class="table table-striped">
            <thead>
                <th>Name</th>
                <th>Email</th>
                <th>Birth date</th>
                <th>City</th>
                <th>Salary</th>
                <th>Action</th>
            </thead>
            <tbody>
                @foreach($persons as $p)
                <tr>
                    <td>{{ $p->name }}</td>
                    <td>{{ $p->email }}</td>
                    <td>{{ $p->birth_date }}</td>
                    <td>{{ $p->city }}</td>
                    <td>{{ $p->salary }}</td>
                    <td>
                        <a class="btn btn-primary" href="{{ url('edit-person/'.$p->id) }}">Edit</a>
                        <a class="btn btn-danger" data-toggle="modal" data-target="#myModal{{ $p->id }}">Delete</a>
                        <div class="modal" id="myModal{{ $p->id }}">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Delete Confirmation</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                        Are you sure you want to delete {{ $p->name }}?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
                                        <a class="btn btn-danger" href="{{ url('delete-person/'.$p->id) }}">Yes</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>