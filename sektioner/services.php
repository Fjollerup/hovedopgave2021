<?php 
// Associative Array med key-value par
$servicePages = [
    'daek.php' => 'Dæk & Fælge',
    'hotel.php' => 'Dækhotel',
    'mc.php' => 'Motorcykel',
    'udlejning.php' => 'Udlejning'
];

$uri = $_SERVER['REQUEST_URI'];
$currentFileName = basename($uri);

?>

<!-- SERVICES -->
<section>
    <div class="container">
        <h2>Andre services</h2>
        <p>Vi tilbyder også en række andre services, som du måske kunne være interesseret i.</p>
        <ul class="list__content links">
            <?php
                // Loop igennem vores array og del key-value par op i $pageName og $linkText.
                foreach($servicePages as $pageName=>$linkText){
                    // Tjek om den nuværende sides filnavn matcher med vores array.
                    // Output kun, hvis en match ikke findes.
                    if ($pageName !== $currentFileName){
                    ?>
                    <li class="list__item"><a href="<?= $pageName ?>"><?= $linkText ?></a>
                    <?php
                    }
                }
            ?>
        </ul>
    </div>
</section>