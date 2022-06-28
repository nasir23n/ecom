

<br><br>
<form method="post" onsubmit="return false">
    <div class="form_row">
        <div class="col_lg_6">
            <div class="form_group">
                <label>select a image</label>
                <input type="file" name="image" class="form_control" oninput="croup(this)">
            </div>
        </div>
        <div class="col_lg_12">
            <div class="form_group">
                <div id="img_wrap" style="max-width: 500px"></div>
            </div>
        </div>
        <div class="col_lg_6">
            <div class="form_group"></div>
        </div>
    </div>
</form>


<script>
function croup(inp) {
    let selected_file = inp.files[0];
    let my_url = URL.createObjectURL(selected_file);
    let img = makeImage(my_url);
    $('#img_wrap').html(img);
    $('#img_wrap').append(`
        <button type="button" id="save" class="nl primary">Save</button>
        <button type="button" id="cancel" class="nl danger">Cancel</button>
    `);
    let cropper = new Cropper(img, {
        aspectRatio: 1/1,
    });
    $('#save').click(function() {
        let info = cropper.getData();
        let obj = {
            width: Math.floor(info.width),
            height: Math.floor(info.height),
            x: Math.floor(info.x),
            y: Math.floor(info.y),
        }
        let data = new FormData();
        data.append('image', selected_file);
        data.append('_token', '{{ csrf_token() }}');
        data.append('data', JSON.stringify(obj));
        save(data);
    });
    $('#cancel').click(function() {
        NL_Modal.close();
    });
}

function makeImage(url) {
    let img = document.createElement('img');
        img.src = url;
        img.alt = "Image Not Found";
    return img;
}
// let img = document.querySelector('#img');
// let cropper = new Cropper(img, {});
</script>
{{-- <button class="nl primary" onclick="NL_Modal.close()">Close</button> --}}