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
            font-size: 10pt;
            padding: 50px;
            /* Tambahkan padding agar konten tidak tepat di pinggir kertas */
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

        .table td,
        .table th {
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
            position: relative;
        }

        .header img {
            position: absolute;
            top: 0;
            left: 0;
            height: 100px;
            /* Sesuaikan tinggi gambar */
            width: auto;
            /* Atau sesuaikan lebar gambar jika perlu */
        }

        .header .header-text {
            margin-left: 100px;
            /* Sesuaikan margin kiri sesuai lebar logo */
        }

        .signature2 {
            margin-left: 400px;
            margin-top: 20px;
            margin-bottom: 20px;
        }

        .signature {

            margin-top: 20px;
            margin-bottom: 20px;
        }

        .footer {
            font-size: 10pt;
            margin-top: 50px;
        }
    </style>
</head>

<body>
    <div class="header center">
        <img src="<?= routeTo('assets/img/logokhazanah1.jpeg') ?>" width="100px" alt="logo" style="object-fit:contain;"> <!-- Ganti "path_to_logo.png" dengan path gambar logo sekolah -->
        <div class="header-text">
            YAYASAN KHAZANAH ILMU<br>
            SEKOLAH DASAR KHAZANAH ILMU<br>
            NSS: 104050214056 NPSN: 20576103<br>
            Jl. Ubi II, No. 23 Wage, Taman, Sidoarjo
            031-8553790 / 08113218110
        </div>
    </div>
    <hr>

    <div class="center" style="font-weight: 600;">
        VERIFIKASI HASIL PENILAIAN KINERJA GURU<br>
        TAHUN AJARAN 2022/2023
    </div>

    <!-- Tambahkan konten halaman sesuai dengan struktur yang diberikan -->
    <div style="margin-bottom:10px;margin-top:20px">
        Nama Ketua Yayasan : ...........................<br>
        Nama Kepala Sekolah : .............................<br>
        Nama Guru Yang Dinilai : ..........................<br>
        Jabatan Fungsional/Struktural : ......................../................<br>
        Nama Pengawas/ Verifikator : ...............................<br>
        Semester : .......................................<br>
        Rentang waktu penilaian : ......................... - ......................<br>
        Tanggal Verifikasi : ..........., ..............,...............<br>
        Tanggal Pengesahan : ..........., ..............,...............<br>
    </div>

        <?php
        $no = 1;
        $huruf = range('A', 'Z');
        echo '<pre>';
        print_r($hasil_score);
        ?>
    <table class="table">
    <tr>
        <th>No</th>
        <th>Kompetensi</th>
        <th>Sub Kompetensi</th>
        <th>Nilai PKG</th>
        <th>Keterangan</th>
    </tr>

    <?php
        foreach ($categories as $key => $category) {
           foreach ($category->childs as $c => $child) {
    ?>
                    <tr>
                        <td><?= $no++?></td>
                        <td><?= $category->name?></td>
                        <td><?= $child->name; ?></td>
                        <td>Data kosong</td>
                        <td>Data kosong</td>
                    </tr>
    <?php
           }   
        }
    ?>
</table>



    <div class="signature2">
        Sidoarjo, 15 Desember 2023
    </div>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <div class="signature">

        <table style="width:100%">
            <tr>
                <th rowspan="3">Guru yang Dinilai<br><br><br><br><br><br>
                    <u>......................</u><br>
                    NIK : ............
                </th>
                <th rowspan="3">Kepala SD Khazanah Ilmu<br><br><br><br><br><br>
                    <u>Mohamad Rojii, M.Pd.</u><br>
                    NIK : 2015.037
                </th>
            </tr>
        </table>

        <table style="width:100%;margin-top:20px">
            <tr>
                <th rowspan="3">Pengawas/Verifikator<br><br><br><br><br><br>
                    <u>......................</u><br>
                    NIK : ............
                </th>

            </tr>
        </table>
    </div>

    <script>
        // window.onload = function() {
        //     window.print();
        // };
    </script>
</body>

</html>