<?php
    function createJson($status, $msg, $result) {
           $data = array(
               'Status' => $status,
               'message' => $msg,
               'result' => $result
           );
           return json_encode($data);
    }
?>