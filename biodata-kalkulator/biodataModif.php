<?php
// biodata_tugas1.php

function statusKelulusan(float $ipk): string
{
    // MODIFIKASI: Menambahkan validasi batas maksimal IPK
    if ($ipk > 4.00) return 'Tidak Valid (Maksimal 4.00)'; 
    if ($ipk >= 3.50) return 'Cumlaude (enjoy santuy relax)';
    if ($ipk >= 3.00) return 'Memuaskan';
    return 'Perlu Peningkatan';
}

$mahasiswa = [
    'nim' => '24023',
    'nama' => 'Damar',
    // MODIFIKASI: Menambahkan field baru yaitu fakultas
    'fakultas' => 'Ilmu Komputer',
    'prodi' => 'Teknik Informatika',
    'semester' => 5,
    'ipk' => 3.1
];
?>

<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <title>Biodata Modifikasi</title>
    <!-- MODIFIKASI: Menambahkan Styling CSS agar rapi -->
    <style>
        body { 
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; 
            background-color: #f0f2f5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .card { 
            background-color: #ffffff; 
            border-radius: 12px; 
            box-shadow: 0 8px 16px rgba(0,0,0,0.1); 
            padding: 30px; 
            width: 350px; 
        }
        h1 { 
            text-align: center; 
            color: #333333; 
            font-size: 1.6em;
            margin-top: 0;
            border-bottom: 2px solid #007BFF;
            padding-bottom: 15px;
            margin-bottom: 20px;
        }
        ul { 
            list-style-type: none; 
            padding: 0; 
            margin: 0;
        }
        li { 
            padding: 10px 0; 
            border-bottom: 1px solid #f1f1f1; 
            color: #555555;
            font-size: 1.05em;
        }
        li:last-child {
            border-bottom: none;
        }
        li strong {
            color: #222222;
            display: inline-block;
            width: 100px; /* Agar titik duanya sejajar */
        }
        .predikat { 
            background-color: #d4edda; 
            color: #155724; 
            padding: 15px; 
            border-radius: 8px; 
            font-weight: bold; 
            text-align: center;
            margin-top: 25px;
            border: 1px solid #c3e6cb;
            font-size: 1.1em;
        }
    </style>
</head>

<body>
    <div class="card">
        <h1>Biodata Mahasiswa</h1>
        <ul>
            <?php foreach ($mahasiswa as $kunci => $nilai): ?>
                <li><strong><?= ucfirst($kunci) ?></strong> : <?= htmlspecialchars((string)$nilai) ?></li>
            <?php endforeach; ?>
        </ul>

        <div class="predikat">Predikat: <?= statusKelulusan($mahasiswa['ipk']) ?></div>
    </div>
</body>

</html>