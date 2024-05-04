   <!-- ========== Left Sidebar Start ========== -->
   <div class="left side-menu">
       <div class="sidebar-inner slimscrollleft">

           <!--- Sidemenu -->
           <div id="sidebar-menu">
               <ul>
                   <li class="menu-title">شؤون الموظفين</li>

                   <li class="has_sub">
                       <a href="{{ route('dashboard') }}" class="waves-effect">
                           <i class="fi fi-rr-apps"></i>
                           <span> لوحة التحكم </span> </a>
                   </li>
                   @auth
                       @role('Admin')
                           @can('users-all')
                               <li class="has_sub">
                                   <a href="javascript:void(0);" class="waves-effect">
                                       <i class="fi fi-rs-user-gear"></i>
                                       <span> الاداره </span>
                                       <span class="menu-arrow"></span>
                                   </a>
                                   <ul class="list-unstyled">
                                       @can('users-list')
                                           <li><a href="{{ route('users.index') }}">المستخدمين</a></li>
                                       @endcan
                                       @can('role-list')
                                           <li><a href="{{ route('roles.index') }}">الصلاحيات</a></li>
                                       @endcan
                                   </ul>
                               </li>
                           @endcan
                       @endrole
                   @endauth
                   @can('mainInfo-all')
                       <li class="has_sub">
                           <a href="javascript:void(0);" class="waves-effect">
                               <i class="fi fi-tr-ballot"></i>
                               <span> البيانات الأساسيه </span>
                               <span class="menu-arrow"></span>
                           </a>
                           <ul class="list-unstyled">
                               @can('mainInfo-wahadat')
                                   <li><a href="{{ route('wehda.index') }}"><i class="fi fi-rr-house-building"></i>الوحدات</a>
                                   </li>
                               @endcan
                               @can('mainInfo-banks')
                                   <li><a href="{{ route('Bank.index') }}"><i class="fi fi-rr-bank"></i>المصارف

                                       </a></li>
                               @endcan
                               @can('mainInfo-adjectives')
                                   <li><a href="{{ route('Adjective.index') }}"><i class="fi fi-rr-briefcase"></i>الصفات</a>
                                   </li>
                               @endcan
                           </ul>
                       </li>
                   @endcan

                   @can('emp-list')
                       <li class="has_sub">
                           <a href="{{ route('employees.index') }}" class="waves-effect">
                               <i class="fi fi-rr-users-alt"></i>
                               <span> المدنيين </span>
                           </a>
                       </li>
                   @endcan
                   @can('empOffice-list')
                       <li class="has_sub">
                           <a href="{{ route('employeesofficer.index') }}" class="waves-effect">
                               <i class="fi fi-rr-badge-sheriff"></i>
                               <span> الضباط </span>
                           </a>
                       </li>
                   @endcan
                   @can('emp-all')
                       <li class="has_sub">
                           <a href="{{ route('allEmployees') }}" class="waves-effect">
                               <i class="fi fi-rr-users-alt"></i>
                               <span> كل الموظفين </span>
                           </a>
                       </li>
                   @endcan
                   @can('subList-all')
                       <li class="has_sub">
                           <a href="javascript:void(0);" class="waves-effect">
                               <i class="fi fi-tr-ballot"></i>
                               <span> القوائم الفرعية </span>
                               <span class="menu-arrow"></span>
                           </a>
                           <ul class="list-unstyled">
                               @can('mainInfo-wahadat')
                                   <li><a href="{{ route('subList/stopping') }}"><i class="fi fi-rr-house-building"></i>قائمه
                                           المنقطعين</a>
                                   </li>
                               @endcan
                               @can('mainInfo-banks')
                                   <li><a href="{{ route('subList/fleeing') }}"><i class="fi fi-rr-bank"></i>قائمه الهروب

                                       </a></li>
                               @endcan
                               @can('mainInfo-adjectives')
                                   <li><a href="{{ route('subList/retired') }}"><i class="fi fi-rr-briefcase"></i>قائمه
                                           المتقاعدين</a>
                                   </li>
                               @endcan
                           </ul>
                       </li>
                   @endcan

                   @can('Personal-emp-all')
                       <li class="menu-title">شؤون الموظفين</li>

                       <li class="has_sub">
                           <a href="javascript:void(0);" class="waves-effect">
                               <i class="fi fi-rr-search-alt"></i>
                               <span> شؤون الموظفين </span>
                               <span class="menu-arrow"></span>
                           </a>
                           <ul class="list-unstyled">
                               @can('Personal-emp-list')
                                   <li>
                                       <a href="{{ route('Personnel/employee') }}">موظفين</a>
                                   </li>
                               @endcan
                               @can('Personal-empOffice-list')
                                   <li><a href="{{ route('Personnel/employeeOfficer') }}">ضباط</a></li>
                               @endcan
                           </ul>
                       </li>
                   @endcan

                   @can('filter-all')
                       <li class="menu-title"> فلترة البيانات </li>

                       <li class="has_sub">
                           <a href="javascript:void(0);" class="waves-effect">
                               <i class="fi fi-rr-filter"></i>
                               <span> فلتره </span>
                               <span class="menu-arrow"></span>
                           </a>
                           <ul class="list-unstyled">
                               @can('filter-emp')
                                   <li>
                                       <a target="blank" href="{{ route('prints') }}">موظفين</a>
                                   </li>
                               @endcan
                               @can('filter-empOffice')
                                   <li><a target="blank" href="{{ route('printsOffice') }}">الضباط</a></li>
                               @endcan
                           </ul>
                       </li>
                   @endcan

               </ul>
           </div>
           <!-- Sidebar -->
           <div class="clearfix"></div>

           <div class="help-box">
               <h5 class="text-muted m-t-0">للمساعدة</h5>
               <p class=""><span class="text-custom">Email:</span> <br /> info@badatkbali.ly</p>
               <p class="m-b-0"><span class="text-custom">Whatsapp:</span> <br /> 0910228397<br /> 0922486169
               </p>
           </div>

       </div>
       <!-- Sidebar -left -->

   </div>
   <!-- Left Sidebar End -->



   @extends('layout.scriptPage')