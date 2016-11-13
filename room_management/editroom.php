<?php
	include '../_includes/connection.php';
	
	$room = $_GET['room'];
	$query = "SELECT * FROM room WHERE roomID='$room'";
	$result = mysql_query($query) or die(mysql_error());
	$row = mysql_fetch_array($result);

	$floor = $row['floor'];
	$state = $row['state'];
	$capacity = $row['capacity'];
	$floorplan = $row['floorplan'];
	$rent = $row['rent'];
	$water = $row['water'];
	$elec = $row['electricity'];
?>

   <div class="modal-dialog">
  
      <div class="modal-content">
        <div class="modal-header" style="padding:35px 50px;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4>Edit Room Details</h4>
        </div>
        <div class="modal-body" style="padding:40px 50px;">
          <form role="form" form action="updateroom.php?room=<?php echo $_GET['room']?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
              <label>Floor Plan and Amenities: </label>
              <input class="form-control-file form-control" file type="file" name="filename" value=<?php echo $floorplan?> required>
            </div>
            <div class="form-group">
              <label>Room Status: </label>
                  <select class="form-control" id="room" name="status" required name="status">
                    <option value ='1'>Available</option>
                    <option value ='2'>Occupied</option>
                    <option value ='3'>Full</option>
                    <option value ='4'>Under Maintenance</option>
                  </select>     
            </div>
            <div class="form-group">
              <label>Room rate: </label>
              <span>php</span>
              <input class="form-control" type="number" name="rate" value=<?php echo $rent?> required>
            </div>
            <div class="form-group">
              <label>Maximum Person(s) per room: </label>
              <input class="form-control" type="number" name="population" value=<?php echo $capacity?> required>
            </div>
            <div class="form-group">
              <label>Water billing rate: </label>
              <span>php</span>
              <input class="form-control" type="number" name="water" value=<?php echo $water?> required>
            </div>
            <div class="form-group">
              <label>Electricity billing rate: </label>
              <span>php</span>
              <input type="number" name="elec" class="form-control" value=<?php echo $elec?> required>
            </div>
            <div id="buttonsc" class="container-fluid">
              <button type="submit" class="btn btn-success">Update</button>
              <button type="submit" class="btn btn-danger btn-default" data-dismiss="modal">Cancel</button>
            </div>
          </form>
        </div>
      </div>
      
    </div>