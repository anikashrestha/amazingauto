@if(Auth::check())
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar" style="min-height:768px">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ asset(Auth::user()->profile->avatar) }}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ Auth::user()->name }}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>


      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
		<li>
      <a href="/admin/dashboard">
        <i class="fa fa-home">
          </i> <span>Dashboard</span>
        </a>
      </li>
       
    <li class="treeview">
        <a href="#">
            <i class="fa fa-youtube-square"></i>
          <span>Menu</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
            @if(Auth::check())
            @if(Auth::user()->isAdmin())
          <li><a href="/admin/menus/create"><i class="fa fa-adjust"></i> Create Menu</a></li>
          @endif
          @endif
          <li><a href="/admin/menus/"><i class="fa fa-adjust"></i> View Menu</a></li>
        
        </ul>
      </li>

      <li class="treeview">
        <a href="#">
            <i class="fa fa-youtube-square"></i>
          <span>Footer</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
            @if(Auth::check())
            @if(Auth::user()->isAdmin())
          <li><a href="/admin/footers/create"><i class="fa fa-adjust"></i> Create Footer</a></li>
          @endif
          @endif
          <li><a href="/admin/footers/"><i class="fa fa-adjust"></i> View Footer</a></li>
        
        </ul>
      </li>


      <li class="treeview">
          <a href="#">
            <i class="fa fa-book"></i>
            <span>Home Page</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="treeview">
                      <a href="#">
                        <i class="fa fa-book"></i>
                        <span>Banner</span>
                        <span class="pull-right-container">
                          <i class="fa fa-angle-left pull-right"></i>
                        </span>
                      </a>
                      <ul class="treeview-menu">
                
                          @if(Auth::check())
                          @if(Auth::user()->isAdmin())
                          <li><a href="/admin/banners/create"><i class="fa fa-adjust"></i> Create Banner</a></li>
                          @endif
                          @endif
                          <li><a href="/admin/banners/"><i class="fa fa-adjust"></i> View Banner</a></li>
                          

                      </ul>
         

           </li>


           <li class="treeview">
              <a href="#">
                <i class="fa fa-image"></i>
                <span>Logo</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                  @if(Auth::check())
                @if(Auth::user()->isAdmin())
                <li><a href="/admin/logos/create"><i class="fa fa-adjust"></i> Create Logo</a></li>
                @endif
                @endif
                <li><a href="/admin/logos/"><i class="fa fa-adjust"></i> View Logo</a></li>
               
              </ul>
            </li>



            <li class="treeview">
                <a href="#">
                  <i class="fa fa-book"></i>
                  <span>Introduction</span>
                  <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu">
                    @if(Auth::check())
                  @if(Auth::user()->isAdmin())
                  <li><a href="/admin/introductions/create"><i class="fa fa-adjust"></i> Add Introduction</a></li>
                @endif
                @endif
                  <li><a href="/admin/introductions/"><i class="fa fa-adjust"></i> View Introduction</a></li>
                 
                </ul>
              </li>

<li class="treeview">
              <a href="#">
                <i class="fa fa-image"></i>
                <span>Brand Main</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                  @if(Auth::check())
                @if(Auth::user()->isAdmin())
                <li><a href="/admin/brandii/create"><i class="fa fa-adjust"></i> Create Brand</a></li>
                @endif
                @endif
                <li><a href="/admin/brandii/"><i class="fa fa-adjust"></i> View Brand</a></li>
               
              </ul>
            </li>

   <li class="treeview">
              <a href="#">
                <i class="fa fa-image"></i>
                <span>Gallery Main Page</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                  @if(Auth::check())
                @if(Auth::user()->isAdmin())
                <li><a href="/admin/galleryindices/create"><i class="fa fa-adjust"></i> Create Brand</a></li>
                @endif
                @endif
                <li><a href="/admin/galleryindices/"><i class="fa fa-adjust"></i> View Brand</a></li>
               
              </ul>
           <li class="treeview">
          <a href="#">
            <i class="fa fa-image"></i>
            <span>Benifts</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
              @if(Auth::check())
            @if(Auth::user()->isAdmin())
            <li><a href="/admin/benifits/create"><i class="fa fa-adjust"></i> Create Benifits</a></li>
            @endif
            @endif
            <li><a href="/admin/benifits/"><i class="fa fa-adjust"></i> View Benifits</a></li>
           
          </ul>
        </li>




        <li class="treeview">
            <a href="#">
              <i class="fa fa-book"></i>
              <span>Services</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
                @if(Auth::check())
                @if(Auth::user()->isAdmin())
              <li><a href="/admin/solutionproducts/create"><i class="fa fa-adjust"></i> Create SolutionProducts</a></li>
              @endif
              @endif
              <li><a href="/admin/solutionproducts/"><i class="fa fa-adjust"></i> View SolutionProducts</a></li>
             
            </ul>
          </li>
       
          </ul>
        </li>
  
        <li class="treeview">
            <a href="#">
              <i class="fa fa-book"></i>
              <span>User Panel</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
           
  
                <li class="treeview">
                    <a href="#">
                      <i class="fa fa-image"></i>
                      <span>Role</span>
                      <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                      </span>
                    </a>
                    <ul class="treeview-menu">
                        @if(Auth::check())
                      @if(Auth::user()->isAdmin())
                      <li><a href="/admin/roles/create"><i class="fa fa-adjust"></i> Create Roles</a></li>
                      @endif
                      @endif
                      <li><a href="/admin/roles/"><i class="fa fa-adjust"></i> View Roles</a></li>
                     
                    </ul>
                  </li>
  
  
  
  
                  <li class="treeview">
                      <a href="#">
                        <i class="fa fa-user"></i> <span>Users</span>
                        <span class="pull-right-container">
                          <i class="fa fa-angle-left pull-right"></i>
                        </span>
                      </a>
                      <ul class="treeview-menu">
                          @if(Auth::check())
                          @if(Auth::user()->isAdmin())
                        <li><a href="/admin/users/create"><i class="fa fa-adjust"></i> Create User</a></li>
                        @endif
                        @endif
                        <li><a href="/admin/users/list"><i class="fa fa-adjust"></i> User List</a></li>
                      </ul>
                    </li>
  
  
  
      
  
  
            </ul>
          </li>

     



        <li class="treeview">
            <a href="#">
              <i class="fa fa-book"></i>
              <span>About Us Page</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
                @if(Auth::check())
            @if(Auth::user()->isAdmin())
              <li><a href="/admin/about/create"><i class="fa fa-adjust"></i> Add About Us Content</a></li>
              @endif
              @endif
              <li><a href="/admin/about/"><i class="fa fa-adjust"></i> View About Us Content</a></li>
             
            </ul>
          </li>

          <li class="treeview">
            <a href="#">
              <i class="fa fa-book"></i>
              <span>Spare Parts Page</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
                @if(Auth::check())
            @if(Auth::user()->isAdmin())
              <li><a href="/admin/spares/create"><i class="fa fa-adjust"></i> Add Spare Parts Content</a></li>
              @endif
              @endif
              <li><a href="/admin/spares/"><i class="fa fa-adjust"></i> View Spare Parts Content</a></li>
             
            </ul>
          </li>

          
          <li class="treeview">
              <a href="#">
                <i class="fa fa-map"></i>
                <span>Google Map Co-ordinates</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                  @if(Auth::check())
              @if(Auth::user()->isAdmin())
                <li><a href="/admin/map/create"><i class="fa fa-adjust"></i> Add Map Location</a></li>
                @endif
                @endif
                <li><a href="/admin/map/"><i class="fa fa-adjust"></i> View Map Latitude & Longitude</a></li>
               
              </ul>
            </li>
          


        
        



          <li class="treeview">
              <a href="#">
                <i class="fa fa-image"></i>
                <span>Brand</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                  @if(Auth::check())
                @if(Auth::user()->isAdmin())
                <li><a href="/admin/brands/create"><i class="fa fa-adjust"></i> Create Brand</a></li>
                @endif
                @endif
                <li><a href="/admin/brands/"><i class="fa fa-adjust"></i> View Brand</a></li>
               
              </ul>
            </li>



         

    <li class="treeview">
          <a href="#">
            <i class="fa fa-camera"></i> <span>Photo Gallery</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
              @if(Auth::check())
            @if(Auth::user()->isAdmin())
            <li class="active"><a href="/admin/gallery/create"><i class="fa fa-adjust"></i> Create Gallery</a></li>
            
            @endif
            @endif
            
            <li><a href="/admin/gallery"><i class="fa fa-adjust"></i> View Gallery</a></li>
          </ul>
        </li>
        
         
       
       
        <li class="treeview">
          <a href="#">
            <i class="fa fa-comment"></i>
            <span>Client Feedback</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="/admin/feedbacks/"><i class="fa fa-adjust"></i> View Client Feedback</a></li>
           
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
              <i class="fa fa-briefcase"></i>
            <span>Vacancy</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
              @if(Auth::check())
              @if(Auth::user()->isAdmin())
            <li><a href="/admin/vacancy/create"><i class="fa fa-adjust"></i> Create Vacancy</a></li>
            @endif
            @endif
            <li><a href="/admin/vacancy/"><i class="fa fa-adjust"></i> View Vacancy</a></li>
           
          </ul>
        </li>

        

      
        <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>Alumni</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a  href="/admin/alumni"><i class="fa fa-adjust"></i> View Alumni Detail</a></li>
          
          </ul>
        </li>
        <li class="treeview">
            <a href="#">
                <i class="far fa-user"></i>
              <span>Applicants</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              {{-- <li><a href="/admin/vacancy/create"><i class="fa fa-circle-o"></i> Create Vacancy</a></li> --}}
              <li><a href="/admin/jobseekers"><i class="fa fa-adjust"></i> View Applicants</a></li>
             
            </ul>
          </li>
      
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
@endif
