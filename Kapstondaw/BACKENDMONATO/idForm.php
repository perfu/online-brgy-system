<?php include './server/server.php'?>
<?php
$query =  "SELECT * FROM tbl_idform";
$result = $conn->query($query);

$idForm = array();
while($row = $result->fetch_assoc()) {
  $idForm[] = $row;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ID Form</title>
  <link rel="stylesheet" href="style3.css ?<?php echo time(); ?>">
  <link rel="stylesheet" href="style4.css ?<?php echo time(); ?>">
  <link rel="stylesheet" href="sidenav.css ?<?php echo time(); ?>">
  <link rel="stylesheet" href="modal.css ?<?php echo time(); ?>">
  
  <script src="sidebar.js"></script>

</head>
<body>
        <!-- HEADER -->
        <div class="container">
            <div class="layer1">Barangay Zone IV Dasmarinas Cavite
            </div>
            <div class="layer2">
                <img src="vector/Vector 1.png" alt=""></div>
        </div>

        <!-- SIDE BAR -->
        <div class="sidebar">
            <div class="slayer1">
                <img class="vector-side" src="vector/layerside.png" alt="">
                <img class="db-icon" src="icons/dashboard-icon.png" alt=""></img>
                <img class="bo-icon" src="icons/B_Officials-iocn.png" alt=""></img>
                <img class="ri-icon" src="icons/residents-icon.png" alt=""></img>
                <img class="cc-icon" src="icons/certificate-icon.png" alt=""></img>
                <img class="rs-icon" src="icons/blotter-icon.png" alt=""></img>
                <img class="um-icon" src="icons/user-icon.png" alt=""></img>
                <img class="cm-icon" src="icons/content-icon.png" alt=""></img>
            </img>
        </div>

        <div class="slayer2">
            <a class="db" href="dashboard.php">Dashboard</a>
            <a class="bo" href="barangayOfficials.php">Barangay Officials</a>
            <a class="ri" href="residentInfo.php">Residents Information</a>
            <a class="cc" href="#">Certificate/Clearance</a>
            <a href="idForm.php" class="idform">Identification Form</a>
            <a href="brgyClearance.php" class="b-clearance">Barangay Clearance</a>
            <a href="endorsmentCert.php" class="e-certificate">E-Certificate</a>
            <a href="certOfIndigency.php" class="c-indigency">Cetificate of Indigency</a>
            <a href="certOfLBR.php" class="c-latebirth">Certificate Of LBR</a>
            <a href="businessClearance.php" class="bb-clearance">Business Clearance</a>
            <a class="rs" href="#">Reports</a>
            <a href="blotter.php" class="blotter1">Blotter records</a>
            <a href="complain.php" class="complain1">Complain records</a>
            <a href="awareness.php" class="awareness1">Awereness</a>
            <a class="um" href="#">User Management</a>
            <a href="users.php" class="users">Users</a>
            <a class="cm" href="#">Content Management</a>
            <a href="#" class="b-information" id="b-info">Barangay Information</a>
            <a href="announcement.php" class="announcement">Announcement</a>
            <a href="backup" class="backup">Backup</a>
            <a href="restore" class="restore">Restore</a>
            <a href="request.php" class="request">Requested Documents</a>
        </div>
    </div>

    <div class="home_residents">
      <div class="first_layer">
        <p>ID Form</p>
        <a href="#">Logout</a>
      </div>
      <div class="second_layer">
        <div class="search-cont">
          <p>Search:</p>
          <input type="text" class="searchBar" placeholder=" Enter text here">
        </div>
        <div class="add-cont">
          <a href="#" class="add" id="addIdForm">+ ID Form</a>
        </div>
      </div>

      <?php include './template/message.php' ?>
      
      <div class="third_layer">
        <table id="table">
          <thead>
            <tr>
              <th>Fullname</th>
              <th>Document For</th>
              <th>Purpose</th>
              <th>Date Requested</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php if(!empty($idForm)) { ?>
              <?php $no=1; foreach($idForm as $row): ?>
                <tr>
                  <td><?= $row['fullname'] ?></td>
                  <td><?= $row['documentFor'] ?></td>
                  <td><?= $row['purpose'] ?></td>
                  <td><?= $row['date-requested'] ?></td>
                  <td>
                    <?php if($row['documentFor'] === 'self') { ?>
                      <a href="./generate/idForm_generate.php?id=<?= $row['id'] ?>" class="print">Print</a>
                    <?php } 
                    else { ?>
                      <a href="#" class="print">Print</a>
                    <?php } ?>
                    <a href="#" class="delete">Delete</a>
                  </td> 
                </tr>
              <?php $no++; endforeach ?>
            <?php } ?>
          </tbody>
        </table>
      </div>
   </div>

      <div class="modal-addIdForm">
        <form class="formIdForm" action="./model/add_idForm.php" method="post">
            <div class="title-cont-modal">
              <p>ID Form</p>
              <img src="icons/close 1.png"  class="closeIdForm" alt="">
            </div>

            <div class="modal-layer1">
              <label for="fullname">Fullname:</label>
              <input type="text" id="fullname" name="fullname">

              <label for="documentFor">Document For:</label>
              <select name="documentFor" id="documentFor">
                <option value="forselft">Forself</option>
                <option value="forsomeone">Forsomeone</option>
              </select>

              <label for="purpose">Purpose:</label>
              <input type="text" id="purpose" name="purpose">

              <label for="dateRequest">Date Requested:</label>
              <input type="date" id="dateRequest" name="dateRequested">

            </div>
            <input type="submit" id="submit" value="Add">
        </form>
      </div>

      <!-- UPDATE INFO -->
<div class="modal-b-info">
    <form class="form-b-info" action="">
       <div class="header-cont">
          <p>Update Barangay Information</p>
          <img src="icons/close 1.png"  class="closemo" alt="">
       </div>
      
       <div class="input-cont">
        <div class="left-cont">
          <label for="province_name">Province Name:</label>
          <input type="text" name="province_name" id="province_name">

          <label for="b_name">Barangay Name:</label>
          <input type="text" name="b_name" id="b_name">
          
          <label for="municipality_logo">Municipality Logo:</label>
          <img id="preview" alt="Preview">
          <input type="file" name="municipality_logo">
        </div>
        
        <div class="right-cont">
          <label for="town_name">Town Name:</label>
          <input type="text" name="town_name" id="town_name">
      
          <label for="tel_no">Tel No.:</label>
          <input type="text" name="tel_no" id="tel_no">
          
          <label for="barangay_logo">Barangay Logo:</label>
          <img id="preview" alt="Preview">
          <input type="file" name="barangay_logo" id="barangay_logo" >
        </div>
       </div>
       <input class="UpdateInfo" type="submit" value="Update">
    </form>
  </div>

      
    
<script src="./js//jQuery-3.7.0.js"></script>
<script src="./js//app.js"></script>
<script> 
  const addIdFormLink = document.getElementById('addIdForm');
  const modaladd = document.querySelector('.modal-addIdForm');
  const closeIdForm= document.querySelector('.closeIdForm');

  addIdFormLink.addEventListener('click', function(event) {
    event.preventDefault();
    modaladd.style.display = 'block';
  });

  closeIdForm.addEventListener('click', function() {
    modaladd.style.display = 'none';
  });
  
  //js update info
  const bInfo = document.getElementById('b-info');
  const modalInfo = document.querySelector('.modal-b-info');
  const closemo = document.querySelector('.closemo');

  bInfo.addEventListener('click', function(event) {
    event.preventDefault();
    modalInfo.style.display = 'block';
  });

  closemo.addEventListener('click', function() {
    modalInfo.style.display = 'none';
  });
</script>
</body>
</html>
