<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="text-center">
  <div class="container">
    <h1 class="display-3">Post List</h1>
    <?php
    if (isset($_SESSION['user_id'])) : ?>
      <a href="<?php echo URLROOT; ?>/posts/add" class="btn btn-dark mt-3">Add new post</a>
    <?php else : ?>
      <a href="<?php echo URLROOT; ?>/users/login" class="btn btn-link">Log in to add post</a>
    <?php endif ?>
    <?php foreach ($data as $post) : ?>
      <ul class="list-group mb-5">
        <li class="list-group-item mt-5" aria-disabled="true">
          <h3 class="lead mb-5"><?php echo $post['title'] ?></h3>
          <p><?php echo $post['body']; ?></p>
          <span>by <strong><?php echo $post['name']; ?></strong></span>
          <span>at <?php echo $post['date']; ?></span>
        </li>
      </ul>
    <?php endforeach; ?>
  </div>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>