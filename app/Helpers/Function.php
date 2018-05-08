<?php
/*
|--------------------------------------------------------------------------
| GET LOCATION NESTED LIST.
|--------------------------------------------------------------------------
| @return list of location
| @Author : tantan
 */
function getLocationList()
{
    if ($exists = Storage::disk('local')->exists('locations.json')) {
        $locationTree = json_decode(Storage::disk('local')->get('locations.json'), true);
        if (is_array($locationTree)) {
            return $locationTree;
        }
    }
    return [];
}


/*
|--------------------------------------------------------------------------
| GET CHILD LIST OF A LOCATION.
|--------------------------------------------------------------------------
| @params $parent number, $max_depth number
| @return list of location
| @Author : tantan
 */
function getLocationTree(string $parent, $max_depth = 1)
{
    $_return = [];
    $locationTree = getLocationList();
    foreach ($locationTree as $value) {
        if ($max_depth == 1) {
            if ($parent != null && (string)$value['parent1'] == (string)$parent) {
                $_return[] = $value;
            }
        } else {
            if ($parent != null && (string)$value['parent1'] == $parent | (string)$value['parent2'] == $parent) {
                $_return[] = $value;
            }
        }
    }
    return $_return;
}

/*
|--------------------------------------------------------------------------
| GET LOCATION BY TID.
|--------------------------------------------------------------------------
| @params $tid number, $parent number
| @return list of location
| @Author : tantan
 */
function getLocation(string $tid, string $parent = null)
{
    $locationTree = getLocationList();
    foreach ($locationTree as $value) {
        if ((string)$value['tid'] == $tid && !empty($parent) && ((string)$value['parent1'] == $parent | (string)$value['parent2'] == $parent)) {
            return $value;
        } else if ((string)$value['tid'] == $tid && empty($parent)) {
            return $value;
        }
    }
    return null;
}

/*
|--------------------------------------------------------------------------
| GET LIST OF CITY.
|--------------------------------------------------------------------------
| @return list of location
| @Author : tantan
 */
function getCityList()
{
    $_return = [];
    $locationTree = getLocationTree(0);
    foreach ($locationTree as $value) {
        $_return[$value['tid']] = $value['name'];
    }
    return $_return;
}

/*
|--------------------------------------------------------------------------
| GET LIST OF DISTRICT.
|--------------------------------------------------------------------------
| @return list of location
| @Author : tantan
 */
function getDistrictList(string $city = null)
{
    $_return = [];
    $locationTree = getLocationList();
    foreach ($locationTree as $value) {
        if ($value['depth'] == 1) {
            if ($city == null) {
                $_return[$value['tid']] = $value['name'];
            } else if ($value['parent1'] == $city) {
                $_return[$value['tid']] = $value['name'];
            }
        }
    }
    return $_return;
}

/*
|--------------------------------------------------------------------------
| GET LIST OF WARD.
|--------------------------------------------------------------------------
| @return list of location
| @Author : phuonglv
 */
function getWardList(string $district = null)
{
    $_return = [];
    $locationTree = getLocationList();
    foreach ($locationTree as $value) {
        if ($value['depth'] == 2) {
            if ($district == null) {
                $_return[$value['tid']] = $value['name'];
            } else if ($value['parent1'] == $district) {
                $_return[$value['tid']] = $value['name'];
            }
        }
    }
    return $_return;
}