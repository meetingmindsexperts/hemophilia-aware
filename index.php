<?php
/** index.php — series overview linking to all three audience-specific webinars. */
declare(strict_types=1);
require_once __DIR__ . '/includes/data.php';

$all = webinars();
uasort($all, fn($a, $b) => strcmp($a['date_iso'], $b['date_iso'])); // soonest first → physician leads
$w = $all['patient']; // drives <head> defaults
$page_title = 'Hemophilia Awareness Webinar Series';
$is_series  = true; // emit ItemList structured data instead of a single Event

require __DIR__ . '/includes/head.php';

$cardLink = ['patient' => '/patient', 'nurses' => '/nurses', 'physician' => '/physician'];
?>
<body class="font-sans text-charcoal antialiased">

<header class="sticky top-0 z-40 bg-ivory/85 backdrop-blur-md border-b border-navy/10">
  <nav class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-28 flex items-center justify-between" aria-label="Primary">
    <a href="/" class="flex items-center min-w-0">
      <img src="/assets/img/logo-series.png" alt="Hemophilia Awareness Series" class="w-[150px] h-auto object-contain shrink-0">
    </a>
    <a href="#sessions" class="inline-flex items-center rounded-full bg-royal text-white text-sm font-semibold px-5 py-2.5 hover:bg-navy transition-colors min-h-[44px]">View sessions</a>
  </nav>
</header>

<!-- Hero -->
<section class="relative overflow-hidden bg-ivory bg-cover bg-no-repeat hero-banner">
  <div class="pointer-events-none absolute inset-0 bg-gradient-to-b from-ivory via-ivory/75 to-transparent" aria-hidden="true"></div>
  <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-16 pb-28 text-center">
    <div class="flex flex-wrap justify-center gap-2 mb-6 animate-fadeUp">
      <span class="rounded-full bg-navy text-ivory text-xs font-semibold px-3 py-1.5">Endorsed by ESH &amp; EOHNS</span>
      <span class="rounded-full bg-teal/15 text-teal ring-1 ring-teal/30 text-xs font-semibold px-3 py-1.5">CME Accredited</span>
      <span class="rounded-full bg-gold/15 text-gold-600 ring-1 ring-gold/40 text-xs font-semibold px-3 py-1.5">Sponsored by Sanofi</span>
    </div>
    <h1 class="text-balance font-extrabold leading-[1.05] text-5xl sm:text-6xl lg:text-7xl animate-fadeUp">
      <span class="block text-navy">Hemophilia Awareness</span>
      <span class="block text-royal">Webinar Series</span>
    </h1>
    <p class="mt-6 max-w-2xl mx-auto text-lg text-charcoal/75 leading-relaxed">
      An educational webinar series raising awareness of hemophilia care across dedicated, audience-specific virtual sessions, for patients, nurses, and physicians.
    </p>
    <a href="#sessions" class="mt-8 inline-flex items-center gap-2 rounded-full bg-royal text-white font-bold px-8 py-4 shadow-lg hover:bg-navy transition-colors min-h-[44px]">
      Choose your session
      <svg class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"><path fill-rule="evenodd" d="M10 3a.75.75 0 0 1 .75.75v8.69l3.22-3.22a.75.75 0 1 1 1.06 1.06l-4.5 4.5a.75.75 0 0 1-1.06 0l-4.5-4.5a.75.75 0 1 1 1.06-1.06l3.22 3.22V3.75A.75.75 0 0 1 10 3Z" clip-rule="evenodd"/></svg>
    </a>
  </div>

</section>

<?php
  require __DIR__ . '/includes/components/home_stats.php';
  require __DIR__ . '/includes/components/home_about.php';
?>

<!-- Sessions -->
<section id="sessions" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 scroll-mt-20">
  <div class="max-w-2xl mb-12">
    <p class="text-royal font-semibold uppercase tracking-wide text-sm">The sessions</p>
    <h2 class="mt-2 text-3xl sm:text-4xl font-extrabold text-navy">Pick the session for you</h2>
  </div>

  <div class="grid gap-6 lg:grid-cols-3">
    <?php foreach ($all as $slug => $item):
      $org = ORGS[$item['host_org']]; ?>
    <a href="<?= htmlspecialchars($cardLink[$slug]) ?>"
       class="group flex flex-col rounded-2xl bg-white ring-1 ring-navy/10 shadow-sm hover:shadow-lg hover:-translate-y-1 transition-all duration-200 overflow-hidden">
      <div class="h-2 bg-gradient-to-r from-royal via-teal to-gold"></div>
      <div class="p-7 flex flex-col flex-1">
        <div class="mb-4 h-20 w-[200px]">
          <img src="<?= htmlspecialchars(webinar_logo_src($item)) ?>"
               alt="<?= htmlspecialchars(trim($item['title'] . ' ' . $item['title_accent'])) ?> logo"
               class="h-full w-full object-contain object-left">
        </div>
        <div class="flex items-center justify-between gap-2">
          <span class="rounded-full bg-royal/10 text-royal text-xs font-bold px-3 py-1"><?= htmlspecialchars($item['audience']) ?></span>
          <span class="flex items-center gap-1.5">
            <?php if ($item['cme']): ?><span class="rounded-full bg-teal/15 text-teal ring-1 ring-teal/30 text-[10px] font-bold px-2 py-0.5">CME</span><?php endif; ?>
            <span class="text-xs font-semibold text-charcoal/50"><?= htmlspecialchars($org['short']) ?></span>
          </span>
        </div>
        <h3 class="mt-4 text-2xl font-extrabold text-navy leading-tight"><?= htmlspecialchars($item['title']) ?> <span class="text-royal"><?= htmlspecialchars($item['title_accent']) ?></span></h3>
        <p class="mt-1 text-sm font-medium text-charcoal/55"><?= htmlspecialchars($item['series_tag']) ?></p>
        <p class="mt-4 text-sm text-charcoal/70 leading-relaxed flex-1"><?= htmlspecialchars($item['lede']) ?></p>

        <dl class="mt-6 space-y-2 text-sm">
          <div class="flex items-center gap-2.5 text-navy font-semibold">
            <svg class="w-4 h-4 text-royal shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><rect x="3" y="4.5" width="18" height="16" rx="2"/><path d="M3 9h18M8 2.5v4M16 2.5v4"/></svg>
            <?= htmlspecialchars($item['date_human']) ?>
          </div>
          <div class="flex items-center gap-2.5 text-charcoal/70">
            <svg class="w-4 h-4 text-royal shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><circle cx="12" cy="12" r="9"/><path d="M12 7.5V12l3 2"/></svg>
            <?= htmlspecialchars($item['time_range']) ?> · <?= htmlspecialchars($item['tz']) ?>
          </div>
        </dl>

        <span class="mt-6 inline-flex items-center gap-2 font-bold text-royal group-hover:gap-3 transition-all">
          <?= join_link($item) ? 'View &amp; join' : 'View &amp; register' ?>
          <svg class="w-4 h-4" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"><path fill-rule="evenodd" d="M3 10a.75.75 0 0 1 .75-.75h8.69L9.22 6.03a.75.75 0 1 1 1.06-1.06l4.5 4.5a.75.75 0 0 1 0 1.06l-4.5 4.5a.75.75 0 1 1-1.06-1.06l3.22-3.22H3.75A.75.75 0 0 1 3 10Z" clip-rule="evenodd"/></svg>
        </span>
      </div>
    </a>
    <?php endforeach; ?>
  </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
</body>
</html>
