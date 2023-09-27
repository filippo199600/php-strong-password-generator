<?php
function get_random_password($number)
{
  $chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789!@#$%^&*()';

  $random_password = '';

  for ($i = 0; $i < $number; $i++) {

    $random_start = rand(0, 72);

    $random_password .= substr($chars, $random_start, 1);
  }

  return $random_password;
}

$has_number = isset($_GET['number-chars']);

if ($has_number) {
  $number = $_GET['number-chars'];

  $input_valid = false;
  if (intval($number)) {
    $input_valid = true;
  }
  ;
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Strong Passsword Generator</title>
  <!-- BOOTSTRAP V.5.3 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

  <!-- STYLE -->
  <link rel="stylesheet" href="./css/style.css">

</head>

<body>
  <div class="container">

    <?php if ($has_number): ?>
    <div class="alert <?php echo $input_valid ? 'alert-primary' : 'alert-danger' ?>">
      <?php echo $input_valid ? 'input inviato con successo' : 'inserisci un input corretto' ?>
    </div>
    <?php endif; ?>

    <form method="GET">
      <div class="mb-3">
        <label for="number-chars">Da quanti caratteri sarà formata la tua password?</label>
      </div>
      <div class="mb-3">
        <input class="form-control w-50" type="number" min="0" name="number-chars" id="number-chars" required>
      </div>
      <button class="btn btn-primary">Invia</button>
    </form>

    <?php if ($has_number): ?>
    <h1>
      <?php echo get_random_password($number) ?>
    </h1>
    <?php endif; ?>
  </div>

</body>

</html>