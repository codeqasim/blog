<div class="author">
<img src="<?=root?>uploads/users/1.png" alt="" />
<p><?php $user = $mysqli->query('SELECT * FROM users WHERE id = "'.$_SESSION['user_id'].'"')->fetch_object(); echo $user->full_name ?></p>
<p class="date_time"><?=$post['created_at']?></p>
</div>