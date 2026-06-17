<?php
/** footer.php — endorser strip + colophon. Expects $w (current webinar). */
declare(strict_types=1);
$org = ORGS[$w['host_org']];
$c = CONTACT;
?>
<footer class="relative mt-24 bg-navy text-ivory/90">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-14">

    <!-- Endorsement / sponsorship -->
    <div class="grid gap-8 lg:grid-cols-3 items-start">

      <!-- Endorsed by: ESH + EOHNS together -->
      <div class="flex flex-col items-center gap-3">
        <span class="text-[11px] tracking-[0.18em] uppercase text-ivory/50">Endorsed by</span>
        <div class="h-24 w-full rounded-xl bg-white ring-1 ring-ivory/15 px-6 flex items-center justify-center gap-6">
          <?= logo_tag('assets/img/esh-logo.png', 'Emirates Society of Haematology', 'ESH', 'max-h-16 w-auto', 'font-extrabold text-navy text-xl') ?>
          <span class="h-12 w-px bg-navy/10" aria-hidden="true"></span>
          <?= logo_tag('assets/img/eohns.svg', 'Emirates Oncology & Hematology Nursing Society', 'EOHNS', 'max-h-16 w-auto', 'font-extrabold text-navy text-xl') ?>
        </div>
      </div>

      <!-- Supported by: Sanofi -->
      <div class="flex flex-col items-center gap-3">
        <span class="text-[11px] tracking-[0.18em] uppercase text-ivory/50">Supported by</span>
        <div class="h-24 w-full rounded-xl bg-white ring-1 ring-ivory/15 px-6 flex items-center justify-center">
          <?= logo_tag('assets/img/sanofi-logo.png', 'Sanofi', 'sanofi', 'max-h-12 w-auto', 'font-extrabold text-navy lowercase text-3xl tracking-tight') ?>
        </div>
      </div>

      <!-- Managed by: Meeting Minds -->
      <div class="flex flex-col items-center gap-3">
        <span class="text-[11px] tracking-[0.18em] uppercase text-ivory/50">Managed by</span>
        <div class="h-24 w-full rounded-xl bg-white ring-1 ring-ivory/15 px-6 flex items-center justify-center">
          <?= logo_tag('assets/img/mme-logo.svg', 'Meeting Minds Experts', 'Meeting Minds Experts', 'max-h-16 w-auto', 'font-semibold text-navy text-sm text-center leading-tight') ?>
        </div>
      </div>
    </div>

    <div class="mt-10 flex flex-wrap items-center justify-center gap-3">
      <?php if ($w['cme']): ?>
      <span class="inline-flex items-center gap-2 rounded-full bg-teal/20 text-teal-400 ring-1 ring-teal/40 px-3 py-1 text-xs font-semibold">
        <svg class="w-3.5 h-3.5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"><path fill-rule="evenodd" d="M16.7 5.3a1 1 0 0 1 0 1.4l-7.5 7.5a1 1 0 0 1-1.4 0l-3.5-3.5a1 1 0 1 1 1.4-1.4l2.8 2.8 6.8-6.8a1 1 0 0 1 1.4 0Z" clip-rule="evenodd"/></svg>
        CME Accredited
      </span>
      <?php endif; ?>
      <a href="<?= htmlspecialchars($c['subscribe']) ?>" target="_blank" rel="noopener"
         class="inline-flex items-center gap-2 rounded-full bg-ivory/10 ring-1 ring-ivory/20 text-ivory px-4 py-1.5 text-xs font-semibold hover:bg-ivory/20 transition-colors">
        <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><rect x="3" y="5" width="18" height="14" rx="2"/><path d="m3 7 9 6 9-6"/></svg>
        Subscribe to updates
      </a>
    </div>

    <hr class="my-10 border-ivory/15">

    <div class="flex flex-col sm:flex-row items-center justify-between gap-4 text-sm text-ivory/60">
      <p>&copy; <?= date('Y') ?> Hemophilia Awareness Series. Managed by Meeting Minds Experts.</p>
      <p class="flex items-center gap-4">
        <a href="<?= htmlspecialchars($c['subscribe']) ?>" target="_blank" rel="noopener" class="hover:text-ivory transition-colors">Subscribe</a>
        <a href="/" class="hover:text-ivory transition-colors">All Sessions</a>
      </p>
    </div>
  </div>
</footer>
