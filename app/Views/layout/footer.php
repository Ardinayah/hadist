
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="<?php echo base_url() ?>/assets/js/nav.js"></script>
<script src="<?php echo base_url() ?>/assets/bootstrap/js/bootstrap.bundle.js"></script>
<script src="<?php echo base_url() ?>/assets/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url() ?>/assets/bootstrap/js/bootstrap.min.js"></script>
<script>
$(document).ready(function() {
    $('#searchForm').keyup(function(){
        search_text($(this).val());
    });

    function search_text(value){
        $('#search_section .card').each(function(){
            var found = 'false';
            $(this).each(function(){
                if($(this).text().toLowerCase().indexOf(value.toLowerCase()) >= 0)
                {
                    found = 'true';
                }
            });
            if(found == 'true'){
                $(this).show()
            }
            else {
                $(this).hide();
            }
        })
    }
});
</script>
</body>
</html>