<?php
/**
 * render.php — assembles a full webinar landing page.
 * Set $slug before requiring this file (see patient.php / nurses.php / physician.php).
 */
declare(strict_types=1);

require_once __DIR__ . '/data.php';

$slug = $slug ?? 'patient';
$w = get_webinar($slug);

if ($w === null) {
    http_response_code(404);
    echo 'Unknown webinar.';
    exit;
}

require __DIR__ . '/head.php';
?>
<body class="font-sans text-charcoal antialiased">
  <?php
    require __DIR__ . '/header.php';
    require __DIR__ . '/components/hero.php';
    require __DIR__ . '/components/valueprops.php';
    require __DIR__ . '/components/highlights.php';
    require __DIR__ . '/components/agenda.php';
    if (empty($w['hide_faculty'])) {
        require __DIR__ . '/components/faculty.php';
    }
    require __DIR__ . '/components/assistance.php';
    require __DIR__ . '/components/cta.php';
    require __DIR__ . '/footer.php';
  ?>
</body>
</html>
