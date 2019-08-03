<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{asset('assets/dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Alexander Pierce</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
   
        <li>
          <a href="{{url('administrator')}}">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green">Hot</small>
            </span>
          </a>
        </li>   
        <li class="header">LABELS</li>
        <li><a href="{{url('administrator/posts')}}"><i class="fa fa-circle-o text-red"></i> <span>Posts</span></a></li>
        <li><a href="{{url('administrator/products')}}"><i class="fa fa-circle-o text-yellow"></i> <span>Products</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Services</span></a></li>
        
        <li class="header">MARKET SETTINGS</li>
        <li class="treeview notifications-menu">
          <a href="#">
            <span class="sidebarMenu"><i class="fa fa-list"></i>
            Category</span>
            <!-- <span class="label label-success">0</span> -->
            <span class="pull-right-container sidebarMenu">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <!-- <li><a href="#"><i class="fa fa-eye"></i>View alert</a></li> -->
            <li><a href="{{url('administrator/categories')}}"><span class="sidebarMenu"><i class="fa fa-circle-o text-yellow"></i> Categories<span class="label label-primary" id="availB"></span></a></li>
            <li><a href="{{url('administrator/subcateg')}}"><span class="sidebarMenu"><i class="fa fa-circle-o text-aqua"></i> Sub Categories 
              </span><span class="label label-warning" id="allB"></span></a></li>
          </ul>
      </li> 
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>