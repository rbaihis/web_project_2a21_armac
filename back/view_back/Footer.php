
<script src="../../assets/js/jquery-3.3.1.min.js"></script>
<!-- https://jquery.com/download/ -->
<script src="../../assets/js/bootstrap.min.js"></script>
<!-- https://getbootstrap.com/ -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
<script>
    $(function () {
        $('.tm-product-name').on('click', function () {
            window.location.href = "edit-product.php";
        });
    })
</script>

<script>

    $(document).ready(function() {
        var calendar = $('#calendar').fullCalendar({
            editable:true,
            header:{
                left:'prev,next today',
                center:'title',
                right:'month,agendaWeek,agendaDay'
            },
            events: 'load.php',
            selectable:true,
            selectHelper:true,
        });
    });

</script>

</body>

</html>