</div>
<!-- /.row -->
</div><!-- /.container-fluid -->
</div>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<!-- Main Footer -->
<footer style="text-align: center;">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
        A
    </div>
    <!-- Default to the left -->
    <strong><a href="https://instagram.com/frdialfzri_?igshid=NzZlODBkYWE4Ng%3D%3D"></a>By: Kelompok 4 </strong> TUGAS PROJECT UAS WEBPROG
</footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<script>
    // menampilakan nama file di input
    $('.custom-file-input').on('change', function() {
        let fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html(fileName);
    });





    // menghilang automatis alert
    window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideUp(500, function() {
            $(this).remove();
        })
    }, 4000)
</script>

<script>
    function bacaGambar(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#gambar_load').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#preview_gambar").change(function() {
        bacaGambar(this);
    });

    $("input[data-bootstrap-switch]").each(function() {
        $(this).bootstrapSwitch('state', $(this).prop('checked'));
    });
</script>

<!-- SweetAlert2 -->
<link rel="stylesheet" href="<?= base_url(); ?>template/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
<!-- Toastr -->
<link rel="stylesheet" href="<?= base_url(); ?>template/toastr/toastr.min.css">
</body>

</html>