<?php
/** components/cta.php — closing CME band + bottom register anchor. Expects $w. */
declare(strict_types=1);
?>
<section class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-4">
  <div class="relative overflow-hidden rounded-3xl bg-gradient-to-br from-royal to-navy px-6 sm:px-12 py-14 text-center shadow-xl">
    <div class="pointer-events-none absolute -top-16 -right-10 w-72 h-72 rounded-full bg-teal/30 blur-3xl" aria-hidden="true"></div>
    <div class="pointer-events-none absolute -bottom-20 -left-10 w-72 h-72 rounded-full bg-gold/20 blur-3xl" aria-hidden="true"></div>

    <div class="relative">
      <span class="inline-flex items-center gap-2 rounded-full bg-ivory/15 ring-1 ring-ivory/25 text-ivory text-xs font-semibold px-4 py-1.5">
        <svg class="w-3.5 h-3.5 text-teal-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"><path fill-rule="evenodd" d="M16.7 5.3a1 1 0 0 1 0 1.4l-7.5 7.5a1 1 0 0 1-1.4 0l-3.5-3.5a1 1 0 1 1 1.4-1.4l2.8 2.8 6.8-6.8a1 1 0 0 1 1.4 0Z" clip-rule="evenodd"/></svg>
        <?= $w['cme'] ? 'CME Accredited · Free to attend' : 'Free to attend' ?>
      </span>
      <h2 class="mt-5 text-3xl sm:text-4xl font-extrabold text-ivory text-balance">Secure your place at the <?= htmlspecialchars($w['audience']) ?> session</h2>
      <p class="mt-3 text-ivory/80 max-w-xl mx-auto"><?= htmlspecialchars($w['date_human']) ?> · <?= htmlspecialchars($w['time_range']) ?> · <?= htmlspecialchars($w['tz']) ?></p>

      <!-- Countdown -->
      <div id="countdown" class="mt-8 flex justify-center gap-3 sm:gap-4" data-start="<?= htmlspecialchars($w['start_iso']) ?>" role="timer" aria-live="off">
        <?php foreach (['days' => 'Days', 'hours' => 'Hrs', 'mins' => 'Min', 'secs' => 'Sec'] as $k => $label): ?>
        <div class="w-16 sm:w-20 rounded-2xl bg-ivory/10 ring-1 ring-ivory/20 backdrop-blur px-2 py-3">
          <div data-unit="<?= $k ?>" class="text-3xl sm:text-4xl font-extrabold text-ivory tabular-nums leading-none">--</div>
          <div class="mt-1 text-[10px] sm:text-xs font-semibold uppercase tracking-wider text-ivory/60"><?= $label ?></div>
        </div>
        <?php endforeach; ?>
      </div>

      <?php
        $join = join_link($w);
        $reg = register_link($w);
        $ctaHref  = $join ?: ($reg ?: '#register');
        $ctaAttrs = $join ? ' target="_blank" rel="noopener"' : '';
        $ctaLabel = $join ? 'Join Webinar' : 'Register now';
      ?>
      <a href="<?= htmlspecialchars($ctaHref) ?>"<?= $ctaAttrs ?>
         class="mt-7 inline-flex items-center gap-2 rounded-full bg-gold text-navy font-bold px-8 py-4 shadow-lg hover:bg-gold-400 transition-colors min-h-[44px]">
        <?= htmlspecialchars($ctaLabel) ?>
        <svg class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"><path fill-rule="evenodd" d="M3 10a.75.75 0 0 1 .75-.75h8.69L9.22 6.03a.75.75 0 1 1 1.06-1.06l4.5 4.5a.75.75 0 0 1 0 1.06l-4.5 4.5a.75.75 0 1 1-1.06-1.06l3.22-3.22H3.75A.75.75 0 0 1 3 10Z" clip-rule="evenodd"/></svg>
      </a>
      <?php if ($join): ?>
      <p class="mt-3 text-ivory/70 text-xs">No registration needed · <a href="https://zoom.us/download" target="_blank" rel="noopener" class="font-semibold text-ivory hover:underline">Download Zoom</a> (optional) or join from your browser</p>
      <?php endif; ?>
    </div>
  </div>
</section>

<script>
  (function () {
    var el = document.getElementById('countdown');
    if (!el) return;
    var target = new Date(el.getAttribute('data-start')).getTime();
    var units = {
      days: el.querySelector('[data-unit="days"]'),
      hours: el.querySelector('[data-unit="hours"]'),
      mins: el.querySelector('[data-unit="mins"]'),
      secs: el.querySelector('[data-unit="secs"]')
    };
    var pad = function (n) { return String(n).padStart(2, '0'); };
    function tick() {
      var diff = target - Date.now();
      if (diff <= 0) {
        units.days.textContent = units.hours.textContent = units.mins.textContent = units.secs.textContent = '00';
        el.setAttribute('aria-label', 'The webinar has started.');
        clearInterval(timer);
        return;
      }
      var s = Math.floor(diff / 1000);
      units.days.textContent  = pad(Math.floor(s / 86400));
      units.hours.textContent = pad(Math.floor((s % 86400) / 3600));
      units.mins.textContent  = pad(Math.floor((s % 3600) / 60));
      units.secs.textContent  = pad(s % 60);
    }
    tick();
    var timer = setInterval(tick, 1000);
  })();
</script>
