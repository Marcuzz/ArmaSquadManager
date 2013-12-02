<?php
////////////////////////////////////////////////////////////////////////////////////
//                                                                                //
//						   		Code made by Marcuz                               //
//	   Feel free to modify, but remember to credit me as the original author!     //
//                        (Do not remove orignal credits)                         //                                                                           
//                                                                                //
////////////////////////////////////////////////////////////////////////////////////


$db = new mysqli($db_host, $db_user, $db_pass, $db_database);
if ($db->connect_errno) {
    echo "Failed to connect to MySQL: (" . $db->connect_errno . ") " . $db->connect_error;
}

?>