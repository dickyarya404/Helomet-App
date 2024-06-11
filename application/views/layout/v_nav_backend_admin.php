<!-- ============================================================== -->
<!-- Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
<aside class="left-sidebar" data-sidebarbg="skin6">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar" data-sidebarbg="skin6">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">

                <li class="sidebar-item">
                    <a class="sidebar-link sidebar-link <?php if 
                        ($this->uri->segment(1)=='c_admin' and $this->uri->segment(2) == '')
                        {
                        echo "active";
                        }?> " href="<?= base_url('c_admin') ?>" aria-expanded="false"><i data-feather="home"
                            class="feather-icon"></i><span class="hide-menu">Dashboard</span>
                    </a>
                </li>

                <li class="list-divider"></li>


                <li class="nav-small-cap"><span class="hide-menu">Function</span></li>

                <li class="sidebar-item"> <a class="sidebar-link <?php if 
                        ($this->uri->segment(1)=='c_user' and $this->uri->segment(2) == '')
                        {
                        echo "active";
                        }?> " href="<?= base_url('c_user') ?>" aria-expanded="false"><i data-feather="user-plus"
                            class="feather-icon"></i><span class="hide-menu">User
                        </span></a>
                </li>
                <li class="sidebar-item"> <a class="sidebar-link sidebar-link <?php if 
                        ($this->uri->segment(1)=='c_report' and $this->uri->segment(2) == 'admin_report')
                        {
                        echo "active";
                        }?> " href="<?= base_url('c_report/admin_report') ?>" aria-expanded="false"><i
                            data-feather="file-text" class="feather-icon"></i><span class="hide-menu">Helmet Report
                        </span></a>
                </li>



            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
<!-- ============================================================== -->
<!-- End Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->

<!-- ============================================================== -->
<!-- Page wrapper  -->
<!-- ============================================================== -->
<div class="page-wrapper">
    
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
