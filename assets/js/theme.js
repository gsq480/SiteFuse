(function(){
  const btn = document.getElementById('navToggle');
  const nav = document.getElementById('primaryNav');
  if (!btn || !nav) return;
  btn.addEventListener('click', function(){
    const nowHidden = nav.classList.toggle('hidden');
    btn.setAttribute('aria-expanded', String(!nowHidden));
  });
})();