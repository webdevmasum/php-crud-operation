<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>php crud test</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1 class="text-center bg-warning mt-3">PHP CRUD OPERATION</h1>

        <form action="test.php" method="post" class="col-6 offset-3 bg-warning p-4">
            <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" class="form-control" placeholder="Enter your name">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control" placeholder="Enter your email">
            </div>
            <div class="form-group">
                <label>Mobile</label>
                <input type="number" name="mobile" class="form-control" placeholder="Enter your number">
            </div>
            <div class="form-group mt-2">
                <input type="submit" name="submit" value="Submit" class="btn btn-info">
            </div>
        </form>
    </div>

    <div class="container mt-4">
        <h3 class="bg-info text-center p-2">From Records</h3>
        <table class="table table-border">
            <tr class="bg-dark text-info text-center">
                <th>S.No</th>
                <th>Name</th>
                <th>Email</th>
                <th>Mobile</th>
                <th>Actions</th>
            </tr>
        </table>
    </div>
    
    
</body>
</html>