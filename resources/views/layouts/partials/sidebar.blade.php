<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-right image">
          <img src="{{ asset('panel/dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-right info">
          <p>علیرضا حسینی زاده</p>
          <a href="#"><i class="fa fa-circle text-success"></i> آنلاین</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="جستجو">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">منو</li>
        <li class="active treeview">
          <a href="{{ route('dashboard') }}">
            <i class="fa fa-dashboard"></i> <span>خانه</span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>اطلاعات پایه</span>
            <span class="pull-left-container">
                <i class="fa fa-angle-right pull-left"></i>
            </span>
          </a>
          <ul class="treeview-menu">
              <li><a href="{{ route('country.index')}}"><i class="fa fa-circle-o"></i> کشورها</a></li>
            <li><a href="{{ route('city.index')}}"><i class="fa fa-circle-o"></i>شهرها</a></li>
            <li><a href="{{ route('area.index')}}"><i class="fa fa-circle-o"></i>محله ها</a></li>
            <li><a href="{{ route('attraction.index')}}"><i class="fa fa-circle-o"></i> جاذبه ها</a></li>
            <li><a href="{{ route('room-type.index')}}"><i class="fa fa-circle-o"></i> نوع اتاق ها</a></li>
            <li><a href="{{ route('bed-type.index')}}"><i class="fa fa-circle-o"></i> نوع تخت ها</a></li>
          </ul>
        </li>
        <li>
        <a href="{{ route('hotel.index') }}">
            <i class="fa fa-th"></i> <span>هتل ها</span>
          </a>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>اشیای گرافیکی</span>
            <span class="pull-left-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/UI/general.html"><i class="fa fa-circle-o"></i> عمومی</a></li>
            <li><a href="pages/UI/icons.html"><i class="fa fa-circle-o"></i> آیکون</a></li>
            <li><a href="pages/UI/buttons.html"><i class="fa fa-circle-o"></i> دکمه</a></li>
            <li><a href="pages/UI/sliders.html"><i class="fa fa-circle-o"></i> اسلایدر</a></li>
            <li><a href="pages/UI/timeline.html"><i class="fa fa-circle-o"></i> تایم لاین</a></li>
            <li><a href="pages/UI/modals.html"><i class="fa fa-circle-o"></i> مدال</a></li>
          </ul>
        </li>

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
