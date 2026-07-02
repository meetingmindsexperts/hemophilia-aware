<?php
/** header.php — sticky top navigation. Expects $w (current webinar). */
declare(strict_types=1);
$org = ORGS[$w['host_org']];
$join = join_link($w);
$reg = register_link($w);
$regHref  = $join ?: ($reg ?: '#register');
$regAttrs = $join ? ' target="_blank" rel="noopener"' : '';
$regText  = $join ? 'Join Webinar' : 'Register';
?>
<a href="#register" class="sr-only focus:not-sr-only focus:absolute focus:z-50 focus:top-3 focus:left-3 focus:bg-navy focus:text-white focus:px-4 focus:py-2 focus:rounded-lg">
  Skip to registration
</a>

<header class="sticky top-0 z-40 bg-ivory/85 backdrop-blur-md border-b border-navy/10">
  <nav class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-28 flex items-center justify-between gap-4" aria-label="Primary">
    <?php $hasCustomLogo = webinar_logo($w) !== null; ?>
    <a href="/" class="flex items-center gap-3 group min-w-0">
      <img src="<?= htmlspecialchars(webinar_logo_src($w)) ?>"
           alt="<?= htmlspecialchars(trim($w['title'] . ' ' . $w['title_accent'])) ?>"
           class="w-[150px] h-auto object-contain shrink-0">
      <?php if (!$hasCustomLogo): ?>
      <span class="leading-tight min-w-0">
        <span class="block text-navy font-extrabold text-sm sm:text-base truncate">Hemophilia Awareness</span>
        <span class="block text-royal text-[11px] sm:text-xs font-medium truncate"><?= htmlspecialchars($org['short']) ?> Webinar Series</span>
      </span>
      <?php endif; ?>
    </a>

    <div class="hidden md:flex items-center gap-6 text-sm font-medium text-navy/80">
      <a href="#about" class="hover:text-royal transition-colors">About</a>
      <a href="#agenda" class="hover:text-royal transition-colors">Agenda</a>
      <?php if (empty($w['hide_faculty'])): ?><a href="#faculty" class="hover:text-royal transition-colors">Faculty</a><?php endif; ?>
      <a href="#contact" class="hover:text-royal transition-colors">Contact</a>
      <a href="/" class="hover:text-royal transition-colors">All Sessions</a>
    </div>

    <a href="<?= htmlspecialchars($regHref) ?>"<?= $regAttrs ?>
       class="inline-flex items-center gap-2 rounded-full bg-royal text-white text-sm font-semibold px-5 py-2.5 shadow-sm hover:bg-navy transition-colors min-h-[44px]">
      <?= htmlspecialchars($regText) ?>
      <svg class="w-4 h-4" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"><path fill-rule="evenodd" d="M3 10a.75.75 0 0 1 .75-.75h8.69L9.22 6.03a.75.75 0 1 1 1.06-1.06l4.5 4.5a.75.75 0 0 1 0 1.06l-4.5 4.5a.75.75 0 1 1-1.06-1.06l3.22-3.22H3.75A.75.75 0 0 1 3 10Z" clip-rule="evenodd"/></svg>
    </a>
  </nav>
</header>
