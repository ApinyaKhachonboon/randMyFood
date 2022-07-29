<?php
$foodList = [
    "กะเพราอกไก่สับ",
    "อกไก่ผัดพริกเผา",
    "สปาเก็ตตี้ซอสแดง",
    "อกไก่ย่างสมุนไพร",
    "เส้นหมี่ผัด",
    "อกไก่ผัดพริกไทยดำ",
    "อกไก่ผัดผงกะหรี่",
    "อกไก่ย่างสมุนไพร",
    "สเต็กอกไก่ซอสพริกไทยดำ",
    "ลาบอกไก่สับ",
];
$dLimit = 2;
$menuCount = 10;

$foodList = randFood($foodList);

if (count($foodList) * $dLimit < $menuCount * $dLimit) {
    echo "ไม่สามารถทำรายการได้";
    return;
}

$rList = [];
$count = 0;
$i = 0;
while ($count <= $menuCount) {
    $rand = rand(1, $dLimit);
    $rList[$foodList[$i++]] = $rand;
    $count += $rand;
}

printAllMenu($rList);

function printAllMenu($rList)
{
    foreach ($rList as $key => $value) {
        echo $key . " " . $value . "<br>";
    }
}

function randFood($foodList)
{
    for ($i = 0;$i < count($foodList);$i++)
    {
        $rand = rand(0, count($foodList) - 1);
        $temp = $foodList[$i];
        $foodList[$i] = $foodList[$rand];
        $foodList[$rand] = $temp;
    }

    return $foodList;
}
