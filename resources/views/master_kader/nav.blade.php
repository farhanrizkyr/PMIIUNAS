  

      <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="/kader">Dashboard</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="/kader">Ds</a>
          </div>
          <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
             <li><a class="nav-link" href="/kader"><i class="fas fa-fire"></i> <span>Dashboard</span></a></li>
           
            <li class="menu-header">Menu</li>
           <li class="dropdown">
              <a href="#" class="nav-link has-dropdown"><i class="fas fa-list"></i><span>Main Menu</span></a>
              <ul class="dropdown-menu">
                @if(Auth::user()->status=='active')
                <li><a class="nav-link"  href="/kader/category"><i class="far fa-circle"></i> Category</a></li>
                <li><a class="nav-link" href="/kader/artikel"><i class="far fa-circle"></i> Buat Blog</a></li>
                 <li><a class="nav-link" href="/kader/allposts"><i class="far fa-circle"></i> Semua Postingan Blog</a></li>
                   @endif
              </ul>
               <ul class="dropdown-menu">
                @if(Auth::user()->status=='disable')
                 <li><a class="nav-link" href="/kader/allposts">Semua Postingan Blog</a></li>
                   @endif
              </ul>


            </li>
                   
          </ul>

                </aside>
      </div>