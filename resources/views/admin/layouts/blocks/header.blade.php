<div class="header">
    <div class="row g-0 align-items-center">
        <div class="col-xxl-6 col-xl-5 col-4 d-flex align-items-center gap-20">
            <div class="main-logo d-lg-block d-none">
                <div class="logo-big">
                    <a href="dashboard-index.html">
                        <img src="{{ asset('administrator/dashboard/assets/images/logo-black.png')}}" alt="Logo">
                    </a>
                </div>
                <div class="logo-small">
                    <a href="dashboard-index.html">
                        <img src="{{ asset('administrator/dashboard/assets/images/logo-small.png')}}" alt="Logo">
                    </a>
                </div>
            </div>
            <div class="nav-close-btn">
                <button id="navClose"><i class="fa-light fa-bars-sort"></i></button>
            </div>
            <a href="#" target="_blank" class="btn btn-sm btn-primary site-view-btn"><i
                    class="fa-light fa-globe me-1"></i> <span>View Website</span></a>
        </div>
        <div class="col-4 d-lg-none">
            <div class="mobile-logo">
                <a href="dashboard-index.html">
                    <img src="{{ asset('administrator/dashboard/assets/images/logo-black.png')}}" alt="Logo">
                </a>
            </div>
        </div>
        <div class="col-xxl-6 col-xl-7 col-lg-8 col-4">
            <div class="header-right-btns d-flex justify-content-end align-items-center">
                <div class="header-collapse-group">
                    <div class="header-right-btns d-flex justify-content-end align-items-center p-0">
                        <form class="header-form">
                            <input type="search" name="search" placeholder="Search..." required>
                            <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                        </form>
                        <div class="header-right-btns d-flex justify-content-end align-items-center p-0">
                            <div class="lang-select">
                                <span>Language:</span>
                                <select>
                                    <option value="">EN</option>
                                    <option value="">BN</option>
                                    <option value="">FR</option>
                                </select>
                            </div>
                            <div class="header-btn-box">
                                <button class="header-btn" id="messageDropdown" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    <i class="fa-light fa-comment-dots"></i>
                                    <span class="badge bg-danger">3</span>
                                </button>
                                <ul class="message-dropdown dropdown-menu" aria-labelledby="messageDropdown">
                                    <li>
                                        <a href="#" class="d-flex">
                                            <div class="avatar">
                                                <img src="{{ asset('administrator/dashboard/assets/images/avatar.png')}}" alt="image">
                                            </div>
                                            <div class="msg-txt">
                                                <span class="name">Archer Cowie</span>
                                                <span class="msg-short">There are many variations of passages of Lorem
                                                    Ipsum.</span>
                                                <span class="time">2 Hours ago</span>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="d-flex">
                                            <div class="avatar">
                                                <img src="{{ asset('administrator/dashboard/assets/images/avatar-2.png')}}" alt="image">
                                            </div>
                                            <div class="msg-txt">
                                                <span class="name">Cody Rodway</span>
                                                <span class="msg-short">There are many variations of passages of Lorem
                                                    Ipsum.</span>
                                                <span class="time">2 Hours ago</span>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="d-flex">
                                            <div class="avatar">
                                                <img src="{{ asset('administrator/dashboard/assets/images/avatar-3.png')}}" alt="image">
                                            </div>
                                            <div class="msg-txt">
                                                <span class="name">Zane Bain</span>
                                                <span class="msg-short">There are many variations of passages of Lorem
                                                    Ipsum.</span>
                                                <span class="time">2 Hours ago</span>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="show-all-btn">Show all message</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="header-btn-box">
                                <button class="header-btn" id="notificationDropdown" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    <i class="fa-light fa-bell"></i>
                                    <span class="badge bg-danger">9+</span>
                                </button>
                                <ul class="notification-dropdown dropdown-menu" aria-labelledby="notificationDropdown">
                                    <li>
                                        <a href="#" class="d-flex align-items-center">
                                            <div class="avatar">
                                                <img src="{{ asset('administrator/dashboard/assets/images/avatar.png')}}" alt="image">
                                            </div>
                                            <div class="notification-txt">
                                                <span class="notification-icon text-primary"><i
                                                        class="fa-solid fa-thumbs-up"></i></span> <span
                                                    class="fw-bold">Archer</span> Likes your post
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="d-flex align-items-center">
                                            <div class="avatar">
                                                <img src="{{ asset('administrator/dashboard/assets/images/avatar-2.png')}}" alt="image">
                                            </div>
                                            <div class="notification-txt">
                                                <span class="notification-icon text-success"><i
                                                        class="fa-solid fa-comment-dots"></i></span> <span
                                                    class="fw-bold">Cody</span> Commented on your post
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="d-flex align-items-center">
                                            <div class="avatar">
                                                <img src="{{ asset('administrator/dashboard/assets/images/avatar-3.png')}}" alt="image">
                                            </div>
                                            <div class="notification-txt">
                                                <span class="notification-icon"><i
                                                        class="fa-solid fa-share"></i></span> <span
                                                    class="fw-bold">Zane</span> Shared your post
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="d-flex align-items-center">
                                            <div class="avatar">
                                                <img src="{{ asset('administrator/dashboard/assets/images/avatar-4.png')}}" alt="image">
                                            </div>
                                            <div class="notification-txt">
                                                <span class="notification-icon text-primary"><i
                                                        class="fa-solid fa-thumbs-up"></i></span> <span
                                                    class="fw-bold">Christopher</span> Likes your post
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="d-flex align-items-center">
                                            <div class="avatar">
                                                <img src="{{ asset('administrator/dashboard/assets/images/avatar-5.png')}}" alt="image">
                                            </div>
                                            <div class="notification-txt">
                                                <span class="notification-icon text-success"><i
                                                        class="fa-solid fa-comment-dots"></i></span> <span
                                                    class="fw-bold">Charlie</span> Commented on your post
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="d-flex align-items-center">
                                            <div class="avatar">
                                                <img src="{{ asset('administrator/dashboard/assets/images/avatar-6.png')}}" alt="image">
                                            </div>
                                            <div class="notification-txt">
                                                <span class="notification-icon"><i
                                                        class="fa-solid fa-share"></i></span> <span
                                                    class="fw-bold">Jayden</span> Shared your post
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="show-all-btn">Show all message</a>
                                    </li>
                                </ul>
                            </div>
                            <button class="header-btn fullscreen-btn" id="btnFullscreen"><i
                                    class="fa-light fa-expand"></i></button>
                        </div>
                    </div>
                </div>
                <button class="header-btn header-collapse-group-btn d-lg-none"><i
                        class="fa-light fa-ellipsis-vertical"></i></button>
                <div class="header-btn-box">
                    <button class="profile-btn" id="profileDropdown" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <img src="{{ asset('administrator/dashboard/assets/images/admin.png')}}" alt="image">
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="profileDropdown">
                        <li>
                            <div class="dropdown-txt text-center">
                                <p class="mb-0">Shaikh Abu Dardah</p>
                                <span class="d-block">CEO & Founder</span>
                            </div>
                        </li>
                        <li><a class="dropdown-item" href="dashboard-view-profile.html"><span
                                    class="dropdown-icon"><i class="fa-regular fa-circle-user"></i></span> Profile</a>
                        </li>
                        <li><a class="dropdown-item" href="#"><span class="dropdown-icon"><i
                                        class="fa-regular fa-circle-question"></i></span> Help</a></li>
                        <li><a class="dropdown-item" href="dashboard-edit-profile.html"><span
                                    class="dropdown-icon"><i class="fa-regular fa-gear"></i></span> Settings</a></li>
                        <li><a class="dropdown-item" href="dashboard-login.html"><span class="dropdown-icon"><i
                                        class="fa-regular fa-arrow-right-from-bracket"></i></span> Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
