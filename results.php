<?php
    $title = _('Past Results');
    $description = 'Touhou World Cup results from past years';
    $keywords = 'touhou, touhou project, 東方, 东方, Тохо, world cup, touhou world cup, twc, 2022 competition, scoring, survival, tournament';
    include_once 'php/locale.php';
    include_once 'php/head.php';
    include_once 'php/table_func.php';
?>

<body>
	<?php include_once 'php/body.php' ?>
	<main>
	<h1><?php echo _('Past Results') ?></h1>
    <!--<p class='large'><?php //echo _('This is NOT the current schedule! For the schedule, see the <a href="/schedule' . query_string(). '">Schedule</a> page.') ?></p>-->
    <p><?php echo _('This page lists the results of past years of Touhou World Cup.') ?></p>
    <p><?php echo _('Your time zone was detected as <strong id="timezone">UTC+0000 (Coordinated Universal Time)</strong>.') ?></p>
    <p><?php
        if ($lang == 'en_GB' || $lang == 'en_US' || $lang == 'de_DE' || $lang == 'es_ES') {
            echo _('Daylight Saving Time (also known as Summer Time or DST) is taken into account automatically.');
        }
    ?></p>
    <h2 class="contents"><?php echo _('Contents') ?></h2>
    <div class="contents">
        <p><a href="#2021">2021</a></p>
        <p><a href="#2020">2020</a></p>
    </div>
    <h2 id="2021">TWC 2021</h2>
    <p><?php echo _('Final tally:') ?></p>
    <ol>
        <li>
            <img src='assets/icons/japan_small.png' alt='<?php echo _('Flag of Japan') ?>'>
            <strong>Team Japan: 32<?php echo _(' points') ?></strong>
        </li>
        <li>
            <img src='assets/icons/china_small.png' alt='<?php echo _('Flag of the P.R.C.') ?>'>
            Team China: 29<?php echo _(' points') ?>
        </li>
        <li>
            <img src='assets/icons/earth.png' alt='<?php echo _('Earth') ?>'>
            Team West: 23<?php echo _(' points') ?>
        </li>
    </ol>
    <table class="schedule_table">
        <thead>
            <tr>
                <th rowspan="3"><?php echo _('Date / Time') ?></th>
                <th rowspan="3"><?php echo _('Category') ?></th>
                <th rowspan="3"><?php echo _('Players') ?></th>
                <th rowspan="3"><?php echo _('Reset Time<br>(minutes)') ?></th>
                <th rowspan="3"><?php echo _('Results') ?></th>
                <th rowspan="3"><?php echo _('Points') ?></th>
            </tr>
        </thead>
        <tbody id="schedule_tbody"><?php
            $json = file_get_contents('past/schedule_2021.json');
            $schedule_2021 = json_decode($json, true);
            $json = file_get_contents('past/results_2021.json');
            $results_2021 = json_decode($json, true);
            $teams_2021 = array(
                (object) [
                    'name' => 'West',
                    'image' => '<img src="assets/icons/earth_16px.png" alt="' . _('Earth') . '">'
                ],
                (object) [
                    'name' => 'China',
                    'image' => '<img src="assets/icons/china_16px.png" alt="' . _('Flag of the P.R.C.') . '">'
                ],
                (object) [
                    'name' => 'Japan',
                    'image' => '<img src="assets/icons/japan_16px.png" alt="' . _('Flag of Japan') . '">'
                ]
            );
            print_schedule($schedule_2021, $results_2021, $teams_2021);
        ?></tbody>
    </table>
    <p>* <?php echo _('Game Over') ?></p>
    <h2 id="2020">TWC 2020</h2>
    <p><?php echo _('Final tally:') ?></p>
    <ol>
        <li>
            <img src='assets/icons/japan_small.png' alt='<?php echo _('Flag of Japan') ?>'>
            <strong><?php _('Team Japan: ') ?>22.5<?php echo _(' points') ?></strong>
        </li>
        <li>
            <img src='assets/icons/earth.png' alt='<?php echo _('Earth') ?>'>
            <?php _('Team West: ') ?>13<?php echo _(' points') ?>
        </li>
        <li>
            <img src='assets/icons/china_small.png' alt='<?php echo _('Flag of the P.R.C.') ?>'>
            <?php _('Team China: ') ?>12.5<?php echo _(' points') ?>
        </li>
    </ol>
    <table class="schedule_table">
        <thead>
            <tr>
                <th rowspan="3"><?php echo _('Date / Time') ?></th>
                <th rowspan="3"><?php echo _('Category') ?></th>
                <th rowspan="3"><?php echo _('Players') ?></th>
                <th rowspan="3"><?php echo _('Reset Time<br>(minutes)') ?></th>
                <th rowspan="3"><?php echo _('Results') ?></th>
                <th rowspan="3"><?php echo _('Points') ?></th>
            </tr>
        </thead>
        <tbody><?php
            $json = file_get_contents('past/schedule_2020.json');
            $schedule_2020 = json_decode($json, true);
            $json = file_get_contents('past/results_2020.json');
            $results_2020 = json_decode($json, true);
            $teams_2020 = $teams_2021;
            print_schedule($schedule_2020, $results_2020, $teams_2020);
        ?></tbody>
    </table>
    <p>* <?php echo _('Game Over') ?></p>
    <p><a href="#top">Back to Top</a></p>
	</main>
</body>
</html>
