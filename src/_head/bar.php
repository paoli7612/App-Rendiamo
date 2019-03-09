<?php ob_start(); ?>


<button onclick="window.location='../home'">Home</button>
<button onclick="window.location='../lezioni'">Lezioni</button>
<button onclick="window.location='../account'">Account</button>
<?php if ($_UTENTE->row['tipo'] == 'admin'): ?>
  <button onclick="window.location='../pannelloDiControllo'">Admin</button>
<?php endif; ?>
<br><br>
