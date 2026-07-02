<?php
/** components/hero.php — hero with brand motif + embedded BigMarker registration. Expects $w. */
declare(strict_types=1);
$org = ORGS[$w['host_org']];
$bmUrl = $w['bigmarker']['conference_url'] ?? null;
?>
<section class="relative overflow-hidden bg-ivory bg-cover bg-no-repeat hero-banner">
  <div class="pointer-events-none absolute inset-0 bg-gradient-to-b from-ivory via-ivory/75 to-transparent" aria-hidden="true"></div>
  <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-14 pb-28 lg:pt-20 lg:pb-36">
    <div class="grid lg:grid-cols-[1.1fr_0.9fr] gap-12 items-start">

      <!-- Left: title + meta -->
      <div class="animate-fadeUp">
        <div class="flex flex-wrap items-center gap-2 mb-6">
          <span class="inline-flex items-center gap-1.5 rounded-full bg-navy text-ivory text-xs font-semibold px-3 py-1.5">
            Endorsed by <?= htmlspecialchars(implode(' & ', $w['endorsers'] ?? [$org['short']])) ?>
          </span>
          <?php if ($w['cme']): ?>
          <span class="inline-flex items-center gap-1.5 rounded-full bg-teal/15 text-teal ring-1 ring-teal/30 text-xs font-semibold px-3 py-1.5">
            <svg class="w-3.5 h-3.5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"><path fill-rule="evenodd" d="M16.7 5.3a1 1 0 0 1 0 1.4l-7.5 7.5a1 1 0 0 1-1.4 0l-3.5-3.5a1 1 0 1 1 1.4-1.4l2.8 2.8 6.8-6.8a1 1 0 0 1 1.4 0Z" clip-rule="evenodd"/></svg>
            CME Accredited
          </span>
          <?php endif; ?>
          <span class="inline-flex items-center gap-1.5 rounded-full bg-gold/15 text-gold-600 ring-1 ring-gold/40 text-xs font-semibold px-3 py-1.5">
            Sponsored by Sanofi
          </span>
        </div>

        <p class="text-royal font-semibold tracking-wide uppercase text-sm mb-3"><?= htmlspecialchars($w['series_tag']) ?></p>
        <h1 class="text-balance font-extrabold leading-[1.05] text-5xl sm:text-6xl lg:text-7xl">
          <span class="block text-navy"><?= htmlspecialchars($w['title']) ?></span>
          <span class="block text-royal"><?= htmlspecialchars($w['title_accent']) ?></span>
        </h1>

        <p class="mt-6 max-w-xl text-lg text-charcoal/80 leading-relaxed"><?= htmlspecialchars($w['lede']) ?></p>

        <!-- Meta pills -->
        <dl class="mt-8 flex flex-wrap gap-3">
          <div class="flex items-center gap-2.5 rounded-xl bg-white/70 ring-1 ring-navy/10 px-4 py-3 shadow-sm">
            <svg class="w-5 h-5 text-royal shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><rect x="3" y="4.5" width="18" height="16" rx="2"/><path d="M3 9h18M8 2.5v4M16 2.5v4"/></svg>
            <div><dt class="sr-only">Date</dt><dd class="font-bold text-navy leading-tight"><?= htmlspecialchars($w['date_human']) ?></dd><span class="text-xs text-charcoal/60"><?= htmlspecialchars($w['day_name']) ?></span></div>
          </div>
          <div class="flex items-center gap-2.5 rounded-xl bg-white/70 ring-1 ring-navy/10 px-4 py-3 shadow-sm">
            <svg class="w-5 h-5 text-royal shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><circle cx="12" cy="12" r="9"/><path d="M12 7.5V12l3 2"/></svg>
            <div><dt class="sr-only">Time</dt><dd class="font-bold text-navy leading-tight"><?= htmlspecialchars($w['time_range']) ?></dd><span class="text-xs text-charcoal/60"><?= htmlspecialchars($w['tz']) ?></span></div>
          </div>
          <div class="flex items-center gap-2.5 rounded-xl bg-royal text-white px-4 py-3 shadow-sm">
            <svg class="w-5 h-5 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><rect x="2.5" y="4.5" width="19" height="12" rx="2"/><path d="M8 20.5h8M12 16.5v4"/></svg>
            <div><dt class="sr-only">Format</dt><dd class="font-bold leading-tight">Virtual</dd><span class="text-xs text-white/75"><?= htmlspecialchars($w['audience']) ?></span></div>
          </div>
        </dl>

        <!-- Dual CTAs -->
        <?php
          $join = join_link($w);
          $reg = register_link($w);
          $ctaHref  = $join ?: ($reg ?: '#register');
          $ctaAttrs = $join ? ' target="_blank" rel="noopener"' : '';
          $ctaLabel = $join ? 'Join on Zoom' : 'Register now';
        ?>
        <div class="mt-8 flex flex-wrap gap-3">
          <a href="<?= htmlspecialchars($ctaHref) ?>"<?= $ctaAttrs ?> class="inline-flex items-center gap-2 rounded-full bg-royal text-white font-bold px-7 py-3.5 shadow-md hover:bg-navy transition-colors min-h-[44px]">
            <?= htmlspecialchars($ctaLabel) ?>
            <svg class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"><path fill-rule="evenodd" d="M3 10a.75.75 0 0 1 .75-.75h8.69L9.22 6.03a.75.75 0 1 1 1.06-1.06l4.5 4.5a.75.75 0 0 1 0 1.06l-4.5 4.5a.75.75 0 1 1-1.06-1.06l3.22-3.22H3.75A.75.75 0 0 1 3 10Z" clip-rule="evenodd"/></svg>
          </a>
          <a href="#agenda" class="inline-flex items-center gap-2 rounded-full bg-white text-navy font-bold px-7 py-3.5 ring-1 ring-navy/15 shadow-sm hover:ring-royal hover:text-royal transition-colors min-h-[44px]">
            View agenda
          </a>
        </div>
      </div>

      <!-- Right: registration card -->
      <div id="register" class="lg:sticky lg:top-24 animate-fadeUp scroll-mt-24">
        <div class="rounded-2xl bg-white shadow-xl ring-1 ring-navy/10 overflow-hidden">
          <div class="bg-navy px-6 py-5">
            <h2 class="text-ivory font-bold text-xl"><?= $join ? 'Join the live session' : 'Reserve your seat' ?></h2>
            <p class="text-ivory/70 text-sm mt-1"><?= $join ? 'Free · Live virtual · Join on Zoom — no registration needed' : 'Free · Live virtual · Registration on BigMarker' ?></p>
          </div>

          <div class="p-5 sm:p-6">
            <?php if ($join): ?>
              <!-- No registration — attendees join the Zoom session directly. -->
              <a href="<?= htmlspecialchars($join) ?>" target="_blank" rel="noopener"
                 class="w-full inline-flex items-center justify-center gap-2 rounded-xl bg-royal text-white font-bold px-5 py-3.5 shadow-md hover:bg-navy transition-colors min-h-[44px]">
                Join on Zoom
                <svg class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"><path fill-rule="evenodd" d="M3 10a.75.75 0 0 1 .75-.75h8.69L9.22 6.03a.75.75 0 1 1 1.06-1.06l4.5 4.5a.75.75 0 0 1 0 1.06l-4.5 4.5a.75.75 0 1 1-1.06-1.06l3.22-3.22H3.75A.75.75 0 0 1 3 10Z" clip-rule="evenodd"/></svg>
              </a>
              <p class="mt-2.5 flex items-center justify-center gap-1.5 text-center text-xs text-charcoal/55">
                <svg class="w-3.5 h-3.5 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><rect x="2.5" y="4.5" width="19" height="12" rx="2"/><path d="M8 20.5h8M12 16.5v4"/></svg>
                Opens directly in Zoom — no registration required.
              </p>
              <p class="mt-1.5 text-center text-xs text-charcoal/55">
                New to Zoom? <a href="https://zoom.us/download" target="_blank" rel="noopener" class="font-semibold text-royal hover:underline">Download the app</a> (optional) — or join from your browser.
              </p>
            <?php else: ?>
              <!-- Registration form lives on the dedicated /{slug}/register page (BigMarker widget). -->
              <?php if ($reg): ?>
              <a href="<?= htmlspecialchars($reg) ?>"
                 class="w-full inline-flex items-center justify-center gap-2 rounded-xl bg-royal text-white font-bold px-5 py-3.5 shadow-md hover:bg-navy transition-colors min-h-[44px]">
                Register now
                <svg class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"><path fill-rule="evenodd" d="M3 10a.75.75 0 0 1 .75-.75h8.69L9.22 6.03a.75.75 0 1 1 1.06-1.06l4.5 4.5a.75.75 0 0 1 0 1.06l-4.5 4.5a.75.75 0 1 1-1.06-1.06l3.22-3.22H3.75A.75.75 0 0 1 3 10Z" clip-rule="evenodd"/></svg>
              </a>
              <?php else: ?>
              <button type="button" disabled
                class="w-full inline-flex items-center justify-center gap-2 rounded-xl bg-royal/40 text-white font-bold px-5 py-3.5 cursor-not-allowed min-h-[44px]">
                Registration opening soon
              </button>
              <?php endif; ?>
              <p class="mt-2.5 flex items-center justify-center gap-1.5 text-center text-xs text-charcoal/55">
                <svg class="w-3.5 h-3.5 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><rect x="4" y="10" width="16" height="10" rx="2"/><path d="M8 10V7a4 4 0 0 1 8 0v3"/></svg>
                <?= $reg ? 'Secure registration — powered by BigMarker.' : 'Registration opening soon.' ?>
              </p>
            <?php endif; ?>

            <ul class="mt-5 space-y-2.5 text-sm text-charcoal/80">
              <?php
                $perks = $w['cme']
                  ? ['Live Q&A with the faculty', 'CME certificate for eligible attendees', 'Joining link sent to your inbox']
                  : ['Live Q&A with the faculty', 'Certificate of attendance', 'Joining link sent to your inbox'];
                foreach ($perks as $perk): ?>
              <li class="flex items-start gap-2.5">
                <svg class="w-4 h-4 text-teal mt-0.5 shrink-0" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"><path fill-rule="evenodd" d="M16.7 5.3a1 1 0 0 1 0 1.4l-7.5 7.5a1 1 0 0 1-1.4 0l-3.5-3.5a1 1 0 1 1 1.4-1.4l2.8 2.8 6.8-6.8a1 1 0 0 1 1.4 0Z" clip-rule="evenodd"/></svg>
                <span><?= htmlspecialchars($perk) ?></span>
              </li>
              <?php endforeach; ?>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>

</section>
