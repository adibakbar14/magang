<!DOCTYPE html>
<html>
<head>
    <title>Edit Pengguna</title>
</head>
<body>
    <h1>Edit Pengguna</h1>
    <form action="/user/update/<?= esc($user['id']) ?>" method="post">
        <label for="name">Nama:</label>
        <input type="text" name="name" id="name" value="<?= esc($user['name']) ?>">
        <br>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" value="<?= esc($user['email']) ?>">
        <br>
        <button type="submit">Update</button>
    </form>
</body>
</html>
