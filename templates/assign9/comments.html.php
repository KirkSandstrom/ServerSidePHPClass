<p><?=$totalComments?> comments have been submitted to the database.</p>
<br>
<li><a href="index.php?route=comments/edit">Add a new comment</a></li>

<?php foreach($comments as $comment): ?>
<blockquote>
  <p>
  <?=htmlspecialchars($comment['feedback_message'], ENT_QUOTES, 'UTF-8')?>

  (by <a href="mailto:<?=htmlspecialchars($comment['email'], ENT_QUOTES, 'UTF-8'); ?>">
  <?=htmlspecialchars($comment['name'], ENT_QUOTES, 'UTF-8'); ?></a> on
  <?php
  $date = new DateTime($comment['time_added']);
  echo $date->format('jS F Y');
  ?>)
    <a href="index.php?route=edit&id=<?=$comment['id']?>">
        Edit</a>
        <form action="index.php?route=comments/delete" method="post">
        <input type ="hidden" name="id"
          value="<?=$comment['id']?>">
        <input type="submit" value="Delete">
      </form>
      </p>
  </blockquote>
<?php endforeach; ?>

<li><a href="index.php?route=comments/edit">Add a new comment</a></li>
