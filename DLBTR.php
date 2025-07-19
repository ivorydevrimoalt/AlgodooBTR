$filename = 'maps/your-map.phz';

if (!file_exists($filename)) {
    http_response_code(404);
    echo "File not found!";
    exit;
}

header('Content-Description: File Transfer');
header('Content-Type: application/x-algodoo-scene');
header('Content-Disposition: attachment; filename="' . basename($filename) . '"');
header('Expires: 0');
header('Cache-Control: must-revalidate');
header('Pragma: public');
header('Content-Length: ' . filesize($filename));

ob_clean();
flush();
readfile($filename);
exit;
