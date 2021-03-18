<?php

$tabs = $this->getTabs();
foreach ($tabs as $key => $tab) {
    echo "<a class='btn btn-dark col-md-12' href='{$this->getUrl()->getURL(null,null,['tab' => $tab['key'],null])}'>{$tab['label']}</a><br><br>";
}

?>