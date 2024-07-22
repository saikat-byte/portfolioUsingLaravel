<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('admin_home') }}">Admin Panel</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('admin_home') }}"></a>
        </div>

        <ul class="sidebar-menu">

            <li class="{{ Request::is('admin/home') ? "active" : "" }}"><a class="nav-link" href="{{ route('admin_home') }}" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Dashboard"><i class="fas fa-hand-point-right"></i> <span>Dashboard</span></a></li>

            <li class="{{ Request::is('admin/setting') ? "active" : "" }}"><a class="nav-link" href="{{ route('admin_setting') }}" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Settings"><i class="fas fa-hand-point-right"></i> <span>Settings</span></a></li>

            <li class="nav-item dropdown {{ Request::is('admin/home-banner')||Request::is('admin/home-about')||Request::is('admin/home-skill')||Request::is('admin/home-qualification')||Request::is('admin/home-counter')||Request::is('admin/home-testimonial')||Request::is('admin/home-client')||Request::is('admin/home-service')||Request::is('admin/home-portfolio')||Request::is('admin/home-blog')||Request::is('admin/home-seo') ? "active" : "" }}">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-hand-point-right"></i><span>Home Page</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('admin/home-banner') ? "active" : "" }}"><a class="nav-link" href="{{ route('admin_home_banner') }}"><i class="fas fa-angle-right"></i> Banner Section</a></li>
                    <li class="{{ Request::is('admin/home-about') ? "active" : "" }}"><a class="nav-link" href="{{ route('admin_home_about') }}"><i class="fas fa-angle-right"></i> About Section</a></li>
                    <li class="{{ Request::is('admin/home-skill') ? "active" : "" }}"><a class="nav-link" href="{{ route('admin_home_skill') }}"><i class="fas fa-angle-right"></i> Skill Section</a></li>
                    <li class="{{ Request::is('admin/home-qualification') ? "active" : "" }}"><a class="nav-link" href="{{ route('admin_home_qualification') }}"><i class="fas fa-angle-right"></i> Qualification Section</a></li>
                    <li class="{{ Request::is('admin/home-counter') ? "active" : "" }}"><a class="nav-link" href="{{ route('admin_home_counter') }}"><i class="fas fa-angle-right"></i> Counter Section</a></li>
                    <li class="{{ Request::is('admin/home-testimonial') ? "active" : "" }}"><a class="nav-link" href="{{ route('admin_home_testimonial') }}"><i class="fas fa-angle-right"></i> Testimonial Section</a></li>
                    <li class="{{ Request::is('admin/home-client') ? "active" : "" }}"><a class="nav-link" href="{{ route('admin_home_client') }}"><i class="fas fa-angle-right"></i> Client Section</a></li>
                    <li class="{{ Request::is('admin/home-service') ? "active" : "" }}"><a class="nav-link" href="{{ route('admin_home_service') }}"><i class="fas fa-angle-right"></i> Service Section</a></li>
                    <li class="{{ Request::is('admin/home-portfolio') ? "active" : "" }}"><a class="nav-link" href="{{ route('admin_home_portfolio') }}"><i class="fas fa-angle-right"></i> Porfolio Section</a></li>
                    <li class="{{ Request::is('admin/home-blog') ? "active" : "" }}"><a class="nav-link" href="{{ route('admin_home_blog') }}"><i class="fas fa-angle-right"></i> Blog Section</a></li>
                    <li class="{{ Request::is('admin/home-seo') ? "active" : "" }}"><a class="nav-link" href="{{ route('admin_home_seo') }}"><i class="fas fa-angle-right"></i> SEO Section</a></li>
                </ul>
            </li>



            <li class="nav-item dropdown {{ Request::is('admin/page/services')||Request::is('admin/page/portfolios')||Request::is('admin/page/about')||Request::is('admin/page/contact')||Request::is('admin/page/blog')||Request::is('admin/page/category')||Request::is('admin/page/archive')||Request::is('admin/page/search') ? "active" : "" }}">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-hand-point-right"></i><span>Other Pages</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('admin/page/services') ? "active" : "" }}"><a class="nav-link" href="{{ route('admin_page_services') }}"><i class="fas fa-angle-right"></i> Services Page</a></li>
                    <li class="{{ Request::is('admin/page/portfolios') ? "active" : "" }}"><a class="nav-link" href="{{ route('admin_page_portfolios') }}"><i class="fas fa-angle-right"></i> Portfolios Page</a></li>
                    <li class="{{ Request::is('admin/page/about') ? "active" : "" }}"><a class="nav-link" href="{{ route('admin_page_about') }}"><i class="fas fa-angle-right"></i> About Page</a></li>
                    <li class="{{ Request::is('admin/page/contact') ? "active" : "" }}"><a class="nav-link" href="{{ route('admin_page_contact') }}"><i class="fas fa-angle-right"></i> Contact Page</a></li>
                    <li class="{{ Request::is('admin/page/blog') ? "active" : "" }}"><a class="nav-link" href="{{ route('admin_page_blog') }}"><i class="fas fa-angle-right"></i> Blog Page</a></li>
                    <li class="{{ Request::is('admin/page/category') ? "active" : "" }}"><a class="nav-link" href="{{ route('admin_page_category') }}"><i class="fas fa-angle-right"></i> Category Page</a></li>
                    <li class="{{ Request::is('admin/page/archive') ? "active" : "" }}"><a class="nav-link" href="{{ route('admin_page_archive') }}"><i class="fas fa-angle-right"></i> Archive Page</a></li>
                    <li class="{{ Request::is('admin/page/search') ? "active" : "" }}"><a class="nav-link" href="{{ route('admin_page_search') }}"><i class="fas fa-angle-right"></i> Search Page</a></li>
                </ul>
            </li>



            <li class="{{ Request::is('admin/skill/*') ? "active" : "" }}"><a class="nav-link" href="{{ route('admin_skill_show') }}" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Skills"><i class="fas fa-hand-point-right"></i> <span>Skills</span></a></li>

            <li class="{{ Request::is('admin/education/*') ? "active" : "" }}"><a class="nav-link" href="{{ route('admin_education_show') }}" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Education"><i class="fas fa-hand-point-right"></i> <span>Education</span></a></li>

            <li class="{{ Request::is('admin/experience/*') ? "active" : "" }}"><a class="nav-link" href="{{ route('admin_experience_show') }}" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Experience"><i class="fas fa-hand-point-right"></i> <span>Experience</span></a></li>

            <li class="{{ Request::is('admin/testimonial/*') ? "active" : "" }}"><a class="nav-link" href="{{ route('admin_testimonial_show') }}" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Testimonial"><i class="fas fa-hand-point-right"></i> <span>Testimonial</span></a></li>

            <li class="{{ Request::is('admin/client/*') ? "active" : "" }}"><a class="nav-link" href="{{ route('admin_client_show') }}" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Client"><i class="fas fa-hand-point-right"></i> <span>Client</span></a></li>

            <li class="{{ Request::is('admin/service/*') ? "active" : "" }}"><a class="nav-link" href="{{ route('admin_service_show') }}" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Service"><i class="fas fa-hand-point-right"></i> <span>Service</span></a></li>

            <li class="nav-item dropdown {{ Request::is('admin/portfolio-category/*')||Request::is('admin/portfolio/*') ? "active" : "" }}">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-hand-point-right"></i><span>Portfolios</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('admin/portfolio-category/*') ? "active" : "" }}"><a class="nav-link" href="{{ route('admin_portfolio_category_show') }}"><i class="fas fa-angle-right"></i> Category</a></li>
                    <li class="{{ Request::is('admin/portfolio/*') ? "active" : "" }}"><a class="nav-link" href="{{ route('admin_portfolio_show') }}"><i class="fas fa-angle-right"></i> Portfolio</a></li>
                </ul>
            </li>

            <li class="nav-item dropdown {{ Request::is('admin/post-category/*')||Request::is('admin/post/*')||Request::is('admin/comment/*')||Request::is('admin/reply/*') ? "active" : "" }}">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-hand-point-right"></i><span>Blog</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('admin/post-category/*') ? "active" : "" }}"><a class="nav-link" href="{{ route('admin_post_category_show') }}"><i class="fas fa-angle-right"></i> Category</a></li>
                    <li class="{{ Request::is('admin/post/*') ? "active" : "" }}"><a class="nav-link" href="{{ route('admin_post_show') }}"><i class="fas fa-angle-right"></i> Post</a></li>
                    <li class="{{ Request::is('admin/comment/pending') ? "active" : "" }}"><a class="nav-link" href="{{ route('admin_comment_pending') }}"><i class="fas fa-angle-right"></i> Pending Comments</a></li>
                    <li class="{{ Request::is('admin/comment/approved') ? "active" : "" }}"><a class="nav-link" href="{{ route('admin_comment_approved') }}"><i class="fas fa-angle-right"></i> Approved Comments</a></li>
                    <li class="{{ Request::is('admin/reply/pending') ? "active" : "" }}"><a class="nav-link" href="{{ route('admin_reply_pending') }}"><i class="fas fa-angle-right"></i> Pending Replies</a></li>
                    <li class="{{ Request::is('admin/reply/approved') ? "active" : "" }}"><a class="nav-link" href="{{ route('admin_reply_approved') }}"><i class="fas fa-angle-right"></i> Approved Replies</a></li>
                </ul>
            </li>

        </ul>
    </aside>
</div>