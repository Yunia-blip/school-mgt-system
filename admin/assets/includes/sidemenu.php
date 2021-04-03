

<div class="app-sidebar sidebar-shadow">
    <div class="app-header__logo">
        <div class="logo-src"></div>
        <div class="header__pane ml-auto">
            <div>
                <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
            </div>
        </div>
    </div>
    <div class="app-header__mobile-menu">
        <div>
            <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </button>
        </div>
    </div>
    <div class="app-header__menu">
        <span>
            <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                <span class="btn-icon-wrapper">
                    <i class="pe-7s-ellipsis-v fa-w-6"></i>
                </span>
            </button>
        </span>
    </div>    <div class="scrollbar-sidebar">
        <div class="app-sidebar__inner">
            <ul class="vertical-nav-menu">
                <li class="app-sidebar__heading">Dashboard</li>
                <li>
                    <a href="index.php" class="mm-active">
                        <i class="metismenu-icon pe-7s-rocket"></i>
                        Dashboard
                    </a>
                </li>
                <li class="app-sidebar__heading">Course Details</li>
                <li>
                    <a href="pi.php">
                        <i class="metismenu-icon pe-7s-user"></i>
                        Fees information             </a>
                </li>
                

                <li>
                    <?php
                    $query = "SELECT fname FROM students WHERE fk_user_id=".$_SESSION['id'] ." ORDER BY id DESC LIMIT 1";
                    $results = mysqli_query($db, $query);
                     $fname="";
                    if (mysqli_num_rows($results) >0) {
                        while ($row = mysqli_fetch_assoc($results)) {
                            $fname=$row['fname'];
                        }
                    }
                    ?>
                <a target="_blank" href = "../home.php/<?=$fname;?>">
                        <i class="metismenu-icon pe-7s-laptop"></i>
                        View Business Site    </a>
                </li>
                           
                        
                
            </ul>
        </div>
    </div>
</div>