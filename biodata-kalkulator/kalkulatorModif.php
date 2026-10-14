<?php
$hasil = null;
$pesan = '';
// Variabel untuk menampung input agar tidak hilang setelah disubmit
$input_a = '';
$input_b = '';
$input_op = '+';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input_a = $_POST['a'] ?? '';
    $input_b = $_POST['b'] ?? '';
    $input_op = $_POST['operator'] ?? '+';

    $a = (float) $input_a;
    $b = (float) $input_b;

    switch ($input_op) {
        case '+' :
            $hasil = $a + $b;
            break;
        case '-' :
            $hasil = $a - $b;
            break;
        case '*' :
            $hasil = $a * $b;
            break;
        case '/':
            if ($b == 0) {
                $pesan = 'Error: Tidak dapat membagi angka dengan nol!'; 
            } else {
                $hasil = $a / $b;
            }
            break;
        // MODIFIKASI: Menambahkan operator Modulus (Sisa Bagi)
        case '%':
            if ($b == 0) {
                $pesan = 'Error: Pembagi untuk sisa bagi tidak boleh nol!';
            } else {
                $hasil = fmod($a, $b);
            }
            break;
        // MODIFIKASI: Menambahkan operator Pangkat
        case '**':
            $hasil = $a ** $b;
            break;
        default:
            $pesan = 'Operator tidak valid!';
    }
}
?>

<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <title>Kalkulator Pro</title>
    <style>
        /* MODIFIKASI: Peningkatan Styling CSS */
        body { 
            font-family: Arial, sans-serif; 
            background-color: #e9ecef; 
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container { 
            background: white; 
            padding: 30px; 
            border-radius: 12px; 
            width: 320px; 
            box-shadow: 0 8px 16px rgba(0,0,0,0.15); 
        }
        h1 { text-align: center; color: #343a40; font-size: 1.5em; margin-top: 0; }
        .form-group { margin-bottom: 15px; }
        input, select, button, .btn-reset { 
            width: 100%; 
            padding: 12px; 
            box-sizing: border-box; 
            border-radius: 6px;
            border: 1px solid #ced4da;
            font-size: 1em;
        }
        select { cursor: pointer; }
        button { 
            background-color: #007BFF; 
            color: white; 
            border: none; 
            cursor: pointer; 
            font-weight: bold; 
            transition: 0.2s; 
        }
        button:hover { background-color: #0056b3; }
        
        .btn-reset {
            display: block;
            text-align: center;
            text-decoration: none;
            background-color: #dc3545;
            color: white;
            border: none;
            margin-top: 10px;
            font-weight: bold;
            transition: 0.2s;
        }
        .btn-reset:hover { background-color: #c82333; }

        .alert-error { 
            color: #721c24; 
            background-color: #f8d7da; 
            border: 1px solid #f5c6cb;
            padding: 12px; 
            border-radius: 6px; 
            margin-top: 15px; 
            text-align: center;
            font-weight: bold;
        }
        .alert-success { 
            color: #155724; 
            background-color: #d4edda; 
            border: 1px solid #c3e6cb;
            padding: 12px; 
            border-radius: 6px; 
            margin-top: 15px; 
            text-align: center;
            font-weight: bold; 
            font-size: 1.1em;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Kalkulator Pro</h1>
        <form method="post">
            <div class="form-group">
                <!-- Atribut value ditambahkan agar input tidak reset -->
                <input type="number" step="any" name="a" required placeholder="Angka Pertama" value="<?= htmlspecialchars((string)$input_a) ?>">
            </div>
            
            <div class="form-group">
                <select name="operator">
                    <option value="+" <?= $input_op === '+' ? 'selected' : '' ?>>+ (Tambah)</option>
                    <option value="-" <?= $input_op === '-' ? 'selected' : '' ?>>- (Kurang)</option>
                    <option value="*" <?= $input_op === '*' ? 'selected' : '' ?>>* (Kali)</option>
                    <option value="/" <?= $input_op === '/' ? 'selected' : '' ?>>/ (Bagi)</option>
                    <option value="%" <?= $input_op === '%' ? 'selected' : '' ?>>% (Sisa Bagi)</option>
                    <option value="**" <?= $input_op === '**' ? 'selected' : '' ?>>^ (Pangkat)</option>
                </select>
            </div>
            
            <div class="form-group">
                <input type="number" step="any" name="b" required placeholder="Angka Kedua" value="<?= htmlspecialchars((string)$input_b) ?>">
            </div>
            
            <button type="submit">Hitung</button>
            <a href="kalkulator.php" class="btn-reset">Reset Kalkulator</a>
        </form>

        <?php if ($pesan): ?>
            <div class="alert-error"><?= htmlspecialchars($pesan) ?></div>
        <?php elseif ($hasil !== null): ?>
            <div class="alert-success">Hasil: <?= htmlspecialchars((string)$hasil) ?></div>
        <?php endif; ?>
    </div>
</body>
</html>