@extends('layouts.app')

@section('title', 'Insights & Clinical Research Blogs | Trevanta International')
@section('description', 'Explore peer-reviewed perspectives, regulatory briefings, decentralized trial methodologies, and biostatistical breakthroughs from Trevanta International Medical Directors.')

@section('content')
  <!-- SUBPAGE HERO -->
  <section class="subpage-hero" style="background: linear-gradient(135deg, var(--jss-navy-dark) 0%, var(--jss-navy) 100%); color: #ffffff; padding: 4.5rem 0 3.5rem 0;">
    <div class="site-container">
      <span class="eyebrow-accent" style="background: rgba(242, 98, 36, 0.2); color: #ffa07a;">SCIENTIFIC INTELLIGENCE UNIT</span>
      <h1 style="color: #ffffff; font-size: 2.8rem; margin-top: 0.5rem; margin-bottom: 1rem;">Clinical Insights, Regulatory Briefs &amp; Whitepapers</h1>
      <p style="color: #cbd5e1; max-width: 760px; font-size: 1.1rem; line-height: 1.7;">
        Authoritative guidance from Trevanta International's medical monitors, biostatisticians, and regulatory specialists on accelerating drug approvals while upholding GCP integrity.
      </p>
      <nav class="breadcrumbs" aria-label="Breadcrumb" style="display: flex; gap: 0.5rem; margin-top: 1.5rem; font-size: 0.875rem; color: #94a3b8;">
        <a href="{{ route('home') }}" style="color: #cbd5e1;">Home</a>
        <span>/</span>
        <span class="current" style="color: var(--jss-orange);">Insights &amp; Blog</span>
      </nav>
    </div>
  </section>

  <!-- MAIN BLOG CONTENT -->
  <main class="blogs-section" style="padding-top: 4rem;">
    <div class="site-container">

      @if(isset($blogs) && count($blogs))
        <!-- FEATURED SPOTLIGHT ARTICLE -->
        @if(isset($featuredBlog) && $featuredBlog)
          <div style="background: #ffffff; border: 1px solid var(--border-light); border-radius: var(--radius-lg); overflow: hidden; box-shadow: var(--shadow-md); margin-bottom: 4rem; display: grid; grid-template-columns: 1.1fr 0.9fr; gap: 0;" class="featured-spotlight-card">
            <div style="padding: 3rem; display: flex; flex-direction: column; justify-content: center;">
              <div style="display: flex; gap: 0.75rem; align-items: center; margin-bottom: 1rem;">
                <span class="blog-card-badge" style="position: static;">{{ $featuredBlog->badge ?: 'FEATURED WHITEPAPER' }}</span>
                <span style="font-size: 0.8rem; color: var(--text-light);">
                  {{ $featuredBlog->published_at ? $featuredBlog->published_at->format('F d, Y') : 'Recent' }} • {{ $featuredBlog->read_time ?: '6 min read' }}
                </span>
              </div>
              <h2 style="font-size: 2rem; line-height: 1.3; margin-bottom: 1rem; color: var(--jss-navy);">
                <a href="{{ route('blog.show', $featuredBlog->slug) }}" style="color: inherit; text-decoration: none;">
                  {{ $featuredBlog->title }}
                </a>
              </h2>
              <p style="color: var(--text-body); font-size: 1rem; line-height: 1.7; margin-bottom: 2rem;">
                {{ $featuredBlog->summary }}
              </p>
              <div style="display: flex; align-items: center; justify-content: space-between; border-top: 1px solid var(--border-light); padding-top: 1.5rem; flex-wrap: wrap; gap: 1rem;">
                <div style="display: flex; align-items: center; gap: 0.75rem;">
                  <div class="blog-author-avatar">{{ $featuredBlog->author_avatar ?: 'AC' }}</div>
                  <div>
                    <div class="blog-author-name">{{ $featuredBlog->author_name }}</div>
                    <div class="blog-author-title">{{ $featuredBlog->author_title ?: 'Clinical Research Team' }}</div>
                  </div>
                </div>
                <div style="display: flex; gap: 0.75rem;">
                  <button class="btn btn-jss-orange" onclick="openArticleModal('{{ $featuredBlog->slug }}')">
                    Read Whitepaper &rarr;
                  </button>
                  <a href="{{ route('blog.show', $featuredBlog->slug) }}" class="btn btn-jss-outline">
                    View Full Page
                  </a>
                </div>
              </div>
            </div>
            <div style="background: linear-gradient(135deg, var(--jss-navy) 0%, var(--jss-navy-light) 100%); display: flex; align-items: center; justify-content: center; position: relative; min-height: 320px;">
              <div class="blog-media-pattern"></div>
              @if(!empty($featuredBlog->image))
                <img src="{{ asset($featuredBlog->image) }}" alt="{{ $featuredBlog->title }}" style="width: 100%; height: 100%; object-fit: cover; position: absolute; top:0; left:0; opacity: 0.4;">
              @endif
              <div style="text-align: center; color: #ffffff; padding: 2rem; z-index: 2;">
                <div style="width: 72px; height: 72px; border-radius: 50%; background: rgba(40, 169, 161, 0.2); border: 2px solid var(--jss-teal); display: flex; align-items: center; justify-content: center; margin: 0 auto 1rem;">
                  <svg width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/></svg>
                </div>
                <h4 style="color: #ffffff; font-size: 1.3rem; margin-bottom: 0.5rem;">{{ $featuredBlog->category }}</h4>
                <p style="color: #cbd5e1; font-size: 0.9rem; max-width: 320px; margin: 0 auto;">Full Sponsor Implementation Guide &amp; SOP Protocol Checklist</p>
              </div>
            </div>
          </div>
        @endif

        <!-- FILTER TABS BAR -->
        @if(isset($categories) && count($categories))
          <div class="blog-filter-bar">
            <button class="blog-filter-btn active" onclick="filterBlogs('all', this)">All Perspectives</button>
            @foreach($categories as $cat)
              <button class="blog-filter-btn" onclick="filterBlogs('{{ $cat }}', this)">{{ $cat }}</button>
            @endforeach
          </div>
        @endif

        <!-- BLOGS ARTICLES GRID -->
        <div class="blogs-grid">
          @foreach($blogs as $blog)
            <article class="blog-card" data-category="{{ $blog->category }}" onclick="openArticleModal('{{ $blog->slug }}')">
              <div class="blog-card-media">
                <div class="blog-media-pattern"></div>
                @if(!empty($blog->image))
                  <img src="{{ asset($blog->image) }}" alt="{{ $blog->title }}" style="width: 100%; height: 100%; object-fit: cover; position: absolute; top:0; left:0; opacity: 0.35;">
                @endif
                <span class="blog-card-badge">{{ $blog->badge ?: $blog->category }}</span>
                <span class="blog-read-time">
                  <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                  {{ $blog->read_time ?: '5 min read' }}
                </span>
                <div style="color: #ffffff; font-size: 3rem; opacity: 0.25;">
                  @if(stripos($blog->category, 'regulat') !== false)
                    <svg width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/></svg>
                  @elseif(stripos($blog->category, 'pharma') !== false || stripos($blog->category, 'safe') !== false)
                    <svg width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                  @elseif(stripos($blog->category, 'stat') !== false || stripos($blog->category, 'data') !== false)
                    <svg width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><line x1="18" y1="20" x2="18" y2="10"/><line x1="12" y1="20" x2="12" y2="4"/><line x1="6" y1="20" x2="6" y2="14"/></svg>
                  @else
                    <svg width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M10 2v7.31L4.12 20.27A1 1 0 0 0 5 22h14a1 1 0 0 0 .88-1.73L14 9.31V2"/></svg>
                  @endif
                </div>
              </div>
              <div class="blog-card-body">
                <span class="blog-meta-date">
                  {{ $blog->published_at ? $blog->published_at->format('F d, Y') : 'Recent' }}
                </span>
                <h3 class="blog-card-title">{{ $blog->title }}</h3>
                <p class="blog-card-excerpt">
                  {{ $blog->summary }}
                </p>
                <div class="blog-author-bar">
                  <div class="blog-author-info">
                    <div class="blog-author-avatar">{{ $blog->author_avatar ?: 'AC' }}</div>
                    <div>
                      <div class="blog-author-name">{{ $blog->author_name }}</div>
                      <div class="blog-author-title">{{ $blog->author_title ?: 'Clinical Research Team' }}</div>
                    </div>
                  </div>
                  <a href="{{ route('blog.show', $blog->slug) }}" class="blog-read-btn" onclick="event.stopPropagation();">
                    Read &rarr;
                  </a>
                </div>
              </div>
            </article>
          @endforeach
        </div>
      @else
        <!-- EMPTY STATE (NO DEMO BLOGS) -->
        <div style="background: #ffffff; border: 1px solid var(--border-light); border-radius: var(--radius-lg); padding: 4rem 2rem; text-align: center; max-width: 680px; margin: 2rem auto 4rem; box-shadow: var(--shadow-sm);">
          <div style="width: 64px; height: 64px; border-radius: 50%; background: var(--jss-orange-light); color: var(--jss-orange); display: flex; align-items: center; justify-content: center; margin: 0 auto 1.5rem;">
            <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/></svg>
          </div>
          <h3 style="color: var(--jss-navy); font-size: 1.5rem; margin-bottom: 0.75rem;">No Articles Published Yet</h3>
          <p style="color: var(--text-muted); font-size: 1rem; line-height: 1.6; margin-bottom: 2rem;">
            Our Medical Directors and Regulatory Specialists are preparing our next round of clinical insights and whitepapers. Please check back soon or contact our team directly.
          </p>
          <a href="{{ route('contact') }}" class="btn btn-jss-orange">
            Contact Us &rarr;
          </a>
        </div>
      @endif

      <!-- SPONSOR SCIENTIFIC BRIEFING SUBSCRIPTION -->
      <div style="background: linear-gradient(135deg, var(--jss-navy) 0%, var(--jss-navy-dark) 100%); border-radius: var(--radius-lg); padding: 3.5rem; color: #ffffff; margin-top: 5rem; text-align: center;">
        <span class="eyebrow-accent" style="background: rgba(242, 98, 36, 0.25); color: #ffa07a;">REGULATORY &amp; CLINICAL UPDATES</span>
        <h3 style="color: #ffffff; font-size: 2.2rem; margin-top: 0.75rem; margin-bottom: 1rem;">Receive Monthly Clinical Trial Intelligence</h3>
        <p style="color: #cbd5e1; max-width: 600px; margin: 0 auto 2rem; font-size: 1rem; line-height: 1.6;">
          Join over 4,500 biotech executives, clinical operations directors, and regulatory affairs professionals who rely on Trevanta International briefings.
        </p>
        <form onsubmit="event.preventDefault(); showJssToast('Subscription Confirmed', 'You have been registered for our Monthly Clinical Intelligence Briefings.'); this.reset();" style="max-width: 520px; margin: 0 auto; display: flex; gap: 0.75rem; flex-wrap: wrap; justify-content: center;">
          <input type="email" required placeholder="Enter corporate work email..." style="flex-grow: 1; padding: 0.85rem 1.25rem; border-radius: var(--radius-sm); border: 1px solid rgba(255,255,255,0.3); background: rgba(255,255,255,0.08); color: #ffffff; outline: none; font-size: 0.95rem;">
          <button type="submit" class="btn btn-jss-orange" style="padding: 0.85rem 1.75rem;">Subscribe &rarr;</button>
        </form>
      </div>

    </div>
  </main>

  <!-- DYNAMIC CLIENT JAVASCRIPT OBJECT FOR THE ARTICLE MODAL -->
  <script>
    window.blogArticlesDatabase = {
      @foreach($blogs as $b)
        @php
          $bDate = $b->published_at ? $b->published_at->format('F d, Y') : 'September 2026';
        @endphp
        "{!! addslashes($b->slug) !!}": {
          category: {!! json_encode($b->category) !!},
          readTime: {!! json_encode($b->read_time ?: '5 min read') !!},
          date: {!! json_encode($bDate) !!},
          author: {
            name: {!! json_encode($b->author_name) !!},
            title: {!! json_encode($b->author_title ?: 'Clinical Research Team') !!},
            avatar: {!! json_encode($b->author_avatar ?: 'AC') !!}
          },
          title: {!! json_encode($b->title) !!},
          summary: {!! json_encode($b->summary) !!},
          content: {!! json_encode($b->content) !!}
        }@if(!$loop->last),@endif
      @endforeach
    };
  </script>
@endsection
