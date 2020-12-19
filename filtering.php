<?php

    $sql = " SELECT * FROM current_logged_user";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $uc=$row['CHI'];
    $ub=$row['BUF'];
    $uv=$row['VEGG'];

    $sql = "SELECT * FROM product";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            $ic=$row['CHI'];
            $ib=$row['BUF'];
            $iv=$row['VEGG'];
            $itemname=$row['productname'];
            $itemprice=$row['price'];
            $itemphoto=$row['photo'];

            $sumxx = 0.0;
            $sumyy = 0.0;
            $sumxy = 0.0;

            $sumxx = ($uc*$uc) + ($ub*$ub) + ($uv*$uv);
            $sumyy = ($ic*$ic) + ($ib*$ib) + ($iv*$iv);
            $sumxy = ($uc*$ic) + ($ub*$ib) + ($uv*$iv);

            $similarity = $sumxy/(sqrt($sumxx*$sumyy));
            $sql = "insert into recom_details(item_name, similarity, price, photo) values ('$itemname', '$similarity', '$itemprice', '$itemphoto')";
            mysqli_query($conn, $sql);
        }
    }
    
?>