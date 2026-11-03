@extends('layouts.app')

@section('title', ($blog->meta_title ?: $blog->title) . ' | Trevanta International')
@section('description', $blog->meta_description ?: Str::limit(strip_tags($blog->summary), 155))

@push('seo')
  {{-- Canonical URL --}}
  <link rel="canonical" href="{{ !empty($blog->canonical_url) ? $blog->canonical_url : route('blog.show', $blog->slug) }}">

  {{-- Robots Directive --}}
  <meta name="robots" content="{{ $blog->meta_robots ?: 'index, follow' }}">

  {{-- Focus Keywords --}}
  @if(!empty($blog->meta_keywords))
    <meta name="keywords" content="{{ $blog->meta_keywords }}">
  @endif

  {{-- Open Graph / Facebook --}}
  <meta property="og:type" content="article">
  <meta property="og:site_name" content="{{ setting('site_name', 'Trevanta International') }}">
  <meta property="og:title" content="{{ $blog->og_title ?: ($blog->meta_title ?: $blog->title) }}">
  <meta property="og:description" content="{{ $blog->og_description ?: ($blog->meta_description ?: Str::limit(strip_tags($blog->summary), 155)) }}">
  <meta property="og:url" content="{{ route('blog.show', $blog->slug) }}">
  @php
    $ogImg = $blog->og_image ?: $blog->image;
    $ogImgUrl = $ogImg ? asset($ogImg) : asset('images/logo.png');
  @endphp
  <meta property="og:image" content="{{ $ogImgUrl }}">
  <meta property="article:published_time" content="{{ $blog->published_at ? $blog->published_at->toIso8601String() : $blog->created_at->toIso8601String() }}">
  <meta property="article:modified_time" content="{{ $blog->updated_at->toIso8601String() }}">
  <meta property="article:section" content="{{ $blog->category }}">
  <meta property="article:author" content="{{ $blog->author_name }}">

  {{-- Twitter Cards --}}
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="{{ $blog->og_title ?: ($blog->meta_title ?: $blog->title) }}">
  <meta name="twitter:description" content="{{ $blog->og_description ?: ($blog->meta_description ?: Str::limit(strip_tags($blog->summary), 155)) }}">
  <meta name="twitter:image" content="{{ $ogImgUrl }}">

  {{-- Structured Data (Schema.org JSON-LD) --}}
  <script type="application/ld+json">
  {!! json_encode([
    '@context' => 'https://schema.org',
    '@type' => $blog->schema_type ?: 'BlogPosting',
    'headline' => $blog->meta_title ?: $blog->title,
    'description' => $blog->meta_description ?: Str::limit(strip_tags($blog->summary), 155),
    'image' => [$ogImgUrl],
    'datePublished' => $blog->published_at ? $blog->published_at->toIso8601String() : $blog->created_at->toIso8601String(),
    'dateModified' => $blog->updated_at->toIso8601String(),
    'author' => [
      '@type' => 'Person',
      'name' => $blog->author_name,
      'jobTitle' => $blog->author_title ?: 'Clinical Research Team',
    ],
    'publisher' => [
      '@type' => 'Organization',
      'name' => setting('site_name', 'Trevanta International'),
      'logo' => [
        '@type' => 'ImageObject',
        'url' => asset(setting('site_logo', 'images/logo.png')),
      ],
    ],
    'mainEntityOfPage' => [
      '@type' => 'WebPage',
      '@id' => route('blog.show', $blog->slug),
    ],
  ], JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}
  </script>
@endpush

@section('content')
  <!-- ARTICLE HERO -->
  <section class="subpage-hero" style="background: linear-gradient(135deg, var(--jss-navy-dark) 0%, var(--jss-navy) 100%); color: #ffffff; padding: 4.5rem 0 3.5rem 0;">
    <div class="site-container">
      <div style="display: flex; gap: 0.75rem; align-items: center; margin-bottom: 1rem; flex-wrap: wrap;">
        <span class="blog-card-badge" style="position: static;">{{ $blog->badge ?: $blog->category }}</span>
        <span style="font-size: 0.85rem; color: #94a3b8;">
          {{ $blog->published_at ? $blog->published_at->format('F d, Y') : 'Recent' }} • {{ $blog->read_time ?: '5 min read' }}
        </span>
      </div>
      <h1 style="color: #ffffff; font-size: 2.6rem; line-height: 1.25; margin-bottom: 1.5rem; max-width: 950px;">
        {{ $blog->title }}
      </h1>
      <p style="color: #cbd5e1; font-size: 1.15rem; line-height: 1.7; max-width: 820px; margin-bottom: 2rem;">
        {{ $blog->summary }}
      </p>

      <div style="display: flex; align-items: center; gap: 1rem;">
        <div class="blog-author-avatar" style="width: 48px; height: 48px; font-size: 1.1rem;">
          {{ $blog->author_avatar ?: 'AC' }}
        </div>
        <div>
          <div style="font-weight: 700; color: #ffffff; font-size: 1rem;">{{ $blog->author_name }}</div>
          <div style="color: #94a3b8; font-size: 0.85rem;">{{ $blog->author_title ?: 'Clinical Research Team' }}</div>
        </div>
      </div>

      <nav class="breadcrumbs" aria-label="Breadcrumb" style="display: flex; gap: 0.5rem; margin-top: 2rem; font-size: 0.875rem; color: #94a3b8;">
        <a href="{{ route('home') }}" style="color: #cbd5e1;">Home</a>
        <span>/</span>
        <a href="{{ route('blog') }}" style="color: #cbd5e1;">Insights &amp; Blog</a>
        <span>/</span>
        <span class="current" style="color: var(--jss-orange);">{{ Str::limit($blog->title, 40) }}</span>
      </nav>
    </div>
  </section>

  <!-- ARTICLE CONTENT & SIDEBAR -->
  <main style="padding: 4.5rem 0; background: #ffffff;">
    <div class="site-container">
      <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 4rem; align-items: start;" class="article-layout-grid">
        
        <!-- ARTICLE MAIN BODY -->
        <article class="article-rich-content" style="font-size: 1.05rem; line-height: 1.85; color: var(--text-body);">
          @if(!empty($blog->image))
            <div style="border-radius: var(--radius-md); overflow: hidden; margin-bottom: 2.5rem; box-shadow: var(--shadow-md);">
              <img src="{{ asset($blog->image) }}" alt="{{ $blog->title }}" style="width: 100%; height: auto; display: block;">
            </div>
          @endif

          <div class="article-content-wrapper">
            {!! $blog->content !!}
          </div>

          <hr style="margin: 3.5rem 0; border: 0; border-top: 1px solid var(--border-light);">

          <!-- ARTICLE FOOTER ACTIONS -->
          <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 1rem;">
            <a href="{{ route('blog') }}" class="btn btn-jss-outline">&larr; Back to All Insights</a>
            <button class="btn btn-jss-orange" onclick="openRfpModal()">Request Feasibility Study &rarr;</button>
          </div>
        </article>

        <!-- ARTICLE SIDEBAR -->
        <aside style="display: flex; flex-direction: column; gap: 2rem;">
          
          <!-- AUTHOR CARD -->
          <div style="background: var(--bg-subtle); border: 1px solid var(--border-light); border-radius: var(--radius-md); padding: 2rem;">
            <h4 style="color: var(--jss-navy); font-size: 1.1rem; margin-top: 0; margin-bottom: 1.25rem;">About the Author</h4>
            <div style="display: flex; align-items: center; gap: 1rem; margin-bottom: 1rem;">
              <div class="blog-author-avatar" style="width: 48px; height: 48px; font-size: 1.1rem;">
                {{ $blog->author_avatar ?: 'AC' }}
              </div>
              <div>
                <strong style="color: var(--jss-navy); display: block;">{{ $blog->author_name }}</strong>
                <span style="color: var(--text-muted); font-size: 0.85rem;">{{ $blog->author_title ?: 'Clinical Research Team' }}</span>
              </div>
            </div>
            <p style="font-size: 0.9rem; line-height: 1.6; color: var(--text-muted); margin: 0;">
              Contributing scientific and regulatory director at AstraClinical Research, specializing in Phase I-IV trials and global submissions.
            </p>
          </div>

          <!-- RFP PROPOSAL CALLOUT -->
          <div style="background: linear-gradient(135deg, var(--jss-navy) 0%, var(--jss-navy-dark) 100%); color: #ffffff; border-radius: var(--radius-md); padding: 2rem; text-align: center;">
            <span class="eyebrow-accent" style="background: rgba(40, 169, 161, 0.25); color: #5eead4; margin-bottom: 0.75rem;">STUDY FEASIBILITY</span>
            <h4 style="color: #ffffff; font-size: 1.25rem; margin-bottom: 0.75rem;">Planning a Clinical Protocol?</h4>
            <p style="color: #cbd5e1; font-size: 0.9rem; line-height: 1.6; margin-bottom: 1.5rem;">
              Get therapeutic timeline modeling, site feasibility, and regulatory intelligence tailored to your molecule.
            </p>
            <button class="btn btn-jss-orange" onclick="openRfpModal()" style="width: 100%; justify-content: center;">
              Request Feasibility Study &rarr;
            </button>
          </div>

        </aside>

      </div>
    </div>
  </main>

  <!-- RELATED ARTICLES -->
  @if(isset($relatedBlogs) && $relatedBlogs->count())
    <section style="background: var(--bg-subtle); padding: 4.5rem 0; border-top: 1px solid var(--border-light);">
      <div class="site-container">
        <div style="text-align: center; margin-bottom: 3rem;">
          <span class="eyebrow-accent">CONTINUE READING</span>
          <h2 style="color: var(--jss-navy); font-size: 2rem; margin-top: 0.5rem;">Related Clinical Perspectives</h2>
        </div>
        <div class="blogs-grid">
          @foreach($relatedBlogs as $rel)
            <article class="blog-card" data-category="{{ $rel->category }}">
              <div class="blog-card-media">
                <div class="blog-media-pattern"></div>
                <span class="blog-card-badge">{{ $rel->badge ?: $rel->category }}</span>
                <span class="blog-read-time">{{ $rel->read_time ?: '5 min read' }}</span>
              </div>
              <div class="blog-card-body">
                <span class="blog-meta-date">{{ $rel->published_at ? $rel->published_at->format('F d, Y') : 'Recent' }}</span>
                <h3 class="blog-card-title">{{ $rel->title }}</h3>
                <p class="blog-card-excerpt">{{ $rel->summary }}</p>
                <div class="blog-author-bar">
                  <div class="blog-author-info">
                    <div class="blog-author-avatar">{{ $rel->author_avatar ?: 'AC' }}</div>
                    <div>
                      <div class="blog-author-name">{{ $rel->author_name }}</div>
                      <div class="blog-author-title">{{ $rel->author_title ?: 'Clinical Research Team' }}</div>
                    </div>
                  </div>
                  <a href="{{ route('blog.show', $rel->slug) }}" class="blog-read-btn">Read &rarr;</a>
                </div>
              </div>
            </article>
          @endforeach
        </div>
      </div>
    </section>
  @endif
@endsection

