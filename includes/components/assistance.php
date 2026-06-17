<?php
/** components/assistance.php — "Need assistance?" support/contact section. Expects $w. */
declare(strict_types=1);
$c = CONTACT;
?>
<section id="contact" class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-20 scroll-mt-20">
  <div class="rounded-3xl bg-white ring-1 ring-navy/10 shadow-sm overflow-hidden">
    <div class="grid lg:grid-cols-[0.9fr_1.1fr]">

      <!-- Intro -->
      <div class="bg-navy text-ivory p-8 sm:p-10 flex flex-col justify-center relative overflow-hidden">
        <div class="pointer-events-none absolute -bottom-16 -left-10 w-64 h-64 rounded-full bg-royal/30 blur-3xl" aria-hidden="true"></div>
        <div class="relative">
          <span class="inline-flex items-center gap-2 rounded-full bg-ivory/10 ring-1 ring-ivory/20 text-ivory/90 text-xs font-semibold px-3 py-1.5">
            <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"/><path d="M13.7 21a2 2 0 0 1-3.4 0"/></svg>
            We're here to help
          </span>
          <h2 class="mt-4 text-3xl sm:text-4xl font-extrabold">Need assistance?</h2>
          <p class="mt-3 text-ivory/75 leading-relaxed max-w-sm">
            Questions about registration, your joining link<?= $w['cme'] ? ', or CME credit' : '' ?>? The Meeting Minds team is happy to help you take part in the <?= htmlspecialchars($w['audience']) ?> session.
          </p>
        </div>
      </div>

      <!-- Contact methods -->
      <div class="p-8 sm:p-10">
        <div class="grid sm:grid-cols-2 gap-4">

          <!-- Email -->
          <a href="mailto:<?= htmlspecialchars($c['email']) ?>?subject=<?= rawurlencode('Hemophilia Awareness Webinar, Assistance') ?>"
             class="group flex items-start gap-4 rounded-2xl ring-1 ring-navy/10 p-5 hover:ring-royal hover:bg-ivory/50 transition-all">
            <span class="grid place-items-center w-11 h-11 rounded-xl bg-royal/10 text-royal shrink-0" aria-hidden="true">
              <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7"><rect x="3" y="5" width="18" height="14" rx="2"/><path d="m3 7 9 6 9-6"/></svg>
            </span>
            <div class="min-w-0">
              <p class="text-xs font-semibold uppercase tracking-wide text-charcoal/50">Email us</p>
              <p class="font-bold text-navy break-words group-hover:text-royal transition-colors"><?= htmlspecialchars($c['email']) ?></p>
              <p class="text-xs text-charcoal/60 mt-0.5">We reply within one business day</p>
            </div>
          </a>

          <!-- Phone -->
          <a href="tel:<?= htmlspecialchars(preg_replace('/\s+/', '', $c['phone'])) ?>"
             class="group flex items-start gap-4 rounded-2xl ring-1 ring-navy/10 p-5 hover:ring-royal hover:bg-ivory/50 transition-all">
            <span class="grid place-items-center w-11 h-11 rounded-xl bg-royal/10 text-royal shrink-0" aria-hidden="true">
              <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7"><path d="M4 4h4l2 5-2.5 1.5a11 11 0 0 0 5 5L18 18l2 5v-4a16 16 0 0 1-16-16Z"/></svg>
            </span>
            <div class="min-w-0">
              <p class="text-xs font-semibold uppercase tracking-wide text-charcoal/50">Call us</p>
              <p class="font-bold text-navy group-hover:text-royal transition-colors"><?= htmlspecialchars($c['phone_human']) ?></p>
              <p class="text-xs text-charcoal/60 mt-0.5"><?= htmlspecialchars($c['phone_hours']) ?></p>
            </div>
          </a>

          <!-- Subscribe / newsletter -->
          <a href="<?= htmlspecialchars($c['subscribe']) ?>" target="_blank" rel="noopener"
             class="group flex items-start gap-4 rounded-2xl ring-1 ring-navy/10 p-5 hover:ring-teal hover:bg-ivory/50 transition-all">
            <span class="grid place-items-center w-11 h-11 rounded-xl bg-teal/10 text-teal shrink-0" aria-hidden="true">
              <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7"><rect x="3" y="5" width="18" height="14" rx="2"/><path d="m3 7 9 6 9-6"/></svg>
            </span>
            <div class="min-w-0">
              <p class="text-xs font-semibold uppercase tracking-wide text-charcoal/50">Stay informed</p>
              <p class="font-bold text-navy group-hover:text-teal transition-colors">Subscribe to updates</p>
              <p class="text-xs text-charcoal/60 mt-0.5">News on this and future sessions</p>
            </div>
          </a>

          <!-- Technical / joining help -->
          <div class="flex items-start gap-4 rounded-2xl ring-1 ring-navy/10 p-5 bg-ivory/40">
            <span class="grid place-items-center w-11 h-11 rounded-xl bg-gold/15 text-gold-600 shrink-0" aria-hidden="true">
              <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7"><rect x="2.5" y="4.5" width="19" height="12" rx="2"/><path d="M8 20.5h8M12 16.5v4"/></svg>
            </span>
            <div class="min-w-0">
              <p class="text-xs font-semibold uppercase tracking-wide text-charcoal/50">Joining the webinar</p>
              <p class="font-bold text-navy">Link sent before the session</p>
              <p class="text-xs text-charcoal/60 mt-0.5">Registered attendees receive the BigMarker link by email.</p>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
</section>
