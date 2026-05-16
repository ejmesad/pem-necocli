<?php
// ELIMINAR ESTE ARCHIVO DESPUÉS DE USARLO
$output = shell_exec('php ' . dirname(__DIR__) . '/artisan migrate --force 2>&1');
echo '<pre>' . $output . '</pre>';