@extends('layouts.app')

@section('title', "Career's | " . setting('site_name', 'Trevanta International'))
@section('description', setting('careers_heading', 'Join a team committed to improving global health.') . ' - ' . setting('site_name', 'Trevanta International'))

@section('content')
  <!-- SUBPAGE HERO -->
  <section class="subpage-hero">
    <div class="site-container">
      <span class="eyebrow-jss">CAREERS</span>
      <h1>Careers</h1>
      <p>
        {{ setting('careers_heading', 'Join a team committed to improving global health.') }}
      </p>
      <nav class="breadcrumbs" aria-label="Breadcrumb">
        <a href="{{ route('home') }}">Home</a>
        <span>/</span>
        <span class="current">Career's</span>
      </nav>
    </div>
  </section>

  <main>
    <!-- APPLICATION SUCCESS BANNER -->
    @if(session('application_success'))
      <div class="site-container" style="margin-top: 2rem;">
        <div style="background: #ecfdf5; border: 1px solid #10b981; border-left: 5px solid #10b981; border-radius: 12px; padding: 1.25rem 1.75rem; display: flex; align-items: center; justify-content: space-between; box-shadow: 0 4px 12px rgba(16, 185, 129, 0.1);">
          <div style="display: flex; align-items: center; gap: 0.85rem;">
            <div style="font-size: 1.6rem; color: #10b981;"><i class="fas fa-check-circle"></i></div>
            <div>
              <strong style="display: block; color: #065f46; font-size: 1.05rem;">Application Submitted Successfully!</strong>
              <span style="color: #047857; font-size: 0.95rem;">{{ session('application_success') }}</span>
            </div>
          </div>
          <button type="button" onclick="this.parentElement.parentElement.remove()" style="background: none; border: none; font-size: 1.35rem; color: #065f46; cursor: pointer; padding: 0 0.5rem;" aria-label="Close notification">&times;</button>
        </div>
      </div>
    @endif

    <!-- SECTION 1: PEOPLE & CULTURE (Two-Column Layout with Motto) -->
    <section class="subpage-content">
      <div class="site-container">
        <div class="two-col-layout">
          <div>
            <span class="eyebrow-jss">PEOPLE &amp; CULTURE</span>
            <h2 style="font-size: 2.2rem; margin-bottom: 1.25rem;">
              {{ setting('careers_heading', 'Join a team committed to improving global health.') }}
            </h2>
            
            <p style="font-size: 1.05rem; line-height: 1.8; color: var(--text-body); margin-bottom: 1.5rem;">
              {{ setting('careers_description', 'At Trevanta International our people are at the heart of innovation. We foster a culture of collaboration, growth, and scientific excellence.') }}
            </p>

            <div class="slide-bullets">
              <span>&bull; Collaborative cross-functional teams across North America, Europe, and Asia</span>
              <span>&bull; Comprehensive continuing education, GCP certification, and leadership paths</span>
              <span>&bull; Direct involvement in pivotal Phase I–IV trials and life-saving therapies</span>
              <span>&bull; Flexible hybrid work arrangements and modern digital trial infrastructure</span>
            </div>
          </div>

          <div>
            <!-- PROJECT SIGNATURE MOTTO CALLOUT -->
            <div class="about-motto-callout">
              <span class="quote-mark">&ldquo;</span>
              <span class="s-phase-tag" style="display: block; margin-bottom: 0.5rem;">OUR COMMITMENT</span>
              <blockquote>
                Our world-class team of highly qualified and experienced workforce enables us to meet client expectations and deliver projects within the timeframe.
              </blockquote>
              <div class="quote-author">
                <strong>Executive Leadership Board</strong>
                <span>Trevanta International</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- SECTION 2: OPEN POSITIONS (Dynamic from Admin or Empty State) -->
    <section class="subpage-content alt-bg" id="openings">
      <div class="site-container">
        <div class="section-title-wrap text-center" style="margin-bottom: 2.5rem;">
          <span class="eyebrow-jss">CURRENT OPPORTUNITIES</span>
          <h2 class="main-title">Explore Open Roles</h2>
          <p class="subtitle-jss">
            Find the next milestone in your professional journey with our expanding global teams.
          </p>
        </div>

        @if(isset($jobs) && $jobs->count() > 0)
          <!-- 3-CARD BALANCED JOB GRID (Does not stretch 1 card across entire row) -->
          <div class="jobs-grid">
            @foreach($jobs as $job)
              <article class="job-card">
                <div class="job-card-header">
                  <div class="job-badges">
                    @if($job->department)
                      <span class="job-badge dept">{{ $job->department }}</span>
                    @endif
                    <span class="job-badge">{{ $job->job_type ?: 'Full-Time' }}</span>
                    @if($job->experience)
                      <span class="job-badge" style="background: rgba(13, 35, 58, 0.08); color: var(--navy);">{{ $job->experience }}</span>
                    @endif
                  </div>
                </div>
                <h3>{{ $job->title }}</h3>
                <p>
                  {{ $job->description }}
                </p>
                <div class="job-card-footer">
                  <span class="job-meta-item">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                    {{ $job->location ?: 'Global / Remote' }}
                  </span>
                  @if($job->apply_url)
                    <a href="{{ $job->apply_url }}" target="_blank" class="btn btn-jss-orange" style="font-size: 0.85rem; padding: 0.45rem 1rem;">
                      Apply Now &rarr;
                    </a>
                  @else
                    <button type="button" class="btn btn-jss-orange open-apply-modal-btn" data-job-id="{{ $job->id }}" data-job-title="{{ $job->title }}" style="font-size: 0.85rem; padding: 0.45rem 1.15rem; cursor: pointer; border: none;">
                      Apply Now &rarr;
                    </button>
                  @endif
                </div>
              </article>
            @endforeach
          </div>
        @else
          <!-- NO OPENINGS EMPTY STATE -->
          <div style="max-width: 620px; margin: 0 auto; background: #ffffff; border: 1px solid #e2e8f0; border-radius: 16px; padding: 3.5rem 2rem; text-align: center; box-shadow: 0 4px 16px rgba(0,0,0,0.04);">
            <div style="width: 64px; height: 64px; margin: 0 auto 1.25rem; border-radius: 50%; background: rgba(40, 169, 161, 0.1); color: var(--teal, #28a9a1); display: flex; align-items: center; justify-content: center; font-size: 1.6rem;">
              <i class="fas fa-briefcase"></i>
            </div>
            <h3 style="font-size: 1.35rem; font-weight: 700; color: var(--navy, #0d233a); margin-bottom: 0.65rem;">
              Currently There Is No Opening
            </h3>
            <p style="font-size: 1rem; color: #64748b; line-height: 1.7; margin-bottom: 1.75rem;">
              We do not have any active vacancies at the moment. However, we are always eager to connect with passionate clinical research professionals. Please send your resume to our global talent pool for future opportunities.
            </p>
            <button type="button" class="btn btn-jss-orange open-apply-modal-btn" data-job-id="" data-job-title="General Application / Talent Pool" style="padding: 0.75rem 1.75rem; font-size: 0.95rem; cursor: pointer; border: none;">
              <i class="fas fa-paper-plane" style="margin-right: 0.5rem;"></i> Send Your Resume &rarr;
            </button>
          </div>
        @endif
      </div>
    </section>

    <!-- SECTION 3: SPONTANEOUS APPLICATION / RESUME SUBMISSION -->
    <section style="background-color: var(--jss-navy-dark); color: #ffffff; padding: 4.5rem 0; text-align: center;">
      <div class="site-container">
        <span class="eyebrow-jss" style="color: #ff9a6b;">SPONTANEOUS APPLICATION</span>
        <h2 style="color: #ffffff; font-size: 2.2rem; margin-bottom: 1rem;">Connect With Our Talent Acquisition Team</h2>
        <p style="color: #cbd5e1; font-size: 1.05rem; max-width: 680px; margin: 0 auto 2rem;">
          We are always eager to connect with passionate clinical research associates, biostatisticians, medical writers, and project managers. Submit your resume to our global talent pool.
        </p>
        <div style="display: flex; justify-content: center; gap: 1rem; flex-wrap: wrap;">
          <button type="button" class="btn btn-jss-orange btn-lg open-apply-modal-btn" data-job-id="" data-job-title="Spontaneous Application / General Talent Pool" style="cursor: pointer; border: none;">
            <i class="fas fa-paper-plane" style="margin-right: 0.5rem;"></i> Submit Your Resume &rarr;
          </button>
        </div>
      </div>
    </section>
  </main>

  <!-- ========================================================================= -->
  <!-- JOB APPLICATION MODAL -->
  <!-- ========================================================================= -->
  <div id="applyModal" class="career-modal" style="display: none;">
    <div class="career-modal-backdrop" onclick="closeApplyModal()"></div>
    <div class="career-modal-dialog">
      <div class="career-modal-content">
        <div class="career-modal-header">
          <div>
            <span class="eyebrow-jss" style="font-size: 0.75rem; margin-bottom: 0.25rem;">CAREER APPLICATION</span>
            <h3 id="modalJobHeading" style="margin: 0; font-size: 1.35rem; color: var(--navy); font-weight: 700;">Submit Application</h3>
          </div>
          <button type="button" class="career-modal-close" onclick="closeApplyModal()" aria-label="Close dialog">&times;</button>
        </div>

        <form action="{{ route('careers.apply') }}" method="POST" enctype="multipart/form-data" id="jobApplicationForm">
          @csrf
          <input type="hidden" name="job_opening_id" id="modal_job_id" value="">
          <input type="hidden" name="position_title" id="modal_position_title" value="">

          <div class="career-modal-body">
            
            <div style="margin-bottom: 1.25rem;">
              <label style="display: block; font-size: 0.8rem; font-weight: 700; text-transform: uppercase; color: var(--navy); margin-bottom: 0.4rem; letter-spacing: 0.05em;">
                Applying For Position:
              </label>
              <div id="modalPositionBadge" style="display: inline-block; padding: 0.5rem 1.15rem; border-radius: 8px; background: #f0fdfa; color: #0d9488; font-weight: 700; font-size: 0.95rem; border: 1px solid #ccfbf1;">
                Clinical Research Position
              </div>
            </div>

            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 1rem; margin-bottom: 1.15rem;">
              <div>
                <label for="app_name" style="display: block; font-size: 0.8rem; font-weight: 700; text-transform: uppercase; color: var(--navy); margin-bottom: 0.4rem; letter-spacing: 0.05em;">
                  Full Name <span style="color: #ef4444;">*</span>
                </label>
                <input type="text" name="name" id="app_name" class="form-control-modal" placeholder="e.g. Dr. Jane Smith" required>
              </div>

              <div>
                <label for="app_email" style="display: block; font-size: 0.8rem; font-weight: 700; text-transform: uppercase; color: var(--navy); margin-bottom: 0.4rem; letter-spacing: 0.05em;">
                  Email Address <span style="color: #ef4444;">*</span>
                </label>
                <input type="email" name="email" id="app_email" class="form-control-modal" placeholder="jane.smith@example.com" required>
              </div>
            </div>

            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 1rem; margin-bottom: 1.15rem;">
              <div>
                <label for="app_phone" style="display: block; font-size: 0.8rem; font-weight: 700; text-transform: uppercase; color: var(--navy); margin-bottom: 0.4rem; letter-spacing: 0.05em;">
                  Phone Number
                </label>
                <input type="tel" name="phone" id="app_phone" class="form-control-modal" placeholder="+1 (555) 000-0000">
              </div>

              <div>
                <label for="app_location" style="display: block; font-size: 0.8rem; font-weight: 700; text-transform: uppercase; color: var(--navy); margin-bottom: 0.4rem; letter-spacing: 0.05em;">
                  Current Location / City
                </label>
                <input type="text" name="current_location" id="app_location" class="form-control-modal" placeholder="e.g. Montreal, QC or Mumbai, IN">
              </div>
            </div>

            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 1rem; margin-bottom: 1.15rem;">
              <div>
                <label for="app_experience" style="display: block; font-size: 0.8rem; font-weight: 700; text-transform: uppercase; color: var(--navy); margin-bottom: 0.4rem; letter-spacing: 0.05em;">
                  Relevant Experience
                </label>
                <input type="text" name="experience" id="app_experience" class="form-control-modal" placeholder="e.g. 4 Years in Phase II-III Trials">
              </div>

              <div>
                <label for="app_resume" style="display: block; font-size: 0.8rem; font-weight: 700; text-transform: uppercase; color: var(--navy); margin-bottom: 0.4rem; letter-spacing: 0.05em;">
                  Upload Resume / CV <span style="color: #ef4444;">*</span>
                </label>
                <input type="file" name="resume" id="app_resume" class="form-control-modal" accept=".pdf,.doc,.docx" required style="padding: 0.45rem;">
                <small style="font-size: 0.75rem; color: #64748b; display: block; margin-top: 0.25rem;">Supported formats: PDF, DOC, DOCX (Max 10MB)</small>
              </div>
            </div>

            <div style="margin-bottom: 0.5rem;">
              <label for="app_cover" style="display: block; font-size: 0.8rem; font-weight: 700; text-transform: uppercase; color: var(--navy); margin-bottom: 0.4rem; letter-spacing: 0.05em;">
                Cover Letter / Additional Note (Optional)
              </label>
              <textarea name="cover_letter" id="app_cover" rows="3" class="form-control-modal" placeholder="Briefly introduce your qualifications, key study experience, and career goals..."></textarea>
            </div>
          </div>

          <div class="career-modal-footer">
            <button type="button" class="btn btn-jss-outline" onclick="closeApplyModal()" style="padding: 0.65rem 1.5rem; font-size: 0.95rem;">Cancel</button>
            <button type="submit" id="btnSubmitApplication" class="btn btn-jss-orange" style="padding: 0.65rem 1.75rem; font-size: 0.95rem; font-weight: 700;">
              Submit Application &rarr;
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <script>
    function openApplyModal(jobId, jobTitle) {
      document.getElementById('modal_job_id').value = jobId || '';
      document.getElementById('modal_position_title').value = jobTitle || 'General Application / Talent Pool';
      document.getElementById('modalPositionBadge').textContent = jobTitle || 'General Application / Talent Pool';
      document.getElementById('modalJobHeading').textContent = 'Apply for ' + (jobTitle || 'Career Opportunity');
      document.getElementById('applyModal').style.display = 'flex';
      document.body.style.overflow = 'hidden';
    }

    function closeApplyModal() {
      document.getElementById('applyModal').style.display = 'none';
      document.body.style.overflow = '';
    }

    document.addEventListener('DOMContentLoaded', function() {
      document.querySelectorAll('.open-apply-modal-btn').forEach(function(btn) {
        btn.addEventListener('click', function() {
          var jobId = this.getAttribute('data-job-id') || '';
          var jobTitle = this.getAttribute('data-job-title') || 'General Application / Talent Pool';
          openApplyModal(jobId, jobTitle);
        });
      });

      document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') closeApplyModal();
      });

      var form = document.getElementById('jobApplicationForm');
      if (form) {
        form.addEventListener('submit', function() {
          var submitBtn = document.getElementById('btnSubmitApplication');
          if (submitBtn) {
            submitBtn.disabled = true;
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-1"></i> Submitting...';
          }
        });
      }
    });
  </script>
@endsection
