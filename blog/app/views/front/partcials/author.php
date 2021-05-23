<div class="author">
<img src="<?=root?>uploads/users/<?=$post['user_id']?>.jpg" />
<p><?php $user = $mysqli->query('SELECT * FROM users WHERE id = "'.$post['user_id'].'"')->fetch_object(); echo $user->full_name ?></p>
<p class="date_time"><?=$post['created_at']?></p>
</div>