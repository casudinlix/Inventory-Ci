</section>
      </section>
      <!--main content end-->
  </section>
  <!-- container section end -->
    <!-- javascripts -->
    <script src="<?php echo base_url();?>js/jquery.js"></script>
    <script src="<?php echo base_url();?>js/bootstrap.min.js"></script>
    <!-- nice scroll -->
    <script src="<?php echo base_url();?>js/jquery.scrollTo.min.js"></script>
    <script src="<?php echo base_url();?>js/jquery.nicescroll.js" type="text/javascript"></script><!--custome script for all page-->
    <script src="<?php echo base_url();?>js/scripts.js"></script>
    <script src="<?php echo base_url();?>js/jquery-ui.js"></script>
    <script type="text/javascript">

  $(document).ready(function(){

    $("#kdproduk").autocomplete({
      source: '<?php echo base_url();?>super/create_PO',

      focus: function(event, ui){
        event.preventDefault();

        $(this).val(ui.item.label);
        $('#namaproduk').val(ui.item.value);

        return false;
      },

      select: function(event, ui){
        event.preventDefault();

        $(this).val(ui.item.label);
        $('#namaproduk').val(ui.item.value);

        return false;
      }
    });
  });

  </script>
<script>
var availableTags = [
  "ActionScript",
  "AppleScript",
  "Asp",
  "BASIC",
  "C",
  "C++",
  "Clojure",
  "COBOL",
  "ColdFusion",
  "Erlang",
  "Fortran",
  "Groovy",
  "Haskell",
  "Java",
  "JavaScript",
  "Lisp",
  "Perl",
  "PHP",
  "Python",
  "Ruby",
  "Scala",
  "Scheme"
];
$( "#autocomplete" ).autocomplete({

  source: availableTags
});
</script>
  </body>
</html>