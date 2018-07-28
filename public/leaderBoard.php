<?php
$matchList = array(
    0 => array(
        'matchDate' => '1',
        'country1' => 'first',
        'country2'=>'30',
    ),
    1 => array(
        'matchDate' => '2',
        'country1' => 'second',
        'country2'=>'27',
    ),
    2 => array(
        'matchDate' => '3',
        'country1' => 'third',
        'country2'=>'25',
    ),
    3 => array(
        'matchDate' => '4',
        'country1' => 'fourth',
        'country2'=>'24',
    ),
    4 => array(
        'matchDate' => '5',
        'country1' => 'fifth',
        'country2'=>'20',
    ),
    5 => array(
        'matchDate' => '6',
        'country1' => 'sixth',
        'country2'=>'10',
    ),
);
?>
<?php
$title="home";
include "../layout/layoutHeader.php";
?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2>Leader Board</h2>
            <table class="table table-responsive table-bordered table-striped">
                <tr>
                    <th>Rank</th>
                    <th>User Name</th>
                    <th>Score</th>
                </tr>
                <?php
                for ($i = 0; $i < count($matchList); $i++) {
                    echo "<tr><td>".$matchList[$i]['matchDate']."</td><td>".$matchList[$i]['country1']."</td><td>".$matchList[$i]['country2']."</td></tr>";
                }?>


            </table>
        </div>
    </div>

</div>
<?php

include "../layout/layoutFooter.php";
?>

