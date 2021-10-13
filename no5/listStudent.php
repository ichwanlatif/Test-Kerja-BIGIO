<table class="table mt-3 mx-3" align="center">
  <thead>
    <tr>
      <th scope="col">NIS</th>
      <th scope="col">Nama</th>
      <th scope="col">Semester</th>
      <th scope="col"> </th>
    </tr>
  </thead>
  <tbody>
    <?php 
        include('connectdb.php');

        $teacherID = $_SESSION['teacherID'];

        $sql = "SELECT semester_course.courseID, teachers.teacherID, semesters.semesterID, students.studentID, students.studentName, students.studentNIS, semesters.semester FROM semester_course
        INNER JOIN courses ON courses.courseID = semester_course.courseID
        INNER JOIN teachers ON courses.teacherID = teachers.teacherID
        INNER JOIN semesters ON semesters.semesterID = semester_course.semesterID
        INNER JOIN students ON students.studentID = semesterS.studentID
        WHERE courses.teacherID = '$teacherID'
        GROUP BY semesters.semester
        ORDER BY semesters.semester";
        $result = $conn->query($sql);
        while($row = $result->fetch_assoc())
        {
    ?>
    <tr>
      <td><?php echo $row["studentNIS"]; ?></td>
      <td><?php echo $row["studentName"]; ?></td>
      <td>
        <a class="btn btn-info" href="template.php?content=formAddNilai.php&semesterID=<?php echo $row['studentID']; ?>&semesterID=<?php echo $row['semesterID']; ?>">Input Nilai</a>
      </td>
    </tr>
    <?php 
        }
    ?>
  </tbody>
</table>