<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Absensi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f8;
            margin: 0; padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background: white;
            padding: 40px 60px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            text-align: center;
        }
        h1 {
            margin-bottom: 30px;
            color: #3498db;
        }
        a {
            display: inline-block;
            margin: 15px 20px;
            padding: 15px 30px;
            background: #3498db;
            color: white;
            text-decoration: none;
            font-weight: bold;
            border-radius: 6px;
            transition: background 0.3s ease;
        }
        a:hover {
            background: #2980b9;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Dashboard Sistem Absensi</h1>
        <a href="kelas/index.php">Manajemen Kelas</a>
        <a href="siswa/index.php">Manajemen Siswa</a>
        <a href="absensi/index.php">Manajemen Absensi</a>
    </div>
</body>
</html>
