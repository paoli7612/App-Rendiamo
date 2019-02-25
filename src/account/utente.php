<table border="2">
  <?php foreach ($utente->row as $key => $value): ?>
    <tr>
      <th><?php echo $key ?></th> <td><?php echo $value; ?></td>
    </tr>
  <?php endforeach; ?>
</table>
