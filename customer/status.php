<?php
    session_start();
    if (!isset($_SESSION['email'])) {
        header('location: ../index.php');
    }
?>

<?php include('conn.php'); ?>

<?php 
    $id = $_POST['purchase_id'];

    $sql3 = "SELECT * FROM purchase where purchaseid='$id'";
    $result3 = mysqli_query($conn, $sql3);
    $row3 = mysqli_fetch_assoc($result3);


    if (mysqli_num_rows($result3) > 0) {
        $sql4 = "update purchase set status='1' where purchaseid='$id'";
        mysqli_query($conn, $sql4);
    }else{

        ?>
        <script>
            window.alert('Please select a valid ID');
            window.location.href='myhistorycust.php';
        </script>
        <?php
    }
    header('location:myhistorycust.php');
?>