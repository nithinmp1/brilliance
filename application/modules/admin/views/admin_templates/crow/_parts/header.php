
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title><?=$title?></title>
      
      <!-- Favicon -->
      <link rel="shortcut icon" href="<?=site_url('assets/images/favicon.ico"')?>" />
      
      <link rel="stylesheet" href="<?=site_url('assets/css/backend-plugin.min.css"')?>">
      <link rel="stylesheet" href="<?=site_url('assets/css/backend.css?v=1.0.0')?>">  
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
      <!-- Include Bootstrap CSS -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
      <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
      <!-- Include Bootstrap-datepicker CSS -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
      <style type="text/css">



    * {
    margin: 0;  
    padding: 0;
    box-sizing: border-box;
    }

    .container {
    width: 95%;
    max-width: 64rem;
    background: #fff;
    padding: 0.8rem;
    border-radius: 1rem; 
    overflow: auto; 
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    
    display: grid;
    gap: 1rem;
    grid-template-columns: 2fr 2fr 1.5fr;
    grid-template-rows: 0.1fr 2fr 1fr;
    grid-template-areas:
        "quiz-title quiz-title quiz-title"
        "question-section question-section questions-nav-section"
        "explanation-section explanation-section questions-nav-section"; 
    }

    .quiz-title {
    grid-area: quiz-title;
    font-weight: 800;
    font-size: 1rem; 
    text-align: center;
    margin-bottom: 1rem; 
    }

    .question-section {
    grid-area: question-section
    }

    .question {
    padding: 0.5rem;
    border: 2px solid #799efe;
    border-radius: 0.5rem;
    margin-bottom: 1rem;
    }

    .question .question-text {
    margin-bottom: 0.5rem;
    }

    .question .question-num {
    font-weight: 700; 
    font-size: 0.9rem;
    margin-bottom: 1rem; 
    }

    .answer-item {
    padding: 1rem 0;
    display:block;
    box-shadow: 0 7px 7px rgba(0, 0, 0, 0.1);
    border-radius: 0.5rem;
    margin-bottom: 0.5rem;
    cursor: pointer;
    }

    .answer-item.checked {
    background: #aabdff;
    color: #fff;
    }

    .answer-item.wrong {
    background: #da4955;
    color: #fff;
    }

    .answer-item span {
    margin-left: 2rem;
    }

    .answer-item:hover,
    .answer-item:active {
    background: #aabdff;
    color: #fff;
    }

    .answer-item input[type="radio"] {
    display: none;
    } 

    .action {
    margin-top: 1rem;
    margin-bottom: 1rem;
    text-align: center;
    }

    .btn {
    background: inherit;
    border: 0;
    border-radius: 0.5rem; 
    box-shadow: 0 7px 7px rgba(0, 0, 0, 0.1);
    padding: 0.5rem 1rem;
    margin-right: 1.5rem;
    font-weight: 700;
    cursor: pointer;
    }

    .btn:hover,
    .btn:active { 
    background: #aabdff;
    color: #fff;
    } 

    .explanation-section {
    grid-area: explanation-section;
    padding: 0.5rem; 
    border-radius: 0.5rem;
    box-shadow: 0 7px 7px rgba(0, 0, 0, 0.1);
    }

    .explanation-section .section-title {
    font-weight: 700;
    font-size: 0.9rem;
    margin-bottom: 1rem; 
    } 

    .explanation-section .explanation-text {
    margin-right: 1rem;
    margin-left: 1rem;
    margin-bottom: 1.5rem;
    }

    .questions-nav-section {
    grid-area: questions-nav-section;
    padding: 1rem;
    box-shadow: 0 7px 7px rgba(0, 0, 0, 0.1);
    border-radius: 0.5rem;
    }

    .questions-nav-section .question-nums-list {
    /* max-width: 100%; */
    display: grid;
    grid-template-columns: repeat(5, 1fr);
    grid-auto-rows: minmax(0, 1fr);
    gap: 10px;
    list-style: none;
    padding: 0;
    margin: 0;  
    } 

    .questions-nav-section .question-nums-list a {
    text-decoration: none;
    color: inherit;
    padding: 0.5rem; 
    background: #c4c4c4 ;
    border-radius: 50%;
    display: inline-block;
    width: 2.5rem; 
    height: 2.5rem;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 700;
    color: #fff;
    } 
    .questions-nav-section .question-nums-list a:hover {
    filter: brightness(0.9) 
    }
    .questions-nav-section .question-nums-list a.done { 
    background: #aabdff;
    }

    .questions-nav-section .question-nums-list a.active { 
    background: #ffaaaf;
    }

    .question-context {
    margin-bottom: 2rem;
    display: flex;
    justify-content: space-between;
    }

    .question-context a { 
    font-weight: 700;
    font-size: 0.9rem;
    text-decoration: none;
    color: inherit;
    }

    .question-context a:hover {
    color: #aabdff;
    }

    .d-flex {
    display: flex;
    justify-content: center;
    width: 100%; 
    } 
    
    @media(max-width: 50rem) {
    .container {   
        grid-template-rows: 0.1fr 1fr 1fr;
        border-radius: 0;
        position: static;
        height: 100vh;
        width: 100%; 
        top: 0%;
        left: 0%;
        transform: translate(0%, 0%);  
    }
    } 

    @media (max-width: 38rem) {
    .container {
        position: static;
        width: 100%;
        padding: 0.8rem;
        border-radius: 0;
        top: 0%;
        left: 0%;
        transform: translate(0%, 0%);

        grid-template-columns: 1fr;
        grid-template-rows: 0.1fr 1fr 1fr auto;
        grid-template-areas:
        "quiz-title"
        "questions-nav-section"
        "question-section"
        "explanation-section";
    }
    }









        /* styles.css */
        .overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 1;
        }

        .modal {
            background-color: rgb(255 255 255 / 25%);
            width: 66%;
            display: none;
            position: fixed;
            top: 50%;
            left: 52%;
            transform: translate(-50%, -50%);
            padding: 20px;
            z-index: 2;
            height: 100%;
            overflow: hidden; /* Hide any overflowing content */
        }

        .modal-content {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #fff;
            padding: 20px;
            text-align: center;
            max-height: 80%; /* Set a maximum height for the modal */
            overflow-y: auto; /* Enable vertical scrolling when content exceeds max-height */
        }

        .square-container {
            width: 200px; /* Adjust the size as needed */
            height: 200px; /* Adjust the size as needed */
            overflow: hidden; /* Clips the image inside the square */
        }

        .square-container img {
            width: 100%;
            height: 100%;
            object-fit: cover; /* Maintains the aspect ratio and covers the square */
        }

        .progress {
            margin: 10px;
            width: 700px;
        }
      </style>
  </head>
    <body class="  ">
    <!-- loader Start -->
    <div id="loading">
          <div id="loading-center">
          </div>
    </div>
    <!-- loader END -->
    <!-- Wrapper Start -->
    <div class="wrapper">
      <div class="iq-sidebar  sidebar-default  ">
          <div class="iq-sidebar-logo d-flex align-items-end justify-content-between">
               <a href="<?=site_url('dashboard')?>" class="header-logo">
                  <img src="<?=site_url('assets/images/logo.png')?>" class="img-fluid rounded-normal light-logo" alt="logo">
                  <img src="<?=site_url('assets/images/logo-dark.png"')?>" class="img-fluid rounded-normal d-none sidebar-light-img" alt="logo">
                  <span>Brilliance</span>            
              </a>
              <div class="side-menu-bt-sidebar-1">
                      <svg xmlns="http://www.w3.org/2000/svg" class="text-light wrapper-menu" width="30" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                      </svg>
                  </div>
          </div>
          <div class="data-scrollbar" data-scroll="1">
              <nav class="iq-sidebar-menu">
                  <ul id="iq-sidebar-toggle" class="side-menu">
                      <li class="active sidebar-layout">
                          <a href="<?=site_url('dashboard')?>" class="svg-icon">
                              <i class="">
                                  <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                  </svg>
                              </i>
                              <span class="ml-2">Dashboard</span>
                              <p class="mb-0 w-10 badge badge-pill badge-primary">6</p>
                          </a>
                      </li>
                      <li class="px-3 pt-3 pb-2">
                          <span class="text-uppercase small font-weight-bold">Pages</span>
                      </li>
                      <?php 
                        if ($this->Home_admin_model->access('stream')) {
                      ?>

                      <li class=" sidebar-layout">
                          <a href="<?=site_url('stream')?>" class="svg-icon">
                              <i class="">
                                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 6.878V6a2.25 2.25 0 012.25-2.25h7.5A2.25 2.25 0 0118 6v.878m-12 0c.235-.083.487-.128.75-.128h10.5c.263 0 .515.045.75.128m-12 0A2.25 2.25 0 004.5 9v.878m13.5-3A2.25 2.25 0 0119.5 9v.878m0 0a2.246 2.246 0 00-.75-.128H5.25c-.263 0-.515.045-.75.128m15 0A2.25 2.25 0 0121 12v6a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 18v-6c0-.98.626-1.813 1.5-2.122" />
                                  </svg>

                              </i><span class="ml-2">Stream</span>
                          </a>
                      </li>
                      <?php
                        }
                        if ($this->Home_admin_model->access('branch')) {
                      ?>
                      <li class=" sidebar-layout">
                          <a href="<?=site_url('branch')?>" class="svg-icon">
                              <i class="">
                                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 12h16.5m-16.5 3.75h16.5M3.75 19.5h16.5M5.625 4.5h12.75a1.875 1.875 0 010 3.75H5.625a1.875 1.875 0 010-3.75z" />
                                  </svg>

                              </i><span class="ml-2">Branch</span>
                          </a>
                      </li>
                      <?php
                        }
                      ?>

                      <?php
                        if ($this->Home_admin_model->access('course')) {
                      ?>
                      <li class=" sidebar-layout">
                          <a href="<?=site_url('course')?>" class="svg-icon">
                              <i class="">
                                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 12h16.5m-16.5 3.75h16.5M3.75 19.5h16.5M5.625 4.5h12.75a1.875 1.875 0 010 3.75H5.625a1.875 1.875 0 010-3.75z" />
                                  </svg>

                              </i><span class="ml-2">Course</span>
                          </a>
                      </li>
                      <?php
                        }
                      ?>

                      <?php
                        if ($this->Home_admin_model->access('accessManagement')) {
                      ?>                      
                      <li class=" sidebar-layout">
                          <a href="<?=site_url('access-management')?>" class="svg-icon">
                              <i class="">
                                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M7.864 4.243A7.5 7.5 0 0119.5 10.5c0 2.92-.556 5.709-1.568 8.268M5.742 6.364A7.465 7.465 0 004.5 10.5a7.464 7.464 0 01-1.15 3.993m1.989 3.559A11.209 11.209 0 008.25 10.5a3.75 3.75 0 117.5 0c0 .527-.021 1.049-.064 1.565M12 10.5a14.94 14.94 0 01-3.6 9.75m6.633-4.596a18.666 18.666 0 01-2.485 5.33" />
                                  </svg>

                              </i><span class="ml-2">Access Management</span>
                          </a>
                      </li>
                      <?php
                        }
                        if ($this->Home_admin_model->access('staff')) {
                      ?>                      
                      <li class=" sidebar-layout">
                          <a href="<?=site_url('staff')?>" class="svg-icon">
                              <i class="">
                                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0a3 3 0 00-4.681 2.72 8.986 8.986 0 003.74.477m.94-3.197a5.971 5.971 0 00-.94 3.197M15 6.75a3 3 0 11-6 0 3 3 0 016 0zm6 3a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0zm-13.5 0a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z" />
                                  </svg>


                              </i><span class="ml-2">Staff</span>
                          </a>
                      </li>
                      <?php if ($this->Home_admin_model->access('sales')) { ?>  
                        <li class="sidebar-layout">
                          <a href="#app1" class="collapsed svg-icon" data-toggle="collapse" aria-expanded="false">
                              <i>
                                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 8.25H9m6 3H9m3 6l-3-3h1.5a3 3 0 100-6M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                  </svg>

                              </i>
                              <span class="ml-2">Sales</span>
                              <svg xmlns="http://www.w3.org/2000/svg" class="svg-icon iq-arrow-right arrow-active" width="15" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                              </svg>
                          </a>
                          <ul id="app1" class="submenu collapse" data-parent="#iq-sidebar-toggle">                        
                              <?php if ($this->Home_admin_model->access('enqury-managment')) { ?>  
                              <li class=" sidebar-layout">
                                  <a href="<?=site_url('enqury-managment')?>" class="svg-icon">
                                      <i class="">
                                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 12h16.5m-16.5 3.75h16.5M3.75 19.5h16.5M5.625 4.5h12.75a1.875 1.875 0 010 3.75H5.625a1.875 1.875 0 010-3.75z" />
                                      </svg>


                                      </i><span class="">Enqury Managment</span>
                                  </a>
                              </li>
                              <?php } ?>
                          </ul>
                        </li>
                        <?php
                            }
                        ?> 
                        <?php
                            }
                            if ($this->Home_admin_model->access('students')) {
                        ?>  
                        <li class="sidebar-layout">
                          <a href="#app1" class="collapsed svg-icon" data-toggle="collapse" aria-expanded="false">
                              <i>
                                  <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" height="22" width="22" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path d="M12 14l9-5-9-5-9 5 9 5z"></path>
                                <path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222"></path>
                                </svg>
                              </i>
                              <span class="ml-2">Students</span>
                              <svg xmlns="http://www.w3.org/2000/svg" class="svg-icon iq-arrow-right arrow-active" width="15" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                              </svg>
                          </a>
                          <ul id="app1" class="submenu collapse" data-parent="#iq-sidebar-toggle">                        
                              <li class=" sidebar-layout">
                                  <a href="<?=site_url('students')?>" class="svg-icon">
                                      <i class="">
                                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 9h3.75M15 12h3.75M15 15h3.75M4.5 19.5h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5zm6-10.125a1.875 1.875 0 11-3.75 0 1.875 1.875 0 013.75 0zm1.294 6.336a6.721 6.721 0 01-3.17.789 6.721 6.721 0 01-3.168-.789 3.376 3.376 0 016.338 0z" />
                                      </svg>

                                      </i><span class="">Students</span>
                                  </a>
                              </li>
                              <li class=" sidebar-layout">
                                  <a href="<?=site_url('students-bulk')?>" class="svg-icon">
                                      <i class="">
                                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zM4 19.235v-.11a6.375 6.375 0 0112.75 0v.109A12.318 12.318 0 0110.374 21c-2.331 0-4.512-.645-6.374-1.766z" />
                                      </svg>

                                      </i><span class="">Add Bulk Student</span>
                                  </a>
                              </li>
                          </ul>
                        </li>
                        <?php
                            }
                        ?>  

                        <?php
                            if ($this->Home_admin_model->access('academic')) {
                        ?>  
                        <li class="sidebar-layout">
                          <a href="#academic" class="collapsed svg-icon" data-toggle="collapse" aria-expanded="false">
                              <i>
                                  <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" height="22" width="22" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path d="M12 14l9-5-9-5-9 5 9 5z"></path>
                                <path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222"></path>
                                </svg>
                              </i>
                              <span class="ml-2">academic</span>
                              <svg xmlns="http://www.w3.org/2000/svg" class="svg-icon iq-arrow-right arrow-active" width="15" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                              </svg>
                          </a>
                          <ul id="academic" class="submenu collapse" data-parent="#iq-sidebar-toggle">
                              <li class=" sidebar-layout">
                                  <a href="<?=site_url('academic')?>" class="svg-icon">
                                      <i class="">
                                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 9h3.75M15 12h3.75M15 15h3.75M4.5 19.5h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5zm6-10.125a1.875 1.875 0 11-3.75 0 1.875 1.875 0 013.75 0zm1.294 6.336a6.721 6.721 0 01-3.17.789 6.721 6.721 0 01-3.168-.789 3.376 3.376 0 016.338 0z" />
                                      </svg>

                                      </i><span class="">Subject</span>
                                  </a>
                              </li>
                              <li class=" sidebar-layout">
                                  <a href="<?=site_url('questions')?>" class="svg-icon">
                                      <i class="">
                                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                                      </svg>
                                      </i><span class="">Questions</span>
                                  </a>
                              </li>
                              <li class=" sidebar-layout">
                                  <a href="<?=site_url('academic')?>" class="svg-icon">
                                      <i class="">
                                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 9h3.75M15 12h3.75M15 15h3.75M4.5 19.5h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5zm6-10.125a1.875 1.875 0 11-3.75 0 1.875 1.875 0 013.75 0zm1.294 6.336a6.721 6.721 0 01-3.17.789 6.721 6.721 0 01-3.168-.789 3.376 3.376 0 016.338 0z" />
                                      </svg>

                                      </i><span class="">Academic</span>
                                  </a>
                              </li>
                              <li class=" sidebar-layout">
                                  <a href="<?=site_url('academic-bulk')?>" class="svg-icon">
                                      <i class="">
                                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zM4 19.235v-.11a6.375 6.375 0 0112.75 0v.109A12.318 12.318 0 0110.374 21c-2.331 0-4.512-.645-6.374-1.766z" />
                                      </svg>

                                      </i><span class="">Add Bulk</span>
                                  </a>
                              </li>
                          </ul>
                        </li>
                        <?php
                            }
                        ?> 

                        <?php
                            if ($this->Home_admin_model->access('quiz')) {
                        ?>  
                        <li class="sidebar-layout">
                          <a href="#quiz" class="collapsed svg-icon" data-toggle="collapse" aria-expanded="false">
                              <i>
                                  <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" height="22" width="22" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path d="M12 14l9-5-9-5-9 5 9 5z"></path>
                                <path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222"></path>
                                </svg>
                              </i>
                              <span class="ml-2">Quiz</span>
                              <svg xmlns="http://www.w3.org/2000/svg" class="svg-icon iq-arrow-right arrow-active" width="15" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                              </svg>
                          </a>
                          <ul id="quiz" class="submenu collapse" data-parent="#iq-sidebar-toggle">                        
                                <li class=" sidebar-layout">
                                  <a href="<?=site_url('Quiz-Master')?>" class="svg-icon">
                                      <i class="">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.324.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 011.37.49l1.296 2.247a1.125 1.125 0 01-.26 1.431l-1.003.827c-.293.24-.438.613-.431.992a6.759 6.759 0 010 .255c-.007.378.138.75.43.99l1.005.828c.424.35.534.954.26 1.43l-1.298 2.247a1.125 1.125 0 01-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.57 6.57 0 01-.22.128c-.331.183-.581.495-.644.869l-.213 1.28c-.09.543-.56.941-1.11.941h-2.594c-.55 0-1.02-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 01-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 01-1.369-.49l-1.297-2.247a1.125 1.125 0 01.26-1.431l1.004-.827c.292-.24.437-.613.43-.992a6.932 6.932 0 010-.255c.007-.378-.138-.75-.43-.99l-1.004-.828a1.125 1.125 0 01-.26-1.43l1.297-2.247a1.125 1.125 0 011.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.087.22-.128.332-.183.582-.495.644-.869l.214-1.281z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg>
                                      </i><span class="">Quiz Settings</span>
                                  </a>
                              </li>
                              <li class=" sidebar-layout">
                                  <a href="<?=site_url('quiz-request')?>" class="svg-icon">
                                      <i class="">
                                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 9h3.75M15 12h3.75M15 15h3.75M4.5 19.5h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5zm6-10.125a1.875 1.875 0 11-3.75 0 1.875 1.875 0 013.75 0zm1.294 6.336a6.721 6.721 0 01-3.17.789 6.721 6.721 0 01-3.168-.789 3.376 3.376 0 016.338 0z" />
                                      </svg>

                                      </i><span class="">Quiz Request</span>
                                  </a>
                              </li>
                          </ul>
                        </li>
                        <?php
                            }
                        ?>   
                  </ul>
              </nav>
              <div class="pt-5 pb-5"></div>
          </div>
      </div>
       <div class="iq-top-navbar">
          <div class="iq-navbar-custom">
              <nav class="navbar navbar-expand-lg navbar-light p-0">
                  <div class="side-menu-bt-sidebar">
                      <svg xmlns="http://www.w3.org/2000/svg" class="text-secondary wrapper-menu" width="30" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                      </svg>
                  </div>
                  <div class="d-flex align-items-center">
                      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"  aria-label="Toggle navigation">
                          <svg xmlns="http://www.w3.org/2000/svg" class="text-secondary" width="30" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                          </svg>
                      </button>
                      <div class="collapse navbar-collapse" id="navbarSupportedContent">
                          <ul class="navbar-nav ml-auto navbar-list align-items-center">
                              <li class="nav-item nav-icon dropdown"> 
                                  <a href="#" class="search-toggle dropdown-toggle" id="notification-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                                      <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" class="h-6 w-6 text-secondary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                                      </svg>
                                      <span class="bg-primary"></span>
                                  </a>
                                  <div class="iq-sub-dropdown dropdown-menu" aria-labelledby="notification-dropdown">
                                      <div class="card shadow-none m-0 border-0">
                                          <div class="p-3 card-header-border">
                                              <h6 class="text-center">
                                                  Notifications
                                              </h6>
                                          </div>
                                          <div class="card-body overflow-auto card-header-border p-0 card-body-list" style="max-height: 500px;">                                        
                                              <ul class="dropdown-menu-1 overflow-auto list-style-1 mb-0">
                                                  <li class="dropdown-item-1 float-none p-3">
                                                      <div class="list-item d-flex justify-content-start align-items-start">
                                                          <div class="avatar">
                                                              <div class="avatar-img avatar-danger avatar-20">
                                                                  <span>
                                                                      <svg class="icon line" width="30" height="30" id="cart-alt1" stroke="white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M3,3H5.32a1,1,0,0,1,.93.63L10,13,8.72,15.55A1,1,0,0,0,9.62,17H19" style="fill: none;stroke-linecap: round; stroke-linejoin: round; stroke-width: 2;"></path><polyline points="10 13 18.2 13 21 6" style="fill: none;stroke-linecap: round; stroke-linejoin: round; stroke-width: 2;"></polyline><line x1="20.8" y1="6" x2="7.2" y2="6" style="fill: none;stroke-linecap: round; stroke-linejoin: round; stroke-width: 2;"></line><circle cx="10.5" cy="20.5" r="0.5" style="fill: none;stroke-miterlimit: 10; stroke-width: 2;"></circle><circle cx="16.5" cy="20.5" r="0.5" style="fill: none;stroke-miterlimit: 10; stroke-width: 2;"></circle></svg>
                                                                  </span>
                                                              </div>
                                                          </div>
                                                          <div class="list-style-detail ml-2 mr-2">
                                                              <h6 class="font-weight-bold">Your order is placed</h6>
                                                              <p class="m-0">
                                                                  <small class="text-secondary">If several languages coalesce</small>
                                                              </p>
                                                              <p class="m-0">
                                                                  <small class="text-secondary">
                                                                      <svg xmlns="http://www.w3.org/2000/svg" class="text-secondary mr-1" width="15" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                                      </svg>
                                                                  3 hours ago</small>
                                                              </p>
                                                          </div>
                                                      </div>                                                
                                                  </li>
                                                   <li class="dropdown-item-1 float-none p-3">
                                                       <div class="list-item d-flex justify-content-start align-items-start">
                                                           <div class="avatar">
                                                              <div class="avatar-img avatar-success avatar-20">
                                                                  <span><img class="avatar is-squared rounded-circle" src="<?=site_url('assets/images/user/2.jpg"')?>" alt="2.jpg"></span>
                                                              </div>
                                                          </div>
                                                          <div class="list-style-detail ml-2 mr-2">
                                                              <h6 class="font-weight-bold">New message form cate</h6>
                                                              <p class="m-0">
                                                                  <small class="text-secondary">You have 3 unreded messages</small>
                                                              </p>
                                                              <p class="m-0">
                                                                  <small class="text-secondary">
                                                                      <svg xmlns="http://www.w3.org/2000/svg" class="text-secondary mr-1" width="15" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                                      </svg>
                                                                      5 hours ago</small>
                                                              </p>
                                                          </div>
                                                       </div>                                                
                                                  </li>
                                                   <li class="dropdown-item-1 float-none p-3">
                                                       <div class="list-item d-flex justify-content-start align-items-start">
                                                           <div class="avatar">
                                                              <div class="avatar-img avatar-warning avatar-20">
                                                              <span>
                                                                  <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="30" height="30" stroke="white" id="Capa_1" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
                                                                  <g>
                                                                      <g>
                                                                          <path d="M386.689,304.403c-35.587,0-64.538,28.951-64.538,64.538s28.951,64.538,64.538,64.538    c35.593,0,64.538-28.951,64.538-64.538S422.276,304.403,386.689,304.403z M386.689,401.21c-17.796,0-32.269-14.473-32.269-32.269    c0-17.796,14.473-32.269,32.269-32.269c17.796,0,32.269,14.473,32.269,32.269C418.958,386.738,404.485,401.21,386.689,401.21z"/>
                                                                      </g>
                                                                  </g>
                                                                  <g>
                                                                      <g>
                                                                          <path d="M166.185,304.403c-35.587,0-64.538,28.951-64.538,64.538s28.951,64.538,64.538,64.538s64.538-28.951,64.538-64.538    S201.772,304.403,166.185,304.403z M166.185,401.21c-17.796,0-32.269-14.473-32.269-32.269c0-17.796,14.473-32.269,32.269-32.269    c17.791,0,32.269,14.473,32.269,32.269C198.454,386.738,183.981,401.21,166.185,401.21z"/>
                                                                      </g>
                                                                  </g>
                                                                  <g>
                                                                      <g>
                                                                          <path d="M430.15,119.675c-2.743-5.448-8.32-8.885-14.419-8.885h-84.975v32.269h75.025l43.934,87.384l28.838-14.5L430.15,119.675z"/>
                                                                      </g>
                                                                  </g>
                                                                  <g>
                                                                      <g>
                                                                          <rect x="216.202" y="353.345" width="122.084" height="32.269"/>
                                                                      </g>
                                                                  </g>
                                                                  <g>
                                                                      <g>
                                                                          <path d="M117.781,353.345H61.849c-8.912,0-16.134,7.223-16.134,16.134c0,8.912,7.223,16.134,16.134,16.134h55.933    c8.912,0,16.134-7.223,16.134-16.134C133.916,360.567,126.693,353.345,117.781,353.345z"/>
                                                                      </g>
                                                                  </g>
                                                                  <g>
                                                                      <g>
                                                                          <path d="M508.612,254.709l-31.736-40.874c-3.049-3.937-7.755-6.239-12.741-6.239H346.891V94.655    c0-8.912-7.223-16.134-16.134-16.134H61.849c-8.912,0-16.134,7.223-16.134,16.134s7.223,16.134,16.134,16.134h252.773v112.941    c0,8.912,7.223,16.134,16.134,16.134h125.478l23.497,30.268v83.211h-44.639c-8.912,0-16.134,7.223-16.134,16.134    c0,8.912,7.223,16.134,16.134,16.134h60.773c8.912,0,16.134-7.223,16.135-16.134V264.605    C512,261.023,510.806,257.538,508.612,254.709z"/>
                                                                      </g>
                                                                  </g>
                                                                  <g>
                                                                      <g>
                                                                          <path d="M116.706,271.597H42.487c-8.912,0-16.134,7.223-16.134,16.134c0,8.912,7.223,16.134,16.134,16.134h74.218    c8.912,0,16.134-7.223,16.134-16.134C132.84,278.82,125.617,271.597,116.706,271.597z"/>
                                                                      </g>
                                                                  </g>
                                                                  <g>
                                                                      <g>
                                                                          <path d="M153.815,208.134H16.134C7.223,208.134,0,215.357,0,224.269s7.223,16.134,16.134,16.134h137.681    c8.912,0,16.134-7.223,16.134-16.134S162.727,208.134,153.815,208.134z"/>
                                                                      </g>
                                                                  </g>
                                                                  <g>
                                                                      <g>
                                                                          <path d="M180.168,144.672H42.487c-8.912,0-16.134,7.223-16.134,16.134c0,8.912,7.223,16.134,16.134,16.134h137.681    c8.912,0,16.134-7.223,16.134-16.134C196.303,151.895,189.08,144.672,180.168,144.672z"/>
                                                                      </g>
                                                                  </g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g> </svg>
                                                              </span>
                                                              </div>
                                                          </div>
                                                          <div class="list-style-detail ml-2 mr-2">
                                                              <h6 class="font-weight-bold">Your item is shipped</h6>
                                                              <p class="m-0">
                                                                  <small class="text-secondary">You got new order of goods</small>
                                                              </p>
                                                              <p class="m-0">
                                                                  <small class="text-secondary">
                                                                      <svg xmlns="http://www.w3.org/2000/svg" class="text-secondary mr-1" width="15" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                                      </svg>
                                                                      5 hours ago</small>
                                                              </p>
                                                          </div>
                                                       </div>                                                
                                                  </li>
                                              </ul>
                                          </div>
                                          <div class="card-footer text-muted p-3">
                                              <p class="mb-0 text-primary text-center font-weight-bold">Show all notifications</p>
                                          </div>
                                      </div>
                                  </div>
                              </li>                        
                              
                              <li class="nav-item nav-icon search-content">
                                  <a href="#" class="search-toggle rounded" id="dropdownSearch" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                      <svg class="svg-icon text-secondary" id="h-suns" height="25" width="25" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                      </svg>
                                  </a>
                                  <div class="iq-search-bar iq-sub-dropdown dropdown-menu" aria-labelledby="dropdownSearch">
                                      <form action="#" class="searchbox p-2">
                                          <div class="form-group mb-0 position-relative">
                                          <input type="text" class="text search-input font-size-12" placeholder="type here to search...">
                                          <a href="#" class="search-link">
                                              <svg xmlns="http://www.w3.org/2000/svg" class="" width="20" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                              </svg>
                                          </a> 
                                          </div>
                                      </form>
                                  </div>
                              </li>
                              <li class="nav-item nav-icon dropdown">
                                  <a href="#" class="nav-item nav-icon dropdown-toggle pr-0 search-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                                      <img src="<?=site_url('assets/images/user/1.jpg')?>" class="img-fluid avatar-rounded" alt="user">
                                      <span class="mb-0 ml-2 user-name"><?=$this->session->userdata('first_name')?></span>
                                  </a>
                                  <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                      <li class="dropdown-item d-flex svg-icon">
                                          <svg class="svg-icon mr-0 text-secondary" id="h-01-p" width="20" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                          </svg>
                                          <a href="../app/user-profile.html">My Profile</a>
                                      </li>
                                      <li class="dropdown-item d-flex svg-icon">
                                          <svg class="svg-icon mr-0 text-secondary" id="h-02-p" width="20" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                          </svg>
                                          <a href="../app/user-profile-edit.html">Edit Profile</a>
                                      </li>
                                      <li class="dropdown-item d-flex svg-icon">
                                          <svg class="svg-icon mr-0 text-secondary" id="h-03-p" width="20" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                          </svg>
                                          <a href="../app/user-account-setting.html">Account Settings</a>
                                      </li>
                                      <li class="dropdown-item d-flex svg-icon">
                                          <svg class="svg-icon mr-0 text-secondary" id="h-04-p" width="20" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                          </svg>
                                          <a href="../app/user-privacy-setting.html">Privacy Settings</a>
                                      </li>
                                      <li class="dropdown-item  d-flex svg-icon border-top">
                                          <svg class="svg-icon mr-0 text-secondary" id="h-05-p" width="20" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                          </svg>
                                          <a href="<?=site_url('logout')?>">Logout</a>
                                      </li>
                                  </ul>
                              </li>
                          </ul>                     
                      </div> 
                  </div>
              </nav>
          </div>
      </div>
      <div class="content-page">