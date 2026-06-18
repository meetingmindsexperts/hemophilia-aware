<?php
/** components/valueprops.php — four trust signals under the hero (reference-site pattern). */
declare(strict_types=1);

$icons = [
    'users'  => '<path d="M16 11.5a4 4 0 1 0-8 0M3 20.5a7.5 7.5 0 0 1 18 0"/>',
    'badge'  => '<path d="m12 3 2.4 1.8 3 .1 .9 2.9 2.4 1.8-.9 2.9.9 2.9-2.4 1.8-.9 2.9-3 .1L12 21l-2.4-1.8-3-.1-.9-2.9L3.3 14.3l.9-2.9-.9-2.9 2.4-1.8.9-2.9 3-.1Z"/><path d="m9 12 2 2 4-4"/>',
    'target' => '<circle cx="12" cy="12" r="8.5"/><circle cx="12" cy="12" r="4.5"/><circle cx="12" cy="12" r="1"/>',
    'globe'  => '<circle cx="12" cy="12" r="9"/><path d="M3 12h18M12 3a14 14 0 0 1 0 18M12 3a14 14 0 0 0 0 18"/>',
];
?>
<section class="relative z-10 -mt-12 sm:-mt-16">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="grid gap-px overflow-hidden rounded-2xl bg-navy/10 ring-1 ring-navy/10 shadow-lg sm:grid-cols-2 lg:grid-cols-4">
      <?php foreach (value_props($w['cme'] ?? true, $w['endorsers'] ?? ['ESH', 'EOHNS']) as [$title, $body, $icon]): ?>
      <div class="flex items-start gap-3 bg-white p-5">
        <span class="grid place-items-center w-10 h-10 rounded-xl bg-royal/10 text-royal shrink-0" aria-hidden="true">
          <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><?= $icons[$icon] ?? '' ?></svg>
        </span>
        <div>
          <h3 class="font-bold text-navy text-sm leading-tight"><?= $title ?></h3>
          <p class="mt-0.5 text-xs text-charcoal/65 leading-snug"><?= $body ?></p>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
