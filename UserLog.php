<?php
include_once 'header.php';
?>

<div class="container-fluid">

    <div class="page-title">
        <p class="page-title-text"><i class="uil uil-user"></i>User Log</p>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-bordered" id="userLog_table">
                <thead>
                    <tr>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Option</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>
    <div class="card-body">
        <div class="page-title">
            <p class="page-title-text"><i class="uil uil-user-plus"></i>Daily Activity Log</p>
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-bordered" id="systemLog_table">
                <thead>
                    <tr>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Login</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>
    <!--==================== PASSWORD MODAL ====================-->
    <div class="modal fade" id="deleteModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h1>Are you sure want to delete?</h1>
                    <i class="fas fa-exclamation-triangle"></i>
                </div>
                    
                <!-- Modal body -->
                <div class="modal-body">
                <form id="deleteform" style="margin: 2rem;">
                <fieldset>
                    <div class="form-group" >
                        <label for="modalpass" class="col-form-label">Password:</label>
                        <input type="password" name="modalpass" class="form-select" id="modalpass">
                    </div>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn1" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn2">Confirm</a>
                </div>
                </fieldset>
                </form>
            </div>
        </div>
    </div>
    <!--==================== WRONG PASSWORD MODAL ====================-->
    <div class="modal fade" id="invalidpassword">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h1>Alert</h1>
                    <i class="fas fa-exclamation-triangle"></i>
                </div>

                <!-- Modal body -->
                <div class="modal-body">Wrong Password</div>
                    
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn1" data-bs-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</div>



<script>

    $(document).ready(function () {

        fetch_systemTable();
        fetch_userTable();

        function fetch_systemTable(start_date = '', end_date = '') {
            var dataTable = $('#systemLog_table').DataTable({
                "processing": true,
                "serverSide": true,
                "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
                "order": [],
                "ajax": {
                    url: "includes/systemLog.inc.php",
                    type: "POST",
                    data: { action: 'fetch', start_date: start_date, end_date: end_date }
                }
            })
        }
        function fetch_userTable(start_date = '', end_date = '') {
            var dataTable = $('#userLog_table').DataTable({
                "processing": true,
                "serverSide": true,
                "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
                "order": [],
                "ajax": {
                    url: "includes/userLog.inc.php",
                    type: "POST",
                    data: { action: 'fetch', start_date: start_date, end_date: end_date }
                },
                "aoColumnDefs": [{
                    "bSortable": false,
                    "aTargets": [2]
                },
                {
                    "bSortable": false,
                    "aTargets": [3]
                }
                ]
            })
        }
    })
    $(document).on('click', '.deleteBtn', function(event) {
      var table = $('#userLog_table').DataTable();
      var ID = $(this).attr('data-ID');
      event.preventDefault();
      $('#deleteModal').modal('show');
      
      $("#deleteform").submit(function(event) {
        event.preventDefault(); //stop a full postback
        var password = $("#modalpass").val();

        $.ajax({
          url: "includes/userLog.delete.inc.php",
          type: "POST",
          data: {
            ID: ID,
            password: password
          },
          success: function(data) {
            var json = JSON.parse(data);
            status = json.status;
            if (status == 'success') {
              //$("#" + ID).closest('tr').remove();
              var removingRow = $(this).closest('tr');
              table.row(removingRow).remove().draw();
            }
            if (status == 'failed') {
              alert('Failed');
              return;
            }
            if (status == 'wrongpassword') {
                $('#invalidpassword').modal('show');
              return;
            }
          }
        });
    });
    })

</script>

<?php
include_once 'footer.php';
?>