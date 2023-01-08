<?php
$filename = "db_students.txt";
$openDB = fopen($filename, "r");
$dbContent = fread($openDB, filesize($filename));
$dbContent = unserialize($dbContent);

function cmp_name($a, $b)
{
    return ($a['name'] <=> $b['name']);
}

function cmp_surname($a, $b)
{
    return ($a['surname'] <=> $b['surname']);
}

function search($dbContent, $user)
{
    $searchRes = array();
    foreach ($dbContent as $key1 => $key2) {
        foreach ($key2 as $value) {
            if (str_contains(strtolower($value), strtolower($_GET['desired']))) {
                $searchRes[] = $value;
                // print_r($value);
            }
        }
    }
    // print_r(array_intersect_key($dbContent, $searchRes));
    output(array_intersect_key($dbContent, $searchRes), $user);
}

function output($arr, $user)
{
    $sorting = $_GET["sorting"];
    usort($arr, "cmp_$sorting");
    echo "<div class='container'>";
    echo "<table class='table table-hover'>";
    echo "<thead><tr><th>Name</th><th>Surname</th>";
    if ($user == "admin") echo "<th>Deduction</th>";
    echo "</tr></thead>";
    echo "<tbody>";
    foreach ($arr as $key1 => $key2) {
        echo "<tr>";
        foreach ($key2 as $value) {
            if ($user == "user") continue;
            echo "<td>$value</td>";
        }
        echo "</tr>";
    }
    echo "</tbody>";
    echo "</table>";
    echo "</div>";
}
