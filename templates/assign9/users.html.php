<p><?=$totalUsers?> users are in the database.</p>
<br>
<li><a href="index.php?route=users/edit">Add a new user</a></li>

<?php foreach($users as $user): ?>
<blockquote>
  <p>
  <?=htmlspecialchars($user['uname'], ENT_QUOTES, 'UTF-8')?>

  ( <a href="mailto:<?=htmlspecialchars($user['email'], ENT_QUOTES, 'UTF-8'); ?>">
  <?=htmlspecialchars($user['fname'], ENT_QUOTES, 'UTF-8'); ?>
  <?=htmlspecialchars($user['lname'], ENT_QUOTES, 'UTF-8'); ?></a> added on
  <?php
  $date = new DateTime($user['time_added']);
  echo $date->format('jS F Y');
  ?>)
    <a href="index.php?route=edit&id=<?=$user['id']?>">
        Edit</a>
        <form action="index.php?route=users/delete" method="post">
        <input type ="hidden" name="id"
          value="<?=$user['id']?>">
        <input type="submit" value="Delete">
      </form>
      </p>
  </blockquote>
<?php endforeach; ?>

<li><a href="index.php?route=users/edit">Add a new user</a></li>
