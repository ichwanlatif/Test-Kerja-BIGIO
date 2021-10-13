<table class="table mt-3 mx-3" align="center">
  <thead>
    <tr>
      <th scope="col">Semester</th>
      <th scope="col"> </th>
    </tr>
  </thead>
  <tbody>
    <?php 
        include('connectdb.php');

        $studentID = $_GET['studentID'];

        $sql = "SELECT * FROM semesters WHERE studentID = '$studentID'";
        $result = $conn->query($sql);
        while($row = $result->fetch_assoc())
        {
    ?>
    <tr>
      <td><?php echo $row["semester"]; ?></td>
      <td>
          <?php 
            echo '<a class="btn btn-info" href="template.php?content=listNilaiSemester.php&semesterID='.$row['semesterID'].'">Lihat Nilai</a>';
          ?>
      </td>
    </tr>
    <?php 
        }
    ?>
  </tbody>
</table>