<?php $cms = $this->getTableRow();?>

<div class="container my-2">
        <h2>Edit Content</h2>
        <form id="editCms" action="<?php echo $this->getFormUrl()?>" method="post">

            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Title</span>
                <input type="text" class="form-control" placeholder="content title" name="cms[title]" value="<?php echo $cms->title;?>">
            </div>

            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Unique name</span>
                <input type="password" class="form-control" placeholder="cms password" name="cms[uniqueKey]" value="<?php echo $cms->uniqueKey;?>">
            </div>

            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">content</span>
                <textarea id="editor" name="cms[content]"><?php echo $cms->content;?></textarea>
            </div>

            <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupSelect01">Status</label>
                <select class="form-select" id="inputGroupSelect01" name="cms[status]">
                <?php foreach($this->getStatusOptions() as $key => $value) { ?>
                    <option value='<?php echo $key ?>' <?php if($cms->status == $key) {echo 'selected'; }?>><?php echo $value ?></option>
                   <?php  } ?>
                </select>
            </div>
            <input type="submit" class="btn btn-dark my-2" value="save" onclick="object.setForm('#editCms').load()">
            <input type="reset" class="btn btn-dark my-2" value="reset">
        </form>
    </div>
    <script>
    ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .then( editor => {
                    console.log( editor );
            } )
            .catch( error => {
                    console.error( error );
            } );
    </script>