<?php

//////////// LOGIN & SIGNUP ////////////////

// login student

function loginstudent($email,$password){
    $co = mysqli_connect("localhost","root","","system");

    $qu = " SELECT * FROM `students` WHERE `email` = '$email' && `password` = '$password'";
    $q = mysqli_query($co,$qu);

    $res = mysqli_fetch_assoc($q);

    return $res;
}

// login supervisor

function loginsupervisor($email,$password){
    $co = mysqli_connect("localhost","root","","system");

    $qu = " SELECT * FROM `supervisors` WHERE `email` = '$email' && `password` = '$password'";
    $q = mysqli_query($co,$qu);

    $res = mysqli_fetch_assoc($q);

    return $res;
}


// add student
function addstudent($name,$email,$password,$department,$phone){
    $co = mysqli_connect("localhost","root","","system");

    $qu = "INSERT INTO `students`(`name`, `email`, `password`, `department`,`phone`) VALUES ('$name','$email','$password','$department','$phone')";

    mysqli_query($co,$qu);
    
    $res = mysqli_affected_rows($co);
    if ($res == 1) {
        return true;
    }
    else{
        return false;
    }
}


////////////// ------------------------------------------- //////////////


//////////////////////// COURSES ////////////////////////////////////


function addorder($course_name,$course_id,$course_hours,$student_id,$order_type="اضافة"){

    $co = mysqli_connect("localhost","root","","system");

    $qu = "INSERT INTO `orders`(`course_name`, `course_id`, `course_hours`,`student_id`,`order_type`) VALUES ('$course_name','$course_id','$course_hours','$student_id','$order_type')";

    mysqli_query($co,$qu);
    
    $res = mysqli_affected_rows($co);
    if ($res == 1) {
        return true;
    }
    else{
        return false;
    }
}



function ShowOrders(){

    $co = mysqli_connect("localhost","root","","system");

    $qu = "CALL `Showorders`()";

    $q = mysqli_query($co,$qu);

    $Orders=[];

    while($res = mysqli_fetch_assoc($q)){
        $Orders[]=$res;
    }

    return $Orders;

}


function order($order_id){

    $co = mysqli_connect("localhost","root","","system");

    $qu = "SELECT * FROM `orders` WHERE `id` = '$order_id'  ";

    $q = mysqli_query($co,$qu);

    $res = mysqli_fetch_assoc($q);

    return $res;

}


function DeleteOrder($id){
    $co = mysqli_connect("localhost","root","","system");

    $qu = "DELETE FROM `orders` WHERE `id`='$id'";
    mysqli_query($co,$qu);

    $res = mysqli_affected_rows($co);

    if ($res == 1) {
        return true;
    }
    else{
        return false;
    }

}



// function acceptcourse($id,$response){

//     $co = mysqli_connect("localhost","root","","system");

//     $qu = "UPDATE `courses` SET `order_status`='$response' WHERE id = $id;";

//     mysqli_query($co,$qu);
    
//     $res = mysqli_affected_rows($co);
//     if ($res == 1) {
//         return true;
//     }
//     else{
//         return false;
//     }
// }


// function orderdeletecourse($id){

//     $co = mysqli_connect("localhost","root","","system");

//     $qu = "UPDATE `courses` SET  `order_type`='حذف' , `order_status`='قيد الانظار' WHERE id = $id;";

//     mysqli_query($co,$qu);
    
//     $res = mysqli_affected_rows($co);
//     if ($res == 1) {
//         return true;
//     }
//     else{
//         return false;
//     }
// }

// function deletecourse($id,$response){

//     $co = mysqli_connect("localhost","root","","system");

//     $qu = "UPDATE `courses` SET `order_status`='$response' WHERE id = $id;";

//     mysqli_query($co,$qu);
    
//     $res = mysqli_affected_rows($co);
//     if ($res == 1) {
//         return true;
//     }
//     else{
//         return false;
//     }
// }



/////////////////////////////////////////////////////////////////////////////////////




function ShowChatsSS($student_id,$supervisor_id){

    $co = mysqli_connect("localhost","root","","system");

    $qu = "CALL `ShowChatsSS`('$student_id','$supervisor_id');";

    $q = mysqli_query($co,$qu);

    $messages=[];

    while($res = mysqli_fetch_assoc($q)){
        $messages[]=$res;
    }

    return $messages;

}


function ShowChatsStudent($supervisor_id){

    $co = mysqli_connect("localhost","root","","system");

    $qu = "CALL `ShowChatStudent`('$supervisor_id');";

    $q = mysqli_query($co,$qu);

    $messages=[];

    while($res = mysqli_fetch_assoc($q)){
        $messages[]=$res;
    }

    return $messages;

}

function ShowChatsSupervisor($student_id){

    $co = mysqli_connect("localhost","root","","system");

    $qu = "CALL `ShowChatSupervisor`('$student_id');";

    $q = mysqli_query($co,$qu);

    $messages=[];

    while($res = mysqli_fetch_assoc($q)){
        $messages[]=$res;
    }

    return $messages;

}


function addmessage($student_id,$supervisor_id,$message,$to){

    $co = mysqli_connect("localhost","root","","system");

    $qu = "INSERT INTO `chats` ( `student_id`, `supervisor_id`, `message`, `to`) VALUES ( '$student_id', '$supervisor_id', '$message', '$to')";

    mysqli_query($co,$qu);
    
    $res = mysqli_affected_rows($co);
    if ($res == 1) {
        return true;
    }
    else{
        return false;
    }
}





/////////////////////////////////////////////////////////////////////////////////////


function Showprofessors(){

    $co = mysqli_connect("localhost","root","","system");

    $qu = "SELECT * FROM `supervisors`";

    $q = mysqli_query($co,$qu);

    $professors=[];

    while($res = mysqli_fetch_assoc($q)){
        $professors[]=$res;
    }

    return $professors;

}




function updateorder($ans,$order_id){

    $co = mysqli_connect("localhost","root","","system");

    $qu = "UPDATE `orders` SET `order_status`='$ans' WHERE id = $order_id;";

    mysqli_query($co,$qu);


    $res = mysqli_affected_rows($co);

    if ($res == 1) {
        return true;
    }
    else{
        return false;
    }

}






function ShowOrderStudent($id){

    $co = mysqli_connect("localhost","root","","system");

    $qu = "SELECT * FROM `orders` WHERE student_id = $id ";

    $q = mysqli_query($co,$qu);

    $OrderStudent=[];

    while($res = mysqli_fetch_assoc($q)){
        $OrderStudent[]=$res;
    }

    return $OrderStudent;

}


function showads(){

    $co = mysqli_connect("localhost","root","","system");

    $qu = "CALL `ShowAds`();";

    $q = mysqli_query($co,$qu);

    $ads=[];

    while($res = mysqli_fetch_assoc($q)){
        $ads[]=$res;
    }

    return $ads;

}



function addads($content,$supervisor_id){

    $co = mysqli_connect("localhost","root","","system");

    $qu = "INSERT INTO `ads` ( `content`, `supervisor_id`) VALUES ( '$content', '$supervisor_id')";

    mysqli_query($co,$qu);
    
    $res = mysqli_affected_rows($co);
    if ($res == 1) {
        return true;
    }
    else{
        return false;
    }
}
