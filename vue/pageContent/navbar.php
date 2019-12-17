<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
    <a class="navbar-brand" href="?action=publicPage" style="font-size: 25px;"><span class="fas fa-newspaper"></span> Le Blog</a>
    <div class="collapse navbar-collapse">
        <ul class="navbar-nav mr-auto">

        <ul class="navbar-nav ml-auto">

            <?php if($_SESSION==null):?>
                <li class="nav-item">
                <a  class="fas fa-sign-in-alt nav-link" style="font-size: 30px;" href="?action=loginPage" title="Se connecter"></a>
            </li>
            <?php else:?>
            <li class="nav-item">
                <a class="fas fa-sign-out-alt nav-link" style="font-size: 30px;" href="?action=logout" title="Se déconnecter"></a>
            </li>

            <li class="nav-item">
                <a class="navbar-brand" href="?action=panelAdmin" style="font-size: 25px;"><span class="fas fa-newspaper"></span> Gestion News</a>
            </li>
            <?php endif; ?>
        </ul>
    </div>
</nav>
