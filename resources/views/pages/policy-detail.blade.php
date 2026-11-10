@extends('layouts.app')

@section('title', ($policy->meta_title ?: $policy->title) . ' | ' . setting('site_name', 'Trevanta International'))
@section('description', $policy->meta_description ?: ($policy->summary ?: 'Official corporate policy, clinical compliance framework, and legal disclosure for Trevanta International.'))

@section('content')
  <!-- SUBPAGE HERO -->
  <section class="subpage-hero">
    <div class="site-container">
      <span class="eyebrow-jss">LEGAL &amp; COMPLIANCE</span>
      <h1>{{ $policy->title }}</h1>
      @if($policy->effective_date)
        <p style="font-size: 0.95rem; opacity: 0.9; margin-top: 0.5rem;">
          <strong>Effective / Last Revised:</strong> {{ $policy->effective_date }}
        </p>
      @endif
      <nav class="breadcrumbs" aria-label="Breadcrumb">
        <a href="{{ route('home') }}">Home</a>
        <span>/</span>
        <span>Policies</span>
        <span>/</span>
        <span class="current">{{ $policy->title }}</span>
      </nav>
    </div>
  </section>

  <main style="padding: 4.5rem 0; background: #ffffff;">
    <div class="site-container">
      <div style="display: grid; grid-template-columns: 1fr 340px; gap: 3.5rem; align-items: start;">
        
        <!-- MAIN POLICY CONTENT -->
        <article class="policy-article-content" style="min-width: 0;">
          
          @if($policy->summary)
            <div style="background: var(--bg-subtle, #f8fafc); border-left: 4px solid var(--jss-orange, #f26224); padding: 1.5rem 1.75rem; border-radius: 0 var(--radius-sm, 6px) var(--radius-sm, 6px) 0; margin-bottom: 2.5rem;">
              <span style="font-size: 0.75rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.08em; color: var(--jss-orange, #f26224); display: block; margin-bottom: 0.5rem;">
                Policy Overview
              </span>
              <p style="font-size: 1.05rem; line-height: 1.7; color: var(--jss-navy, #1e293b); margin: 0; font-weight: 500;">
                {{ $policy->summary }}
              </p>
            </div>
          @endif

          <!-- POLICY RICH CONTENT BODY -->
          <div class="rich-policy-body" style="font-size: 1rem; line-height: 1.85; color: var(--text-body, #334155);">
            {!! $policy->content !!}
          </div>

          <hr style="margin: 3.5rem 0 2rem; border: 0; border-top: 1px solid var(--border-light, #e2e8f0);">

          <!-- POLICY FOOTER META & ACTIONS -->
          <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 1rem; font-size: 0.875rem; color: var(--text-muted, #64748b);">
            <div>
              <span>Official Document: <strong>{{ $policy->title }}</strong></span>
              @if($policy->updated_at)
                &bull; <span>Verified {{ $policy->updated_at->format('F Y') }}</span>
              @endif
            </div>
            <div>
              <button onclick="window.print()" class="btn btn-jss-outline" style="font-size: 0.85rem; padding: 0.45rem 1rem; display: inline-flex; align-items: center; gap: 0.5rem;">
                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 9V2h12v7M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"/><rect x="6" y="14" width="12" height="8"/></svg>
                Print / Save PDF
              </button>
            </div>
          </div>

        </article>

        <!-- SIDEBAR NAVIGATION -->
        <aside style="display: flex; flex-direction: column; gap: 2rem;">
          
          <!-- OTHER POLICIES CARD -->
          <div style="background: #ffffff; border: 1px solid var(--border-light, #e2e8f0); border-radius: var(--radius-md, 8px); padding: 1.75rem; box-shadow: var(--shadow-sm, 0 1px 3px rgba(0,0,0,0.05));">
            <h4 style="font-size: 1.05rem; color: var(--jss-navy, #1e293b); margin-top: 0; margin-bottom: 1.25rem; font-weight: 700; display: flex; align-items: center; gap: 0.5rem;">
              <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="var(--jss-orange, #f26224)" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/></svg>
              Compliance Policies
            </h4>
            
            <nav style="display: flex; flex-direction: column; gap: 0.4rem;">
              @foreach($allPolicies as $p)
                <a href="{{ route('policy.show', $p->slug) }}" 
                   style="display: block; padding: 0.65rem 0.85rem; border-radius: var(--radius-sm, 6px); font-size: 0.9rem; text-decoration: none; font-weight: {{ $p->id === $policy->id ? '700' : '500' }}; background: {{ $p->id === $policy->id ? 'rgba(242, 98, 36, 0.08)' : 'transparent' }}; color: {{ $p->id === $policy->id ? 'var(--jss-orange, #f26224)' : 'var(--text-body, #334155)' }}; transition: all 0.15s ease;">
                  {{ $p->title }}
                  @if($p->id === $policy->id)
                    <span style="float: right;">&rarr;</span>
                  @endif
                </a>
              @endforeach
            </nav>
          </div>

          <!-- COMPLIANCE & PRIVACY OFFICER CARD -->
          <div style="background: var(--bg-subtle, #f8fafc); border: 1px solid var(--border-light, #e2e8f0); border-radius: var(--radius-md, 8px); padding: 1.75rem;">
            <h4 style="font-size: 1.05rem; color: var(--jss-navy, #1e293b); margin-top: 0; margin-bottom: 0.75rem; font-weight: 700;">
              Data Protection &amp; Compliance
            </h4>
            <p style="font-size: 0.875rem; color: var(--text-muted, #64748b); line-height: 1.6; margin-bottom: 1.25rem;">
              For regulatory audit inquiries, subject rights requests, or GCP documentation:
            </p>
            <div style="font-size: 0.875rem; display: flex; flex-direction: column; gap: 0.5rem;">
              <div>
                <strong style="color: var(--jss-navy, #1e293b);">Email:</strong><br>
                <a href="mailto:{{ setting('contact_email', 'info@trevanta.com') }}" style="color: var(--jss-orange, #f26224); text-decoration: none;">
                  {{ setting('contact_email', 'info@trevanta.com') }}
                </a>
              </div>
              <div>
                <strong style="color: var(--jss-navy, #1e293b);">Headquarters:</strong><br>
                <span style="color: var(--text-muted, #64748b);">{{ setting('address_hq', '4492 Sainte-Catherine St W, Westmount, QC H3Z 1R7, Canada') }}</span>
              </div>
            </div>
            <a href="{{ route('contact') }}" class="btn btn-jss-orange" style="margin-top: 1.25rem; width: 100%; justify-content: center; font-size: 0.875rem; text-decoration: none;">
              Contact Compliance &rarr;
            </a>
          </div>

        </aside>

      </div>
    </div>
  </main>
@endsection
