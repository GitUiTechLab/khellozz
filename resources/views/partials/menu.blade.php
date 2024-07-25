<aside class="main-sidebar sidebar-dark-primary elevation-4" style="min-height: 917px;">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <span class="brand-text font-weight-light">{{ trans('panel.site_title') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li>
                    <select class="searchable-field form-control">

                    </select>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs("admin.home") ? "active" : "" }}" href="{{ route("admin.home") }}">
                        <i class="fas fa-fw fa-tachometer-alt nav-icon">
                        </i>
                        <p>
                            {{ trans('global.dashboard') }}
                        </p>
                    </a>
                </li>
                @can('user_management_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/permissions*") ? "menu-open" : "" }} {{ request()->is("admin/roles*") ? "menu-open" : "" }} {{ request()->is("admin/users*") ? "menu-open" : "" }} {{ request()->is("admin/audit-logs*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle {{ request()->is("admin/permissions*") ? "active" : "" }} {{ request()->is("admin/roles*") ? "active" : "" }} {{ request()->is("admin/users*") ? "active" : "" }} {{ request()->is("admin/audit-logs*") ? "active" : "" }}" href="#">
                            <i class="fa-fw nav-icon fas fa-users">

                            </i>
                            <p>
                                {{ trans('cruds.userManagement.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('permission_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.permissions.index") }}" class="nav-link {{ request()->is("admin/permissions") || request()->is("admin/permissions/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-unlock-alt">

                                        </i>
                                        <p>
                                            {{ trans('cruds.permission.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('role_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.roles.index") }}" class="nav-link {{ request()->is("admin/roles") || request()->is("admin/roles/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-briefcase">

                                        </i>
                                        <p>
                                            {{ trans('cruds.role.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('user_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.users.index") }}" class="nav-link {{ request()->is("admin/users") || request()->is("admin/users/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-user">

                                        </i>
                                        <p>
                                            {{ trans('cruds.user.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('audit_log_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.audit-logs.index") }}" class="nav-link {{ request()->is("admin/audit-logs") || request()->is("admin/audit-logs/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-file-alt">

                                        </i>
                                        <p>
                                            {{ trans('cruds.auditLog.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('sport_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/sport-categories*") ? "menu-open" : "" }} {{ request()->is("admin/add-sports*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle {{ request()->is("admin/sport-categories*") ? "active" : "" }} {{ request()->is("admin/add-sports*") ? "active" : "" }}" href="#">
                            <i class="fa-fw nav-icon fas fa-futbol">

                            </i>
                            <p>
                                {{ trans('cruds.sport.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('sport_category_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.sport-categories.index") }}" class="nav-link {{ request()->is("admin/sport-categories") || request()->is("admin/sport-categories/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-folder">

                                        </i>
                                        <p>
                                            {{ trans('cruds.sportCategory.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('add_sport_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.add-sports.index") }}" class="nav-link {{ request()->is("admin/add-sports") || request()->is("admin/add-sports/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon far fa-plus-square">

                                        </i>
                                        <p>
                                            {{ trans('cruds.addSport.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('event_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/add-events*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle {{ request()->is("admin/add-events*") ? "active" : "" }}" href="#">
                            <i class="fa-fw nav-icon fas fa-calendar-alt">

                            </i>
                            <p>
                                {{ trans('cruds.event.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('add_event_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.add-events.index") }}" class="nav-link {{ request()->is("admin/add-events") || request()->is("admin/add-events/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon far fa-plus-square">

                                        </i>
                                        <p>
                                            {{ trans('cruds.addEvent.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('contestant_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/contestant-categories*") ? "menu-open" : "" }} {{ request()->is("admin/add-contestants*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle {{ request()->is("admin/contestant-categories*") ? "active" : "" }} {{ request()->is("admin/add-contestants*") ? "active" : "" }}" href="#">
                            <i class="fa-fw nav-icon fas fa-trophy">

                            </i>
                            <p>
                                {{ trans('cruds.contestant.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('contestant_category_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.contestant-categories.index") }}" class="nav-link {{ request()->is("admin/contestant-categories") || request()->is("admin/contestant-categories/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-folder">

                                        </i>
                                        <p>
                                            {{ trans('cruds.contestantCategory.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('add_contestant_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.add-contestants.index") }}" class="nav-link {{ request()->is("admin/add-contestants") || request()->is("admin/add-contestants/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon far fa-plus-square">

                                        </i>
                                        <p>
                                            {{ trans('cruds.addContestant.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('gallery_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/add-galleries*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle {{ request()->is("admin/add-galleries*") ? "active" : "" }}" href="#">
                            <i class="fa-fw nav-icon fas fa-chart-area">

                            </i>
                            <p>
                                {{ trans('cruds.gallery.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('add_gallery_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.add-galleries.index") }}" class="nav-link {{ request()->is("admin/add-galleries") || request()->is("admin/add-galleries/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon far fa-plus-square">

                                        </i>
                                        <p>
                                            {{ trans('cruds.addGallery.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('video_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/featured-videos*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle {{ request()->is("admin/featured-videos*") ? "active" : "" }}" href="#">
                            <i class="fa-fw nav-icon fas fa-video">

                            </i>
                            <p>
                                {{ trans('cruds.video.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('featured_video_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.featured-videos.index") }}" class="nav-link {{ request()->is("admin/featured-videos") || request()->is("admin/featured-videos/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon far fa-plus-square">

                                        </i>
                                        <p>
                                            {{ trans('cruds.featuredVideo.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('media_coverage_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/add-media*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle {{ request()->is("admin/add-media*") ? "active" : "" }}" href="#">
                            <i class="fa-fw nav-icon far fa-newspaper">

                            </i>
                            <p>
                                {{ trans('cruds.mediaCoverage.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('add_medium_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.add-media.index") }}" class="nav-link {{ request()->is("admin/add-media") || request()->is("admin/add-media/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon far fa-plus-square">

                                        </i>
                                        <p>
                                            {{ trans('cruds.addMedium.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('review_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/add-reviews*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle {{ request()->is("admin/add-reviews*") ? "active" : "" }}" href="#">
                            <i class="fa-fw nav-icon fas fa-star">

                            </i>
                            <p>
                                {{ trans('cruds.review.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('add_review_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.add-reviews.index") }}" class="nav-link {{ request()->is("admin/add-reviews") || request()->is("admin/add-reviews/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon far fa-plus-square">

                                        </i>
                                        <p>
                                            {{ trans('cruds.addReview.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('faq_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/add-faqs*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle {{ request()->is("admin/add-faqs*") ? "active" : "" }}" href="#">
                            <i class="fa-fw nav-icon fas fa-question-circle">

                            </i>
                            <p>
                                {{ trans('cruds.faq.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('add_faq_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.add-faqs.index") }}" class="nav-link {{ request()->is("admin/add-faqs") || request()->is("admin/add-faqs/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon far fa-plus-square">

                                        </i>
                                        <p>
                                            {{ trans('cruds.addFaq.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('player_achievement_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/add-achievements*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle {{ request()->is("admin/add-achievements*") ? "active" : "" }}" href="#">
                            <i class="fa-fw nav-icon fas fa-trophy">

                            </i>
                            <p>
                                {{ trans('cruds.playerAchievement.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('add_achievement_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.add-achievements.index") }}" class="nav-link {{ request()->is("admin/add-achievements") || request()->is("admin/add-achievements/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon far fa-plus-square">

                                        </i>
                                        <p>
                                            {{ trans('cruds.addAchievement.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('blog_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/add-blogs*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle {{ request()->is("admin/add-blogs*") ? "active" : "" }}" href="#">
                            <i class="fa-fw nav-icon fab fa-blogger-b">

                            </i>
                            <p>
                                {{ trans('cruds.blog.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('add_blog_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.add-blogs.index") }}" class="nav-link {{ request()->is("admin/add-blogs") || request()->is("admin/add-blogs/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon far fa-plus-square">

                                        </i>
                                        <p>
                                            {{ trans('cruds.addBlog.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('contact_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/contact-forms*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle {{ request()->is("admin/contact-forms*") ? "active" : "" }}" href="#">
                            <i class="fa-fw nav-icon fas fa-phone-volume">

                            </i>
                            <p>
                                {{ trans('cruds.contact.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('contact_form_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.contact-forms.index") }}" class="nav-link {{ request()->is("admin/contact-forms") || request()->is("admin/contact-forms/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-file-signature">

                                        </i>
                                        <p>
                                            {{ trans('cruds.contactForm.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('registration_form_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/add-registrations*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle {{ request()->is("admin/add-registrations*") ? "active" : "" }}" href="#">
                            <i class="fa-fw nav-icon fas fa-registered">

                            </i>
                            <p>
                                {{ trans('cruds.registrationForm.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('add_registration_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.add-registrations.index") }}" class="nav-link {{ request()->is("admin/add-registrations") || request()->is("admin/add-registrations/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon far fa-plus-square">

                                        </i>
                                        <p>
                                            {{ trans('cruds.addRegistration.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('player_detail_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/add-players*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle {{ request()->is("admin/add-players*") ? "active" : "" }}" href="#">
                            <i class="fa-fw nav-icon far fa-credit-card">

                            </i>
                            <p>
                                {{ trans('cruds.playerDetail.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('add_player_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.add-players.index") }}" class="nav-link {{ request()->is("admin/add-players") || request()->is("admin/add-players/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon far fa-plus-square">

                                        </i>
                                        <p>
                                            {{ trans('cruds.addPlayer.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('school_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/add-schools*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle {{ request()->is("admin/add-schools*") ? "active" : "" }}" href="#">
                            <i class="fa-fw nav-icon fas fa-graduation-cap">

                            </i>
                            <p>
                                {{ trans('cruds.school.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('add_school_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.add-schools.index") }}" class="nav-link {{ request()->is("admin/add-schools") || request()->is("admin/add-schools/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon far fa-plus-square">

                                        </i>
                                        <p>
                                            {{ trans('cruds.addSchool.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
                    @can('profile_password_edit')
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('profile/password') || request()->is('profile/password/*') ? 'active' : '' }}" href="{{ route('profile.password.edit') }}">
                                <i class="fa-fw fas fa-key nav-icon">
                                </i>
                                <p>
                                    {{ trans('global.change_password') }}
                                </p>
                            </a>
                        </li>
                    @endcan
                @endif
                <li class="nav-item">
                    <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                        <p>
                            <i class="fas fa-fw fa-sign-out-alt nav-icon">

                            </i>
                            <p>{{ trans('global.logout') }}</p>
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>