    <div class="container my-2">
        <h2>Add Content</h2>
        <form id="cmsSave" action="<?php echo $this->getFormUrl()?>" method="post">

            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Title</span>
                <input type="text" class="form-control" placeholder="cms Name" name="cms[title]">
            </div>

            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Unique Key</span>
                <input type="text" class="form-control" placeholder="cms Name" name="cms[uniqueKey]">
            </div>

            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">content</span>
                <textarea id="editor" name="cms[content]"></textarea>
            </div>

            <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupSelect01">Status</label>
                <select class="form-select" id="inputGroupSelect01" name="cms[status]">
                    <?php foreach($this->getStatusOptions() as $key => $value) : ?>
                        <option value='<?php echo $key ?>'?><?php echo $value ?></option>
                    <?php  endforeach; ?>
                </select>
            </div>
            <input type="submit" class="btn btn-dark my-2" value="save" onclick="object.setForm('#cmsSave').load()">
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
</body>

</html>