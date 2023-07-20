<!DOCTYPE html>
<!DOCTYPE html>
<html>
    <head>
        <title>Verifikasi Hasil Penilaian Kinerja Guru</title>
        <style>
            @page {
            size: F4;
            margin: 0;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            font-size: 12pt;
            padding: 50px; /* Tambahkan padding agar konten tidak tepat di pinggir kertas */
        }

        /* Tambahkan gaya tambahan untuk konten halaman */
        /* Misalnya, gaya untuk tabel, header, dan footer */

        .center {
            text-align: center;
        }
        
        .table {
            width: 100%;
            border-collapse: collapse;
        }
        
        .table td, .table th {
            border: 1px solid black;
            padding: 8px;
        }
        
        .table th {
            background-color: #f2f2f2;
        }
        
        .header {
            font-size: 14pt;
            font-weight: bold;
            margin-bottom: 20px;
        }
        
        .header img {
            height: 100px; /* Sesuaikan tinggi gambar */
            width: auto; /* Atau sesuaikan lebar gambar jika perlu */
        }

        .header-info {
            text-align: left;
            font-size: 12pt;
            margin-bottom: 10px;
        }
        
        .footer {
            font-size: 10pt;
            margin-top: 50px;
        }
        
        .signature {
            margin-top: 50px;
            text-align: center;
        }
        
        .signature p {
            margin-bottom: 20px;
        }
        </style>
</head>
<body>
    <img src="<?=routeTo('assets/img/logokhazanah1.jpeg')?>" width="100px" alt="logo" style="object-fit:contain;"> <!-- Ganti "path_to_logo.png" dengan path gambar logo sekolah -->
    <div class="header">
        <div class="header center">
            YAYASAN KHAZANAH ILMU<br>
            SEKOLAH DASAR KHAZANAH ILMU<br>
            NSS: 104050214056    NPSN: 20576103<br>
            Jl. Ubi II, No. 23 Wage, Taman, Sidoarjo  031-8553790 / 08113218110<br>
        </div>
        <div class="center">
            VERIFIKASI HASIL PENILAIAN KINERJA GURU<br>
            TAHUN AJARAN 2022/2023
        </div>
        <div class="header-info">
            Nama Ketua Yayasan : ...........................<br>
            Nama Kepala Sekolah : .............................<br>
            Nama Guru Yang Dinilai : ..........................<br>
            Jabatan Fungsional/Struktural : ......................../................<br>
            Nama Pengawas/ Verifikator   : ...............................<br>
            Semester : .......................................<br>
            Rentang waktu penilaian : ......................... - ......................<br>
            Tanggal Verifikasi : ..........., ..............,...............<br>
            Tanggal Pengesahan : ..........., ..............,...............<br>
        </div>
    </div>

    <!-- Tambahkan konten halaman sesuai dengan struktur yang diberikan -->

    <table class="table">
        <tr>
            <th>No</th>
            <th>Kompetensi dan Sub Kompetensi</th>
            <th>Nilai PKG</th>
            <th>Keterangan</th>
        </tr>
        <!-- Tambahkan baris data tabel -->
    </table>

    <div class="signature">
        <p>Guru Yang Dinilai</p>
        <p>..........................................</p>
        <p>Nik : ...............................</p>
    </div>

    <div class="footer center">
        Sidoarjo, 15 Desember 2023
    </div>

    <script>
        // Otomatis memanggil fungsi cetak saat halaman dimuat
        window.onload = function() {
            window.print();
        };
    </script>
</body>
</html>


