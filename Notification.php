<?php
include_once 'header.php';
?>

<div class="container">
    <div class="page-title">
      <p class="page-title-text"><i class="uil uil-bell"></i></i>Notification</p>
    </div>
    <div class="table__responsive">
      <table id="data_table" class="table">
        <thead>
          <tr class="table-name">
            <th scope="col">Username</th>
            <th scope="col">Email</th>
            <th scope="col">Requested Role</th>
            <th scope="col">Option</th>
          </tr>
        </thead>
        <tbody>
        </tbody>
      </table>
    </div>
  </div>

  <script type="text/javascript">
    $(document).ready(function(){

fetch_data();

var sale_chart;

function fetch_data(start_date = '', end_date = '')
{
    var dataTable = $('#data_table').DataTable({
        "processing" : true,
        "serverSide" : true,
        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
        "order" : [],
        "ajax" : {
            url:"includes/notification.fetch.inc.php",
            type:"POST",
            data:{action:'fetch', start_date:start_date, end_date:end_date}
        },
        "aoColumnDefs": [{
            "bSortable": false,
            "aTargets": [3]
          }
        ]
    })
}
});
$(document).on('click', '#accept', function(event) {
      var table = $('#data_table').DataTable();
      var ID = $(this).attr('data-ID');
      event.preventDefault();
      
      var rconfirm = confirm("Are you sure want to accept ? ");
      if (rconfirm) {
        $.ajax({
          url: "includes/notification.accept.inc.php",
          type: "POST",
          data: {
            ID: ID
          },
          success: function(data) {
            var json = JSON.parse(data);
            status = json.status;
            if (status == 'success') {
              var removingRow = $(this).closest('tr');
              table.row(removingRow).remove().draw();
            } else {
              alert('Failed');
              return;
            }
          }
        });
      } else {
        return null;
      }
    });
    $(document).on('click', '#deny', function(event) {
      var table = $('#data_table').DataTable();
      var ID = $(this).attr('data-ID');
      event.preventDefault();
      
      var rconfirm = confirm("Are you sure want to deny ? ");
      if (rconfirm) {
        $.ajax({
          url: "includes/notification.delete.inc.php",
          type: "POST",
          data: {
            ID: ID
          },
          success: function(data) {
            var json = JSON.parse(data);
            status = json.status;
            if (status == 'success') {
              var removingRow = $(this).closest('tr');
              table.row(removingRow).remove().draw();
            } else {
              alert('Failed');
              return;
            }
          }
        });
      } else {
        return null;
      }
    })
</script>

<?php
include_once 'footer.php';
?>