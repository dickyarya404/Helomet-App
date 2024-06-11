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
                        ($this->uri->segment(1)=='c_instructor' and $this->uri->segment(2) == '')
                        {
                        echo "active";
                        }?> " href="<?= base_url('c_instructor') ?>" aria-expanded="false"><i data-feather="home"
                            class="feather-icon"></i><span class="hide-menu">Dashboard</span>
                    </a>
                </li>

                <li class="list-divider"></li>


                <li class="nav-small-cap"><span class="hide-menu">Function</span></li>

                <li class="sidebar-item"> <a class="sidebar-link <?php if 
                        ($this->uri->segment(1)=='c_instructor' and $this->uri->segment(2) == 'profile')
                        {
                        echo "active";
                        }?> " href="<?= base_url('c_instructor/profile') ?>" aria-expanded="false"><i data-feather="user"
                            class="feather-icon"></i><span class="hide-menu">Profile
                        </span></a>
                </li>
                <li class="sidebar-item"> <a class="sidebar-link sidebar-link <?php if 
                        ($this->uri->segment(1)=='c_instructor' and $this->uri->segment(2) == 'report')
                        {
                        echo "active";
                        }?> " href="<?= base_url('c_instructor/report') ?>" aria-expanded="false"><i
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
    <!-- <div class="page-breadcrumb">
        <div class="row">
            <div class="col-7 align-self-center">
                <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Basic Initialisation</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item"><a href="index.html" class="text-muted">Home</a></li>
                            <li class="breadcrumb-item text-muted active" aria-current="page">Library</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="col-5 align-self-center">
                <div class="customize-input float-right">
                    <select
                        class="custom-select custom-select-set form-control bg-white border-0 custom-shadow custom-radius">
                        <option selected>Aug 19</option>
                        <option value="1">July 19</option>
                        <option value="2">Jun 19</option>
                    </select>
                </div>
            </div>
        </div>
    </div> -->
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
