<?php

    $sql = "SELECT * FROM current_order";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            $ic=$row['CHI'];
            $ib=$row['BUF'];
            $iv=$row['VEGG'];

    		$sql1 = " SELECT * FROM current_logged_user";
    		$result1 = mysqli_query($conn, $sql1);
    		$row1 = mysqli_fetch_assoc($result1);
    		$uc=$row1['CHI'];
    		$ub=$row1['BUF'];
    		$uv=$row1['VEGG'];
    		$user_email = $row1['email'];

            if( $uc < $ic ){
            	if( $uc < 10 ){
            		$uc = $uc + 1;
            	}
            }elseif ($uc > $ic ){
            	if ( $uc > 0 ){
            		$uc = $uc - 1;
            	}
            }else{
            	$uc = $uc;
            }

            if( $ub < $ib ){
            	if( $ub < 10 ){
            		$ub = $ub + 1;
            	}
            }elseif ($ub > $ib ){
            	if ( $ub > 0 ){
            		$ub = $ub - 1;
            	}
            }else{
            	$ub = $ub;
            }

            if( $uv < $iv ){
            	if( $uv < 10 ){
            		$uv = $uv + 1;
            	}
            }elseif ($uv > $iv ){
            	if ( $uv > 0 ){
            		$uv = $uv - 1;
            	}
            }else{
            	$uv = $uv;
            }

            $sql = "update usertable set CHI = '$uc', BUF = '$ub' , VEGG = '$uv' where email = '$user_email'";
            mysqli_query($conn, $sql);

            $sql = "update current_logged_user set CHI = '$uc', BUF = '$ub' , VEGG = '$uv'";
            mysqli_query($conn, $sql);
        }
    }
     include('filteringchange.php');

    $sql="delete from current_order";
    mysqli_query($conn, $sql);
    
?>