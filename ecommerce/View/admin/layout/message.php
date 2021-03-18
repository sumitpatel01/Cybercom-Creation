<?php
$message = $this->getMessage();
if($success = $message->success) {
  unset($message->success);
?>
<div class="alert alert-info m-3" role="alert">
  <?php echo $success; ?>
</div>
<?php } elseif ($failure = $message->failure) {
  unset($message->failure);
?>
<div class="alert alert-danger m-3" role="alert">
  <?php echo $failure; ?>
</div>
<?php } ?>



