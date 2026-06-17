<?php
/** components/home_about.php — about / why-this-series section (home only). */
declare(strict_types=1);

$themes = [
    ['Evolving landscape of care', 'How the goals of hemophilia care are shifting, from treating bleeds to preventing them.',
     '<path d="M3 12a9 9 0 1 0 18 0 9 9 0 0 0-18 0Z"/><path d="M3 12h4l2 5 4-10 2 5h4"/>'],
    ['Emerging treatments', 'A clear look at new approaches, including non-factor therapies, across all types of hemophilia.',
     '<path d="M8.5 3h7M10 3v5.5L5.5 17a3 3 0 0 0 2.7 4.3h7.6A3 3 0 0 0 18.5 17L14 8.5V3"/><path d="M7 14h10"/>'],
    ['Patient management', 'Practical, day-to-day management, adherence, lifestyle, counseling and shared decisions.',
     '<path d="M16 11.5a4 4 0 1 0-8 0M4 20.5a8 8 0 0 1 16 0"/>'],
    ['Clinical considerations', 'Real-world clinical detail: emergencies, perioperative care and case-based learning.',
     '<rect x="4" y="3" width="16" height="18" rx="2"/><path d="M9 8h6M12 5v6M8.5 15.5h7"/>'],
];
?>
<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
  <div class="grid lg:grid-cols-[0.9fr_1.1fr] gap-12 items-start">

    <!-- Left: intro -->
    <div>
      <p class="text-royal font-semibold uppercase tracking-wide text-sm">About the series</p>
      <h2 class="mt-2 text-3xl sm:text-4xl font-extrabold text-navy text-balance">Raising awareness across the hemophilia care community</h2>
      <p class="mt-4 text-lg text-charcoal/75 leading-relaxed">
        The Hemophilia Awareness Series brings patients, nurses and physicians together around the evolving landscape of hemophilia care, emerging treatment approaches, patient management, and practical clinical considerations.
      </p>

      <!-- Trust line -->
      <div class="mt-8 flex flex-wrap gap-2.5">
        <span class="inline-flex items-center gap-1.5 rounded-full bg-navy text-ivory text-xs font-semibold px-3 py-1.5">Endorsed by ESH &amp; EOHNS</span>
        <span class="inline-flex items-center gap-1.5 rounded-full bg-teal/15 text-teal ring-1 ring-teal/30 text-xs font-semibold px-3 py-1.5">
          <svg class="w-3.5 h-3.5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"><path fill-rule="evenodd" d="M16.7 5.3a1 1 0 0 1 0 1.4l-7.5 7.5a1 1 0 0 1-1.4 0l-3.5-3.5a1 1 0 1 1 1.4-1.4l2.8 2.8 6.8-6.8a1 1 0 0 1 1.4 0Z" clip-rule="evenodd"/></svg>
          CME Accredited
        </span>
        <span class="inline-flex items-center gap-1.5 rounded-full bg-gold/15 text-gold-600 ring-1 ring-gold/40 text-xs font-semibold px-3 py-1.5">Supported by Sanofi</span>
      </div>

      <a href="#sessions" class="mt-8 inline-flex items-center gap-2 rounded-full bg-royal text-white font-bold px-7 py-3.5 shadow-md hover:bg-navy transition-colors min-h-[44px]">
        Choose your session
        <svg class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"><path fill-rule="evenodd" d="M3 10a.75.75 0 0 1 .75-.75h8.69L9.22 6.03a.75.75 0 1 1 1.06-1.06l4.5 4.5a.75.75 0 0 1 0 1.06l-4.5 4.5a.75.75 0 1 1-1.06-1.06l3.22-3.22H3.75A.75.75 0 0 1 3 10Z" clip-rule="evenodd"/></svg>
      </a>
    </div>

    <!-- Right: theme grid -->
    <div class="grid sm:grid-cols-2 gap-5">
      <?php foreach ($themes as [$title, $body, $icon]): ?>
      <article class="rounded-2xl bg-white ring-1 ring-navy/10 p-6 shadow-sm hover:shadow-md hover:-translate-y-0.5 transition-all duration-200">
        <span class="grid place-items-center w-11 h-11 rounded-xl bg-royal/10 text-royal" aria-hidden="true">
          <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><?= $icon ?></svg>
        </span>
        <h3 class="mt-4 font-bold text-navy leading-snug"><?= htmlspecialchars($title) ?></h3>
        <p class="mt-2 text-sm text-charcoal/70 leading-relaxed"><?= htmlspecialchars($body) ?></p>
      </article>
      <?php endforeach; ?>
    </div>
  </div>
</section>
