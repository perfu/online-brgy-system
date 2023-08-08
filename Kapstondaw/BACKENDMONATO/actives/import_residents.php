<div class="import-container">
  <form class="import"  action="./model/import_residents.php" method="post" enctype="multipart/form-data">
    <div class="cons">
      <label for="fileToUpload" id="labelValue">Import</label>
      <input type="file" name="fileToUpload" id="fileToUpload" hidden='hidden'>
    </div>
    <input type="submit" value="Upload File" id="submitImport" name="submit">
  </form>
</div>