<!DOCTYPE html>
<html>
<head>
    <title>Form Registrasi Mahasiswa Baru</title>
</head>
<body>
<h2>Formulir Registrasi Mahasiswa Baru</h2>
<form action="proses_registrasimhs.php" method="post">
    <table>
        <tr>
            <td>No. Pendaftaran</td>
            <td><input type="text" name="no_pendaftaran" required></td>
        </tr>
        <tr>
            <td>Nama Lengkap</td>
            <td><input type="text" name="nama_lengkap" required></td>
        </tr>
        <tr>
            <td>Jenis Kelamin</td>
            <td>
                <input type="radio" name="jenis_kelamin" value="Laki-laki" required> Laki-laki
                <input type="radio" name="jenis_kelamin" value="Perempuan"> Perempuan
            </td>
        </tr>
        <tr>
            <td>Tempat Lahir</td>
            <td><input type="text" name="tempat_lahir" required></td>
        </tr>
        <tr>
            <td>Tanggal Lahir</td>
            <td><input type="date" name="tanggal_lahir" required></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><input type="email" name="email" required></td>
        </tr>
        <tr>
            <td>No. HP</td>
            <td><input type="text" name="no_hp" required></td>
        </tr>
        <tr>
            <td>Program Studi</td>
            <td>
                <select name="prodi" required>
                    <option value="">-- Pilih Program Studi --</option>
                    <option value="D3 Teknik Informatika">D3 Teknik Informatika</option>
                    <option value="D3 Teknik Mesin">D3 Teknik Mesin</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td><textarea name="alamat" rows="2" cols="25" required></textarea></td>
        </tr>
        <tr>
            <td colspan="2" align="center">
                <input type="submit" value="Daftar">
                <input type="reset" value="Batal">
            </td>
        </tr>
    </table>
</form>
</body>
</html>