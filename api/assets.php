<?php

// Ambil nama file dari query string
$file = $_GET['assets'] ?? '';

// Validasi input untuk mencegah serangan directory traversal
$file = basename($file);

// Tentukan jalur direktori aset
$assetPath = __DIR__ . '/../api/assets.api';

// Tentukan jalur lengkap ke file
$filePath = "{$assetPath}/{$file}";

// Periksa apakah file ada dan valid
if (file_exists($filePath)) {
    // Tentukan header berdasarkan jenis file
    if (str_ends_with($file, '.css')) {
        header("Content-Type: text/css; charset=UTF-8");
    } elseif (str_ends_with($file, '.js')) {
        header("Content-Type: application/javascript; charset=UTF-8");
    } else {
        // Jika bukan file CSS atau JS
        http_response_code(403);
        echo "Forbidden: File type not allowed.";
        exit;
    }

    // Tampilkan konten file
    readfile($filePath);
} else {
    // Jika file tidak ditemukan
    http_response_code(404);
    echo "Not Found: The requested asset does not exist.";
}
