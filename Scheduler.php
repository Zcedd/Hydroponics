<?php
  include_once 'header.php';

?>
<?php
        if(isset($_GET["error"])){
          if($_GET["error"] == "conflict"){
            echo "<div style=\"padding: 20px;
            background-color: #f44336;
            color: white;\">
            <span style=\"margin-left: 15px;
            color: white;
            font-weight: bold;
            float: right;
            font-size: 22px;
            line-height: 20px;
            cursor: pointer;
            transition: 0.3s;\" onclick=\"this.parentElement.style.display='none';\">&times;</span> Conflict schedule. Already turned on.
            </div>";
          }
          if($_GET["error"] == "mustturnon"){
            echo "<div style=\"padding: 20px;
            background-color: #f44336;
            color: white;\">
            <span style=\"margin-left: 15px;
            color: white;
            font-weight: bold;
            float: right;
            font-size: 22px;
            line-height: 20px;
            cursor: pointer;
            transition: 0.3s;\" onclick=\"this.parentElement.style.display='none';\">&times;</span> Must be turn on first before turn off.
            </div>";
          }
        }
        ?>
<div class="container">
    <div class="page-title">
      <p class="page-title-text"><i class="uil uil-schedule"></i></i>Scheduler</p>
    </div>
    <form action="/includes/scheduler.inc.php" method="post">
      <fieldset>
        <div class="form-group">
          <div class="form-input">
            <label for="exampleSelect1" class="form-label mt-4">Select Actuator</label>
            <select class="form-select" id="exampleSelect1" name="Actuator">
              <option>Grow Light</option>
              <option>Water Pump and Aerator</option>
              <option>Mist and Fan</option>
            </select>
          </div>
          <div class="form-input">
            <label for="appt">Select a time on:</label>
            <input class="form-select" type="time" id="appt" name="Time_On" required />
          </div>
          <div class="form-input">
            <label for="appt">Select a time off:</label>
            <input class="form-select" type="time" id="appt" name="Time_Off" required />
          </div>

          <div class="form-check-inline">
            <input class="form-check-input" type="checkbox" id="select-all" />
            <label class="form-check-label" for="Everyday"> <span>Everyday</span></label>

            <input class="form-check-input" type="hidden" value="false" id="MondayHidden" name="Monday" />
            <input class="form-check-input" type="checkbox" value="true" id="Monday" name="Monday" />
            <label class="form-check-label" for="Monday"> <span>Mon</span></label>

            <input class="form-check-input" type="hidden" value="false" id="TuesdayHidden" name="Tuesday" />
            <input class="form-check-input" type="checkbox" value="true" id="Tuesday" name="Tuesday" />
            <label class="form-check-label" for="Tuesday"> <span>Tue</span></label>

            <input class="form-check-input" type="hidden" value="false" id="WednesdayHidden" name="Wednesday" />
            <input class="form-check-input" type="checkbox" value="true" id="Wednesday" name="Wednesday" />
            <label class="form-check-label" for="Wednesday">
              <span>Wed</span></label>

            <input class="form-check-input" type="hidden" value="false" id="ThursdayHidden" name="Thursday" />
            <input class="form-check-input" type="checkbox" value="true" id="Thursday" name="Thursday" />
            <label class="form-check-label" for="Thursday"> <span>Thu</span></label>

            <input class="form-check-input" type="hidden" value="false" id="FridayHidden" name="Friday" />
            <input class="form-check-input" type="checkbox" value="true" id="Friday" name="Friday" />
            <label class="form-check-label" for="Friday"> <span>Fri</span></label>

            <input class="form-check-input" type="hidden" value="false" id="SaturdayHidden" name="Saturday" />
            <input class="form-check-input" type="checkbox" value="true" id="Saturday" name="Saturday" />
            <label class="form-check-label" for="Saturday">
              <span>Sat</span>
            </label>

            <input class="form-check-input" type="hidden" value="false" id="SundayHidden" name="Sunday" />
            <input class="form-check-input" type="checkbox" value="true" id="Sunday" name="Sunday" />
            <label class="form-check-label" for="Sunday"> <span>Sun</span></label>
          </div>

          <div class="buttoncontainer">
            <input type="submit" name="submit" class="btnselect" value="Set Schedule" id="setSchedule"/>
          </div>
        </div>
      </fieldset>
    </form>
    <div class="table__responsive">
      <table id="data_table" class="table table-hover">
        <thead>
          <tr class="table-name">
            <th scope="col">Actuator</th>
            <th scope="col">Turn On</th>
            <th scope="col">Turn Off</th>
            <th scope="col">Repeat</th>
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
      $('#setSchedule').click(function () {
                checked = $("input[type=checkbox]:checked").length;

                if (!checked) {
                    alert("You must set at least one day.");
                    return false;
                }

            });

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
            url:"includes/scheduler.fetch.inc.php",
            type:"POST",
            data:{action:'fetch', start_date:start_date, end_date:end_date}
        },
        "aoColumnDefs": [{
            "bSortable": false,
            "aTargets": [3]
          },
          {
            "bSortable": false,
            "aTargets": [4]
          }
        ]
    })
}
})
$(document).on('click', '.deleteBtn', function(event) {
      var table = $('#data_table').DataTable();
      var ID = $(this).attr('data-ID');
      event.preventDefault();
      
      var rconfirm = confirm("Are you sure want to delete ? ");
      if (rconfirm) {
        $.ajax({
          url: "includes/scheduler.delete.inc.php",
          type: "POST",
          data: {
            ID: ID
          },
          success: function(data) {
            var json = JSON.parse(data);
            status = json.status;
            if (status == 'success') {
              //$("#" + ID).closest('tr').remove();
              var removingRow = $(this).closest('tr');
              table.row(removingRow).remove().draw();
            }
            /*if (status == 'failed') {
              alert('Failed');
              return;
            }*/
          }
        });
      } else {
        return null;
      }
    })
    </script>

  <!--==================== Delete MODAL ====================-->
  <div class="modal fade" id="DeleteModal">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header">
          <h1>Confirm</h1>
          <i class="fas fa-exclamation-triangle"></i>
        </div>

        <!-- Modal body -->
        <div class="modal-body">Are you sure you want to delete?</div>

        <!-- Modal footer -->
        <div class="modal-footer">
          <a href="#" class="btn1" data-dismiss="modal">Cancel</a>
          <a href="/Scheduler/Delete/{{ID}}" class="btn2">Confirm</a>
        </div>
      </div>
    </div>
  </div>
  </header>

  <!--==================== SCROLL TOP ====================-->
  <a href="#" class="scrollup" id="scroll-up">
    <i class="uil uil-arrow-up scrollup__icon"></i>
  </a>
  <script>
    /*==================== SCROLL TOP ====================*/
    if (document.getElementById("Monday").checked) {
      document.getElementById("MondayHidden").disabled = true;
    }
    if (document.getElementById("Tuesday").checked) {
      document.getElementById("TuesdayHidden").disabled = true;
    }
    if (document.getElementById("Wednesday").checked) {
      document.getElementById("WednesdayHidden").disabled = true;
    }
    if (document.getElementById("Thursday").checked) {
      document.getElementById("ThursdayHidden").disabled = true;
    }
    if (document.getElementById("Friday").checked) {
      document.getElementById("FridayHidden").disabled = true;
    }
    if (document.getElementById("Saturday").checked) {
      document.getElementById("SaturdayHidden").disabled = true;
    }
    if (document.getElementById("Sunday").checked) {
      document.getElementById("SaturdayHidden").disabled = true;
    }

    document.getElementById("select-all").onclick = function() {
      var checkboxes = document.querySelectorAll('input[type="checkbox"]');
      for (var checkbox of checkboxes) {
        checkbox.checked = this.checked;
      }
    }
    function checkUncheck(main) {
      all = document.getElementsByName('Monday');
      for (var a = 0; a < all.length; a++) {
        all[a].checked = main.checked;
      }
    }
  </script>

<?php
include_once 'footer.php';
?>