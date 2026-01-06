<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.8/js/bootstrap.min.js"
        integrity="sha512-nKXmKvJyiGQy343jatQlzDprflyB5c+tKCzGP3Uq67v+lmzfnZUi/ZT+fc6ITZfSC5HhaBKUIvr/nTLCV+7F+Q=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.8/css/bootstrap.min.css"
        integrity="sha512-2bBQCjcnw658Lho4nlXJcc6WkV/UxpE/sAokbXPxQNGqmNdQrWqtw26Ns9kFF/yG792pKR1Sx8/Y1Lf1XN4GKA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Add Artist</title>
</head>

<body>
    <form action="{{ url('artists') }}" METHOD="POST">
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Artist Name</label>
            <input type="text" name="artist_name" class="form-control" id="exampleInputEmail1"
                aria-describedby="emailHelp">

        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Country</label>
            <input type="text" name="country" class="form-control" id="exampleInputEmail1"
                aria-describedby="emailHelp">

        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Image</label>
            <input type="text" name="image" class="form-control" id="exampleInputEmail1"
                aria-describedby="emailHelp">

        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</body>

</html>
