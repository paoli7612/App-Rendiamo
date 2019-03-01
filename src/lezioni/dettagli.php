<?php $lezione = getLezioneId($_GET['id']) ?>

<h1><?php echo $lezione->titolo; ?></h1>

<?php print_r($lezione); ?>
