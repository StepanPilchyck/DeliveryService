<?php

function getCell($column, $row, $objExcel)
{
    $sheet = $objExcel->getSheet(0);

    $rowData = $sheet->rangeToArray($column . $row, NULL, TRUE, FALSE);
    return $rowData[0][0];
}

function checkRow($row, $objExcel)
{
    $columns = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y');
    foreach($columns as $col)
    {
        if(getCell($col,$row,$objExcel) != NULL)
            return false;
    }
    return true;
}
function getSender($row, $objExcel)
{
    if(getCell('B', $row, $objExcel) == NULL) return array("ERROR IN CELL : B" . $row );
    if(getCell('C', $row, $objExcel) == NULL) return array("ERROR IN CELL : C" . $row );
    if(getCell('D', $row, $objExcel) == NULL) return array("ERROR IN CELL : D" . $row );
    if(getCell('E', $row, $objExcel) == NULL) return array("ERROR IN CELL : E" . $row );
    return array(
        'name' => getCell('B', $row, $objExcel),
        'country' => getCell('C', $row, $objExcel),
        'address' => getCell('D',$row, $objExcel),
        'phone' => getCell('E', $row, $objExcel),
        'index' => $row
        );
}

function getAllSenders($row, $objExcel) {
    $res = array();
    do {
        if(checkRow($row, $objExcel))
            break;
        if(getCell('B', $row, $objExcel) != NULL)
            $res[] = getSender($row, $objExcel);
        $row ++;
    }while(getCell('F', $row + 1, $objExcel) == NULL);
    $res["last_index"] = $row;
    return $res;
}

function getReceiver($row, $objExcel)
{
    if(getCell('F', $row, $objExcel) == NULL) return array("ERROR IN CELL : F" . $row );
    if(getCell('G', $row, $objExcel) == NULL) return array("ERROR IN CELL : G" . $row );
    if(getCell('H', $row, $objExcel) == NULL) return array("ERROR IN CELL : H" . $row );
    if(getCell('I', $row, $objExcel) == NULL) return array("ERROR IN CELL : I" . $row );
    return array(
        'name' => getCell('F', $row, $objExcel),
        'country' => getCell('G', $row, $objExcel),
        'address' => getCell('H',$row, $objExcel),
        'phone' => getCell('I', $row, $objExcel),
        'index' => $row
    );
}

function getAllReceivers($row, $objExcel) {
    $res = array();
    do {
        if(checkRow($row, $objExcel))
            break;
        if(getCell('F', $row, $objExcel) != NULL)
            $res[] = getReceiver($row, $objExcel);
        $row ++;
    } while(getCell('E', $row, $objExcel) == NULL);
    $res["last_index"] = $row;
    return $res;
}

function getContents($row, $objExcel)
{
    if(getCell('J', $row, $objExcel) == NULL) return array("ERROR IN CELL : J" . $row );
    if(getCell('K', $row, $objExcel) == NULL) return array("ERROR IN CELL : K" . $row );
    if(getCell('L', $row, $objExcel) == NULL) return array("ERROR IN CELL : L" . $row );
    if(getCell('M', $row, $objExcel) == NULL) return array("ERROR IN CELL : M" . $row );
    if(getCell('N', $row, $objExcel) == NULL) return array("ERROR IN CELL : N" . $row );
    if(getCell('H', $row, $objExcel) == NULL) return array("ERROR IN CELL : H" . $row );
    $currency = getCell('P', $row, $objExcel) == "" ? "USD" : getCell('P', $row, $objExcel);
    return array(
        'shipping_via' => getCell('J', $row, $objExcel),
        'package_type' => getCell('K', $row, $objExcel),
        'content_description' => getCell('L', $row, $objExcel),
        'weight' => getCell('M', $row, $objExcel),
        'weight_units' => getCell('N', $row, $objExcel),
        'comment' => getCell('O', $row, $objExcel),
        'currency' => $currency,
        'index' => $row
    );
}


function getPlace($row, $objExcel)
{
    if(getCell('Q', $row, $objExcel) == NULL) return array("ERROR IN CELL : Q" . $row );
    if(getCell('R', $row, $objExcel) == NULL) return array("ERROR IN CELL : R" . $row );
    if(getCell('S', $row, $objExcel) == NULL) return array("ERROR IN CELL : S" . $row );
    if(getCell('T', $row, $objExcel) == NULL) return array("ERROR IN CELL : T" . $row );
    if(getCell('U', $row, $objExcel) == NULL) return array("ERROR IN CELL : U" . $row );
    return array(
        'place_number' => getCell('Q', $row, $objExcel),
        'length' => getCell('R', $row, $objExcel),
        'width' => getCell('S', $row, $objExcel),
        'depth' => getCell('T', $row, $objExcel),
        'lwd_units' => getCell('U', $row, $objExcel),
        'index' => $row
    );
}

function getAllPlaces($row, $objExcel) {
    $res = array();
    do {
        if(checkRow($row, $objExcel))
            break;
        if(getCell('Q', $row, $objExcel) != NULL)
            $res[] = getPlace($row, $objExcel);
        $row ++;
    }while(getCell('F', $row, $objExcel) == NULL);
    $res["last_index"] = $row;
    return $res;
}

function getAttachment($row, $objExcel)
{
    if(getCell('V', $row, $objExcel) == NULL) return array("ERROR IN CELL : V" . $row );
    if(getCell('W', $row, $objExcel) == NULL) return array("ERROR IN CELL : W" . $row );
    if(getCell('X', $row, $objExcel) == NULL) return array("ERROR IN CELL : X" . $row );
    if(getCell('Y', $row, $objExcel) == NULL) return array("ERROR IN CELL : Y" . $row );
    return array(
        'attachment_description' => getCell('V', $row, $objExcel),
        'count' => getCell('W', $row, $objExcel),
        'units' => getCell('X', $row, $objExcel),
        'price' => getCell('Y', $row, $objExcel),
        'index' => $row
    );
}

function getAllAttachments($row, $objExcel) {
    $res = array();
    do {
        if(checkRow($row, $objExcel))
            break;
        if(getCell('V', $row, $objExcel) != NULL)
            $res[] = getAttachment($row, $objExcel);
        $row ++;
    }while(getCell('U', $row, $objExcel) == NULL);
    $res["last_index"] = $row;
    return $res;
}

function getPackage($row, $objExcel) {
    if(getCell('F', $row + 1, $objExcel) != NULL) {
        $sender = getSender($row, $objExcel);
        $receivers = getAllReceivers($row, $objExcel);
        for ($i = 0; $i < count($receivers) -1; $i++) {
            $places = getAllPlaces($receivers[$i]["index"], $objExcel);
            for ($j = 0; $j < count($places) -1; $j++) {
                $places[$j][] = array("attachments" => getAllAttachments($places[$j]["index"], $objExcel));
            }
            $receivers[$i][] = array("places" => $places);
        }

        $package_group = array();
        for ($i = 0; $i < count($receivers) -1; $i++) {
            $package_group[] = array("sender" => $sender, "receiver" => $receivers[$i]);
        }
        return $package_group;
    }

    $senders = getAllSenders($row, $objExcel);
    $receiver = getReceiver($row, $objExcel);
    $receivers = array();
    for($i=0;$i < count($senders); $i++){
        $receivers[] = $receiver;
    }
    for ($i = 0; $i < count($receivers) - 1; $i++) {
        $places = getAllPlaces($receivers[$i]["index"], $objExcel);
        for ($j = 0; $j < count($places) - 1; $j++) {
            $places[$j][] = array("attachments" => getAllAttachments($places[$j]["index"], $objExcel));
        }
        $receivers[$i][] = array("places" => $places);
    }

    $package_group = array();
    for ($i = 0; $i < count($receivers) - 1; $i++) {
        $package_group[] = array("sender" => $senders[$i], "receiver" => $receivers[$i], "last_index" => $receivers[$i]["places"][count($receivers[$i]["places"] -1)]["attachments"][count($receivers[$i]["places"][count($receivers[$i]["places"] -1)]["attachments"] -1)]["last_index"]);
    }
    return $package_group;
}

require_once('./PHPExcel/PHPExcel/IOFactory.php');
require_once('./PHPExcel/PHPExcel/Exception.php');

$inputFileName = 'Template_EMIs.xlsx';
$objReader = null;
$objExcel = null;

try{
    $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
    $objReader = PHPExcel_IOFactory::createReader($inputFileType);
    $objExcel = $objReader->load($inputFileName);
    echo("<pre>");
    echo("<h1>Senders</h1>");
    print_r(getSender(4,$objExcel));
    echo("<h1>Receivers</h1>");
    print_r(getAllReceivers(5, $objExcel));
    echo("<h1>Places</h1>");
    print_r(getAllPlaces(5,$objExcel));
    echo("<h1>Attachments</h1>");
    print_r(getAllAttachments(6,$objExcel));
    echo("<h1>Package</h1>");
    print_r(getPackage(15, $objExcel));
    echo("</pre>");

}
catch (PHPExcel_Reader_Exception $e){
    die('Error:' . $e->getMessage());
}
