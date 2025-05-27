<?php
  $css = isset($estiloPagina) ? $estiloPagina : 'styledashboard.css';
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Dashboard</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Share+Tech+Mono&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Roboto:ital,wght@0,100..900;1,100..900&family=Share+Tech+Mono&display=swap" rel="stylesheet">
<link rel="stylesheet" href="public/css/styledashboard.css" />
<link rel="stylesheet" href="<?php echo RUTA_URL . '/public/css/' . $css; ?>" />
<link rel="icon" href="public/img/favicon.png" type="image/x-icon" />
</head>
<body>