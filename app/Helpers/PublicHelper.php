<?php

function debug($data)
{
    echo "<pre style='padding: 10px; margin: 15px; background-color: #ebebeb; color: #000099;'>";
    print_r($data);
    echo "</pre>";
    exit;
}

function date_indo($date_format = 'l, j F Y | H:i', $timestamp = '', $suffix = '')
{
    if (trim($timestamp) == '') {
        $timestamp = time();
    }
    $date_format = preg_replace("/S/", "", $date_format);
    $pattern     = array(
        'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday',
        'January', 'February', 'March', 'April', 'June', 'July', 'August', 'September', 'October',
        'November', 'December',
        'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun',
        'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec',
    );
    $replace     = array(
        'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu',
        'Januari', 'Februari', 'Maret', 'April', 'Juni', 'Juli', 'Agustus', 'September',
        'Oktober', 'November', 'Desember',
        'Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab', 'Min',
        'Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Ags', 'Sep', 'Okt', 'Nov', 'Des',
    );

    if (ctype_digit($timestamp)) {
        $date = date($date_format, $timestamp);
        $date = str_replace($pattern, $replace, $date);
    } else {
        $date = str_replace($replace, $pattern, $timestamp);
        $date = str_replace("Ags", "Aug", $timestamp);
        $date = date($date_format, strtotime($date));
    }

    $date = "{$date} {$suffix}";
    return $date;
}

function formatRp($val)
{
    if ($val < 0) {
        $val = abs($val);
        $ret = "<text class='text-danger'>(" . (number_format($val, 2, ',', '.')) . ")</text>";
    } elseif ($val === 0) {
        $ret = "-";
    } else {
        $ret = number_format($val, 2, ',', '.');
    }
    return "<div class='text-right rpan'>" . $ret . "</div>";
}

function responsdata($status, $data = "Error 500 . Something Error")
{
    $Result = [];
    if (!$status) {
        $Result['error'] = false;
        if (is_array($data) || is_object($data)) {
            $Result['data'] = $data;
        } else {
            $Result['output'] = $data;
        }
    } else {
        $Result['error'] = true;
        $Result['message'] = $data;
    }

    return $Result;
}

function tryCatch($is_function = "", $Msg = "Suksess", $Err = "Something is really going wrong.")
{
    try {
        $is_function();
    } catch (\Exception $e) {
        if (is_callable($Err)) {
            return $Err($e);
        } else {
            Log::error('[' . $e->getCode() . '] "' . $e->getMessage() . '" on line ' . $e->getTrace()[5]['line'] . ' of file ' . $e->getTrace()[5]['file']);
            return responsdata(true, $Err);
        }
    }
    return responsdata(false, $Msg);
}
