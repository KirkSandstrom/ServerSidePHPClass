<form action=" " method="post">
    <input type="submit" name="addFeedBack" value="Add Feedback" />
</form>

<table>
  <tr>
    <th>id</th>
    <th>fname_c</th>
    <th>lname_c</th>
    <th>uname_c</th>
    <th>email_c</th>
    <th>fname_r</th>
    <th>lname_r</th>
    <th>uname_r</th>
    <th>email_r</th>
    <th>message</th>
    <th>time_added</th>

  </tr>
  <?php foreach ($results as $member): ?>
    <tr>
      <?php foreach ($member as $item): ?>
        <td><?php echo $item; ?></td>
      <?php endforeach; ?>
      <td>

        <form action=" " method="post">
            <?php echo('<input type="submit" name="e' . $member[0] . '" value="Edit" />')?>
        </form>

        <form action=" " method="post">
            <?php echo('<input type="submit" name="d' . $member[0] . '" value="Delete" />')?>
        </form>

      </td>
    </tr>
  <?php endforeach; ?>
</table>

<form action=" " method="post">
    <input type="submit" name="addFeedBack" value="Add Feedback" />
</form>
