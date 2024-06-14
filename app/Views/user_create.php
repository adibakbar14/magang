<!DOCTYPE html>
<html>
<head>
    <title>Tambah Pengguna</title>
    <!-- Include SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.12.5/dist/sweetalert2.min.css">
</head>
<body>
    <h1>Tambah Pengguna</h1>
    <form id="createForm" action="/user/store" method="post">
        <label for="name">Nama:</label><br>
        <input type="text" id="name" name="name"><br><br>
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email"><br><br>
        <button type="submit">Simpan</button>
    </form>

    <!-- Include SweetAlert2 library -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.12.5/dist/sweetalert2.all.min.js"></script>

    <!-- JavaScript untuk menampilkan notifikasi setelah menambah pengguna -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const createForm = document.getElementById('createForm');

            createForm.addEventListener('submit', function(event) {
                event.preventDefault();

                // Kirim data form menggunakan AJAX
                const formData = new FormData(createForm);
                fetch('/user/store', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Tampilkan notifikasi SweetAlert2
                        Swal.fire({
                            icon: 'success',
                            title: 'Anggota ditambahkan!',
                            showConfirmButton: false,
                            timer: 1500
                        });

                        // Redirect ke halaman daftar pengguna setelah 1.5 detik
                        setTimeout(() => {
                            window.location.href = '/user';
                        }, 1500);
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Terjadi kesalahan saat menambahkan anggota!'
                        });
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Terjadi kesalahan saat menambahkan anggota!'
                    });
                });
            });
        });
    </script>
</body>
</html>
