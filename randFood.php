<?php
$foodList = [
    "กะเพราอกไก่สับ",
    "อกไก่ผัดพริกเผา",
    "สปาเก็ตตี้ซอสแดง",
    "อกไก่ย่างสมุนไพร",
    "เส้นหมี่ผัด",
    "อกไก่ผัดพริกไทยดำ",
    "อกไก่ผัดผงกะหรี่",
    "สเต็กอกไก่ซอสพริกไทยดำ",
    "ลาบอกไก่สับ",
];
$dLimit = 2;
$menuCount = 5;

$foodList = array_unique($foodList);
$foodList = randFood($foodList);

if (count($foodList) * $dLimit < $menuCount) {
    echo "ไม่สามารถทำรายการได้";
    return;
}

for ($i = 0;$i < 1000;$i++)
{
	$foodList = randFood($foodList);
	getFood($foodList, $menuCount, $dLimit);
    echo "<p>//////////////////////////////</p>";
}

function getFood($foodList, $menuCount, $dLimit)
{
  $rList = [];
  $count = 0;
  $i = 0;
  while ($count < $menuCount) {
      $rand = rand(1, $dLimit);
      $rList[$foodList[$i]] = $count + $rand > $menuCount ? 1 : $rand;
      $count += $rList[$foodList[$i++]];
  }

  printAllMenu($rList);
}

function printAllMenu($rList)
{
    foreach ($rList as $key => $value) {
        echo $key . " " . $value . "<br>";
    }
}

function randFood($foodList)
{
    for ($i = 0; $i < count($foodList); $i++)
    {
        $rand = rand(0, count($foodList) - 1);
        $temp = $foodList[$i];
        $foodList[$i] = $foodList[$rand];
        $foodList[$rand] = $temp;
    }

    return $foodList;
}
