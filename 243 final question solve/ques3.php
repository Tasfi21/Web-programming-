<?php
   $conn = mysqli_connect("localhost", "root", "", "uiuweb_final");
   if (!$conn){
    echo "Connection failed";
   }
   else{
     echo "Connection Successful";
   }
?>

<?php
  //1
  $sql = "SELECT LetterGrade, COUNT(*) AS total
            FROM student_final
            GROUP BY LetterGrade";
  
  $result = mysqli_query($conn, $sql);

  echo "<table border='1'>";
  echo "<tr><th>LetterGrade</th><th>Number of student</th></tr>";

  while($row = mysqli_fetch_assoc($result)){
    echo "<tr>";
    echo "<td>".$row['LetterGrade']."</td>";
    echo "<td>".$row['total']."</td>";
    echo "</tr>";
  }

  echo "</table>";
  
  //2
   $sql = "UPDATE student_final
            SET LetterGrade = 'C'
            WHERE grade < 75 AND LetterGrade != 'D'";

    $gradeUpdate = mysqli_query($conn, $sql);
    echo "<br>";
    echo "update successfully";
    echo "<br>";

  //3
  $sql = "UPDATE student_final
            SET grade = grade + 5
            WHERE grade > 80 AND (grade+5) <= 90";

  mysqli_query($conn, $sql);
  echo "<br>";
  echo "grade updated successfully";
  echo "<br>";

  //4
  $sql = "SELECT CourseTitle,COUNT(*) AS total
            FROM student_final
            GROUP BY CourseTitle
            ORDER BY total DESC";
  
  $update = mysqli_query($conn, $sql);
  echo "<br>";
  echo "Most Popular Sort";
  echo "<table border='1'>";
  while($row = mysqli_fetch_assoc($update)){
    echo "<tr>";
    echo "<td>".$row['CourseTitle']."</td>";
    echo "<td>".$row['total']."</td>";
    echo "</tr>";

  }
  echo "</table>";
?>