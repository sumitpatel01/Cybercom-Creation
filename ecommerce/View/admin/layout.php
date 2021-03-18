<!DOCTYPE html>
<html lang="en">
<?php $head = \Mage::getBlock('Block\Admin\layout\head'); echo $head->toHTML(); ?>
<body>
<?php $header = \Mage::getBlock('Block\Admin\layout\header'); echo $header->toHTML(); ?>
<table width="100%">
    <tbody>
        <tr>
            <td height="500px" style="background-image: radial-gradient(white 30%, lightblue 70%);">
                <?php   
                        echo $this->getChild('alert')->toHTML();
                        echo $this->getChild('content')->toHTML();   
                ?>
            </td>
        </tr>
        <tr>
            <td height="150px" style="text-align: center;background-image: radial-gradient(white, lightblue);">
                <?php $footer = \Mage::getBlock('Block\Admin\layout\footer'); echo $footer->toHTML(); ?>        
            </td>
        </tr>
    </tbody>
</table>
</body>
</html>