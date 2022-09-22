<?php
session_start();
if(empty($_SESSION['SiteUser'])){
	header('location:index.php');
} ?>

<?php 
require_once('inc/config.php');
require_once('inc/header.php');
require_once('template-parts/logo_menu_1.php');
?>

<div class="dashboard__overlay">
    <div class="dashboard__image"></div>
</div>
<section class="dashboard">
    <div class="container">
        <div class="dashboard__header">
            <div class="dashboard__logo">
                <img src="slicing/img/logo.png" alt="logo">
            </div>
            <div class="dashboard-nav">

                <ul class="dashboard-nav__list">
                    <li class="dashboard-nav__item">
                        <a href="dashboard.php" class="dashboard-nav__link">dashboard</a>
                    </li>
                    <li class="dashboard-nav__item main">
                        <a href="#" class="dashboard-nav__link">Employers</a>
                        <i class="fas fa-sort-down"></i>
                        <div class="dashboard-nav__dropdown">
                            <a href="talent-services.php">Talent</a>
                            <a href="#">jobs</a>
                        </div>
                    </li>
                    <li class="dashboard-nav__item">
                        <a href="#" class="dashboard-nav__link">finances</a>
                    </li>
                    <li class="dashboard-nav__item">
                        <a href="#" class="dashboard-nav__link">reports</a>
                    </li>
                </ul>

                <div class="dashboard-nav__search">
                    <form action="" method="POST" class="dashboard__search">
                        <button class="dashboard__search-btn"><i class="fas fa-search"></i></button>
                        <input type="text" name="" placeholder="SEARCH..." class="dashboard__search-input" />
                    </form>
                </div>

            </div>

            <div class="dashboard__user-nav">
                <div class="dashboard__notification">
                    <div class="dashboard__notification-icon">
                        <i class="far fa-bell"></i>
                    </div>
                    <span class="dashboard__notification-count">0</span>
                </div>
                <div class="dashboard__notification">
                    <div class="dashboard__notification-icon">
                        <i class="far fa-envelope"></i>
                    </div>
                    <span class="dashboard__notification-count">0</span>
                </div>
                <div class="dashboard-user">
                    <a href="#" class="dashboard-user__link"><?php echo $_SESSION['SiteUser']['first_name'].' '.$_SESSION['SiteUser']['last_name'] ?></a>
                    <i class="fas fa-sort-down"></i>
                    <div class="dashboard-user__dropdown">
                        <div class="dashboard-user__item"><a href="#">settings</a></div>
                        <div class="dashboard-user__item"><a href="logout.php">log out</a></div>
                    </div>
                </div>
                <div class="dashboard__user-icon">

                </div>
            </div>
        </div>

        <div class="dashboard__menu">
            <div class="modal-overlay"></div>

            <div class="dashboard__burger">
                <i class="fas fa-bars"></i>
            </div>

            <div class="dashboard__burger-menu">
                <ul class="burger-menu__list">
                    <li class="burger-menu__item">
                        <a href="" class="burger-menu__link">Add new talent</a>
                    </li>
                    <li class="burger-menu__item">
                        <a href="" class="burger-menu__link">add new employer</a>
                    </li>
                    <li class="burger-menu__item">
                        <a href="" class="burger-menu__link">add new job</a>
                    </li>
                    <li class="burger-menu__item">
                        <a href="" class="burger-menu__link">new message</a>
                    </li>
                    <li class="burger-menu__item">
                        <a href="" class="burger-menu__link">manual payment</a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="dashboard__main-block">
            <div class="dashboard__full-block">
                <div class="dashboard-info">
                    <div class="dashboard-info__employer">
                        <div class="full-list-table">
                            <ul class="dashboard-info__menu">
                                <li class="dashboard-info__title col1">
                                    <label class="form__checkbox">
                                        <input type="checkbox" id="all-talents" />
                                        <span class="main-checkbox"></span>
                                    </label>
                                </li>
                                <li class="dashboard-info__title col2">
                                    <p>company</p>
                                </li>
                                <li class="dashboard-info__title col3">
                                    <p>vacancies</p>
                                    <span class="dashboard-info__title-coment">open/filled/closed</span>
                                </li>
                                <li class="dashboard-info__title col4">
                                    <p>email</p>
                                </li>
                                <li class="dashboard-info__title col5">
                                    <p>phone</p>
                                </li>
                                <li class="dashboard-info__title col6">
                                    <p>type</p>
                                </li>
                                <li class="dashboard-info__title col7">
                                    <p>job type</p>
                                </li>
                                <li class="dashboard-info__title col8">
                                    <p>location</p>
                                </li>
                                <li class="dashboard-info__title col9">
                                    <p>size of company</p>
                                </li>
                                <li class="dashboard-info__title col10">
                                    <p>actions</p>
                                </li>


                            </ul>
                            <ul class="dashboard-info__list">
                                <?php  
								$query = "SELECT * FROM user WHERE role = 'employer'";
								$result = mysqli_query($SiteConn, $query);
								while($row = mysqli_fetch_array($result)){ ?>
								
								<li class="dashboard-info__item">                                    
                                    <div class="dashboard-info__item-text col1">
                                        <label class="form__checkbox">
                                            <input type="checkbox" class="this-talent" />
                                            <span class="main-checkbox"></span>
                                        </label>
                                    </div>
                                    <div class="dashboard-info__item-text col2">
                                        <p><?php echo $row["employer_company_name"]; ?></p>
                                    </div>
                                    <div class="dashboard-info__employer-box">
                                        <div class="dashboard-info__item-text col3">
                                            <p class="dashboard-info__vacany-links"><a href="#">10</a>&nbsp;/&nbsp;<a href="#">5</a>&nbsp;/&nbsp;<a href="#">1</a> </p>
                                        </div>
                                        <div class="dashboard-info__item-text col4">
                                            <p class="dashboard-info__email" title='<?php echo $row["useremail"]; ?>'><?php echo $row["useremail"]; ?>>
                                            </p>
                                        </div>
                                        <div class="dashboard-info__item-text col5">
                                            <p><?php echo $row["phone"]; ?></p>
                                        </div>
                                        <div class="dashboard-info__item-text col6">
                                            <p>Oil/Gas Industry</p>
                                        </div>
                                        <div class="dashboard-info__item-text col7">
                                            <p>Front-end, <br> Back-end</p>
                                        </div>
                                        <div class="dashboard-info__item-text col8">
                                            <p><?php echo $row["employer_country"]; ?><br>
													<?php echo $row["employer_city"]; ?> 
                                               </p>
                                        </div>
                                        <div class="dashboard-info__item-text col9">
                                            <p><?php echo $row["employer_employ_count"]; ?></p>
                                        </div>
                                        <div class="dashboard-info__item-text col10">
                                            <div class="select-action">
                                                <span class="select-action__indicator"></span>
                                                <div class="select-action__button">
                                                    <p>select</p>
                                                    <i class="fas fa-sort-down"></i>
                                                </div>
                                                <div class="select-action__dropdown">
                                                    <ul class="select-action__list" data-order="1">
                                                        <li class="select-action__item" data-action="view">
                                                            <a href="" class="select-action__link">View profile</a>
                                                        </li>
                                                        <li class="select-action__item" data-action="approve">
                                                            <a href="" class="select-action__link">Approve profile</a>
                                                        </li>
                                                        <li class="select-action__item" data-action="suspend">
                                                            <a href="" class="select-action__link">suspend profile</a>
                                                        </li>
                                                        <li class="select-action__item" data-action="message">
                                                            <a href="" class="select-action__link">quick message</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
								<?php } ?>
								
                            </ul>
                        </div>

                        <div class="full-list-nav">
                            <div class="full-list-nav__pages">
                                <!--<div class="page-arrow">
                                    <i class="fas fa-angle-double-left"></i>
                                </div>
                                <div class="page-arrow">
                                    <i class="fas fa-angle-left"></i>
                                </div>
                                <div class="page-number active">
                                    <p>1</p>
                                </div>
                                <div class="page-number">
                                    <p>2</p>
                                </div>
                                <div class="page-number">
                                    <p>3</p>
                                </div>
                                <div class="page-number">
                                    <p>4</p>
                                </div>
                                <div class="page-number">
                                    <p>5</p>
                                </div>
                                <div class="page-points">
                                    <p>...</p>
                                </div>
                                <div class="page-number">
                                    <p>13</p>
                                </div>
                                <div class="page-number">
                                    <p>14</p>
                                </div>
                                <div class="page-number">
                                    <p>15</p>
                                </div>
                                <div class="page-number">
                                    <p>16</p>
                                </div>
                                <div class="page-arrow">
                                    <i class="fas fa-angle-right"></i>
                                </div>
                                <div class="page-arrow">
                                    <i class="fas fa-angle-double-right"></i>
                                </div>-->

                            </div>
                            <div class="ull-list-nav__all">
                                <div class="full-list-nav__button">
                                    <p>rows per page</p>
                                    <i class="fas fa-sort-down"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require_once('inc/footer.php') ?>