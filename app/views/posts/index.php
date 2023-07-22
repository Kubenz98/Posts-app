<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="text-center">
  <div class="container">
    <h1 class="display-3">Post List</h1>
    <?php foreach ($data as $post) : ?>
      <ul class="list-group">
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