<script>
    function previewImages() {
        var total_file = document.getElementById("image").files.length;
        for (var i = 0; i < total_file; i++) {
            $('#previewImages').append("<div class='col-lg-3 col-sm-12' style='margin-right:15px;'><img class='rounded border-danger' height='200' width='200' src='" + URL.createObjectURL(event.target.files[i]) + "'></div>");
        }
    }

</script>
