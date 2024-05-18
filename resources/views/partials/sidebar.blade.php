 <!-- ============================================================== -->
 <!-- Left Sidebar - style you can find in sidebar.scss  -->
 <!-- ============================================================== -->
 <aside class="left-sidebar" data-sidebarbg="skin6">
     <!-- Sidebar scroll-->
     <div class="scroll-sidebar" data-sidebarbg="skin6">
         <!-- Sidebar navigation-->
         <nav class="sidebar-nav">
             <ul id="sidebarnav">
                 <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="{{ route('home') }}"
                         aria-expanded="false"><i data-feather="home" class="feather-icon"></i><span
                             class="hide-menu">Dashboard</span></a>
                 </li>
                 <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="{{ route('ticketTpye.index') }}"
                         aria-expanded="false"><i data-feather="settings" class="feather-icon"></i><span
                             class="hide-menu">Ticket Types
                         </span></a>
                 </li>
                 <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="{{ route('ticket.index') }}"
                    aria-expanded="false"><i data-feather="settings" class="feather-icon"></i><span
                        class="hide-menu">Ticket
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
