<?php
/** components/agenda.php — timeline of the programme. Expects $w. */
declare(strict_types=1);
?>
<section id="agenda" class="relative bg-navy text-ivory scroll-mt-20 overflow-hidden">
  <div class="pointer-events-none absolute -right-32 -top-32 w-96 h-96 rounded-full bg-royal/20 blur-3xl" aria-hidden="true"></div>
  <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
    <div class="flex flex-col sm:flex-row sm:items-end sm:justify-between gap-4 mb-12">
      <div>
        <p class="text-gold font-semibold uppercase tracking-wide text-sm">Preliminary Agenda</p>
        <h2 class="mt-2 text-3xl sm:text-4xl font-extrabold">Programme · <?= htmlspecialchars($w['date_human']) ?></h2>
      </div>
      <p class="text-ivory/70 text-sm"><?= htmlspecialchars($w['time_range']) ?> · <?= htmlspecialchars($w['tz']) ?></p>
    </div>

    <?php if (!empty($w['agenda_pending'])): ?>
    <div class="rounded-2xl border border-ivory/15 bg-ivory/5 px-6 py-12 sm:py-16 text-center">
      <span class="inline-flex items-center gap-2 rounded-full bg-gold/15 text-gold ring-1 ring-gold/40 px-4 py-1.5 text-xs font-semibold uppercase tracking-wide">
        <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><circle cx="12" cy="12" r="9"/><path d="M12 7.5V12l3 2"/></svg>
        Coming soon
      </span>
      <h3 class="mt-4 text-xl sm:text-2xl font-bold text-ivory">The agenda is currently being updated</h3>
      <p class="mt-2 text-ivory/65 text-sm max-w-md mx-auto">The full programme for this session is being finalised. Please check back soon &mdash; or register to be notified once it&rsquo;s published.</p>
    </div>
    <?php else: ?>
    <ol class="relative border-l-2 border-ivory/15 ml-3 sm:ml-4 space-y-2">
      <?php foreach ($w['agenda'] as [$from, $to, $topic, $desc, $speakers]): ?>
      <li class="relative pl-8 sm:pl-10 py-4">
        <span class="absolute -left-[9px] top-6 w-4 h-4 rounded-full bg-gold ring-4 ring-navy" aria-hidden="true"></span>
        <div class="grid sm:grid-cols-[120px_1fr] gap-2 sm:gap-6 items-start">
          <div class="text-gold font-bold tabular-nums text-sm pt-0.5"><?= htmlspecialchars($from) ?><span class="text-ivory/40"> – </span><?= htmlspecialchars($to) ?></div>
          <div>
            <h3 class="font-bold text-ivory text-lg leading-snug"><?= htmlspecialchars($topic) ?></h3>
            <?php if ($desc): ?><p class="mt-1 text-ivory/65 text-sm leading-relaxed"><?= htmlspecialchars($desc) ?></p><?php endif; ?>
            <div class="mt-2 flex flex-wrap gap-1.5">
              <?php foreach ($speakers as $sp): ?>
              <span class="inline-flex items-center rounded-full bg-ivory/10 text-ivory/85 text-xs font-medium px-2.5 py-1"><?= htmlspecialchars($sp) ?></span>
              <?php endforeach; ?>
            </div>
          </div>
        </div>
      </li>
      <?php endforeach; ?>
    </ol>
    <?php endif; ?>
  </div>
</section>
