<?php
/* Template Name: Candidate page */
/* Template Post Type: page */
?>
<?php get_header();
?>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
  Launch static backdrop modal
</button>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title fs-2" id="staticBackdropLabel">Add new candidate</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" >
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label fs-3">Email address</label>
            <input type="text" class="form-control fs-3" id="candidatename" aria-describedby="emailHelp" name="candidatename">
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label fs-3">Password</label>
            <input type="text" name="mobilenumber" class="fs-3 form-control" id="mobilenumber">
          </div>
          <input type="submit" name="submit_btn" value="Submit" class="btn btn-primary fs-3">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Understood</button>
      </div>
    </div>
  </div>
</div>
<?php

$dbServerName = '127.0.0.1';

$dbUserName = 'root';

$dbPassword = '';

$dbName = "brahmasdb";

$connect = mysqli_connect($dbServerName, $dbUserName, $dbPassword, $dbName);
$tableQry =  "SELECT * FROM candidates_list;";
$table = mysqli_query($connect, $tableQry);

$list = array();

$res = mysqli_num_rows($table);
if ($res > 0) {
  while ($row = mysqli_fetch_assoc($table)) {
    $list[] = $row;
  }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST['submit_btn'])) {
    echo '<script>alert("post")</script>';
    // $first = mysqli_real_escape_string($connect, input_cleaner(($_POST["candidatename"])));
    // $mobile = mysqli_real_escape_string($connect, input_cleaner(($_POST["mobilenumber"])));

    // $fileNewName = uniqid('', true) . "." . $fileActExt;

    // $checksql = "SELECT first_name FROM candidates_list WHERE email='$email'";
    // $checkExist = mysqli_query($connect, $checksql);
    // $exist = mysqli_num_rows($checkExist);


    $sql = "INSERT INTO candidates_list (id,cname,mobile,cdate) VALUES ('007','first','mobile','today');";

    $postData = mysqli_query($connect, $sql);
    // echo '<script>window.location.href = "/"</script>';
  }
}
function input_cleaner($input)
{
  $input = trim($input);
  $input = stripslashes($input);
  $input = htmlspecialchars($input);
  $input = str_replace("'", '"', $input);
  return $input;
}

?>
<script defer>
  var globalVar = JSON.parse('<?php echo json_encode($list); ?>');
  console.log(globalVar);
</script>

<?php get_footer(); ?>