<?php $tabs = $this->getTabs(); ?>
<?php foreach ($tabs as $key => $tab) : ?>
 <a class='btn btn-dark col-md-12' href='<?php echo $this->getUrl()->getURL(null,null,['tab' => $tab['key'],null]) ?>'><?php echo $tab['label']; ?></a><br><br>
<?php endforeach; ?>
