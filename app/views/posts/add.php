<?php require APPROOT . '/views/inc/header.php'; ?>
<?php
if (!isset($_SESSION['user_id'])) {
  redirect('users/login');
} ?>
<div class="row">
  <div class="col-md-10 mx-auto">
    <div class="card card-body bg-light mt-5">
      <h2>Add post</h2>
      <form action="<?php echo URLROOT; ?>/posts/add" method="post">
        <div class="form-group">
          <label for="title">Title: <sup>*</sup></label>
          <input type="text" name="title" class="form-control form-control-lg <?php echo (!empty($data['title_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['title'] ?>">
          <span class="invalid-feedback"><?php echo $data['title_err']; ?></span>
        </div>
        <div class="form-group">
          <label for="body">Body: <sup>*</sup></label>
          <textarea rows="6" name="body" class="form-control form-control-lg <?php echo (!empty($data['body_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['body'] ?>"></textarea>
          <span class="invalid-feedback"><?php echo $data['body_err']; ?></span>
        </div>
        <div class="row mt-3">
          <div class="col">
            <input type="submit" value="Add" class="btn btn-success btn-block w-full w-100">
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>