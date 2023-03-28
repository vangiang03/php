<div class="d-flex" id="wrapper">
    <!-- Sidebar-->
    <div class="border-end bg-white" id="sidebar-wrapper">
        <div class="sidebar-heading border-bottom bg-light">
            <img style="width:30px;border-radius:50%;margin:0px 5px 0px 0px"src="image/<?php echo $_SESSION['img']?>"/>
            <?php echo $_SESSION['name']?>
        </div>
        <div class="list-group list-group-flush">
            <a class="list-group-item list-group-item-action list-group-item-light p-3" href="index.php?cmd=account">Quản lý tài khoản</a>
            <a class="list-group-item list-group-item-action list-group-item-light p-3" href="index.php?cmd=product">Quản lý sản phẩm</a>
            <a class="list-group-item list-group-item-action list-group-item-light p-3" href="index.php?cmd=news">Quản lý tin tức</a>
            <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#!">Quản lý danh mục sản phẩm</a>
            <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#!">Quản lý danh mục tin tức</a>
            <a class="list-group-item list-group-item-action list-group-item-light p-3" href="index.php?cmd=logout">Logout</a>
        </div>
    </div>
    <!-- Page content wrapper-->
    <div id="page-content-wrapper">
        <!-- Top navigation-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
            <div class="container-fluid">
                <button class="btn btn-primary" id="sidebarToggle"><i class="fa fa-caret-left"></i></button>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                        <li class="nav-item active"><a class="nav-link" href="index.php"><i class="fa fa-home"></i></a></li>
                        <li class="nav-item"><a class="nav-link" href="index.php?cmd=<?php echo $cmd?>&action=add">Tạo mới</a></li>
                        <li class="nav-item"><a class="nav-link" href="#!">Tìm kiếm</a></li>
                        <li class="nav-item"><a class="nav-link" href="#!">Logout</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#!">Tài khoản của tôi</a>
                                <a class="dropdown-item" href="#!">Another action</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#!">Something else here</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Page content-->
    