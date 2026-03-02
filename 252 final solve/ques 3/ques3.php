<?php
    $conn = mysqli_connect("localhost", "root", "", "sundarban");
    if($conn){
        echo "Connection successful";
    }
    else{
        echo "Connection failed";
    }
?>

<?php
   //1
   $sql = "SELECT CatagoryName, SUM(Revenue) AS total 
   FROM sales_data
   GROUP BY CatagoryName";
   $result = mysqli_query($conn, $sql);
   while($row = mysqli_fetch_assoc($result)){
     echo "<br>";
     echo "Category Name: " .$row["CatagoryName"]. " - Total Revenue:  " .$row["total"]. "<br>";
   }

   $sql = "UPDATE sales_data
           SET CatagoryName = 'Low Performing'
           WHERE Revenue < 40000";
           ;
    mysqli_query($conn, $sql);
    echo"<br>";
    echo "Catagory name updated";
    
    $sql = "UPDATE sales_data
            SET Revenue = Revenue * 1.10
            WHERE Revenue > 70000";
    mysqli_query($conn, $sql);
    echo"<br>";
    echo "Bonus added";

    //4 
    $sql = "SELECT s.ProductName, s.CatagoryName, s.Revenue, 
            CASE
                WHEN s.Revenue >
                (SELECT AVG(Revenue) FROM sales_data WHERE CatagoryName = s.CatagoryName)
                THEN 'Top Seller'
                ELSE 'Regular Seller'
            END AS Status
            FROM sales_data s";
    
    $result = mysqli_query($conn, $sql);

    while($row = mysqli_fetch_assoc($result)){
        echo "<br>";
        echo "Product Name: " .$row["ProductName"]. " Category: " .$row["CatagoryName"]. " Revenue: " .$row["Revenue"]. " Status: " .$row["Status"]. "<br>";
    }
?>