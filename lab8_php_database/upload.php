<?php
// Helper upload gambar: mengembalikan nama file (tanpa folder) atau null
function upload_gambar($file)
{
    if (!isset($file) || $file['error'] !== 0) return null;

    $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
    $allowed = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
    if (!in_array($ext, $allowed)) return null;

    $nama_asli = preg_replace('/[^A-Za-z0-9._-]/', '_', basename($file['name']));
    $filename = time() . '_' . $nama_asli;
    $destination = __DIR__ . '/gambar/' . $filename;

    if (move_uploaded_file($file['tmp_name'], $destination)) {
        return $filename;
    }
    return null;
}
?>