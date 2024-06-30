<nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4">
    <a class="navbar-brand" href="admin.php">Admin Panel</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link <?php echo $tab == 'berita' ? 'active' : ''; ?>" href="admin.php?tab=berita">Berita</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php echo $tab == 'pertanyaan' ? 'active' : ''; ?>" href="admin.php?tab=pertanyaan">Pertanyaan</a>
            </li>
            <li class="nav-item">
                <form method="POST" action="" class="form-inline">
                    <button type="submit" name="logout" class="btn btn-primary nav-link">Logout</button>
                </form>
            </li>
        </ul>
    </div>
</nav>
