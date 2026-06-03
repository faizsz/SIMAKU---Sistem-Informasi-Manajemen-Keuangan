<?php
// Force SCRIPT_NAME to /index.php so Laravel doesn't detect /api as the base path on Vercel
$_SERVER['SCRIPT_NAME'] = '/index.php';
$_SERVER['PHP_SELF'] = '/index.php';

require __DIR__ . '/../public/index.php';
