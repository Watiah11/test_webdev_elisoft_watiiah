<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

    <title>Dashboard</title>
</head>
<body>

<div class="container" style="margin-top: 50px">
    <div class="row">

        <div class="col-md-3">
            <ul class="list-group">
                <li class="list-group-item active">MAIN MENU</li>
                <a href="{{ route('dashboard.index') }}" class="list-group-item" style="color: #212529;">Dashboard</a>
                <li class="list-group-item">Profile</li>
                <a href="#" id="logout" class="list-group-item" style="color: #212529;">Logout</a>
            </ul>
        </div>

        <div class="col-md-9">
            <div class="card">
                <div class="card-body">
                    <label>DASBOARD</label>
                    <hr>
                    Selamat Datang {{ Auth::user()->name }}
                </div>
            </div>
        </div>

    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.all.min.js"></script>

<script>
    $(document).ready(function() {
        // Tambahkan event click pada tombol logout
        $("#logout").click(function(e) {
            e.preventDefault();

            // Tampilkan konfirmasi SweetAlert
            Swal.fire({
                title: 'Konfirmasi Logout',
                text: 'Anda yakin ingin logout?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Ya',
                cancelButtonText: 'Tidak'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Jika pengguna yakin, arahkan kembali ke halaman login setelah 2 detik
                    Swal.fire({
                        title: 'Logout Berhasil!',
                        text: 'Anda akan diarahkan ke halaman login dalam 2 detik',
                        icon: 'success',
                        timer: 2000,
                        showConfirmButton: false
                    }).then(() => {
                        window.location.href = "{{ route('logout') }}";
                    });
                }
            });
        });
    });

    function confirmLogout() {
        Swal.fire({
            title: 'Apakah Anda yakin ingin logout?',
            text: "Anda akan diarahkan kembali ke halaman login.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Logout'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('logout-form').submit();
            }
        });
    }
</script>
</body>
</html>
