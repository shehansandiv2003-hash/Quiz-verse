/* =========================================================
   Quiz-Verse — script.js
   Plain JavaScript only (no frameworks), split into small
   feature blocks. Each block checks the page has the right
   elements before running, so this one file works on every
   page (index, quiz, contact).
   ========================================================= */

document.addEventListener('DOMContentLoaded', function () {

  /* ---------------------------------------------------------
     FEATURE 1: Smooth scrolling
     Any link with class "js-scroll" pointing to an in-page
     #id scrolls smoothly instead of jumping.
  --------------------------------------------------------- */
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