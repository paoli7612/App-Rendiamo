<form method="post">
    <label for="email">
        Email
    </label>
    <input id="email" name="email" value="<?php echo $_UTENTE->row['email'];?>" disabled="disabled">
    <label for="password">
        Vecchia password
    </label>
    <input id="password" name="vecchiaPassword">
    <label for="password">
        Nuova password
    </label>
    <input id="password" name="nuovaPassword">
    <button type="submit">Accedi</button>
</form>
