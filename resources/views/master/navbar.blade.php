  <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        
     
 <!--view Panitia -->

    @if(Auth::user()->role=='Panitia')

       <li class="nav-header">Menu Panitia</li>
           
               <li class="nav-item">
            <a href="/home" class="nav-link">
              <i class="nav-icon fas fa-home"></i>
              <p>Home</p>
            </a>
          </li>

 
   
   
               <li class="nav-item">
            <a href="/progdi" class="nav-link">
              <i class="nav-icon fas fa-graduation-cap"></i>
              <p>Program Studi</p>
            </a>
          </li>
         
                    <li class="nav-item">
            <a href="/tahun" class="nav-link">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>Tahun Angkatan</p>
            </a>
          </li>
          
        
        
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-registered "></i>
              <p>
                Data  Pendaftaran
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/listsig" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pendaftaran SIG </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/listmapaba" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pendaftaran Mapaba</p>
                </a>
              </li>

                <li class="nav-item">
                <a href="/history-datamapaba" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>History Data Mapaba</p>
                </a>
              </li>

            </ul>
          </li> 


               <li class="nav-header">User Account</li>
 <li class="nav-item">
          <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                User
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/user/" class="nav-link">
                  <i class="fas fa-cog nav-icon text-primary"></i>
                  <p class="text-primary">Settings</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/ubah/password" class="nav-link">
                 <i class="fas fa-key nav-icon text-warning"></i>
                  <p class="text-warning">Change Password</p>
                                  </a>
              </li>
              <li class="nav-item">
                <a href="{{route('logout')}}" class="nav-link">
                 <i class="fas fa-sign-out-alt nav-icon text-danger"></i>
                  <p class="text-danger">Log-Out</p>
                </a>
              </li>

            </ul>
          </li>
       
        </ul>
        @endif



       <!--   End view Panitia -->

 <!--view Pengurus -->
    @if(Auth::user()->role=='Pengurus')

       <li class="nav-header">Home</li>
           
               <li class="nav-item">
            <a href="/home" class="nav-link">
              <i class="nav-icon fas fa-home"></i>
              <p>Home</p>
            </a>
          </li>
                 <li class="nav-header">Main Menu</li>
           
               <li class="nav-item">
            <a href="/pemberitahuan" class="nav-link">
              <i class="nav-icon fas fa-bullhorn"></i>
              <p>Pemberitahuan</p>
            </a>
          </li>
          
             <li class="nav-item">
            <a href="/saran" class="nav-link">
              <i class="nav-icon fas fa-comment"></i>
              <p>Saran</p>
            </a>
          </li>
           
             <li class="nav-item">
            <a href="/sliders" class="nav-link">
              <i class="nav-icon far fa-images"></i>
              <p>Slider Images</p>
            </a>
          </li>
               <li class="nav-item">
            <a href="/progdi" class="nav-link">
              <i class="nav-icon fas fa-graduation-cap"></i>
              <p>Program Studi</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/profpmiiunas/" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>Profile PMIIUNAS</p>
            </a>
          </li>
          
         
          
             <li class="nav-item">
            <a href="/sejarah-pmii/" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>Sejarah PMII</p>
            </a>
          </li>
                    
                    <li class="nav-item">
            <a href="/tahun" class="nav-link">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>Tahun Angkatan</p>
            </a>
          </li>
          
                    <li class="nav-item">
            <a href="/merchandise" class="nav-link">
              <i class="nav-icon fas fa-shopping-bag"></i>
              <p>Mercandise</p>
            </a>
          </li>
          
             <li class="nav-item">
            <a href="/listpengurus" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>List Kepengurusan</p>
            </a>
          </li>
          
                     <li class="nav-item">
            <a href="/profilesrayon" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>Profile Rayon</p>
            </a>
          </li>
          
             <li class="nav-item">
            <a href="/strukturs" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>Struktur Organisasi</p>
            </a>
          </li>
          
          <li class="nav-header">Main Menu Group</li>
                     <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-archive "></i>
              <p>
                Arsip 
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/filearsipkomi" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Arsip Pengurus </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/filearsipmapabaraya" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Arsip Mapaba</p>
                </a>
            </li>

          </ul>
        </li> 
        
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-registered "></i>
              <p>
                Draf Registrasi
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/listsig" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>SIG </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/listmapaba" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Mapaba</p>
                </a>
              </li>

            </ul>
          </li> 
           <li class="nav-item">
          <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Users Account
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/anggota_pengurus" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>User Pengurus</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/anggota_kader" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>User Kader</p>
                </a>
              </li>

            </ul>
          </li>
           <li class="nav-item">
          <a href="#" class="nav-link">
              <i class="nav-icon fas fa-file-import"></i>
              <p>
               History Data
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/history-datapengurus" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>History Data Pengurus</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/history-datamapaba" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>History Data Mapaba</p>
                </a>
              </li>

            </ul>
          </li> 
          

         
      <li class="nav-header">User Account</li>
 <li class="nav-item">
          <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                User
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/user/" class="nav-link">
                  <i class="fas fa-cog nav-icon text-primary"></i>
                  <p class="text-primary">Settings</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/change/password" class="nav-link">
                 <i class="fas fa-key nav-icon text-warning"></i>
                  <p class="text-warning">Change Password</p>
                                  </a>
              </li>
              <li class="nav-item">
                <a href="{{route('logout')}}" class="nav-link">
                 <i class="fas fa-sign-out-alt nav-icon text-danger"></i>
                  <p class="text-danger">Log-Out</p>
                </a>
              </li>

            </ul>
          </li>
        </ul>
        @endif

        <!-- End View Pengurus -->
      </nav>