<?php

$conn = mysqli_connect('localhost', 'root', '', 'lsp_printer');

if (!$conn or $conn->connect_error) {
    echo "Error: ".$conn->connect_error; die;
}

date_default_timezone_set('Asia/Jakarta');
define('BASE_URL', '/lsp_printer/');
define('BASE_VIEWS', BASE_URL.'views/');
define('BASE_SYSTEM', BASE_URL.'system/');

session_start();

function query($query, $single=FALSE) {
    global $conn;

    $query = mysqli_query($conn, $query);

    if ($query === TRUE) {
        return TRUE;
    } else if ($query === FALSE or mysqli_num_rows($query) === 0) {
        return FALSE;
    } else {
        while ($row = mysqli_fetch_assoc($query)) {
            $rows[] = $row;
        }

        if ($single) {
            return $rows[0];
        } else {
            return $rows;
        }
    }
}

function arr_default($array, $key, $default="") {
    $item = $array;
    for ($i = 0; $i < count($key); $i++) {
        if (isset($item[$key[$i]])) {
            $item = $item[$key[$i]];
        } else {
            return $default;
        }
    }
    return $item;
}

function clean_str($str) {
    global $conn;

    return mysqli_real_escape_string($conn, htmlspecialchars($str));
}

function logged_in($redirect_link="") {
    if (isset($_SESSION['user'], $_SESSION['is_authenticated']) and $_SESSION['is_authenticated'] === TRUE) {
        return $_SESSION['user']['role'];
    } else if ($redirect_link) {
        header("Location: ".BASE_URL."index.php");
    } else {
        return FALSE;
    }
}

function alert($message, $redirect_link) {
    echo "<script> alert('$message'); document.location.href = '$redirect_link'</script>";
    die;
}

?>