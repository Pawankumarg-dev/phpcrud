@extends('frontend.layouts.app')

@section('title','About')

@section('content')

<style>
/* About page custom styles - professional look */
.about-hero-img-wrapper { max-width: 520px; margin: 0 auto; }
.about-hero-img { width:100%; border-radius:12px; box-shadow: 0 14px 40px rgba(2,6,23,0.45); display:block; }
.about-heading { font-size:2.4rem; font-weight:700; margin-bottom:0.75rem; }
.about-hero-card{ background:#ffffff; color:#111827; border-radius:12px; padding:24px; box-shadow:0 8px 30px rgba(2,6,23,0.12); }
.about-hero-card .lead{ color:#374151; font-size:1.05rem; margin-bottom:0.75rem; }
.about-hero-card p{ color:#4b5563; }
.social-list a{ display:inline-flex; align-items:center; justify-content:center; width:44px; height:44px; border-radius:50%; background:rgba(255,107,0,0.08);  margin-right:8px; text-decoration:none; }
.social-list a i{ font-size:1.1rem; }

/* Team cards */
.team-card{ background:#ffffff; border-radius:12px; padding:18px; color:#111827; box-shadow:0 8px 24px rgba(2,6,23,0.06); border-left:4px solid #ff6b00; }
.team-card .name{ font-weight:700; font-size:1.05rem; color:#111827; }
.team-card .role{ color:#6b7280; font-size:0.95rem; }
.team-card p{ margin-bottom:0; color:#374151; }
.team-card img{ width:96px; height:96px; object-fit:cover; border-radius:50%; border:2px solid rgba(0,0,0,0.05); }

/* Uniform team card sizing and polish */
.team-card{ min-height:200px; transition:transform .18s ease, box-shadow .18s ease; }
.team-card:hover{ transform:translateY(-6px); box-shadow:0 18px 40px rgba(2,6,23,0.12); }
.team-card .avatar{ flex: 0 0 auto; display:flex; align-items:flex-start; }
.team-card .content{ flex:1 1 auto; }
.team-card .bio{ color:#374151; line-height:1.6; }
.team-card .bio{ white-space:normal; }
.team-card .name{ font-size:1.06rem; }
.team-card .role{ font-size:0.95rem; }

@media(min-width:992px){
    .team-card{ min-height:220px; }
}

@media (max-width:767px){
    .about-hero-card{ padding:18px; }
    .team-card{ padding:14px; }
}
</style>

<div class="container py-5 " >

    <!-- About hero -->
<div class="row align-items-stretch mb-5 pt-5 g-4">

    <!-- Image Column -->
    <div class="col-lg-6 d-flex">
        <div class="about-image-card w-100">
            <img src="{{ asset('images/Untitled-design.jpg') }}"
                 alt="About image"
                 class="about-hero-img">
        </div>
    </div>

    <!-- Content Column -->
    <div class="col-lg-6 d-flex">
        <div class="about-content-card w-100">
            <span class="about-tag">About Us</span>

            <h2 class="about-heading mt-3">
                Our Story
            </h2>

            <p class="lead">
                At The Venture Beast, we’re not just marketers — we’re growth partners.
                Born from a passion to help businesses thrive in the digital age,
                our journey began with a mission: to empower brands with bold,
                data-driven strategies that actually deliver results.
            </p>

            <p>
                What started as a small team of digital enthusiasts has grown into a
                full-service marketing agency trusted by businesses across India,
                the UK, and the USA.
            </p>

            <p>
                From SEO and Meta Ads to web development and lead generation —
                we build strategies that roar.
            </p>

            <div class="mt-auto pt-4 d-flex align-items-center flex-wrap gap-3">

                <div class="social-list me-3"> <a href="https://www.facebook.com/profile.php?id=61565694160928" aria-label="Facebook" target="_blank" rel="noopener noreferrer"> <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M400 32H48A48 48 0 0 0 0 80v352a48 48 0 0 0 48 48h137.25V327.69h-63V256h63v-54.64c0-62.15 37-96.48 93.67-96.48 27.14 0 55.52 4.84 55.52 4.84v61h-31.27c-30.81 0-40.42 19.12-40.42 38.73V256h68.78l-11 71.69h-57.78V480H400a48 48 0 0 0 48-48V80a48 48 0 0 0-48-48z"/></svg> </a> <a href="https://www.instagram.com/theventurebeastt/?hl=en" aria-label="Instagram" target="_blank" rel="noopener noreferrer"> <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M224,202.66A53.34,53.34,0,1,0,277.36,256,53.38,53.38,0,0,0,224,202.66Zm124.71-41a54,54,0,0,0-30.41-30.41c-21-8.29-71-6.43-94.3-6.43s-73.25-1.93-94.31,6.43a54,54,0,0,0-30.41,30.41c-8.28,21-6.43,71.05-6.43,94.33S91,329.26,99.32,350.33a54,54,0,0,0,30.41,30.41c21,8.29,71,6.43,94.31,6.43s73.24,1.93,94.3-6.43a54,54,0,0,0,30.41-30.41c8.35-21,6.43-71.05,6.43-94.33S357.1,182.74,348.75,161.67ZM224,338a82,82,0,1,1,82-82A81.9,81.9,0,0,1,224,338Zm85.38-148.3a19.14,19.14,0,1,1,19.13-19.14A19.1,19.1,0,0,1,309.42,189.74ZM400,32H48A48,48,0,0,0,0,80V432a48,48,0,0,0,48,48H400a48,48,0,0,0,48-48V80A48,48,0,0,0,400,32ZM382.88,322c-1.29,25.63-7.14,48.34-25.85,67s-41.4,24.63-67,25.85c-26.41,1.49-105.59,1.49-132,0-25.63-1.29-48.26-7.15-67-25.85s-24.63-41.42-25.85-67c-1.49-26.42-1.49-105.61,0-132,1.29-25.63,7.07-48.34,25.85-67s41.47-24.56,67-25.78c26.41-1.49,105.59-1.49,132,0,25.63,1.29,48.33,7.15,67,25.85s24.63,41.42,25.85,67.05C384.37,216.44,384.37,295.56,382.88,322Z"/></svg> </a> <a href="https://www.youtube.com/@theventurebeastt" aria-label="YouTube" target="_blank" rel="noopener noreferrer"> <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path d="M549.655 124.083c-6.281-23.65-24.787-42.276-48.284-48.597C458.781 64 288 64 288 64S117.22 64 74.629 75.486c-23.497 6.322-42.003 24.947-48.284 48.597-11.412 42.867-11.412 132.305-11.412 132.305s0 89.438 11.412 132.305c6.281 23.65 24.787 41.5 48.284 47.821C117.22 448 288 448 288 448s170.78 0 213.371-11.486c23.497-6.321 42.003-24.171 48.284-47.821 11.412-42.867 11.412-132.305 11.412-132.305s0-89.438-11.412-132.305zm-317.51 213.508V175.185l142.739 81.205-142.739 81.201z"/></svg> </a> <a href="https://www.linkedin.com/company/the-venture-beast/" aria-label="LinkedIn" target="_blank" rel="noopener noreferrer"> <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M416 32H31.9C14.3 32 0 46.5 0 64.3v383.4C0 465.5 14.3 480 31.9 480H416c17.6 0 32-14.5 32-32.3V64.3c0-17.8-14.4-32.3-32-32.3zM135.4 416H69V202.2h66.5V416zm-33.2-243c-21.3 0-38.5-17.3-38.5-38.5S80.9 96 102.2 96c21.2 0 38.5 17.3 38.5 38.5 0 21.3-17.2 38.5-38.5 38.5zm282.1 243h-66.4V312c0-24.8-.5-56.7-34.5-56.7-34.6 0-39.9 27-39.9 54.9V416h-66.4V202.2h63.7v29.2h.9c8.9-16.8 30.6-34.5 62.9-34.5 67.2 0 79.7 44.3 79.7 101.9V416z"/></svg> </a> </div>

            </div>
        </div>
    </div>
</div>


    <!-- The Beast Team (Bootstrap professional layout) -->
    <div class="mb-5 mt-5">
        <h1 class=" mb-4 text-center m-5 pt-5" style=" font-size: 4rem; ">The Beast Team</h1>

        @php
            $team = [
                [
                    'name' => 'Kumar Sameer',
                    'role' => 'Marketing Director',
                    'bio'  => 'Seasoned marketing director with a proven track record of building and scaling brands across the UK, USA, Europe, and India. Specializes in integrated growth strategies combining content, SEO, paid acquisition, and conversion optimization to drive measurable revenue.',
                    'image'=> 'WhatsApp-Image-2025-06-26-at-19.09.36.jpeg'
                ],
                [
                    'name' => 'Inu Etc',
                    'role' => 'Web Developer & Digital Marketer',
                    'bio'  => 'Full-stack web developer and performance marketer who crafts responsive, high-converting websites. Merges technical development skills with data-driven marketing to deliver end-to-end digital products that convert visitors into customers.',
                    'image'=> 'Inu-Etc-DP-1.png'
                ],
                [
                    'name' => 'Akshanshu Gupta',
                    'role' => 'Marketing Analytics',
                    'bio'  => 'Performance marketing specialist focused on analytics, tracking, and ad optimization. Expert in Meta and Google Ads, A/B testing, funnel analysis, and attribution modeling to maximize ROAS and scale winning campaigns.',
                    'image'=> 'WhatsApp-Image-2025-06-26-at-21.05.37-scaled.jpeg'
                ],
                [
                    'name' => 'Nihal Tiwari',
                    'role' => 'Tech Lead',
                    'bio'  => 'Technical lead with 5+ years building scalable web applications. Skilled in React, Redux, Typescript, and modern UI frameworks. Leads engineering efforts for performant, maintainable frontends and integrates them with robust backend APIs.',
                    'image'=> 'WhatsApp-Image-2025-06-26-at-18.53.06_c62fe928.jpg'
                ],
                [
                    'name' => 'Pawan Kumar Gupta',
                    'role' => 'Full Stack Developer',
                    'bio'  => 'Full-stack developer experienced in PHP, Python, Laravel, Django and MySQL. Builds reliable backend systems, RESTful APIs, and clean frontend experiences. Passionate about clean code, testing, and scalable architecture.',
                    'image'=> 'WhatsApp-Image-2025-06-23-at-22.52.00.jpeg'
                ],
                [
                    'name' => 'Ankit Kushwaha',
                    'role' => 'Graphic Designer',
                    'bio'  => 'Creative graphic designer skilled in branding, visual identity, and motion. Proficient with Adobe Photoshop, Illustrator, Premiere Pro, and After Effects. Designs compelling assets for web, social, and print that strengthen brand presence.',
                    'image'=> '1-1.jpg'
                ],
            ];
        @endphp

        <div class="row g-4 align-items-stretch">
            @foreach($team as $member)
                <div class="col-12 col-md-6 mb-0 d-flex">
                    <div class="team-card flex-fill d-flex">
                        <div class="avatar me-3">
                            <img src="{{ asset('images/'.$member['image']) }}" alt="{{ $member['name'] }}">
                        </div>
                        <div class="content d-flex flex-column">
                            <div>
                                <div class="name">{{ $member['name'] }}</div>
                                <div class="role mb-2">{{ $member['role'] }}</div>
                            </div>
                            <div class="mt-2 bio">{{ $member['bio'] }}</div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</div>

@endsection
