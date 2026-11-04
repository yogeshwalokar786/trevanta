@extends('layouts.app')

@section('title', 'Global Presence & Regional Hubs | Trevanta International')
@section('description', "Discover Trevanta International's global operational hubs across North America, Europe, Latin America, and APAC with local regulatory expertise in 28 countries.")

@section('content')
  <!-- SUBPAGE HERO -->
  <section class="subpage-hero">
    <div class="site-container">
      <span class="eyebrow-jss">INTERNATIONAL FOOTPRINT</span>
      <h1>Global Reach with Uncompromised Regional Agility</h1>
      <p>
        Operating across 28 countries, our regional operating units combine deep local regulatory relationships, rapid investigator recruitment, and harmonized global ICH-GCP standard operating procedures.
      </p>
      <nav class="breadcrumbs" aria-label="Breadcrumb">
        <a href="{{ route('home') }}">Home</a>
        <span>/</span>
        <span class="current">Global Presence</span>
      </nav>
    </div>
  </section>

  <main>
    <!-- GLOBAL STATS BANNER -->
    <section style="background-color: var(--jss-navy); color: #ffffff; padding: 2.5rem 0; border-bottom: 1px solid rgba(255,255,255,0.1);">
      <div class="site-container">
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 2rem; text-align: center;">
          <div>
            <div style="font-size: 2.5rem; font-weight: 800; color: var(--jss-orange);">28</div>
            <div style="font-size: 0.9rem; color: #cbd5e1; text-transform: uppercase; font-weight: 600; letter-spacing: 0.5px;">Countries Served</div>
          </div>
          <div>
            <div style="font-size: 2.5rem; font-weight: 800; color: #ffffff;">8,500+</div>
            <div style="font-size: 0.9rem; color: #cbd5e1; text-transform: uppercase; font-weight: 600; letter-spacing: 0.5px;">Active Site Network</div>
          </div>
          <div>
            <div style="font-size: 2.5rem; font-weight: 800; color: var(--jss-orange);">500K+</div>
            <div style="font-size: 0.9rem; color: #cbd5e1; text-transform: uppercase; font-weight: 600; letter-spacing: 0.5px;">Patients Recruited</div>
          </div>
          <div>
            <div style="font-size: 2.5rem; font-weight: 800; color: #ffffff;">6</div>
            <div style="font-size: 0.9rem; color: #cbd5e1; text-transform: uppercase; font-weight: 600; letter-spacing: 0.5px;">Primary Corporate Hubs</div>
          </div>
        </div>
      </div>
    </section>

    <!-- REGIONAL OFFICES DIRECTORY -->
    <section class="subpage-content">
      <div class="site-container">
        <div class="text-center" style="max-width: 760px; margin: 0 auto 2.5rem;">
          <span class="eyebrow-jss">REGIONAL HUBS &amp; OPERATIONS</span>
          <h2>Strategically Situated Across Key Regulatory Jurisdictions</h2>
          <p>
            Whether executing IND submissions in the United States, CTA filings under EU CTR 536/2014, or high-volume patient recruitment across Latin America and APAC, our hubs provide native-speaking teams and direct institutional access.
          </p>
        </div>

        <!-- REAL PHOTO BANNER -->
        <div class="photo-banner-card" style="margin: 0 auto 3rem; max-width: 100%;">
          <img src="{{ asset('images/clinical-team.jpg') }}" alt="Global Clinical Monitoring Network" class="photo-banner-img" style="height: 320px;">
          <div class="photo-badge-overlay">
            <h4>Harmonized Multi-Country Trial Monitoring</h4>
            <p>Unified SOPs, real-time risk-based monitoring (RBM), and bilingual clinical monitors operating across all 28 regulatory zones.</p>
          </div>
        </div>

        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(340px, 1fr)); gap: 2rem;">
          
          <!-- OFFICE 1: MONTREAL HQ -->
          <div style="background: #ffffff; border: 1px solid var(--border-light); border-radius: var(--radius-md); padding: 2rem; box-shadow: var(--shadow-sm); border-top: 4px solid var(--jss-orange);">
            <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 1rem;">
              <div>
                <span style="font-size: 0.75rem; font-weight: 700; color: var(--jss-orange); text-transform: uppercase; letter-spacing: 0.5px;">Global Headquarters</span>
                <h3 style="margin-top: 0.25rem; font-size: 1.4rem;">Montreal, Canada</h3>
              </div>
              <span class="reg-pill orange" style="font-size: 1rem; padding: 0.35rem 0.75rem;">CA HQ</span>
            </div>
            <p style="font-size: 0.95rem; margin-bottom: 1.25rem; color: var(--text-muted);">
              4492 Sainte-Catherine St W, Suite 400<br>
              Westmount, QC H3Z 1R7, Canada
            </p>
            <div style="font-size: 0.85rem; background: var(--bg-page); padding: 1rem; border-radius: var(--radius-sm); margin-bottom: 1.25rem;">
              <p style="margin: 0 0 0.4rem;"><strong>Direct Phone:</strong> +1 (514) 934-0805</p>
              <p style="margin: 0 0 0.4rem;"><strong>Key Strengths:</strong> Phase I–IV Clinical Operations, Biostatistics, Epidemiology</p>
              <p style="margin: 0;"><strong>Primary Agency:</strong> Health Canada (TPD / BGTD)</p>
            </div>
            <button class="btn btn-jss-outline" style="width: 100%;" onclick="openRfpModal()">Inquire with Montreal Team &rarr;</button>
          </div>

          <!-- OFFICE 2: BOSTON & CALIFORNIA -->
          <div style="background: #ffffff; border: 1px solid var(--border-light); border-radius: var(--radius-md); padding: 2rem; box-shadow: var(--shadow-sm); border-top: 4px solid var(--jss-navy);">
            <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 1rem;">
              <div>
                <span style="font-size: 0.75rem; font-weight: 700; color: var(--jss-navy); text-transform: uppercase; letter-spacing: 0.5px;">North America Commercial Hub</span>
                <h3 style="margin-top: 0.25rem; font-size: 1.4rem;">Boston &amp; San Diego, USA</h3>
              </div>
              <span class="reg-pill orange" style="font-size: 1rem; padding: 0.35rem 0.75rem;">USA</span>
            </div>
            <p style="font-size: 0.95rem; margin-bottom: 1.25rem; color: var(--text-muted);">
              Cambridge Innovation Hub &amp; Torrey Pines BioPark<br>
              Boston, MA &amp; San Diego, CA, USA
            </p>
            <div style="font-size: 0.85rem; background: var(--bg-page); padding: 1rem; border-radius: var(--radius-sm); margin-bottom: 1.25rem;">
              <p style="margin: 0 0 0.4rem;"><strong>Direct Phone:</strong> +1 (617) 849-9319</p>
              <p style="margin: 0 0 0.4rem;"><strong>Key Strengths:</strong> US FDA Pre-IND Meetings, Biotech Clinical Programs</p>
              <p style="margin: 0;"><strong>Primary Agency:</strong> US FDA (CDER / CBER / CDRH)</p>
            </div>
            <button class="btn btn-jss-outline" style="width: 100%;" onclick="openRfpModal()">Inquire with US Team &rarr;</button>
          </div>

          <!-- OFFICE 3: LONDON UK -->
          <div style="background: #ffffff; border: 1px solid var(--border-light); border-radius: var(--radius-md); padding: 2rem; box-shadow: var(--shadow-sm); border-top: 4px solid var(--jss-orange);">
            <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 1rem;">
              <div>
                <span style="font-size: 0.75rem; font-weight: 700; color: var(--jss-orange); text-transform: uppercase; letter-spacing: 0.5px;">UK &amp; Northern Europe Hub</span>
                <h3 style="margin-top: 0.25rem; font-size: 1.4rem;">London, United Kingdom</h3>
              </div>
              <span class="reg-pill orange" style="font-size: 1rem; padding: 0.35rem 0.75rem;">UK</span>
            </div>
            <p style="font-size: 0.95rem; margin-bottom: 1.25rem; color: var(--text-muted);">
              25 Bank Street, Canary Wharf<br>
              London E14 5JP, United Kingdom
            </p>
            <div style="font-size: 0.85rem; background: var(--bg-page); padding: 1rem; border-radius: var(--radius-sm); margin-bottom: 1.25rem;">
              <p style="margin: 0 0 0.4rem;"><strong>Direct Phone:</strong> +44 20 7946 0912</p>
              <p style="margin: 0 0 0.4rem;"><strong>Key Strengths:</strong> MHRA Submissions, NHS Hospital Site Management</p>
              <p style="margin: 0;"><strong>Primary Agency:</strong> MHRA &amp; HRA</p>
            </div>
            <button class="btn btn-jss-outline" style="width: 100%;" onclick="openRfpModal()">Inquire with UK Team &rarr;</button>
          </div>

          <!-- OFFICE 4: WARSAW EU -->
          <div style="background: #ffffff; border: 1px solid var(--border-light); border-radius: var(--radius-md); padding: 2rem; box-shadow: var(--shadow-sm); border-top: 4px solid var(--jss-navy);">
            <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 1rem;">
              <div>
                <span style="font-size: 0.75rem; font-weight: 700; color: var(--jss-navy); text-transform: uppercase; letter-spacing: 0.5px;">Central &amp; Eastern Europe Hub</span>
                <h3 style="margin-top: 0.25rem; font-size: 1.4rem;">Warsaw, Poland</h3>
              </div>
              <span class="reg-pill orange" style="font-size: 1rem; padding: 0.35rem 0.75rem;">EU</span>
            </div>
            <p style="font-size: 0.95rem; margin-bottom: 1.25rem; color: var(--text-muted);">
              Al. Jerozolimskie 142B, Blue City<br>
              02-305 Warsaw, Poland
            </p>
            <div style="font-size: 0.85rem; background: var(--bg-page); padding: 1rem; border-radius: var(--radius-sm); margin-bottom: 1.25rem;">
              <p style="margin: 0 0 0.4rem;"><strong>Direct Phone:</strong> +48 22 584 7200</p>
              <p style="margin: 0 0 0.4rem;"><strong>Key Strengths:</strong> Fast Patient Enrollment, EU CTIS Submissions</p>
              <p style="margin: 0;"><strong>Primary Agency:</strong> EMA / URPL</p>
            </div>
            <button class="btn btn-jss-outline" style="width: 100%;" onclick="openRfpModal()">Inquire with EU Team &rarr;</button>
          </div>

          <!-- OFFICE 5: MUMBAI & FARIDABAD -->
          <div style="background: #ffffff; border: 1px solid var(--border-light); border-radius: var(--radius-md); padding: 2rem; box-shadow: var(--shadow-sm); border-top: 4px solid var(--jss-orange);">
            <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 1rem;">
              <div>
                <span style="font-size: 0.75rem; font-weight: 700; color: var(--jss-orange); text-transform: uppercase; letter-spacing: 0.5px;">APAC Pharmacovigilance &amp; Data Hub</span>
                <h3 style="margin-top: 0.25rem; font-size: 1.4rem;">Mumbai &amp; Faridabad, India</h3>
              </div>
              <span class="reg-pill orange" style="font-size: 1rem; padding: 0.35rem 0.75rem;">APAC</span>
            </div>
            <p style="font-size: 0.95rem; margin-bottom: 1.25rem; color: var(--text-muted);">
              Trevanta International Center of Excellence, Corporate Zone<br>
              Navi Mumbai &amp; Faridabad, India
            </p>
            <div style="font-size: 0.85rem; background: var(--bg-page); padding: 1rem; border-radius: var(--radius-sm); margin-bottom: 1.25rem;">
              <p style="margin: 0 0 0.4rem;"><strong>Direct Phone:</strong> +91 7738804988</p>
              <p style="margin: 0 0 0.4rem;"><strong>Key Strengths:</strong> End-to-End Safety/PV, Medical Writing, CDISC Data Mgmt</p>
              <p style="margin: 0;"><strong>Primary Agency:</strong> CDSCO / US FDA Global</p>
            </div>
            <button class="btn btn-jss-outline" style="width: 100%;" onclick="openRfpModal()">Inquire with India Team &rarr;</button>
          </div>

          <!-- OFFICE 6: BOGOTA LATAM -->
          <div style="background: #ffffff; border: 1px solid var(--border-light); border-radius: var(--radius-md); padding: 2rem; box-shadow: var(--shadow-sm); border-top: 4px solid var(--jss-navy);">
            <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 1rem;">
              <div>
                <span style="font-size: 0.75rem; font-weight: 700; color: var(--jss-navy); text-transform: uppercase; letter-spacing: 0.5px;">Latin America Operational Center</span>
                <h3 style="margin-top: 0.25rem; font-size: 1.4rem;">Bogotá, Colombia</h3>
              </div>
              <span class="reg-pill orange" style="font-size: 1rem; padding: 0.35rem 0.75rem;">LATAM</span>
            </div>
            <p style="font-size: 0.95rem; margin-bottom: 1.25rem; color: var(--text-muted);">
              Carrera 7 #116-50, Torre Cencosud<br>
              Bogotá, Colombia
            </p>
            <div style="font-size: 0.85rem; background: var(--bg-page); padding: 1rem; border-radius: var(--radius-sm); margin-bottom: 1.25rem;">
              <p style="margin: 0 0 0.4rem;"><strong>Direct Phone:</strong> +57 1 744 3820</p>
              <p style="margin: 0 0 0.4rem;"><strong>Key Strengths:</strong> LATAM Multi-Country Monitoring, High Retention Rates</p>
              <p style="margin: 0;"><strong>Primary Agency:</strong> INVIMA / ANVISA</p>
            </div>
            <button class="btn btn-jss-outline" style="width: 100%;" onclick="openRfpModal()">Inquire with LATAM Team &rarr;</button>
          </div>

        </div>
      </div>
    </section>

    <!-- REGULATORY TIMELINES TABLE -->
    <section class="subpage-content alt-bg">
      <div class="site-container">
        <div class="text-center" style="max-width: 760px; margin: 0 auto 3rem;">
          <span class="eyebrow-jss">REGULATORY BENCHMARKS</span>
          <h2>Average Trial Startup &amp; Ethics Approval Timelines</h2>
          <p>We leverage local institutional relationships to dramatically compress regulatory lead times.</p>
        </div>

        <div style="background: #ffffff; border-radius: var(--radius-md); box-shadow: var(--shadow-sm); overflow-x: auto; border: 1px solid var(--border-light);">
          <table style="width: 100%; border-collapse: collapse; text-align: left; font-size: 0.95rem;">
            <thead>
              <tr style="background-color: var(--jss-navy); color: #ffffff;">
                <th style="padding: 1.2rem 1.5rem; font-weight: 700;">Region / Country</th>
                <th style="padding: 1.2rem 1.5rem; font-weight: 700;">Regulatory Authority</th>
                <th style="padding: 1.2rem 1.5rem; font-weight: 700;">Ethics (IRB/EC) Review</th>
                <th style="padding: 1.2rem 1.5rem; font-weight: 700;">Startup to First Patient</th>
                <th style="padding: 1.2rem 1.5rem; font-weight: 700;">Local Trevanta International Hub Support</th>
              </tr>
            </thead>
            <tbody>
              <tr style="border-bottom: 1px solid var(--border-light);">
                <td style="padding: 1.2rem 1.5rem; font-weight: 700;">Canada</td>
                <td style="padding: 1.2rem 1.5rem;">Health Canada (TPD)</td>
                <td style="padding: 1.2rem 1.5rem;">30 Days (CTA Default)</td>
                <td style="padding: 1.2rem 1.5rem; color: var(--jss-orange); font-weight: 700;">8–10 Weeks</td>
                <td style="padding: 1.2rem 1.5rem;">Montreal HQ Direct</td>
              </tr>
              <tr style="border-bottom: 1px solid var(--border-light); background: #fbfcfe;">
                <td style="padding: 1.2rem 1.5rem; font-weight: 700;">United States</td>
                <td style="padding: 1.2rem 1.5rem;">US FDA (IND)</td>
                <td style="padding: 1.2rem 1.5rem;">Central IRB: 1–2 Weeks</td>
                <td style="padding: 1.2rem 1.5rem; color: var(--jss-orange); font-weight: 700;">6–8 Weeks</td>
                <td style="padding: 1.2rem 1.5rem;">Boston / San Diego Hub</td>
              </tr>
              <tr style="border-bottom: 1px solid var(--border-light);">
                <td style="padding: 1.2rem 1.5rem; font-weight: 700;">European Union (Poland)</td>
                <td style="padding: 1.2rem 1.5rem;">EU CTIS / URPL</td>
                <td style="padding: 1.2rem 1.5rem;">Harmonized CTIS (Part I &amp; II)</td>
                <td style="padding: 1.2rem 1.5rem; color: var(--jss-orange); font-weight: 700;">10–12 Weeks</td>
                <td style="padding: 1.2rem 1.5rem;">Warsaw EU Center</td>
              </tr>
              <tr style="border-bottom: 1px solid var(--border-light); background: #fbfcfe;">
                <td style="padding: 1.2rem 1.5rem; font-weight: 700;">India</td>
                <td style="padding: 1.2rem 1.5rem;">CDSCO (SUGAM)</td>
                <td style="padding: 1.2rem 1.5rem;">Parallel Institutional EC</td>
                <td style="padding: 1.2rem 1.5rem; color: var(--jss-orange); font-weight: 700;">10–14 Weeks</td>
                <td style="padding: 1.2rem 1.5rem;">Trevanta International Mumbai &amp; Faridabad</td>
              </tr>
              <tr>
                <td style="padding: 1.2rem 1.5rem; font-weight: 700;">Colombia &amp; LATAM</td>
                <td style="padding: 1.2rem 1.5rem;">INVIMA / CEC</td>
                <td style="padding: 1.2rem 1.5rem;">Independent Ethics: 4–6 Wks</td>
                <td style="padding: 1.2rem 1.5rem; color: var(--jss-orange); font-weight: 700;">12–14 Weeks</td>
                <td style="padding: 1.2rem 1.5rem;">Bogotá LATAM Team</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </section>

    <!-- CALL TO ACTION BANNER -->
    <section class="cta-banner">
      <div class="site-container">
        <div class="cta-inner-jss">
          <h2>Planning a Multi-Country Clinical Trial?</h2>
          <p>Connect with our International Study Planning Directorate for country feasibility reports and patient enrollment projections.</p>
          <div style="margin-top: 1.5rem;">
            <button class="btn btn-jss-orange btn-lg" onclick="openRfpModal()">
              Request Multi-Country Feasibility &rarr;
            </button>
          </div>
        </div>
      </div>
    </section>
  </main>
@endsection

