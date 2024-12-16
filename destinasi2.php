    <!DOCTYPE html>
    <html lang="id">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Web Banggai | Wishlist Kota Amel</title>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
        <style>
            /* Warna dan Gaya Umum Tabel */
            table {
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
                border-radius: 8px;
                overflow: hidden;
            }

            th {
                background-color: #f472b6; /* Pink Cerah Lembut */
                color: white;
                font-weight: bold;
                padding: 12px;
                text-transform: uppercase;
            }   



            td {
                color: #444; /* Warna teks lebih lembut */
                padding: 12px;
                border-bottom: 1px solid #f7d8df; /* Garis bawah halus */
            }

            /* Warna Bergantian pada Baris */
            tr:nth-child(even) {
                background-color: #fef2f4; /* Pink Muda Lembut */
            }

            tr:nth-child(odd) {
                background-color: #fff; /* Putih */
            }

            /* Hover Efek */
            tr:hover {
                background-color: #fce7f3; /* Pink Soft saat hover */
                transition: background-color 0.3s ease-in-out;
            }

            /* Gaya Tombol */
            .btn {
                background-color: #f78da7; /* Pink Lebih Muda */
                color: white;
                padding: 8px 14px;
                border-radius: 9999px;
                font-size: 14px;
                font-weight: 500;
                transition: all 0.3s ease-in-out;
                text-decoration: none;
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            }

            .btn:hover {
                background-color: #f47296; /* Pink Muda Lebih Intens saat Hover */
                transform: translateY(-2px);
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
            }
            
        </style>
    </head>

    <body class="bg-gray-100">
        <!-- Navbar -->
        <nav class="bg-white shadow-md fixed w-full z-10">
            <div class="container mx-auto px-6 py-4 flex justify-between items-center">
                <div class="text-2xl font-bold text-pink-600">Hello Banggai</div>
                <div>
                    <a href="index.html" class="text-gray-800 hover:text-pink-600 mx-3">Home</a>
                    <a href="destinasi.html" class="text-gray-800 hover:text-pink-600 mx-3">Destinasi</a>
                    <a href="destinasi2.php" class="text-gray-800 hover:text-pink-600 mx-3">Data</a>
                    <a href="map.html" class="text-gray-800 hover:text-pink-600 mx-3">Map</a>
                    <a href="Kontak.html"
                        class="bg-pink-600 text-white px-4 py-2 rounded-full hover:bg-pink-700">Kontak</a>
                </div>
            </div>
        </nav>

        <!-- PHP: Ambil Data dari Database -->
        <?php
        // Koneksi ke database
        $conn = new mysqli("localhost", "root", "", "destinasi");

        // Periksa koneksi
        if ($conn->connect_error) {
            die("Koneksi Gagal: " . $conn->connect_error);
        }

        // Query untuk mengambil data
        $sql = "SELECT * FROM pariwisata";
        $result = $conn->query($sql);
        ?>

        <!-- Konten: Tabel Data Pariwisata -->
        <div class="container mx-auto px-6 py-16">
            <h2 class="text-3xl font-bold text-center mb-10 mt-6">Data Destinasi Pariwisata</h2>
            <table class="table-auto w-full border-collapse">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Destinasi</th>
                        <th>Latitude</th>
                        <th>Longitude</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td class='border'>" . htmlspecialchars($row["id"]) . "</td>";
                            echo "<td class='border'>" . htmlspecialchars($row["Kabupaten"]) . "</td>";
                            echo "<td class='border'>" . htmlspecialchars($row["latitude"]) . "</td>";
                            echo "<td class='border'>" . htmlspecialchars($row["longitude"]) . "</td>";
                            echo "<td class='border text-center'>
                                    <a href='map.html' class='btn'>Map</a>
                                    <a href='delete.php?id=" . $row["id"] . "' class='btn' onclick=\"return confirm('Hapus data ini?')\">Delete</a>
                                </td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='6' class='text-center'>Tidak ada data</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <?php
        // PHP akan otomatis menutup koneksi saat script selesai.
        ?>
    </body>

    </html>
