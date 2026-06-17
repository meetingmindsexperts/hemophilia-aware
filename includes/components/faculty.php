<?php
/** components/faculty.php — speaker cards. Expects $w. */
declare(strict_types=1);
$dir = faculty_directory();
?>
<section id="faculty" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 scroll-mt-20">
  <div class="max-w-2xl mb-12">
    <p class="text-royal font-semibold uppercase tracking-wide text-sm">Faculty</p>
    <h2 class="mt-2 text-3xl sm:text-4xl font-extrabold text-navy">Meet your speakers</h2>
  </div>

  <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
    <?php foreach ($w['faculty'] as $id):
      $f = $dir[$id] ?? null; if (!$f) continue; ?>
    <article class="flex gap-4 rounded-2xl bg-white ring-1 ring-navy/10 p-6 shadow-sm">
      <?php if (!empty($f['photo']) && is_file(dirname(__DIR__, 2) . '/' . $f['photo'])): ?>
      <!-- Source images already include a gold ring on a white background; show them as-is, no extra clip/ring. -->
      <img src="<?= htmlspecialchars($f['photo']) ?>" alt="<?= htmlspecialchars($f['name']) ?>"
           class="shrink-0 w-24 h-24 sm:w-28 sm:h-28 object-contain" loading="lazy">
      <?php else: ?>
      <div class="shrink-0 w-24 h-24 sm:w-28 sm:h-28 rounded-full grid place-items-center text-white font-bold text-2xl shadow-inner ring-2 ring-gold/40"
           style="background: linear-gradient(135deg,#2E6F95,#1AA3A3);" aria-hidden="true">
        <?= htmlspecialchars(initials($f['name'])) ?>
      </div>
      <?php endif; ?>
      <div class="min-w-0">
        <h3 class="font-bold text-navy text-lg leading-tight"><?= htmlspecialchars($f['name']) ?></h3>
        <p class="text-royal text-sm font-semibold"><?= htmlspecialchars($f['role']) ?></p>
        <p class="mt-2 text-sm text-charcoal/70 leading-relaxed"><?= htmlspecialchars($f['bio']) ?></p>
      </div>
    </article>
    <?php endforeach; ?>
  </div>
</section>
