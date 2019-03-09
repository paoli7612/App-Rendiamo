<form method="post">
    <label for="email">
        Email
    </label>
    <input id="email" name="email" value="<?php echo (isset($_GET['email'])) ? $_GET['email'] : "" ; ?>">
    <label for="password">
        Password
    </label>
    <input id="password" name="password">
    <button type="submit">Accedi</button>
</form>
