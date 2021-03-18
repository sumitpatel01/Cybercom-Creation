<!DOCTYPE html>
<html lang="en">
<?php $head = \Mage::getBlock('Block\core\layout\head'); echo $head->toHTML(); ?>
<body>
<?php $header = \Mage::getBlock('Block\core\layout\header'); echo $header->toHTML(); ?>
<table width="100%">
    <tbody>
        <tr>
            <td height="550px" width="180px" style="background-image: radial-gradient(white, black);">
                <?php echo $this->getChild('left')->toHTML(); ;?>
            </td>
            <td style="background-image: radial-gradient(lightblue, white);">
                <?php echo $this->getChild('content')->toHTML(); ?>
            </td>
        </tr>
        <tr>
            <td height="150px" style="text-align: center;background-image: radial-gradient(white, black);" colspan="2">
                <?php $footer = \Mage::getBlock('Block\core\layout\footer'); echo $footer->toHTML(); ?>        
            </td>
        </tr>
    </tbody>
</table>
</body>
</html>