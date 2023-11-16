<?php
include '../admin/connection.php';

# login
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = mysqli_query($conn, "SELECT * FROM user WHERE email = '$email'");
    $cek = mysqli_num_rows($query);
    $data = mysqli_fetch_array($query);


    $password_verify = password_verify($password, $data['password']);


    if ($cek == 0) {
        echo "
			<br />
			<div class='alert alert-danger' role='alert' align='center'>
			Email tidak terdaftar !
			</div>";
    } elseif ($password == $password_verify) {
        $_SESSION['id_user'] = $data['id'];
        $_SESSION['nama_user'] = $data['nama_user'];
        $_SESSION['email'] = $data['email'];
        $_SESSION['role'] = $data['role'];

        if ($data['role'] == 'admin') {
            echo "
                <script>
                    alert('Selamat Datang Admin');
                    document.location.href='../admin/index.php';
                </script>
            ";
        } elseif ($data['role'] == 'user') {
            echo "
                <script>
                    alert('Selamat Datang User');
                    document.location.href='index.php';
                </script>
            ";
        }
    }
}


# register
if (isset($_POST['register'])) {
    $nama_user = $_POST['name'];
    $email = $_POST['email'];
    $alamat = $_POST['alamat'];
    $no_hp = $_POST['no_hp'];
    $password = $_POST['password'];
    $hash_password = password_hash($password, PASSWORD_DEFAULT);
    $role = 'user';

    $query = mysqli_query($conn, "INSERT INTO user (nama_user, email, alamat, no_hp, password, role) VALUES ('$nama_user', '$email', '$alamat', '$no_hp', '$hash_password', '$role')");

    if ($query) {
        echo "
            <script>
                alert('Registrasi Berhasil');
                document.location.href = 'login.php';
            </script>
         ";
    } else {
        echo "
            <script>
                alert('Registrasi Gagal');
                document.location.href = 'register.php';
            </script>
        ";
    }
}
