<?php
/** components/home_stats.php — at-a-glance metrics band for the series (home only). */
declare(strict_types=1);

// Use a local name — do NOT reuse $all, which the home page relies on (sorted by date).
$statsWebinars = webinars();
$sessions  = count($statsWebinars);
$cmeCount  = count(array_filter($statsWebinars, fn($x) => !empty($x['cme'])));
$faculty   = count(faculty_directory());

$stats = [
    [(string) $sessions,  'Audience-specific sessions', 'Tailored for patients, nurses &amp; physicians'],
    [(string) $cmeCount,  'CME-accredited sessions',    'Credit for the HCP webinars'],
    [(string) $faculty,   'Expert faculty',             'Regional haematology specialists'],
    ['100%',              'Virtual &amp; free',          'Join live from anywhere'],
];
?>
<section class="relative z-10 -mt-12 sm:-mt-16">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="rounded-3xl bg-gradient-to-br from-navy to-royal text-ivory shadow-xl overflow-hidden">
      <div class="grid sm:grid-cols-2 lg:grid-cols-4 divide-y sm:divide-y-0 sm:divide-x divide-ivory/10">
        <?php foreach ($stats as [$num, $label, $sub]): ?>
        <div class="p-7 text-center">
          <div class="text-4xl sm:text-5xl font-extrabold tabular-nums bg-gradient-to-r from-ivory to-gold-400 bg-clip-text text-transparent"><?= $num ?></div>
          <div class="mt-2 font-bold text-ivory"><?= $label ?></div>
          <p class="mt-1 text-sm text-ivory/65 leading-snug"><?= $sub ?></p>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</section>
