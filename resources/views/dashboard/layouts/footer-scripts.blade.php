

<script src="{{ URL::asset('dashboard/assets/vendor/libs/jquery/jquery.js') }}"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>
<script   src="{{ URL::asset('dashboard/assets/vendor/libs/popper/popper.js') }}"></script>
<script  src="{{ URL::asset('dashboard/assets/vendor/js/bootstrap.js') }}"></script>
<!--<script  src="{{ URL::asset('dashboard/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>-->
<script   src="{{ URL::asset('dashboard/assets/vendor/js/menu.js') }}"></script>
<!--<script src="{{ URL::asset('dashboard/assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>-->
<!--<script   src="{{ URL::asset('dashboard/assets/js/main.js') }}"></script>-->
<!--<script   src="{{ URL::asset('dashboard/assets/js/dashboards-analytics.js') }}"></script>-->






    <script async defer src="https://buttons.github.io/buttons.js"></script>

<script type="text/javascript"  src="{{ URL::asset('fontawesome-free-6.4.0-web/js/all.min.js') }}"></script>
















<script>

$(document).ready( function () {

$("#table").DataTable({  "language": {
      "lengthMenu": "<select>"+
                      "<option value='10'>10</option>"+
                      "<option value='25'>25</option>"+
                      "<option value='50'>50</option>"+
                      "<option value='100'>100</option>"+
                    "</select>"
    }});


$("#table_filter").css("padding","15px");
$("#table_length").css("padding","15px");
$("#table_info").css("padding","23px");

$("#table_paginate").css("padding","15px");
$("#table_paginate").css("padding","15px");
// $(".paginate_button .current").addClass("page-item active");




} );



$(function() {
    $("#btn_delete_all").click(function() {
        var selected = new Array();
        $("#datatable input[type=checkbox]:checked").each(function() {
            selected.push(this.value);
        });

        if (selected.length > 0) {
            $('#delete_all').modal('show')
            $('input[id="delete_all_id"]').val(selected);
        }
    });
});
function CheckAll(className, elem) {
    var elements = document.getElementsByClassName(className);
    var l = elements.length;

    if (elem.checked) {
        for (var i = 0; i < l; i++) {
            elements[i].checked = true;
        }
    } else {
        for (var i = 0; i < l; i++) {
            elements[i].checked = false;
        }
    }
}
</script>







