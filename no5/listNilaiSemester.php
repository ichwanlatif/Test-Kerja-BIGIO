<table class="table mt-3 mx-3" align="center">
  <thead>
    <tr>
      <th scope="col">Mata Pelajaran</th>
      <th scope="col">Nilai</th>
    </tr>
  </thead>
  <tbody>
    <?php 
        include('connectdb.php');

        $semesterID = $_GET['semesterID'];

        $sql = "SELECT * FROM semester_course INNER JOIN courses ON courses.courseID = semester_course.courseID WHERE semesterID = '$semesterID'";
        $result = $conn->query($sql);
        while($row = $result->fetch_assoc())
        {
    ?>
    <tr>
      <td><?php echo $row["courseName"]; ?></td>
      <td>
          <?php 
            if($row['score'] != null){
                echo $row["score"];
            }
            else{
                echo "Belum di Nilai";
            }
          ?>
      </td>
    </tr>
    <?php 
        }
    ?>
  </tbody>
</table>