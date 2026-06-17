<?php
/** components/highlights.php — "What you'll learn". Expects $w. */
declare(strict_types=1);
?>
<section id="about" class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 scroll-mt-20">
  <div class="max-w-2xl">
    <p class="text-royal font-semibold uppercase tracking-wide text-sm">What you'll take away</p>
    <h2 class="mt-2 text-3xl sm:text-4xl font-extrabold text-navy text-balance">Built for <?= htmlspecialchars(strtolower($w['audience'])) ?>, grounded in today's care</h2>
    <p class="mt-4 text-lg text-charcoal/75 leading-relaxed">This session is part of an educational webinar series on the evolving landscape of hemophilia care, emerging treatments, patient management, and practical clinical considerations.</p>
  </div>

  <div class="mt-12 grid gap-5 sm:grid-cols-2 lg:grid-cols-4">
    <?php foreach ($w['highlights'] as $i => [$title, $body]): ?>
    <article class="group relative rounded-2xl bg-white ring-1 ring-navy/10 p-6 shadow-sm hover:shadow-md hover:-translate-y-0.5 transition-all duration-200">
      <span class="grid place-items-center w-11 h-11 rounded-xl bg-royal/10 text-royal font-bold text-lg" aria-hidden="true"><?= $i + 1 ?></span>
      <h3 class="mt-4 font-bold text-navy leading-snug"><?= htmlspecialchars($title) ?></h3>
      <p class="mt-2 text-sm text-charcoal/70 leading-relaxed"><?= htmlspecialchars($body) ?></p>
      <span class="absolute bottom-0 left-6 right-6 h-0.5 bg-gradient-to-r from-royal/0 via-teal/60 to-royal/0 opacity-0 group-hover:opacity-100 transition-opacity" aria-hidden="true"></span>
    </article>
    <?php endforeach; ?>
  </div>
</section>
