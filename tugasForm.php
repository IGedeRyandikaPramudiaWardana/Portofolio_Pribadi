<?php include "koneksi.php"; ?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Form Biodata Karyawan</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 text-gray-800 font-sans">

  <main class="max-w-3xl mx-auto mt-6 p-6 bg-white shadow-md rounded-lg">
    <h2 class="text-2xl font-bold mb-4">Update Biodata Karyawan</h2>
    <hr class="mb-6">

    <!-- Form -->
    <form action="" method="post" class="space-y-4">
      <div>
        <label class="block font-semibold">Nama</label>
        <input type="text" name="nama" placeholder="Tuliskan Nama Anda"
          class="w-full border rounded p-2 mt-1">
      </div>

      <div>
        <label class="block font-semibold">Password</label>
        <input type="password" name="password" placeholder="Tuliskan Password Anda"
          class="w-full border rounded p-2 mt-1">
      </div>

      <div>
        <label class="block font-semibold">Jenis Kelamin</label>
        <input type="radio" name="jenis_kelamin" value="Laki-laki" checked> Laki-laki
        <input type="radio" name="jenis_kelamin" value="Perempuan"> Perempuan
      </div>

      <div>
        <label class="block font-semibold">Hobi</label>
        <input type="checkbox" name="hobi[]" value="Membaca"> Membaca
        <input type="checkbox" name="hobi[]" value="Menulis"> Menulis
        <input type="checkbox" name="hobi[]" value="Memancing"> Memancing
      </div>

      <div>
        <label class="block font-semibold">Asal Kota</label>
        <select name="asal_kota" class="w-full border rounded p-2 mt-1">
          <option value="Jakarta">Jakarta</option>
          <option value="Bandung">Bandung</option>
          <option value="Semarang">Semarang</option>
        </select>
      </div>

      <div>
        <label class="block font-semibold">Komentar</label>
        <textarea name="komentar" rows="3" class="w-full border rounded p-2 mt-1"></textarea>
      </div>

      <div class="text-right">
        <button type="submit" name="simpan"
          class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Simpan</button>
      </div>
    </form>

    <?php
    if (isset($_POST['simpan'])) {
        $nama  = $_POST['nama'];
        $pass  = $_POST['password'];
        $jk    = $_POST['jenis_kelamin'];
        $hobi  = isset($_POST['hobi']) ? implode(", ", $_POST['hobi']) : "";
        $kota  = $_POST['asal_kota'];
        $komen = $_POST['komentar'];

        $sql = "INSERT INTO biodata (nama, password, jenis_kelamin, hobi, asal_kota, komentar)
                VALUES ('$nama','$pass','$jk','$hobi','$kota','$komen')";
        mysqli_query($conn, $sql);
    }
    ?>

    <h3 class="text-xl font-bold mt-6 mb-2">Data Karyawan</h3>
    <table class="border-collapse border border-gray-400 w-full text-sm text-center">
      <tr class="bg-gray-200">
        <th class="border p-2">Nama</th>
        <th class="border p-2">Jenis Kelamin</th>
        <th class="border p-2">Hobi</th>
        <th class="border p-2">Asal Kota</th>
        <th class="border p-2">Komentar</th>
      </tr>
      <?php
      $result = mysqli_query($conn, "SELECT * FROM biodata ORDER BY id DESC");
      while ($row = mysqli_fetch_assoc($result)) {
          echo "<tr>";
          echo "<td class='border p-2'>{$row['nama']}</td>";
          echo "<td class='border p-2'>{$row['jenis_kelamin']}</td>";
          echo "<td class='border p-2'>{$row['hobi']}</td>";
          echo "<td class='border p-2'>{$row['asal_kota']}</td>";
          echo "<td class='border p-2'>{$row['komentar']}</td>";
          echo "</tr>";
      }
      ?>
    </table>
  </main>

</body>
</html>
