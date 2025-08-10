<?php get_header(); ?>
<section class="mx-auto max-w-3xl px-4 py-12">
  <h1 class="text-4xl font-extrabold">Contact</h1>
  <p class="mt-3">Email me and I will get back to you.</p>
  <form id="contact-form" data-mode="mailto" class="mt-8 grid gap-4">
    <label class="grid gap-2">
      <span class="text-sm">Name</span>
      <input type="text" name="name" required class="px-4 py-3 rounded-xl bg-white text-slate-900 border-4 border-slate-900">
    </label>
    <label class="grid gap-2">
      <span class="text-sm">Email</span>
      <input type="email" name="email" required class="px-4 py-3 rounded-xl bg-white text-slate-900 border-4 border-slate-900">
    </label>
    <label class="grid gap-2">
      <span class="text-sm">Message</span>
      <textarea name="message" rows="6" required class="px-4 py-3 rounded-xl bg-white text-slate-900 border-4 border-slate-900"></textarea>
    </label>
    <button type="submit" class="px-5 py-3 rounded-full bg-black text-white border-4 border-slate-900 w-max">Send</button>
  </form>
  <div class="mt-8 text-sm text-slate-400">
    <p>Based in Canberra ACT. Open to APS and vendor panel roles.</p>
  </div>
</section>
<?php get_footer(); ?>