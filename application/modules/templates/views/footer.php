<!--footer start-->
<footer class="site-footer">
    <div class="text-center">
        2018 &copy; FlatLab by VectorLab.
        <a href="#" class="go-top">
            <i class="fa fa-angle-up"></i>
        </a>
    </div>
</footer>
<!--footer end-->
</section>

<!-- js placed at the end of the document so the pages load faster -->
<script src="<?= base_url('assets/admin/'); ?>js/jquery.js"></script>
<script src="<?= base_url('assets/admin/'); ?>js/bootstrap.bundle.min.js"></script>
<script class="include" type="text/javascript" src="<?= base_url('assets/admin/'); ?>js/jquery.dcjqaccordion.2.7.js"></script>
<script src="<?= base_url('assets/admin/'); ?>js/jquery.scrollTo.min.js"></script>
<script src="<?= base_url('assets/admin/'); ?>js/jquery.nicescroll.js" type="text/javascript"></script>
<script src="<?= base_url('assets/admin/'); ?>js/jquery.sparkline.js" type="text/javascript"></script>
<script src="<?= base_url('assets/admin/'); ?>assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js"></script>
<script src="<?= base_url('assets/admin/'); ?>js/owl.carousel.js"></script>
<script src="<?= base_url('assets/admin/'); ?>js/jquery.customSelect.min.js"></script>
<script src="<?= base_url('assets/admin/'); ?>js/respond.min.js"></script>

<!--right slidebar-->
<script src="<?= base_url('assets/admin/'); ?>js/slidebars.min.js"></script>

<!--common script for all pages-->
<script src="<?= base_url('assets/admin/'); ?>js/common-scripts.js"></script>

<!--script for this page-->
<script src="<?= base_url('assets/admin/'); ?>js/sparkline-chart.js"></script>
<script src="<?= base_url('assets/admin/'); ?>js/easy-pie-chart.js"></script>
<script src="<?= base_url('assets/admin/'); ?>js/count.js"></script>

<script>
    //owl carousel

    $(document).ready(function() {
        $("#owl-demo").owlCarousel({
            navigation: true,
            slideSpeed: 300,
            paginationSpeed: 400,
            singleItem: true,
            autoPlay: true

        });
    });

    //custom select box

    $(function() {
        $('select.styled').customSelect();
    });

    $(window).on("resize", function() {
        var owl = $("#owl-demo").data("owlCarousel");
        owl.reinit();
    });
</script>

</body>

<!-- Mirrored from thevectorlab.net/flatlab-4/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 09 Sep 2025 16:28:58 GMT -->

</html>