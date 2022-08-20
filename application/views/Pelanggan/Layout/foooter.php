<script src="<?= base_url('asset/violet-master/') ?>js/jquery-3.3.1.min.js"></script>
<script src="<?= base_url('asset/violet-master/') ?>js/bootstrap.min.js"></script>
<script src="<?= base_url('asset/violet-master/') ?>js/jquery.magnific-popup.min.js"></script>
<script src="<?= base_url('asset/violet-master/') ?>js/jquery.slicknav.js"></script>
<script src="<?= base_url('asset/violet-master/') ?>js/owl.carousel.min.js"></script>
<script src="<?= base_url('asset/violet-master/') ?>js/jquery.nice-select.min.js"></script>
<script src="<?= base_url('asset/violet-master/') ?>js/mixitup.min.js"></script>
<script src="<?= base_url('asset/violet-master/') ?>js/main.js"></script>
<script>
    console.log = function() {}
    $("#ongkir").on('change', function() {

        $(".subtotal").html($(this).find(':selected').attr('data-subtotal'));
        $(".subtotal").val($(this).find(':selected').attr('data-subtotal'));

        $(".ongkir").html($(this).find(':selected').attr('data-ongkir'));
        $(".ongkir").val($(this).find(':selected').attr('data-ongkir'));

        $(".total").html($(this).find(':selected').attr('data-total'));
        $(".total").val($(this).find(':selected').attr('data-total'));


        $(".tot").html($(this).find(':selected').attr('data-tot'));
        $(".tot").val($(this).find(':selected').attr('data-tot'));

    });
</script>
</body>

</html>