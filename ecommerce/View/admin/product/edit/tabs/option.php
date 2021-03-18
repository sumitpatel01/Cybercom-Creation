<div class="container">
    <form action="" method="post">
        <table>
            <tr>
                <?php
                $sql =  "SELECT * FROM `attribute` WHERE `entityTypeId` = 'product'";
                $array = \Mage::getModel('Model\Product')->fetchAll($sql);
                ?>
                <?php
                foreach ($array as $key => $value){ ?>
                    <?php if($value->inputType == 'select'){ ?>
                        <?php
                            $sql =  "SELECT `optionId`,`name` FROM `attribute_option`  WHERE `attributeId` = '$value->attributeId' ORDER BY `sortOrder`";
                            $adapter = \Mage::getModel('Model\Core\Adapter')->fetchPairs($sql);
                        ?><div class="input-group mb-3">
                        <label class="input-group-text" for="inputGroupSelect01"><?php echo $value->code ?></label>
                        <select class="form-select" id="inputGroupSelect01" name="product[<?php echo $value->code ?>]">
                        
                            <?php foreach($adapter as $key => $value) : ?>
                                    <option value='<?php echo $key ?>'?><?php echo $value ?></option>
                            <?php  endforeach; ?>
                        </select>  
                        </div> 
                    <?php }
                    elseif ($value->inputType == 'textBox') {   ?>
                        <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon3"><?php echo $value->code ?></span>
                        <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3" placeholder="Discount" name="product[<?php echo $value->code ?>]">
                        </div>
                    <?php }
                    elseif ($value->inputType == 'radio') { ?>
                        <?php
                             $sql =  "SELECT `optionId`,`name` FROM `attribute_option`  WHERE `attributeId` = '$value->attributeId' ORDER BY `sortOrder`";
                             $adapter = \Mage::getModel('Model\Core\Adapter')->fetchPairs($sql);
                        ?>
                        <label class="input-group-text" for="inputGroupSelect01"><?php echo $value->code ?></label>
                        <?php foreach($adapter as $key => $value) : ?>
                            <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="product[<?php echo $key ?>]" disabled>
                            <label class="form-check-label" for="inlineRadio3"><?php echo $value ?></label>
                            </div>
                            <?php  endforeach; ?>
                    <?php }
                    elseif ($value->inputType == 'checkbox') { ?>
                    <?php
                            $sql =  "SELECT `optionId`,`name` FROM `attribute_option`  WHERE `attributeId` = '$value->attributeId' ORDER BY `sortOrder`";
                            $adapter = \Mage::getModel('Model\Core\Adapter')->fetchPairs($sql);
                        ?>
                        <label class="input-group-text" for="inputGroupSelect01"><?php echo $value->code ?></label>
                        <?php foreach($adapter as $key => $value) : ?>
                            <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="product[<?php echo $key ?>]">
                            <label class="form-check-label" for="inlineCheckbox1"><?php echo $value ?></label>
                            </div>
                            <?php  endforeach; ?>
                        
                    <?php }
                    elseif ($value->inputType == 'textArea') { ?>
                        <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon3"><?php echo $value->code ?></span>
                        <textarea class="form-control" id="basic-url" aria-describedby="basic-addon3" placeholder="Discount" name="product[<?php echo $value->code ?>]"></textarea>
                        </div>
                   <?php } 
                }
                ?>
            </tr>
        </table>
    </form>
</div>