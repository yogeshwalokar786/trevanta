/**
 * Trevanta International - Global Clinical CRO JavaScript Engine
 * Fully responsive, zero dependencies, ES6+.
 */

document.addEventListener('DOMContentLoaded', () => {
  initStickyHeader();
  initAutoSlider();
  initFeasibilityCalculator();
  initKeyboardListeners();
  initMobileDrawerListeners();
});

function initMobileDrawerListeners() {
  document.querySelectorAll('#jss-nav .menu-link').forEach(link => {
    link.addEventListener('click', () => {
      closeNav();
    });
  });
}

/* ==========================================================================
   1. HERO 4-TAB SYSTEM CONTROLLER
   ========================================================================== */
let currentSlideIndex = 0;
let autoSlideInterval = null;

function switchSlide(slideKey, btnEl) {
  if (autoSlideInterval) {
    clearInterval(autoSlideInterval);
  }

  const tabs = document.querySelectorAll('.slider-tab');
  tabs.forEach(t => t.classList.remove('active'));
  if (btnEl) {
    btnEl.classList.add('active');
  } else {
    const matchingBtn = document.querySelector(`.slider-tab[data-slide="${slideKey}"]`);
    if (matchingBtn) matchingBtn.classList.add('active');
  }

  const panes = document.querySelectorAll('.slide-pane');
  panes.forEach(pane => {
    pane.style.display = 'none';
    pane.classList.remove('active');
  });

  const activePane = document.getElementById(`slide-${slideKey}`);
  if (activePane) {
    activePane.style.display = 'block';
    activePane.classList.add('active');
  }

  const tabsArr = Array.from(tabs);
  if (btnEl) {
    currentSlideIndex = tabsArr.indexOf(btnEl);
  }
}

function initAutoSlider() {
  const tabs = document.querySelectorAll('.slider-tab');
  if (!tabs.length) return;

  autoSlideInterval = setInterval(() => {
    const tabsArr = Array.from(document.querySelectorAll('.slider-tab'));
    if (!tabsArr.length) return;
    const activeTab = document.querySelector('.slider-tab.active');
    let idx = tabsArr.indexOf(activeTab);
    idx = (idx + 1) % tabsArr.length;
    const nextTab = tabsArr[idx];
    if (nextTab) {
      const nextKey = nextTab.getAttribute('data-slide');
      switchSlide(nextKey, nextTab);
    }
  }, 7500);
}

/* ==========================================================================
   2. STICKY HEADER & LEFT-TO-RIGHT MOBILE DRAWER
   ========================================================================== */
function initStickyHeader() {
  const header = document.getElementById('jss-header');
  if (header) {
    window.addEventListener('scroll', () => {
      if (window.scrollY > 30) {
        header.style.boxShadow = '0 4px 20px rgba(28, 45, 66, 0.12)';
        header.style.backgroundColor = 'rgba(255, 255, 255, 0.98)';
      } else {
        header.style.boxShadow = '0 2px 12px rgba(28, 45, 66, 0.06)';
      }
    });
  }

  // Close mobile drawer when clicking any navigation link
  document.querySelectorAll('.menu-link').forEach(link => {
    link.addEventListener('click', () => {
      closeNav();
    });
  });
}

function toggleNav() {
  const nav = document.getElementById('jss-nav');
  const backdrop = document.getElementById('nav-backdrop');
  if (!nav) return;

  const isOpen = nav.classList.contains('open');
  if (isOpen) {
    closeNav();
  } else {
    nav.classList.add('open');
    if (backdrop) backdrop.classList.add('open');
    document.body.style.overflow = 'hidden';
  }
}

function closeNav() {
  const nav = document.getElementById('jss-nav');
  const backdrop = document.getElementById('nav-backdrop');
  if (nav) nav.classList.remove('open');
  if (backdrop) backdrop.classList.remove('open');
  document.body.style.overflow = '';
}

function toggleMobileDropdown(el) {
  const parent = el.closest('.mobile-has-dropdown');
  if (parent) parent.classList.toggle('open');
}

function switchAboutTab(tabKey, btnEl) {
  const buttons = document.querySelectorAll('.about-tab-btn');
  buttons.forEach(b => b.classList.remove('active'));
  if (btnEl) btnEl.classList.add('active');

  const panes = document.querySelectorAll('.about-tab-pane');
  panes.forEach(p => {
    p.classList.remove('active');
    if (p.id === `about-pane-${tabKey}`) {
      p.classList.add('active');
    }
  });
}

function initKeyboardListeners() {
  window.addEventListener('keydown', (e) => {
    if (e.key === 'Escape') {
      closeNav();
      closeRfpModal();
      closeArticleModal();
    }
  });
}

/* ==========================================================================
   3. CLINICAL TRIAL PHASE NAVIGATOR
   ========================================================================== */
function switchPhase(phaseKey, btnEl) {
  const buttons = document.querySelectorAll('.phase-tab-btn');
  buttons.forEach(b => b.classList.remove('active'));
  if (btnEl) btnEl.classList.add('active');

  const panels = document.querySelectorAll('.phase-pane-card');
  panels.forEach(p => {
    p.classList.remove('active');
    if (p.id === `phase-pane-${phaseKey}`) {
      p.classList.add('active');
    }
  });
}

/* ==========================================================================
   4. STUDY FEASIBILITY & TIMELINE ESTIMATOR
   ========================================================================== */
function initFeasibilityCalculator() {
  const phaseSelect = document.getElementById('calc-phase');
  const taSelect = document.getElementById('calc-ta');
  const patientInput = document.getElementById('calc-patients');

  if (phaseSelect && taSelect && patientInput) {
    [phaseSelect, taSelect, patientInput].forEach(el => {
      el.addEventListener('change', calculateFeasibility);
      el.addEventListener('input', calculateFeasibility);
    });
    calculateFeasibility();
  }
}

function calculateFeasibility() {
  const phase = document.getElementById('calc-phase')?.value || 'Phase II';
  const ta = document.getElementById('calc-ta')?.value || 'Oncology';
  const patients = parseInt(document.getElementById('calc-patients')?.value) || 150;

  let startupWeeks = 12;
  let sitesEst = 15;
  let dataLockWeeks = 4;
  let confidence = 98;

  if (phase.includes('Phase I')) {
    startupWeeks = 8;
    sitesEst = Math.max(3, Math.ceil(patients / 15));
    dataLockWeeks = 3;
    confidence = 99.2;
  } else if (phase.includes('Phase II')) {
    startupWeeks = 12;
    sitesEst = Math.max(8, Math.ceil(patients / 12));
    dataLockWeeks = 4;
    confidence = 98.4;
  } else if (phase.includes('Phase III')) {
    startupWeeks = 16;
    sitesEst = Math.max(25, Math.ceil(patients / 18));
    dataLockWeeks = 5;
    confidence = 97.6;
  } else if (phase.includes('Phase IV')) {
    startupWeeks = 10;
    sitesEst = Math.max(20, Math.ceil(patients / 30));
    dataLockWeeks = 4;
    confidence = 99.0;
  }

  // TA modifiers
  if (ta === 'Rare Disease') {
    startupWeeks += 3;
    sitesEst = Math.ceil(sitesEst * 1.3);
  } else if (ta === 'Oncology') {
    sitesEst = Math.ceil(sitesEst * 1.15);
  }

  const outStartup = document.getElementById('est-startup');
  const outSites = document.getElementById('est-sites');
  const outDatalock = document.getElementById('est-datalock');
  const outConfidence = document.getElementById('est-confidence');

  if (outStartup) outStartup.textContent = `${startupWeeks} - ${startupWeeks + 2} Weeks`;
  if (outSites) outSites.textContent = `${sitesEst} - ${Math.ceil(sitesEst * 1.25)} Sites (Multi-Region)`;
  if (outDatalock) outDatalock.textContent = `${dataLockWeeks} Weeks Post LPO`;
  if (outConfidence) outConfidence.textContent = `${confidence.toFixed(1)}%`;
}

/* ==========================================================================
   5. BLOGS & CLINICAL INSIGHTS ARTICLES
   ========================================================================== */
const blogArticlesDatabase = {
  'oncology-dct': {
    category: 'Clinical Strategy',
    readTime: '6 min read',
    date: 'September 15, 2026',
    author: {
      name: 'Dr. Sarah Jenkins, MD',
      title: 'VP of Global Clinical Operations',
      avatar: 'SJ'
    },
    title: 'Accelerating Oncology Trials Through Decentralized Architecture & Home Nursing',
    summary: 'How combining centralized site monitoring with localized home nursing and mobile health technologies increased patient retention by 34% in complex oncology protocols.',
    content: `
      <p>Traditional oncology clinical trials have historically suffered from high screening failure rates and acute patient retention challenges. In Phase II and III solid tumor trials, the burden of bi-weekly hospital visits for pharmacokinetic (PK) blood draws and toxicity monitoring frequently leads to protocol non-adherence.</p>
      
      <p>At Trevanta International, our decentralized clinical trial (DCT) framework merges traditional brick-and-mortar investigator oversight with vetted regional home nursing networks across North America, Europe, and Asia-Pacific.</p>
      
      <div class="article-takeaway-box">
        <h4>Key Study Findings & Outcomes</h4>
        <ul>
          <li><strong>34% Increase in Patient Retention:</strong> Reducing travel burdens allowed fragile cancer patients to complete long-term biomarker assessment periods.</li>
          <li><strong>42% Faster Recruitment:</strong> Broadening the geographic radius around central academic trial centers unlocked previously unreachable suburban and rural patient cohorts.</li>
          <li><strong>100% GCP Audit Compliance:</strong> Validated ePRO and temperature-monitored investigational product (IP) direct-to-patient shipment preserved data integrity under 21 CFR Part 11.</li>
        </ul>
      </div>

      <p>By leveraging connected mobile health devices and synchronized electronic source data (eSource), principal investigators retain real-time visibility into patient adverse events while dramatically expediting safety committee decision points.</p>
    `
  },
  'regulatory-e6r3': {
    category: 'Regulatory Affairs',
    readTime: '7 min read',
    date: 'September 08, 2026',
    author: {
      name: 'Michael Chen, MS, RAC',
      title: 'Senior Director of Regulatory Affairs & Quality',
      avatar: 'MC'
    },
    title: 'Navigating ICH E6(R3) Modernization: Risk-Based Quality Management in Global Submissions',
    summary: 'A critical analysis of the finalized ICH E6(R3) guidelines and practical guidance on implementing governance frameworks that satisfy both FDA and EMA inspectors.',
    content: `
      <p>The transition to ICH E6(R3) represents the most comprehensive modernization of Good Clinical Practice (GCP) principles in a decade. With its core emphasis on "fit-for-purpose" trial designs, decentralized trial components, and computerized system validation, sponsors must rethink legacy operational SOPs.</p>

      <p>Trevanta International's regulatory affairs task force has reviewed over 40 global clinical trial applications (CTAs) under the updated framework, establishing standardized Risk-Based Quality Management (RBQM) playbooks that harmonize expectations across both the FDA and the European Medicines Agency (EMA).</p>

      <div class="article-takeaway-box">
        <h4>ICH E6(R3) Strategic Checkpoints</h4>
        <ul>
          <li><strong>Critical to Quality (CtQ) Factors:</strong> Identify essential protocol variables that directly impact human subject protection and reliable data interpretation.</li>
          <li><strong>Computerized System Validation:</strong> Ensure decentralized apps, wearable sensors, and electronic consent (eConsent) systems maintain unbroken audit trails.</li>
          <li><strong>Proportionate Monitoring:</strong> Shift routine 100% Source Data Verification (SDV) to centralized statistical data monitoring to spot outliers early.</li>
        </ul>
      </div>

      <p>Adopting this proactive regulatory posture safeguards investigational new drug (IND) dossiers from clinical holds and accelerates market authorization timelines.</p>
    `
  },
  'pv-signal-ai': {
    category: 'Pharmacovigilance',
    readTime: '5 min read',
    date: 'August 29, 2026',
    author: {
      name: 'Dr. Elena Rostova, MD, PhD',
      title: 'Global Head of Pharmacovigilance & Safety',
      avatar: 'ER'
    },
    title: 'Machine Learning Signal Detection in High-Volume Post-Marketing Pharmacovigilance',
    summary: 'How Trevanta International implemented automated natural language processing (NLP) to reduce ICSR intake triage time by 62% while elevating adverse event detection accuracy.',
    content: `
      <p>Pharmacovigilance departments worldwide face exponential increases in individual case safety reports (ICSRs) driven by social listening, literature searches, and spontaneous reporting portals. Meeting stringent 7-day and 15-day regulatory submission deadlines requires robust, validated intelligence tools.</p>

      <p>Trevanta International's pharmacovigilance safety hub processes over 120,000 safety events annually. By integrating validated machine learning classifiers into our safety database ingestion pipeline, our medical monitors focus their expertise where clinical judgment matters most.</p>

      <div class="article-takeaway-box">
        <h4>Operational Benchmarks Achieved</h4>
        <ul>
          <li><strong>62% Reduction in Triage Latency:</strong> MedDRA coding recommendations and duplicate screening execute automatically in under 4 seconds per narrative.</li>
          <li><strong>99.8% Regulatory On-Time Submission:</strong> Sustained compliance across FDA FAERS, EMA EudraVigilance, and MHRA safety portals.</li>
          <li><strong>Rapid Disproportionality Signal Detection:</strong> Proactive identification of subtle drug-drug interaction clusters before routine periodic safety reports (PBRER).</li>
        </ul>
      </div>

      <p>The result is a robust, audit-proof pharmacovigilance infrastructure that protects patients while eliminating compliance risk for biotech sponsors.</p>
    `
  },
  'adaptive-biostat': {
    category: 'Biostatistics',
    readTime: '8 min read',
    date: 'August 14, 2026',
    author: {
      name: 'Dr. Robert Vance, PhD',
      title: 'Chief Biostatistician & Data Sciences Lead',
      avatar: 'RV'
    },
    title: 'Adaptive Clinical Trial Designs: Optimizing Sample Size Re-Estimation & Interim Analyses',
    summary: 'Examining Bayesian adaptive algorithms that permit sample size recalculation and early futility stopping without inflating Type I error rates.',
    content: `
      <p>Fixed-sample clinical trials frequently lock sponsors into conservative, over-powered patient recruitment targets or expose programs to premature termination. Adaptive trial designs offer an evidence-based alternative by allowing pre-planned modifications to study parameters based on accumulating interim trial data.</p>

      <p>Our biostatistics and statistical programming teams specialize in group sequential designs, seamless Phase II/III transitions, and response-adaptive randomization schedules that preserve statistical rigor and regulatory defensibility.</p>

      <div class="article-takeaway-box">
        <h4>Benefits of Adaptive Protocol Architecture</h4>
        <ul>
          <li><strong>Sample Size Optimization:</strong> Recalculate enrollment requirements at interim milestones to prevent underpowered Phase IIb efficacy signals.</li>
          <li><strong>Futility Stopping Rules:</strong> Terminate ineffective dose arms early, preserving capital and redirecting patients to promising therapeutic candidates.</li>
          <li><strong>Strict Type I Error Control:</strong> Comprehensive simulation studies and alpha-spending functions ensure complete compliance with FDA Adaptive Design Guidance.</li>
        </ul>
      </div>

      <p>Biotech sponsors partnering with Trevanta International benefit from end-to-end CDISC SDTM/ADaM programming and independent Data Safety Monitoring Board (DSMB) charter governance.</p>
    `
  }
};

function filterBlogs(category, btnEl) {
  const buttons = document.querySelectorAll('.blog-filter-btn');
  buttons.forEach(b => b.classList.remove('active'));
  if (btnEl) btnEl.classList.add('active');

  const cards = document.querySelectorAll('.blog-card');
  cards.forEach(card => {
    const cardCat = card.getAttribute('data-category');
    if (category === 'all' || cardCat === category) {
      card.style.display = 'flex';
    } else {
      card.style.display = 'none';
    }
  });
}

function openArticleModal(articleId) {
  const db = window.blogArticlesDatabase || (typeof blogArticlesDatabase !== 'undefined' ? blogArticlesDatabase : {});
  const data = db[articleId];
  if (!data) return;

  const modal = document.getElementById('article-modal');
  if (!modal) return;

  document.getElementById('modal-art-badge').textContent = data.category;
  document.getElementById('modal-art-date').textContent = `${data.date} • ${data.readTime}`;
  document.getElementById('modal-art-title').textContent = data.title;
  document.getElementById('modal-art-author-name').textContent = data.author.name;
  document.getElementById('modal-art-author-title').textContent = data.author.title;
  document.getElementById('modal-art-avatar').textContent = data.author.avatar;
  document.getElementById('modal-art-body').innerHTML = data.content;

  modal.classList.add('open');
  document.body.style.overflow = 'hidden';
}

function closeArticleModal() {
  const modal = document.getElementById('article-modal');
  if (modal) {
    modal.classList.remove('open');
    document.body.style.overflow = '';
  }
}

/* ==========================================================================
   6. FAQ ACCORDION CONTROLLER
   ========================================================================== */
function toggleFaq(btnEl) {
  const item = btnEl.closest('.faq-item');
  if (!item) return;

  const isActive = item.classList.contains('active');
  document.querySelectorAll('.faq-item').forEach(el => el.classList.remove('active'));

  if (!isActive) {
    item.classList.add('active');
  }
}

/* ==========================================================================
   7. RFP MODAL & FORMS (TREVANTA INTERNATIONAL)
   ========================================================================== */
function openRfpModal() {
  const modal = document.getElementById('rfp-modal');
  if (modal) {
    modal.classList.add('open');
    modal.setAttribute('aria-hidden', 'false');
    document.body.style.overflow = 'hidden';
  }
}

function closeRfpModal() {
  const modal = document.getElementById('rfp-modal');
  if (modal) {
    modal.classList.remove('open');
    modal.setAttribute('aria-hidden', 'true');
    document.body.style.overflow = '';
  }
}

window.addEventListener('click', (e) => {
  const rfpModal = document.getElementById('rfp-modal');
  if (e.target === rfpModal) {
    closeRfpModal();
  }
  const artModal = document.getElementById('article-modal');
  if (e.target === artModal) {
    closeArticleModal();
  }
  const backdrop = document.getElementById('nav-backdrop');
  if (e.target === backdrop) {
    closeNav();
  }
});

function handleJssSubmit(e) {
  e.preventDefault();
  const btn = document.getElementById('j-submit-btn');
  const oldText = btn ? btn.textContent : 'Transmit Study RFP';
  if (btn) {
    btn.disabled = true;
    btn.textContent = 'Transmitting Protocol Synopsis...';
  }

  setTimeout(() => {
    if (btn) {
      btn.disabled = false;
      btn.textContent = oldText;
    }
    showJssToast('Clinical Feasibility Proposal Received', 'Our medical monitoring committee has received your study parameters under mutual confidentiality NDA.');
    const form = document.getElementById('jss-contact-form');
    if (form) form.reset();
  }, 1000);
}

function handleModalSubmit(e) {
  e.preventDefault();
  closeRfpModal();
  showJssToast('RFP Submitted Successfully', 'Our Medical Directors will review your protocol criteria and provide feasibility metrics within 24 business hours.');
}

function showJssToast(title, msg) {
  const toast = document.getElementById('jss-toast');
  if (!toast) return;

  const titleEl = document.getElementById('toast-title');
  const msgEl = document.getElementById('toast-msg');
  if (titleEl) titleEl.textContent = title;
  if (msgEl) msgEl.textContent = msg;

  toast.classList.add('show');
  setTimeout(() => {
    toast.classList.remove('show');
  }, 5000);
}

function switchTherapeuticTab(tabKey, btn) {
  const allBtns = document.querySelectorAll('.te-tab-btn');
  allBtns.forEach(b => b.classList.remove('active'));

  if (btn) {
    btn.classList.add('active');
  } else {
    const matchingBtn = document.querySelector(`.te-tab-btn[data-tab="${tabKey}"]`);
    if (matchingBtn) matchingBtn.classList.add('active');
  }

  const allPanes = document.querySelectorAll('.te-tab-pane');
  allPanes.forEach(p => {
    p.style.display = 'none';
  });

  const targetPane = document.getElementById('te-pane-' + tabKey);
  if (targetPane) {
    targetPane.style.display = 'block';
  }
}
