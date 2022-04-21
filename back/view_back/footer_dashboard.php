<footer class="tm-footer row tm-mt-small">
                <div class="col-12 font-weight-light">
                    <p class="text-center text-white mb-0 px-4 small">
                        Copyright &copy; <b>2018</b> All rights reserved.

                        Design: <a rel="nofollow noopener" href="https://templatemo.com" class="tm-footer-link">Template Mo</a>
                    </p>
                </div>
            </footer>
        </div>

        <script src="../../back/assets_back/js/jquery-3.3.1dashboard.min.js"></script>
        <!-- https://jquery.com/download/ -->
        <script src="../../back/js/momentdashboard.min.js"></script>
        <!-- https://momentjs.com/ -->
        <script src="../../back/assets_back/js/Chartdashboard.min.js"></script>
        <!-- http://www.chartjsdashboard.org/docs/latest/ -->
        <script src="../../back/assets_back/js/bootstrapdashboard.min.js"></script>
        <!-- https://getbootstrap.com/ -->
        <script src="../../back/assets_back/js/tooplate-scriptsdashboard.js"></script>
        <script>
            Chart.defaults.global.defaultFontColor = 'white';
            let ctxLine,
                ctxBar,
                ctxPie,
                optionsLine,
                optionsBar,
                optionsPie,
                configLine,
                configBar,
                configPie,
                lineChart;
            barChart, pieChart;
            // DOM is ready
            $(function() {
                drawLineChart(); // Line Chart
                drawBarChart(); // Bar Chart
                drawPieChart(); // Pie Chart

                $(window).resize(function() {
                    updateLineChart();
                    updateBarChart();
                });
            })
        </script>
    </div>

    </html>