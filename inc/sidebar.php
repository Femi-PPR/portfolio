<?php
if (!isset($currentPage)) {
    $currentPage = 'index';
}

$isAboutPage = $currentPage === 'about';
$isIndexPage = $currentPage === 'index';
$isSchemePage = $currentPage === 'scheme';
$isExamplePage = $currentPage === 'examples';

?>

<div class="sidebar">
    <div class="sidebar-content">
        <div class="initials"><a href="index.php" class="initials-link closing-link">
                <h1>FO</h1>
            </a></div>
        <nav>
            <ul class="nav-side">
                <li class="nav-item-side"><a href="<?= $isAboutPage ? '#' : 'about.php' ?>"
                        class="nav-link-side <?= $isAboutPage ? '' : 'closing-link' ?>">About Me</a>
                </li>
                <li class="nav-item-side"><a href="<?= $isIndexPage ? '#' : 'index.php#' ?>portfolio"
                        class="nav-link-side <?= $isIndexPage ? '' : 'closing-link' ?>">My
                        Portfolio</a></li>
                <li class="nav-item-side"><a href="<?= $isExamplePage ? '#' : 'examples.php' ?>"
                        class="nav-link-side <?= $isExamplePage ? '' : 'closing-link' ?>">Coding
                        Examples</a></li>
                <li class="nav-item-side"><a href="<?= $isSchemePage ? '#' : 'scheme.php' ?>"
                        class="nav-link-side <?= $isSchemePage ? '' : 'closing-link' ?>">SCS
                        Scheme</a></li>
                <li class="nav-item-side"><a href="<?= $currentPage === 'index' ? '#' : 'index.php#' ?>contact"
                        class="nav-link-side <?= $isIndexPage ? '' : 'closing-link' ?>">Contact
                        Me</a></li>
            </ul>
        </nav>
        <div class="socials">
            <a href="https://www.linkedin.com/in/femi-o-19aa37214/" class="socials-link" target="_blank"><i
                    class="fa-linkedin"></i></a>
            <a href="https://github.com/Femi-PPR" class="socials-link" target="_blank"><i class="fa-github"></i></a>
        </div>
    </div>
</div>
<div class="sidebar-pullout"><span class="sidebar-arrow"></span></div>