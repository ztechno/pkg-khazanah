<!DOCTYPE html>
<html>

<head>
    <title>Verifikasi Hasil Penilaian Kinerja Guru</title>
    <style>
        @page {
            size: F4;
            margin: 0.7cm;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            font-size: 10pt;
            padding: 20px;
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
            /* text-align: center; */
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
    <table>
        <tr>
            <td width="200">Nama Ketua Yayasan</td>
            <td width="10">:</td>
            <td>...........................</td>
        </tr>
        <tr>
            <td>Nama Kepala Sekolah</td>
            <td>:</td>
            <td>...........................</td>
        </tr>
        <tr>
            <td>Nama Guru Yang Dinilai</td>
            <td>:</td>
            <td><?= $evaluator->teacher->name ?></td>
        </tr>
        <tr>
            <td>Jabatan Fungsional/Struktural</td>
            <td>:</td>
            <td>...........................</td>
        </tr>
        <tr>
            <td>Nama Pengawas/ Verifikator</td>
            <td>:</td>
            <td>...........................</td>
        </tr>
        <tr>
            <td>Semester</td>
            <td>:</td>
            <td>...........................</td>
        </tr>
        <tr>
            <td>Rentang waktu penilaian</td>
            <td>:</td>
            <td>...........................</td>
        </tr>
        <tr>
            <td>Tanggal Verifikasi</td>
            <td>:</td>
            <td>...........................</td>
        </tr>
        <tr>
            <td>Tanggal Pengesahan</td>
            <td>:</td>
            <td>...........................</td>
        </tr>
    </table>

</div>

<?php
$no = 1;
$huruf = range('A', 'Z');
?>
<table class="table" style="width:100%">
    <tr>
        <th>No</th>
        <th>Kompetensi/Sub Kompetensi</th>
        <th>Nilai PKG</th>
        <th>Keterangan</th>
    </tr>

    <?php
    foreach ($categories as $key => $category) {
        ?>
        <tr>
            <td style="text-align: center;"><?= $huruf[$key] ?></td>
            <td colspan="3"><b><?= $category->name ?></b></td>
        </tr>
        <?php
        $total = 0;
        $iterator = count($category->questions) ? $category->questions : $category->childs;
        foreach ($iterator as $c => $child) :
            $total += $dump_scores[$child->id];
            
            $nilai_pkg = $dump_scores[$child->id];
            $keterangan_nilai = '';
            $keterangan_nilai_total = '';

            // Bandingkan nilai PKG dengan rentang pada $keterangan
            foreach ($keterangan as $item) {
                if ($nilai_pkg >= $item->min_value && $nilai_pkg <= $item->max_value) {
                    $keterangan_nilai = $item->name;
                    
                }
            }
            
            foreach ($keterangan as $item) {
                if ($total >= $item->min_value && $nilai_pkg <= $item->max_value) {
                    $keterangan_nilai_total = $item->name;
                    
                }
            }
            ?>
            <tr>
                <td style="text-align: center;"><?= $no++ ?></td>
                <td><?= $child->name ?? $child->description ?></td>
                <td style="text-align: center;"><?= number_format($dump_scores[$child->id]) ?></td>
                <td>
                <?= $keterangan_nilai ?>
                </td>
            </tr>
        <?php endforeach ?>
        <tr>
            <td></td>
            <td>TOTAL</td>
            <td style="text-align: center;"><?= number_format($total) ?></td>
            <td><?= $keterangan_nilai_total ?></td>
        </tr>
    <?php } ?>
</table>




<div class="signature2">
    Sidoarjo, 15 Desember 2023
</div>

<div class="signature">

    <table style="width:100%">
        <tr>
            <th width="50%" rowspan="3">Guru yang Dinilai<br><br><br><br><br><br>
                <u><?= $evaluator->teacher->name ?></u><br>
                NIK : <?= $evaluator->teacher->nik ?>
            </th>
            <th width="50%" rowspan="3">Kepala SD Khazanah Ilmu<br><br><br><br><br><br>
                <u>Mohamad Rojii, M.Pd.</u><br>
                NIK : 2015.037
            </th>
        </tr>
    </table>

    <table style="width:100%;margin-top:20px">
        <tr>
            <th width="100%" rowspan="3">Pengawas/Verifikator<br><br><br><br><br><br>
                <u>......................</u><br>
                NIK : ............
            </th>

        </tr>
    </table>
</div>

    <script>
        window.onload = function() {
            window.print();
        };
    </script>
</body>

</html>