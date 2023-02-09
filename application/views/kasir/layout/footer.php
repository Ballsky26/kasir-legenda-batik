<!-- Page Footer-->

</div>
</div>
</div>
<!-- JavaScript files-->
<script src="<?= base_url('assets/') ?>vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets/') ?>vendor/popper.js/umd/popper.min.js"> </script>
<script src="<?= base_url('assets/') ?>vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="<?= base_url('assets/') ?>vendor/jquery.cookie/jquery.cookie.js"> </script>
<script src="<?= base_url('assets/') ?>vendor/chart.js/Chart.min.js"></script>
<script src="<?= base_url('assets/') ?>vendor/jquery-validation/jquery.validate.min.js"></script>
<script src="<?= base_url('assets/') ?>js/charts-home.js"></script>
<script src="https://cdn.datatables.net/1.11.0/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.0/js/dataTables.semanticui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.1/semantic.min.js"></script>
<script src="<?= base_url('assets/') ?>js/datatable.js"></script>
<!-- Main File-->
<script src="<?= base_url('assets/') ?>js/front.js"></script>
<script src="<?= base_url('assets/') ?>js/file_upload.js"></script>
<script src="<?= base_url('assets/') ?>js/form.js"></script>
<script>
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
    'use strict';
    window.addEventListener('load', function() {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.getElementsByClassName('needs-validation');
        // Loop over them and prevent submission
        var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
                if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        });
    }, false);
})();
</script>
</body>

</html>