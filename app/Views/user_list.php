<!DOCTYPE html>
<html>
<head>
    <title>User List</title>
    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
    <script>
        var pusher = new Pusher('YOUR_APP_KEY', {
            cluster: 'YOUR_CLUSTER',
            encrypted: true
        });

        var channel = pusher.subscribe('my-channel');
        channel.bind('my-event', function(data) {
            alert('New user added: ' + data.message);
            // Tambahkan logika untuk menampilkan notifikasi ke pengguna
        });
    </script>
</head>
<body>
    <h1>Daftar Pengguna</h1>
    <a href="/user/create">Tambah Pengguna</a>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Aksi</th>
        </tr>
        <?php foreach ($users as $user): ?>
        <tr>
            <td><?= esc($user['id']) ?></td>
            <td><?= esc($user['name']) ?></td>
            <td><?= esc($user['email']) ?></td>
            <td>
                <a href="/user/edit/<?= esc($user['id']) ?>">Edit</a>
                <a href="/user/delete/<?= esc($user['id']) ?>" class="delete-user" data-id="<?= esc($user['id']) ?>">Hapus</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>

    <!-- Include SweetAlert2 library -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.12.5/dist/sweetalert2.all.min.js"></script>

    <!-- JavaScript untuk menampilkan notifikasi setelah hapus pengguna -->
    <script>
        // Tangkap tombol hapus pengguna dengan class delete-user
        const deleteButtons = document.querySelectorAll('.delete-user');

        deleteButtons.forEach(button => {
            button.addEventListener('click', function(event) {
                event.preventDefault();
                
                // Konfirmasi penggunaan SweetAlert2
                Swal.fire({
                    title: 'Apakah Anda yakin?',
                    text: "Anda tidak akan dapat mengembalikan ini!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, hapus saja!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Redirect untuk menghapus pengguna
                        const userId = button.getAttribute('data-id');
                        window.location.href = '/user/delete/' + userId;
                    }
                });
            });
        });
    </script>
</body>
</html>
