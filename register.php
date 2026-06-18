<?php
/**
 * register.php — dedicated registration page per webinar (/{slug}/register).
 * Embeds the BigMarker register widget for the session.
 * Routed via .htaccess: /patient/register -> register.php?event=patient
 */
declare(strict_types=1);

require_once __DIR__ . '/includes/data.php';

$slug = (string) ($_GET['event'] ?? '');
$w = get_webinar($slug);
if ($w === null) {
    http_response_code(404);
    echo 'Unknown webinar.';
    exit;
}

$org        = ORGS[$w['host_org']];
$widget     = register_widget($w);
$endorsers  = $w['endorsers'] ?? ['ESH', 'EOHNS'];
$page_title = 'Register · ' . trim($w['title'] . ' ' . $w['title_accent']);

require __DIR__ . '/includes/head.php';
?>
<body class="font-sans text-charcoal antialiased bg-ivory">

<!-- Minimal header -->
<header class="sticky top-0 z-40 bg-ivory/85 backdrop-blur-md border-b border-navy/10">
  <nav class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-28 flex items-center justify-between gap-4" aria-label="Primary">
    <a href="/<?= htmlspecialchars($w['slug']) ?>" class="flex items-center gap-3 min-w-0">
      <img src="<?= htmlspecialchars(webinar_logo_src($w)) ?>" alt="<?= htmlspecialchars(trim($w['title'] . ' ' . $w['title_accent'])) ?>" class="w-[150px] h-auto object-contain shrink-0">
    </a>
    <a href="/<?= htmlspecialchars($w['slug']) ?>" class="inline-flex items-center gap-2 text-sm font-semibold text-navy/80 hover:text-royal transition-colors min-h-[44px]">
      <svg class="w-4 h-4" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"><path fill-rule="evenodd" d="M17 10a.75.75 0 0 1-.75.75H7.56l3.22 3.22a.75.75 0 1 1-1.06 1.06l-4.5-4.5a.75.75 0 0 1 0-1.06l4.5-4.5a.75.75 0 1 1 1.06 1.06L7.56 9.25h8.69A.75.75 0 0 1 17 10Z" clip-rule="evenodd"/></svg>
      Back to session
    </a>
  </nav>
</header>

<!-- Title band -->
<section class="relative overflow-hidden bg-ivory bg-cover bg-no-repeat bg-bottom" style="background-image:url('/assets/img/hero-bg.jpg')">
  <div class="pointer-events-none absolute inset-0 bg-gradient-to-b from-ivory via-ivory/80 to-ivory/30" aria-hidden="true"></div>
  <div class="relative max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 pt-12 pb-12 text-center">
    <div class="flex flex-wrap justify-center gap-2 mb-5">
      <span class="rounded-full bg-navy text-ivory text-xs font-semibold px-3 py-1.5">Endorsed by <?= htmlspecialchars(implode(' & ', $endorsers)) ?></span>
      <?php if ($w['cme']): ?>
      <span class="rounded-full bg-teal/15 text-teal ring-1 ring-teal/30 text-xs font-semibold px-3 py-1.5">CME Accredited</span>
      <?php endif; ?>
      <span class="rounded-full bg-gold/15 text-gold-600 ring-1 ring-gold/40 text-xs font-semibold px-3 py-1.5">Sponsored by Sanofi</span>
    </div>
    <p class="text-royal font-semibold uppercase tracking-wide text-sm"><?= htmlspecialchars($w['series_tag']) ?></p>
    <h1 class="mt-2 text-3xl sm:text-4xl font-extrabold leading-tight">
      <span class="text-navy"><?= htmlspecialchars($w['title']) ?></span>
      <span class="text-royal"><?= htmlspecialchars($w['title_accent']) ?></span>
    </h1>
    <p class="mt-3 text-charcoal/75"><?= htmlspecialchars($w['date_human']) ?> · <?= htmlspecialchars($w['time_range']) ?> · <?= htmlspecialchars($w['tz']) ?></p>
  </div>
</section>

<!-- Registration widget -->
<section class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8 pb-20 pt-10">
  <div class="rounded-2xl bg-white ring-1 ring-navy/10 shadow-xl p-5 sm:p-8">
    <h2 class="text-xl font-bold text-navy">Complete your registration</h2>
    <p class="mt-1 text-sm text-charcoal/60">Fill in your details below to reserve your seat. A joining link will be emailed to you.</p>

    <div class="mt-6 -mx-1 overflow-x-auto">
      <?php if ($widget): ?>
        <?= $widget /* BigMarker register widget embed — trusted snippet, output as-is */ ?>
      <?php else: ?>
        <div class="rounded-xl border-2 border-dashed border-royal/30 bg-ivory/60 p-8 text-center">
          <div class="mx-auto w-12 h-12 rounded-full bg-royal/10 grid place-items-center mb-3" aria-hidden="true">
            <svg class="w-6 h-6 text-royal" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M16 11.5a4 4 0 1 0-8 0M4 20.5a8 8 0 0 1 16 0"/></svg>
          </div>
          <p class="font-bold text-navy">Registration opening soon</p>
          <p class="text-sm text-charcoal/70 mt-1">The registration form for this session will appear here shortly. Please check back soon.</p>
          <a href="/<?= htmlspecialchars($w['slug']) ?>" class="mt-5 inline-flex items-center gap-2 rounded-full bg-royal text-white font-semibold px-6 py-3 hover:bg-navy transition-colors min-h-[44px]">Back to session</a>
        </div>
      <?php endif; ?>
    </div>
  </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
</body>
</html>
