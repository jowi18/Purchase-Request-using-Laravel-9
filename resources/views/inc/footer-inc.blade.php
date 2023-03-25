        <!-- MODAL INCLUDES 
    
        <footer class="footer pt-3 pb-3 ">
            <div class="center ">
                Copyright &copy; Glacier <?php echo date('Y'); ?>
                &nbsp|&nbsp All rights reserved.
            </div>
        </footer>
        -->
    </div>
    

    @include('inc.modal.modalloader')

    <!-- JQUERY CDN -->
    <script src="{{ asset('wms/plugins/jquery/dist/jquery.min.js ')}}"></script>

    <!-- Bootstrap JS Scripts -->
    <script src="{{ asset('wms/plugins/bootstrap-5.1.3/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Toast PLugin -->
    <script src="{{ asset('wms/plugins/toast/js/izitoast.min.js"type="text/javascript')}}"></script>

    <!-- Datatable JS Scripts -->
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>

    <!-- Tabulator JS Scripts -->
    <script src="{{ asset('wms/plugins/tabulator-tables/dist/js/tabulator.min.js')}}"></script>

    <!-- SELECT2 JS SCRIPTS -->
    <script src="{{ asset('wms/plugins/select2-develop/dist/js/select2.min.js')}}"></script>

    <!-- TOAST JS SCRIPTS -->
    <script src="{{ asset('wms/plugins/toast/js/izitoast.min.js')}}"></script>
    
    <!-- SHEET JS SCRIPTS -->
    <script src="{{ asset('wms/plugins/xlsx/dist/xlsx.full.min.js')}}"></script>

    <!-- OWL JS SCRIPTS -->
    <script src="{{ asset('wms/plugins/OwlCarousel/dist/owl.carousel.min.js')}}"></script>
    
    <!-- SLICK JS SCRIPTS -->
    <link rel="stylesheet" href="{{ asset('wms/plugins/slick/slick.js')}}">
    <link rel="stylesheet" href="{{ asset('wms/plugins/slick/slick.min.js')}}">
    
    <!-- Customized JS File -->
    <script src="{{ asset('wms/js/main.js')}}"></script>
    <script src="assets/js/maintenance.js"></script>
</body>
</html>