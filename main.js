// ============================================================
//  main.js — Cruz De Los Santos Portfolio
// ============================================================

// --- Mobile Nav Toggle ---
(function () {
  const toggle = document.getElementById('navToggle');
  const menu   = document.getElementById('navMenu');
  if (!toggle || !menu) return;

  toggle.addEventListener('click', () => {
    const isOpen = menu.classList.toggle('open');
    toggle.textContent = isOpen ? '✕' : '☰';
    toggle.setAttribute('aria-expanded', isOpen);
  });

  menu.querySelectorAll('a').forEach(link => {
    link.addEventListener('click', () => {
      menu.classList.remove('open');
      toggle.textContent = '☰';
    });
  });
})();

// --- Scroll-triggered fade-in ---
(function () {
  const targets = document.querySelectorAll(
    '.box, .flowchart-card, .proposal-block, .page-intro'
  );
  if (!targets.length || !('IntersectionObserver' in window)) return;

  const obs = new IntersectionObserver(
    (entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.add('fade-up', 'visible');
          obs.unobserve(entry.target);
        }
      });
    },
    { threshold: 0.08 }
  );

  targets.forEach(el => obs.observe(el));
})();

// --- Navbar scroll shadow ---
(function () {
  const nav = document.querySelector('.navbar');
  if (!nav) return;
  window.addEventListener('scroll', () => {
    nav.style.boxShadow = window.scrollY > 10
      ? '0 4px 30px rgba(13,31,60,0.45)'
      : '0 2px 24px rgba(13,31,60,0.35)';
  });
})();


// // --- MPG Calculator ---
// (function () {
//   const btn    = document.getElementById('calcBtn');
//   const result = document.getElementById('calcResult');
//   const error  = document.getElementById('calcError');
//   const output = document.getElementById('mpgOutput');
//   if (!btn) return;

//   btn.addEventListener('click', function () {
//     const miles   = parseFloat(document.getElementById('milesTraveled').value);
//     const gallons = parseFloat(document.getElementById('gallonsUsed').value);

//     result.classList.remove('show');
//     error.classList.remove('show');

//     if (isNaN(miles) || isNaN(gallons) || miles <= 0 || gallons <= 0) {
//       error.textContent = 'Please enter valid numbers greater than 0 for both fields.';
//       error.classList.add('show');
//       return;
//     }

//     // Debugged formula: division, not addition
//     const mpg = miles / gallons;
//     output.textContent = mpg.toFixed(2);
//     result.classList.add('show');
//   });

//   // Allow Enter key to trigger calculation
//   document.querySelectorAll('.calc-field input').forEach(input => {
//     input.addEventListener('keydown', e => {
//       if (e.key === 'Enter') btn.click();
//     });
//   });
// })();



// --- MPG Calculator (Updated with jQuery) ---
(function () {

  // ORIGINAL VANILLA JS (commented out):
  // const btn    = document.getElementById('calcBtn');
  // const result = document.getElementById('calcResult');
  // const error  = document.getElementById('calcError');
  // const output = document.getElementById('mpgOutput');
  // if (!btn) return;

  const $btn    = $('#calcBtn');
  const $result = $('#calcResult');
  const $error  = $('#calcError');
  const $output = $('#mpgOutput');
  if (!$btn.length) return;

  $btn.on('click', function () {
    const miles   = parseFloat($('#milesTraveled').val());
    const gallons = parseFloat($('#gallonsUsed').val());

    $result.removeClass('show');
    $error.removeClass('show');

    if (isNaN(miles) || isNaN(gallons) || miles <= 0 || gallons <= 0) {
      $error.text('Please enter valid numbers greater than 0 for both fields.');
      $error.addClass('show');
      return;
    }

    const mpg = miles / gallons;
    $output.text(mpg.toFixed(2));
    $result.addClass('show');
  });

  $('.calc-field input').on('keydown', function(e) {
    if (e.key === 'Enter') $btn.trigger('click');
  });

})();

// --- Image Slider ---
(function () {
  const track  = document.getElementById('sliderTrack');
  const dots   = document.querySelectorAll('.dot');
  const thumbs = document.querySelectorAll('.thumb');
  const bar    = document.getElementById('progressBar');
  if (!track) return;

  const slides = track.querySelectorAll('.slide');
  let current  = 0;
  let timer;
  let barTimer;
  const DELAY  = 4000;

  function goTo(index) {
    if (index >= slides.length) index = 0;
    if (index < 0) index = slides.length - 1;
    current = index;
    track.style.transform = `translateX(-${current * 100}%)`;
    dots.forEach((d, i) => d.classList.toggle('active', i === current));
    thumbs.forEach((t, i) => t.classList.toggle('active', i === current));
    resetBar();
  }

  function nextSlide() { goTo(current + 1); }

  function startAuto() {
    clearInterval(timer);
    timer = setInterval(nextSlide, DELAY);
  }

  function resetBar() {
    if (!bar) return;
    bar.style.transition = 'none';
    bar.style.width = '0%';
    clearTimeout(barTimer);
    barTimer = setTimeout(() => {
      bar.style.transition = `width ${DELAY}ms linear`;
      bar.style.width = '100%';
    }, 30);
  }

  document.getElementById('btnNext')?.addEventListener('click', () => { goTo(current + 1); startAuto(); });
  document.getElementById('btnPrev')?.addEventListener('click', () => { goTo(current - 1); startAuto(); });

  for (let i = 0; i < dots.length; i++) {
    dots[i].addEventListener('click', () => { goTo(i); startAuto(); });
  }

  for (let i = 0; i < thumbs.length; i++) {
    thumbs[i].addEventListener('click', () => { goTo(i); startAuto(); });
  }

  const wrapper = document.querySelector('.slider-wrapper');
  wrapper?.addEventListener('mouseenter', () => clearInterval(timer));
  wrapper?.addEventListener('mouseleave', startAuto);

  goTo(0);
  startAuto();
})();

// --- Invoice Calculator ---
(function () {
  const table      = document.getElementById('invoiceItems');
  const addRowBtn  = document.getElementById('addInvoiceRow');
  const subtotalEl = document.getElementById('invSubtotal');
  const totalEl    = document.getElementById('invTotal');
  const taxInput   = document.getElementById('invTax');
  const otherInput = document.getElementById('invOther');
  if (!table) return;

  function calcTotals() {
    let subtotal = 0;
    const amountFields = table.querySelectorAll('.amount-field');
    for (let i = 0; i < amountFields.length; i++) {
      const val = parseFloat(amountFields[i].value);
      if (!isNaN(val)) subtotal += val;
    }
    const tax   = parseFloat(taxInput.value)   || 0;
    const other = parseFloat(otherInput.value) || 0;
    const total = subtotal + tax + other;
    subtotalEl.textContent = '$' + subtotal.toFixed(2);
    totalEl.textContent    = '$' + total.toFixed(2);
  }

  function addRow() {
    const tbody = table.querySelector('tbody');
    const tr = document.createElement('tr');
    tr.innerHTML = `
      <td><input type="text" placeholder="Item description..." /></td>
      <td><input type="number" class="amount-field" placeholder="0.00" step="0.01" min="0" /></td>`;
    tbody.appendChild(tr);
    tr.querySelector('.amount-field').addEventListener('input', calcTotals);
  }

  addRowBtn?.addEventListener('click', addRow);
  table.querySelectorAll('.amount-field').forEach(f => f.addEventListener('input', calcTotals));
  taxInput?.addEventListener('input', calcTotals);
  otherInput?.addEventListener('input', calcTotals);
  document.getElementById('invPrint')?.addEventListener('click', () => window.print());
  document.getElementById('invReset')?.addEventListener('click', () => {
    if (confirm('Clear all invoice data?')) {
      document.querySelectorAll('.invoice-field, .invoice-table input, .invoice-footer input, .invoice-meta input')
        .forEach(el => el.value = '');
      taxInput.value   = '';
      otherInput.value = '';
      calcTotals();
    }
  });

  calcTotals();
})();

// --- Web Form ---
(function () {
  const form      = document.getElementById('webForm');
  const submitBtn = document.getElementById('wfSubmitBtn');
  const successEl = document.getElementById('wfSuccess');
  const errorEl   = document.getElementById('wfError');
  if (!form) return;

  form.addEventListener('submit', async function (e) {
    e.preventDefault();
    successEl.classList.remove('show');
    errorEl.classList.remove('show');
    submitBtn.textContent = 'Sending...';
    submitBtn.disabled = true;

    const formData = new FormData(form);

    try {
      const response = await fetch('submit.php', { method: 'POST', body: formData });
      if (response.ok) {
        successEl.classList.add('show');
        form.reset();
      } else {
        errorEl.classList.add('show');
      }
    } catch (err) {
      errorEl.classList.add('show');
    }

    submitBtn.textContent = 'Submit →';
    submitBtn.disabled = false;
  });
})();

// --- Mortgage Calculator ---
function mortCalc(myform) {
  var price = document.Form1.Amount.value;
  var price = parseInt(price, 10);
  if (isNaN(price)) {
    alert("Please enter a number. Do not use a dollar sign or commas.");
  }
  var interest = document.Form1.Rate.value;
  var interest = parseFloat(interest);
  var numYears = document.Form1.Years.value;
  var numYears = parseInt(numYears, 10);
  document.Form1.Payment.value = monthly(price, interest, numYears);
  document.Form1.Payment.value = punctuation(document.Form1.Payment.value);
}

function monthly(price, interest, numYears) {
  var IntRate = interest / 1200;
  var Pmts = numYears * 12;
  var pay = price;
  return pay * (IntRate / (1 - (1 / Math.pow(1 + IntRate, Pmts))));
}

function punctuation(valuein) {
  var formatStr = "";
  var Odollars  = "";
  var decpos = valuein.indexOf(".");
  if (decpos == -1) decpos = valuein.length;
  var dollars  = valuein.substring(0, decpos);
  var Fdollars = dollars.length;
  if (Fdollars > 3) {
    while (Fdollars > 0) {
      Tdollars = dollars.substring(Fdollars - 3, Fdollars);
      if (Tdollars.length == 3) {
        Odollars  = "," + Tdollars + Odollars;
        Fdollars -= 3;
      } else {
        Odollars  = Tdollars + Odollars;
        Fdollars  = 0;
      }
    }
    if (Odollars.substring(0, 1) == ",")
      dollars = Odollars.substring(1, Odollars.length);
    else
      dollars = Odollars;
  }
  var cents = valuein.substring(decpos + 1, decpos + 3);
  if (cents == "") cents = "00";
  var formatStr = "$" + dollars + "." + cents;
  return formatStr;
}