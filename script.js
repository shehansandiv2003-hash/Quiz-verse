/* =========================================================
   Quiz-Verse — script.js
   page index.
   ========================================================= */

document.addEventListener('DOMContentLoaded', function () {

  
  document.querySelectorAll('a.js-scroll').forEach(function (link) {
    link.addEventListener('click', function (e) {
      const targetId = link.getAttribute('href');
      const target = document.querySelector(targetId);
      if (target) {
        e.preventDefault();
        target.scrollIntoView({ behavior: 'smooth', block: 'start' });
      }
    });
  });

});