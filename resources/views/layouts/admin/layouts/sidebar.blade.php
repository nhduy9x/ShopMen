<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{asset(isset(Auth::user()->avatar)?Auth::user()->avatar:'img/avatar.jpg')}}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Admin</p>
          <p>{{Auth::user()->email}}</p>
        </div>
      </div>
      <!-- search form -->
     
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header"></li>
        <li class="active ">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Bảng tin</span>
            
          </a>
          
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-fw fa-file-word-o"></i>
            <span>bài viết</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a> 
          <ul class="treeview-menu">
            <li><a href="{{route('list.post')}}">Tất các bài viết</a></li>
            <li><a href="{{route('add.post')}}"> Viết bài mới</a></li>
            <li><a href="{{route('list.catepost')}}"> Chuyên mục</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Trang</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a> 
          <ul class="treeview-menu">
            <li><a href="{{route('list.page')}}">Tất cả các trang</a></li>
            <li><a href="{{route('add.page')}}">Thêm mới trang</a></li>
          </ul>
        </li>
      
        
        <li class="treeview">
          <a href="#">
            <i class="fa fa-file-text"></i>
            <span>Order</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a> 
          <ul class="treeview-menu">
            <li><a href="{{route('donhang')}}">Đơn hàng</a></li>
            <li><a href="{{route('code')}}">Các mã ưu đãi</a></li>
            <li><a href="pages/charts/chartjs.html">Báo cáo</a></li>
            
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-connectdevelop"></i>
            <span>Sản phẩm</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a> 
          <ul class="treeview-menu">
            <li><a href="{{route('show_product_admin')}}">Tất cả  sản phẩm</a></li>
            <li><a href="/shop-men/admin/product/add"> Thêm mới</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-connectdevelop"></i>
            <span>Danh mục sản phẩm </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a> 
          <ul class="treeview-menu">
            <li><a href="{{route('list.cate.product')}}">Tất cả danh mục sản phẩm</a></li>
            <li><a href="{{route('get.cate.product')}}"> Thêm mới</a></li>
          </ul>
        </li>
        
        <li class="treeview">
          <a href="#">
            <i class="fa fa-file-image-o"></i>
            <span>Slide show</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('list.slide')}}">Tất cả slider show</a></li>
            <li><a href="{{route('add.slide')}}">Thêm mới slider show</a></li>
            
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-comments-o"></i> <span>Comments</span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-user"></i> <span>Thanh viên</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
           <li><a href="{{route('list.user')}}"> Tất cả thành viên</a></li>
            <li><a href="{{route('add.user')}}">Thêm mới</a></li>
            <li><a href="{{route('up.user',Auth::user()->id)}}">Thông tin cá nhân </a></li>
            
          </ul>
        </li>
        
        {{-- <li class="header">Sự kiện</li> --}}
        
       
        
        <li >
          <a href="{{route('list.setting')}}">
            <i class="fa fa-cog"></i> <span>Cài đặt giao diện</span>
          </a>
        </li>
       
       
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>