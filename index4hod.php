<?php
if (!isset($_SESSION)) 
	   session_start();
include("config.php");
date_default_timezone_set('Asia/Kolkata');
 $date5=date('Y-m-d ');
 
		$user=$_SESSION["username"];
		$kind = $_POST["kind"];
		$days = $_POST["days"];
		$from = $_POST["from"];
		$days5=$days-1;
		$date1=date('Y-m-d', strtotime($from . "+".$days5." day"));
        $status="pending";
		$dept=$_SESSION["dept"];

		$sql="SELECT sum(no) as count1 FROM vidhod WHERE tol='$kind' and dept='$dept'";
      $result = mysqli_query($db,$sql);
	  $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
	  if($kind=='cl')
	  {
		  if(($days+$row['count1'])<=75)
	     {
		  
		   $sql2="INSERT INTO vidhod(user,dept,ad,no,from2,to2,tol,cl,el,od,al,status)VALUES ('$user','$dept','$date5','$days','$from','$date1','$kind','$days','0','0','0','$status')";
		    mysqli_query($db,$sql2);
		    echo ("<SCRIPT LANGUAGE='JavaScript'>
                    window.alert('Successfully Submitted')
                    window.location.href='homehodlm.php';
	                 </SCRIPT>");
		 }
		 else
	     {
			 $days1=15-$row['count1'];$days5=$days1-1;
			 $date1=date('Y-m-d', strtotime($from . "+".$days5." day"));
        	
			 $sql2="INSERT INTO vidhod(user,dept,ad,no,from2,to2,tol,cl,el,od,al,status)VALUES ('$user','$dept','$date5','$days1','$from','$date1','$kind','$days1','0','0','0','$status')";
		    mysqli_query($db,$sql2);
			 $sql="SELECT sum(no) as count2 FROM vidhod WHERE tol='el' and dept='$dept'";
             $result = mysqli_query($db,$sql);
	         $row = mysqli_fetch_array($result,MYSQLI_ASSOC);			 
		$date1=date('Y-m-d', strtotime($from . "+".$days1." day"));
       $days2=$days-$days1;$days5=$days2-1;
		$date2=date('Y-m-d', strtotime($date1 . "+".$days5." day"));
        
			 if(($days2+$row['count2'])<=15)
	         {
		     
			  $sql2="INSERT INTO vidhod(user,dept,ad,no,from2,to2,tol,cl,el,od,al,status)VALUES ('$user','$dept','$date5','$days2','$date1','$date2','$kind','0','$days2','0','0','$status')";
		    mysqli_query($db,$sql2);
			   echo ("<SCRIPT LANGUAGE='JavaScript'>
                    window.alert('Successfully Submitted')
                    window.location.href='homehodlm.php';
	                 </SCRIPT>");
		     }
		     else
			 {		
              echo ("<SCRIPT LANGUAGE='JavaScript'>
                    window.alert('days are not sufficient')
                    window.location.href='aflhodlm.php';
	                 </SCRIPT>");
			 }	 
	  }
	  }
	  if($kind=='el')
	  {
		  if(($days+$row['count1'])<=10)
	     {
		  
		   $sql2="INSERT INTO vidhod(user,dept,ad,no,from2,to2,tol,cl,el,od,al,status)VALUES ('$user','$dept','$date5','$days','$from','$date1','$kind','0','$days','0','0','$status')";
		    mysqli_query($db,$sql2);
		   echo ("<SCRIPT LANGUAGE='JavaScript'>
                    window.alert('Successfully Submitted')
                    window.location.href='homehodlm.php';
	                 </SCRIPT>");
		 }
		 else
	     {
			        echo ("<SCRIPT LANGUAGE='JavaScript'>
                    window.alert('days are not sufficient')
                    window.location.href='aflhodlm.php';
	                 </SCRIPT>");
			 }
	 
	  }
	   if($kind=='od')
	  {
		  if(($days+$row['count1'])<=10)
	     {
		   
		   $sql2="INSERT INTO vidhod(user,dept,ad,no,from2,to2,tol,cl,el,od,al,status)VALUES ('$user','$dept','$date5','$days','$from','$date1','$kind','0','0','$days','0','$status')";
		    mysqli_query($db,$sql2);
		   echo ("<SCRIPT LANGUAGE='JavaScript'>
                    window.alert('Successfully Submitted')
                    window.location.href='homehodlm.php';
	                 </SCRIPT>");
		 }
		 else
	     {
			        echo ("<SCRIPT LANGUAGE='JavaScript'>
                    window.alert('days are not sufficient')
                    window.location.href='aflhodlm.php';
	                 </SCRIPT>");
			 }
	 
	  }
	   if($kind=='al')
	  {
		  if(($days+$row['count1'])<=5)
	     {
		   
		   $sql2="INSERT INTO vidhod(user,dept,ad,no,from2,to2,tol,cl,el,od,al,status)VALUES ('$user','$dept','$date5','$days','$from','$date1','$kind','0','0','0','$days','$status')";
		    mysqli_query($db,$sql2);
		   echo ("<SCRIPT LANGUAGE='JavaScript'>
                    window.alert('Successfully Submitted')
                    window.location.href='homehodlm.php';
	                 </SCRIPT>");
		 }
		 else
	     {
			        echo ("<SCRIPT LANGUAGE='JavaScript'>
                    window.alert('days are not sufficient')
                    window.location.href='aflhodlm.php';
	                 </SCRIPT>");
			 }
	 
	  }
	  

?>
 