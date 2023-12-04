<!DOCTYPE html>
<html lang="en" >
   <!--begin::Head-->
   <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
   <head>
      <title>@yield('title') - Servile Relocation</title>
      <meta charset="utf-8"/>
      <meta name="description" content="@yield('title') - Servile Relocation"/>
      <meta name="viewport" content="width=device-width, initial-scale=1"/>
      <link rel="shortcut icon" href="{{ asset('assets/media/logos/servile-favicon.png') }}"/>
      <!--begin::Fonts(mandatory for all pages)-->
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700"/>
      <!--end::Fonts-->
      <!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
      <link href="{{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css"/>
      <link href="{{ asset('assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css"/>
      <!--end::Global Stylesheets Bundle--> 
      <meta name="csrf-token" content="{{ csrf_token() }}">       
   </head>
   <!--end::Head-->
   <!--begin::Body-->
   <body  id="kt_app_body" data-kt-app-header-fixed-mobile="true" data-kt-app-toolbar-enabled="true"  class="app-default" >
      <!--begin::App-->
      <div class="d-flex flex-column flex-root app-root" id="kt_app_root">
         <!--begin::Page-->
         <div class="app-page  flex-column flex-column-fluid " id="kt_app_page">
            <!--begin::Header-->
            <div id="kt_app_header" class="app-header" 
               data-kt-sticky="true" data-kt-sticky-activate="{default: false, lg: true}" data-kt-sticky-name="app-header-sticky" data-kt-sticky-offset="{default: false, lg: '300px'}">
               <!--begin::Header container-->
               <div class="app-container  container-xxl d-flex align-items-stretch justify-content-between " id="kt_app_header_container">
                  <!--begin::Header mobile toggle-->
                  <div class="d-flex align-items-center d-lg-none ms-n3 me-2" title="Show sidebar menu">
                     <div class="btn btn-icon btn-color-gray-600 btn-active-color-primary w-35px h-35px" id="kt_app_header_menu_toggle">
                        <i class="ki-outline ki-abstract-14 fs-2"></i>	
                     </div>
                  </div>
                  <!--end::Header mobile toggle-->
                  <!--begin::Logo-->
                  <div class="d-flex align-items-center flex-grow-1 flex-lg-grow-0 me-lg-15">
                     <a href="#">
                     <img alt="Logo" src="{{ asset('assets/media/logos/servile-logo-dashboard-mobile.png') }}" class="d-lg-none"/>
                     <img alt="Logo" src="{{ asset('assets/media/logos/servile-logo-dashboard.png') }}" class="d-none d-lg-inline app-sidebar-logo-default theme-light-show"/>
                     <img alt="Logo" src="{{ asset('assets/media/logos/servile-logo-dashboard.png') }}" class="d-none d-lg-inline app-sidebar-logo-default theme-dark-show"/>
                     </a>
                  </div>
                  <!--end::Logo-->
                  <!--begin::Header wrapper-->
                  <div class="d-flex align-items-stretch justify-content-between flex-lg-grow-1" id="kt_app_header_wrapper">
                     <!--begin::Menu wrapper-->
                     <div 
                        class="app-header-menu app-header-mobile-drawer align-items-stretch"
                        data-kt-drawer="true"
                        data-kt-drawer-name="app-header-menu"
                        data-kt-drawer-activate="{default: true, lg: false}"
                        data-kt-drawer-overlay="true"
                        data-kt-drawer-width="250px"
                        data-kt-drawer-direction="start"
                        data-kt-drawer-toggle="#kt_app_header_menu_toggle"
                        data-kt-swapper="true"
                        data-kt-swapper-mode="{default: 'append', lg: 'prepend'}"
                        data-kt-swapper-parent="{default: '#kt_app_body', lg: '#kt_app_header_wrapper'}"
                        >
                        <!--begin::Menu-->
                        <div 
                           class=" menu  
                           menu-rounded 
                           menu-active-bg 
                           menu-state-primary 
                           menu-column 
                           menu-lg-row 
                           menu-title-gray-700 
                           menu-icon-gray-500 
                           menu-arrow-gray-500 
                           menu-bullet-gray-500 
                           my-5 my-lg-0 align-items-stretch fw-semibold px-2 px-lg-0
                           "         
                           id="kt_app_header_menu"
                           data-kt-menu="true"
                           >
                           <!--begin:Menu item-->
                           <div data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="bottom-start" data-kt-menu-offset="-50,0" class="menu-item here {{ request()->routeIs('dashboard') ? 'here show menu-here-bg' : '' }} menu-lg-down-accordion me-0 me-lg-2">
                              <!--begin:Menu link--><span class="menu-link"><span class="menu-title"><a href="#" class="menu-link" data-bs-trigger="hover" data-bs-dismiss="click">Dashboard</a></span><span class="menu-arrow d-lg-none"></span></span><!--end:Menu link-->
                           </div>
                           <!--end:Menu item--> <!--begin:Menu item-->
                           <div  data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="bottom-start" data-kt-menu-offset="-100,0"  class="menu-item {{ request()->routeIs('master.agent.create.show') || request()->routeIs('master.costing-charges.create.show') ? 'here show menu-here-bg' : '' }} menu-lg-down-accordion me-0 me-lg-2">
                              <!--begin:Menu link--><span class="menu-link" ><span  class="menu-title" >Master</span><span  class="menu-arrow d-lg-none" ></span></span><!--end:Menu link--><!--begin:Menu sub-->
                              <div  class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown p-0" >
                                 <!--begin:Pages menu-->
                                 <div class="menu-active-bg px-4 px-lg-0">
                                    <!--begin:Tab content-->
                                    <div class="py-4 py-lg-8 px-lg-7">
                                       <!--begin:Tab pane-->
                                       <div class="w-lg-1000px" id="kt_app_header_menu_pages_authentication">
                                          <!--begin:Row-->
                                          <div class="row">
                                             <!--begin:Col-->
                                             <div class="col-lg-3 mb-6 mb-lg-0">
                                                <!--begin:Menu section-->
                                                <div class="mb-6">
                                                   <!--begin:Menu heading-->
                                                   <h4 class="fs-6 fs-lg-4 fw-bold mb-3 ms-4">Agent</h4>
                                                   <!--end:Menu heading-->
                                                   <!--begin:Menu item-->
                                                   <div class="menu-item p-0 m-0">
                                                      <!--begin:Menu link-->
                                                      <a href="{{ route('master.agent.create.show') }}" class="menu-link ">
                                                      <span class="menu-title">Agent Creation</span>
                                                      </a>
                                                      <!--end:Menu link-->
                                                   </div>
                                                   <!--end:Menu item-->
                                                   <!--begin:Menu item-->
                                                   <div class="menu-item p-0 m-0">
                                                      <!--begin:Menu link-->
                                                      <a href="agent-list.html" class="menu-link ">
                                                      <span class="menu-title">Agent List</span>
                                                      </a>
                                                      <!--end:Menu link-->
                                                   </div>
                                                   <!--end:Menu item-->
                                                </div>
                                                <!--end:Menu section-->                
                                             </div>
                                             <!--end:Col-->
											 <!--begin:Col-->
                                             <div class="col-lg-3 mb-6 mb-lg-0">
                                                <!--begin:Menu section-->
                                                <div class="mb-0">
                                                   <!--begin:Menu heading-->
                                                   <h4 class="fs-6 fs-lg-4 fw-bold mb-3 ms-4">Client</h4>
                                                   <!--end:Menu heading-->
                                                   <!--begin:Menu item-->
                                                   <div class="menu-item p-0 m-0">
                                                      <!--begin:Menu link-->
                                                      <a href="client-creation.html" class="menu-link ">
                                                      <span class="menu-title">Client Creation</span>
                                                      </a>
                                                      <!--end:Menu link-->
                                                   </div>
                                                   <!--end:Menu item-->
                                                   <!--begin:Menu item-->
                                                   <div class="menu-item p-0 m-0">
                                                      <!--begin:Menu link-->
                                                      <a href="client-list.html" class="menu-link ">
                                                      <span class="menu-title">Client List</span>
                                                      </a>
                                                      <!--end:Menu link-->
                                                   </div>
                                                   <!--end:Menu item-->
                                                </div>
                                                <!--end:Menu section-->
                                             </div>
                                             <!--end:Col-->
											 <!--begin:Col-->
                                             <div class="col-lg-3 mb-6 mb-lg-0">
                                                <!--begin:Menu section-->
                                                <div class="mb-0">
                                                   <!--begin:Menu heading-->
                                                   <h4 class="fs-6 fs-lg-4 fw-bold mb-3 ms-4">Costing Charges</h4>
                                                   <!--end:Menu heading-->
                                                   <!--begin:Menu item-->
                                                   <div class="menu-item p-0 m-0">
                                                      <!--begin:Menu link-->
                                                      <a href="{{ route('master.costing-charges.create.show') }}" class="menu-link ">
                                                      <span class="menu-title">Costing Charges Creation</span>
                                                      </a>
                                                      <!--end:Menu link-->
                                                   </div>
                                                   <!--end:Menu item-->
                                                   <!--begin:Menu item-->
                                                   <div class="menu-item p-0 m-0">
                                                      <!--begin:Menu link-->
                                                      <a href="costing-charges-list.html" class="menu-link ">
                                                      <span class="menu-title">Costing Charges List</span>
                                                      </a>
                                                      <!--end:Menu link-->
                                                   </div>
                                                   <!--end:Menu item-->
                                                </div>
                                                <!--end:Menu section-->
                                             </div>
                                             <!--end:Col-->
											 <!--begin:Col-->
                                             <div class="col-lg-3 mb-6 mb-lg-0">
                                                <!--begin:Menu section-->
                                                <div class="mb-6">
                                                   <!--begin:Menu heading-->
                                                   <h4 class="fs-6 fs-lg-4 fw-bold mb-3 ms-4">Job Service</h4>
                                                   <!--end:Menu heading-->
                                                   <!--begin:Menu item-->
                                                   <div class="menu-item p-0 m-0">
                                                      <!--begin:Menu link-->
                                                      <a href="job-service-creation.html" class="menu-link ">
                                                      <span class="menu-title">Job Service Creation</span>
                                                      </a>
                                                      <!--end:Menu link-->
                                                   </div>
                                                   <!--end:Menu item-->
                                                   <!--begin:Menu item-->
                                                   <div class="menu-item p-0 m-0">
                                                      <!--begin:Menu link-->
                                                      <a href="job-service-list.html" class="menu-link ">
                                                      <span class="menu-title">Job Service List</span>
                                                      </a>
                                                      <!--end:Menu link-->
                                                   </div>
                                                   <!--end:Menu item-->
                                                </div>
                                                <!--end:Menu section-->               
                                             </div>
                                             <!--end:Col-->
											 <!--begin:Col-->
                                             <div class="col-lg-3 mb-6 mb-lg-0">
                                                <!--begin:Menu section-->
                                                <div class="mb-6">
                                                   <!--begin:Menu heading-->
                                                   <h4 class="fs-6 fs-lg-4 fw-bold mb-3 ms-4">Lead Source</h4>
                                                   <!--end:Menu heading-->
                                                   <!--begin:Menu item-->
                                                   <div class="menu-item p-0 m-0">
                                                      <!--begin:Menu link-->
                                                      <a href="lead-source-creation.html" class="menu-link ">
                                                      <span class="menu-title">Lead Source Creation</span>
                                                      </a>
                                                      <!--end:Menu link-->
                                                   </div>
                                                   <!--end:Menu item-->
                                                   <!--begin:Menu item-->
                                                   <div class="menu-item p-0 m-0">
                                                      <!--begin:Menu link-->
                                                      <a href="lead-source-list.html" class="menu-link ">
                                                      <span class="menu-title">Lead Source List</span>
                                                      </a>
                                                      <!--end:Menu link-->
                                                   </div>
                                                   <!--end:Menu item-->
                                                </div>
                                                <!--end:Menu section-->               
                                             </div>
                                             <!--end:Col-->
											 <!--begin:Col-->
                                             <div class="col-lg-3 mb-6 mb-lg-0">
                                                <!--begin:Menu section-->
                                                <div class="mb-6">
                                                   <!--begin:Menu heading-->
                                                   <h4 class="fs-6 fs-lg-4 fw-bold mb-3 ms-4">Mode</h4>
                                                   <!--end:Menu heading-->
                                                   <!--begin:Menu item-->
                                                   <div class="menu-item p-0 m-0">
                                                      <!--begin:Menu link-->
                                                      <a href="mode-creation.html" class="menu-link ">
                                                      <span class="menu-title">Mode Creation</span>
                                                      </a>
                                                      <!--end:Menu link-->
                                                   </div>
                                                   <!--end:Menu item-->
                                                   <!--begin:Menu item-->
                                                   <div class="menu-item p-0 m-0">
                                                      <!--begin:Menu link-->
                                                      <a href="mode-list.html" class="menu-link ">
                                                      <span class="menu-title">Mode List</span>
                                                      </a>
                                                      <!--end:Menu link-->
                                                   </div>
                                                   <!--end:Menu item-->
                                                </div>
                                                <!--end:Menu section-->
                                             </div>
                                             <!--end:Col-->
											 <!--begin:Col-->
                                             <div class="col-lg-3 mb-6 mb-lg-0">
                                                <!--begin:Menu section-->
                                                <div class="mb-0">
                                                   <!--begin:Menu heading-->
                                                   <h4 class="fs-6 fs-lg-4 fw-bold mb-3 ms-4">Quotation Charges</h4>
                                                   <!--end:Menu heading-->
                                                   <!--begin:Menu item-->
                                                   <div class="menu-item p-0 m-0">
                                                      <!--begin:Menu link-->
                                                      <a href="quotation-charges-creation.html" class="menu-link ">
                                                      <span class="menu-title">Quotation Charges Creation</span>
                                                      </a>
                                                      <!--end:Menu link-->
                                                   </div>
                                                   <!--end:Menu item-->
                                                   <!--begin:Menu item-->
                                                   <div class="menu-item p-0 m-0">
                                                      <!--begin:Menu link-->
                                                      <a href="quotation-charges-list.html" class="menu-link ">
                                                      <span class="menu-title">Quotation Charges List</span>
                                                      </a>
                                                      <!--end:Menu link-->
                                                   </div>
                                                   <!--end:Menu item-->
                                                </div>
                                                <!--end:Menu section-->
                                             </div>
                                             <!--end:Col-->
                                             <!--begin:Col-->
                                             <div class="col-lg-3 mb-6 mb-lg-0">
                                                <!--begin:Menu section-->
                                                <div class="mb-0">
                                                   <!--begin:Menu heading-->
                                                   <h4 class="fs-6 fs-lg-4 fw-bold mb-3 ms-4">Service</h4>
                                                   <!--end:Menu heading-->
                                                   <!--begin:Menu item-->
                                                   <div class="menu-item p-0 m-0">
                                                      <!--begin:Menu link-->
                                                      <a href="service-creation.html" class="menu-link ">
                                                      <span class="menu-title">Service Creation</span>
                                                      </a>
                                                      <!--end:Menu link-->
                                                   </div>
                                                   <!--end:Menu item-->
                                                   <!--begin:Menu item-->
                                                   <div class="menu-item p-0 m-0">
                                                      <!--begin:Menu link-->
                                                      <a href="service-list.html" class="menu-link ">
                                                      <span class="menu-title">Service List</span>
                                                      </a>
                                                      <!--end:Menu link-->
                                                   </div>
                                                   <!--end:Menu item-->
                                                </div>
                                                <!--end:Menu section-->
                                             </div>
                                             <!--end:Col-->
											 <!--begin:Col-->
                                             <div class="col-lg-3 mb-6 mb-lg-0">
                                                <!--begin:Menu section-->
                                                <div class="mb-0">
                                                   <!--begin:Menu heading-->
                                                   <h4 class="fs-6 fs-lg-4 fw-bold mb-3 ms-4">Survey Checklist</h4>
                                                   <!--end:Menu heading-->
                                                   <!--begin:Menu item-->
                                                   <div class="menu-item p-0 m-0">
                                                      <!--begin:Menu link-->
                                                      <a href="survey-checklist-creation.html" class="menu-link ">
                                                      <span class="menu-title">Survey Checklist Creation</span>
                                                      </a>
                                                      <!--end:Menu link-->
                                                   </div>
                                                   <!--end:Menu item-->
                                                   <!--begin:Menu item-->
                                                   <div class="menu-item p-0 m-0">
                                                      <!--begin:Menu link-->
                                                      <a href="survey-checklist-list.html" class="menu-link ">
                                                      <span class="menu-title">Survey Checklist List</span>
                                                      </a>
                                                      <!--end:Menu link-->
                                                   </div>
                                                   <!--end:Menu item-->
                                                </div>
                                                <!--end:Menu section-->
                                             </div>
                                             <!--end:Col-->
											 <!--begin:Col-->
                                             <div class="col-lg-3 mb-6 mb-lg-0">
                                                <!--begin:Menu section-->
                                                <div class="mb-0">
                                                   <!--begin:Menu heading-->
                                                   <h4 class="fs-6 fs-lg-4 fw-bold mb-3 ms-4">Type</h4>
                                                   <!--end:Menu heading-->
                                                   <!--begin:Menu item-->
                                                   <div class="menu-item p-0 m-0">
                                                      <!--begin:Menu link-->
                                                      <a href="type-creation.html" class="menu-link ">
                                                      <span class="menu-title">Type Creation</span>
                                                      </a>
                                                      <!--end:Menu link-->
                                                   </div>
                                                   <!--end:Menu item-->
                                                   <!--begin:Menu item-->
                                                   <div class="menu-item p-0 m-0">
                                                      <!--begin:Menu link-->
                                                      <a href="type-list.html" class="menu-link ">
                                                      <span class="menu-title">Type List</span>
                                                      </a>
                                                      <!--end:Menu link-->
                                                   </div>
                                                   <!--end:Menu item-->
                                                </div>
                                                <!--end:Menu section-->
                                             </div>
                                             <!--end:Col-->
                                          </div>
                                          <!--end:Row-->        
                                       </div>
                                       <!--end:Tab pane-->
                                    </div>
                                    <!--end:Tab content-->
                                 </div>
                                 <!--end:Pages menu-->
                              </div>
                              <!--end:Menu sub-->
                           </div>
                           <!--end:Menu item-->
                           <!--begin:Menu item-->
                           <div  data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="bottom-start"  class="menu-item menu-lg-down-accordion menu-sub-lg-down-indention me-0 me-lg-2" >
                              <!--begin:Menu link--><span class="menu-link" ><span  class="menu-title" >Leads</span><span  class="menu-arrow d-lg-none" ></span></span><!--end:Menu link--><!--begin:Menu sub-->
                              <div  class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown px-lg-2 py-lg-4 w-lg-200px" >
                                 <!--begin:Menu item-->
                                 <div  class="menu-item" >
                                    <!--begin:Menu link--><a class="menu-link"  href="#" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right" ><span  class="menu-title" >Lead Creation</span></a><!--end:Menu link-->
                                 </div>
                                 <!--end:Menu item--><!--begin:Menu item-->
                                 <div  class="menu-item" >
                                    <!--begin:Menu link--><a class="menu-link"  href="#" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right" ><span  class="menu-title" >Lead List</span></a><!--end:Menu link-->
                                 </div>
                                 <!--end:Menu item-->
                              </div>
                              <!--end:Menu sub-->
                           </div>
                           <!--end:Menu item-->
                           <!--begin:Menu item-->
                           <div  data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="bottom-start"  class="menu-item menu-lg-down-accordion menu-sub-lg-down-indention me-0 me-lg-2" >
                              <!--begin:Menu link--><span class="menu-link" ><span  class="menu-title" >Survey</span><span  class="menu-arrow d-lg-none" ></span></span><!--end:Menu link--><!--begin:Menu sub-->
                              <div  class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown px-lg-2 py-lg-4 w-lg-200px" >
                                 <!--begin:Menu item-->
                                 <div  class="menu-item" >
                                    <!--begin:Menu link--><a class="menu-link"  href="#" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right" ><span  class="menu-title" >Survey Creation</span></a><!--end:Menu link-->
                                 </div>
                                 <!--end:Menu item--><!--begin:Menu item-->
                                 <div  class="menu-item" >
                                    <!--begin:Menu link--><a class="menu-link"  href="#" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right" ><span  class="menu-title" >Survey List</span></a><!--end:Menu link-->
                                 </div>
                                 <!--end:Menu item-->
                              </div>
                              <!--end:Menu sub-->
                           </div>
                           <!--end:Menu item-->
                           <!--begin:Menu item-->
                           <div  data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="bottom-start"  class="menu-item menu-lg-down-accordion menu-sub-lg-down-indention me-0 me-lg-2" >
                              <!--begin:Menu link--><span class="menu-link" ><span  class="menu-title" >Quotation</span><span  class="menu-arrow d-lg-none" ></span></span><!--end:Menu link--><!--begin:Menu sub-->
                              <div  class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown px-lg-2 py-lg-4 w-lg-200px" >
                                 <!--begin:Menu item-->
                                 <div  class="menu-item" >
                                    <!--begin:Menu link--><a class="menu-link"  href="#" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right" ><span  class="menu-title" >Quotation Creation</span></a><!--end:Menu link-->
                                 </div>
                                 <!--end:Menu item--><!--begin:Menu item-->
                                 <div  class="menu-item" >
                                    <!--begin:Menu link--><a class="menu-link"  href="#" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right" ><span  class="menu-title" >Quotation List</span></a><!--end:Menu link-->
                                 </div>
                                 <!--end:Menu item-->
                              </div>
                              <!--end:Menu sub-->
                           </div>
                           <!--end:Menu item-->
                           <!--begin:Menu item-->
                           <div  data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="bottom-start"  class="menu-item menu-lg-down-accordion menu-sub-lg-down-indention me-0 me-lg-2" >
                              <!--begin:Menu link--><span class="menu-link" ><span  class="menu-title" >Payment</span><span  class="menu-arrow d-lg-none" ></span></span><!--end:Menu link--><!--begin:Menu sub-->
                              <div  class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown px-lg-2 py-lg-4 w-lg-200px" >
                                 <!--begin:Menu item-->
                                 <div  class="menu-item" >
                                    <!--begin:Menu link--><a class="menu-link"  href="#" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right" ><span  class="menu-title" >Payment Creation</span></a><!--end:Menu link-->
                                 </div>
                                 <!--end:Menu item--><!--begin:Menu item-->
                                 <div  class="menu-item" >
                                    <!--begin:Menu link--><a class="menu-link"  href="#" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right" ><span  class="menu-title" >Payment List</span></a><!--end:Menu link-->
                                 </div>
                                 <!--end:Menu item-->
                              </div>
                              <!--end:Menu sub-->
                           </div>
                           <!--end:Menu item-->
                           <!--begin:Menu item-->
                           <div  data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="bottom-start"  class="menu-item menu-lg-down-accordion menu-sub-lg-down-indention me-0 me-lg-2" >
                              <!--begin:Menu link--><span class="menu-link" ><span  class="menu-title" >Reports</span><span  class="menu-arrow d-lg-none" ></span></span><!--end:Menu link--><!--begin:Menu sub-->
                              <div  class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown px-lg-2 py-lg-4 w-lg-200px" >
                                 <!--begin:Menu item-->
                                 <div  class="menu-item" >
                                    <!--begin:Menu link--><a class="menu-link"  href="#" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right" ><span  class="menu-title" >User Reports</span></a><!--end:Menu link-->
                                 </div>
                                 <!--end:Menu item--><!--begin:Menu item-->
                                 <div  class="menu-item" >
                                    <!--begin:Menu link--><a class="menu-link"  href="#" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right" ><span  class="menu-title" >User Roles Reports</span></a><!--end:Menu link-->
                                 </div>
                                 <!--end:Menu item--><!--begin:Menu item-->
                                 <div  class="menu-item" >
                                    <!--begin:Menu link--><a class="menu-link"  href="#" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right" ><span  class="menu-title" >Lead Enquiry reports</span></a><!--end:Menu link-->
                                 </div>
                                 <!--end:Menu item--><!--begin:Menu item-->
                                 <div  class="menu-item" >
                                    <!--begin:Menu link--><a class="menu-link"  href="#" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right" ><span  class="menu-title" >Master reports</span></a><!--end:Menu link-->
                                 </div>
                                 <!--end:Menu item--><!--begin:Menu item-->
                                 <div  class="menu-item" >
                                    <!--begin:Menu link--><a class="menu-link"  href="#" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right" ><span  class="menu-title" >Survey reports</span></a><!--end:Menu link-->
                                 </div>
                                 <!--end:Menu item--><!--begin:Menu item-->
                                 <div  class="menu-item" >
                                    <!--begin:Menu link--><a class="menu-link"  href="#" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right" ><span  class="menu-title" >Quotation reports</span></a><!--end:Menu link-->
                                 </div>
                                 <!--end:Menu item--><!--begin:Menu item-->
                                 <div  class="menu-item" >
                                    <!--begin:Menu link--><a class="menu-link"  href="#" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right" ><span  class="menu-title" >Payment Reports</span></a><!--end:Menu link-->
                                 </div>
                                 <!--end:Menu item-->
                              </div>
                              <!--end:Menu sub-->
                           </div>
                           <!--end:Menu item-->
                        </div>
                        <!--end::Menu-->
                     </div>
                     <!--end::Menu wrapper-->
                     <!--begin::Navbar-->
                     <div class="app-navbar flex-shrink-0">
                        <!--begin::Quick links-->
                        <div class="app-navbar-item ms-1 ms-lg-5">
                           <!--begin::Menu- wrapper-->
                           <div class="btn btn-icon btn-custom btn-color-gray-600 btn-active-light btn-active-color-primary w-35px h-35px w-md-40px h-md-40px" data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-attach="parent" data-kt-menu-placement="bottom">
                              <i class="ki-outline ki-profile-user fs-1"></i>  
                           </div>
                           <!--begin::Menu-->
                           <div class="menu menu-sub menu-sub-dropdown menu-column w-250px w-lg-375px" data-kt-menu="true">
                              <!--begin::Heading-->
                              <div class="d-flex flex-column flex-center bgi-no-repeat rounded-top px-9 py-10" style="background: linear-gradient(180deg, #1a7f45 0%, #1a7f45 100%);">
                                 <!--begin::Title-->
                                 <h3 class="text-white fw-semibold mb-3">
                                    User Management
                                 </h3>
                                 <!--end::Title-->
                              </div>
                              <!--end::Heading-->
                              <!--begin:Nav-->
                              <div class="row g-0">
                                 <!--begin:Item-->
                                 <div class="col-6">
                                    <a href="#" class="d-flex flex-column flex-center h-100 p-6 bg-hover-light border-end border-bottom">
                                    <i class="ki-outline ki-user fs-3x text-primary mb-2"></i>                <span class="fs-5 fw-semibold text-gray-800 mb-0">User Creation</span>
                                    </a>
                                 </div>
                                 <!--end:Item-->
                                 <!--begin:Item-->
                                 <div class="col-6">
                                    <a href="#" class="d-flex flex-column flex-center h-100 p-6 bg-hover-light border-bottom">
                                    <i class="ki-outline ki-questionnaire-tablet fs-3x text-primary mb-2"></i>                <span class="fs-5 fw-semibold text-gray-800 mb-0">User List</span>
                                    </a>
                                 </div>
                                 <!--end:Item-->
                                 <!--begin:Item-->
                                 <div class="col-6">
                                    <a href="#" class="d-flex flex-column flex-center h-100 p-6 bg-hover-light border-end">
                                    <i class="ki-outline ki-user-tick fs-3x text-primary mb-2"></i>                <span class="fs-5 fw-semibold text-gray-800 mb-0">User Roles Creation</span>
                                    </a>
                                 </div>
                                 <!--end:Item-->
                                 <!--begin:Item-->
                                 <div class="col-6">
                                    <a href="#" class="d-flex flex-column flex-center h-100 p-6 bg-hover-light">
                                    <i class="ki-outline ki-tablet-text-down fs-3x text-primary mb-2"></i>                <span class="fs-5 fw-semibold text-gray-800 mb-0">User Roles List</span>
                                    </a>
                                 </div>
                                 <!--end:Item-->
                              </div>
                              <!--end:Nav-->
                              <!--begin::View more-->
                              <div class="py-2 text-center border-top">
                                 <a href="#" class="btn btn-color-gray-600 btn-active-color-primary">
                                 View All User
                                 <i class="ki-outline ki-arrow-right fs-5"></i>        </a>			 
                              </div>
                              <!--end::View more--> 
                           </div>
                           <!--end::Menu-->
                           <!--end::Menu wrapper-->
                        </div>
                        <!--end::Quick links-->
                        <!--begin::Search-->    
                        <div class="d-flex align-items-center align-items-stretch mx-4">
                           <!--begin::Search-->
                           <div 
                              id="kt_header_search" 
                              class="header-search d-flex align-items-center w-lg-200px"
                              data-kt-search-keypress="true"
                              data-kt-search-min-length="2"
                              data-kt-search-enter="enter"     
                              data-kt-search-layout="menu"
                              data-kt-search-responsive="lg"
                              data-kt-menu-trigger="auto" 
                              data-kt-menu-permanent="true" 
                              data-kt-menu-placement="bottom-start"
                              >
                              <!--begin::Tablet and mobile search toggle-->
                              <div data-kt-search-element="toggle" class="search-toggle-mobile d-flex d-lg-none align-items-center">
                                 <div class="d-flex ">
                                    <i class="ki-outline ki-magnifier fs-1 "></i>                            
                                 </div>
                              </div>
                              <!--end::Tablet and mobile search toggle-->
                              <!--begin::Form(use d-none d-lg-block classes for responsive search)-->
                              <form data-kt-search-element="form" class="d-none d-lg-block w-100 position-relative mb-5 mb-lg-0" autocomplete="off">
                                 <!--begin::Hidden input(Added to disable form autocomplete)-->
                                 <input type="hidden"/>
                                 <!--end::Hidden input-->
                                 <!--begin::Icon-->
                                 <i class="ki-outline ki-magnifier search-icon fs-2 text-gray-500 position-absolute top-50 translate-middle-y ms-5"></i>    <!--end::Icon-->
                                 <!--begin::Input-->
                                 <input type="text" class="search-input form-control form-control  ps-13" name="search" value="" placeholder="Search..." data-kt-search-element="input"/>
                                 <!--end::Input-->
                                 <!--begin::Spinner-->
                                 <span class="search-spinner  position-absolute top-50 end-0 translate-middle-y lh-0 d-none me-5" data-kt-search-element="spinner">
                                 <span class="spinner-border h-15px w-15px align-middle text-gray-400"></span>
                                 </span>
                                 <!--end::Spinner-->
                                 <!--begin::Reset-->
                                 <span class="search-reset  btn btn-flush btn-active-color-primary position-absolute top-50 end-0 translate-middle-y lh-0 d-none me-4" data-kt-search-element="clear">
                                 <i class="ki-outline ki-cross fs-2 fs-lg-1 me-0"></i>    </span>
                                 <!--end::Reset-->
                              </form>
                              <!--end::Form-->
                           </div>
                           <!--end::Search-->    
                        </div>
                        <!--end::Search-->  
                        <!--begin::User menu-->
                        <div class="app-navbar-item ms-3 ms-lg-5" id="kt_header_user_menu_toggle">
                           <!--begin::Menu wrapper-->
                           <div class="cursor-pointer symbol symbol-35px symbol-md-30px"
                              data-kt-menu-trigger="{default: 'click', lg: 'hover'}" 
                              data-kt-menu-attach="parent" 
                              data-kt-menu-placement="bottom-end">
                              <img class="symbol symbol-circle symbol-35px symbol-md-45px" src="{{ asset('assets/media/avatars/user.png') }}" alt="user"/>             
                           </div>
                           <!--begin::User account menu-->
                           <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-color fw-semibold py-4 fs-6 w-275px" data-kt-menu="true">
                              <!--begin::Menu item-->
                              <div class="menu-item px-3">
                                 <div class="menu-content d-flex align-items-center px-3">
                                    <!--begin::Avatar-->
                                    <div class="symbol symbol-50px me-5">
                                       <img alt="Logo" src="{{ asset('assets/media/avatars/user.png') }}"/>
                                    </div>
                                    <!--end::Avatar-->
                                    <!--begin::Username-->
                                    <div class="d-flex flex-column">
                                       <div class="fw-bold d-flex align-items-center fs-5">
                                          User Name
                                       </div>
                                       <a href="#" class="fw-semibold text-muted text-hover-primary fs-7">
                                       hr@servilerelocations.com</a>
                                    </div>
                                    <!--end::Username-->
                                 </div>
                              </div>
                              <!--end::Menu item-->
                              <!--begin::Menu separator-->
                              <div class="separator my-2"></div>
                              <!--end::Menu separator-->
                              <!--begin::Menu item-->
                              <div class="menu-item px-5">
                                 <a href="#" class="menu-link px-5">
                                 My Profile
                                 </a>
                              </div>
                              <!--end::Menu item-->
                              <!--begin::Menu item-->
                              <div class="menu-item px-5">
                                 <a href="#" class="menu-link px-5">
                                 <span class="menu-text">My Leads</span>
                                 </a>
                              </div>
                              <!--end::Menu item-->
                              <!--begin::Menu separator-->
                              <div class="separator my-2"></div>
                              <!--end::Menu separator-->
                              <!--begin::Menu item-->
                              <div class="menu-item px-5">
                                 <a href="{{route('signout.process')}}" id="signoutButton" class="menu-link px-5 ">
                                 Sign Out
                                 </a>
                              </div>
                              <!--end::Menu item-->
                           </div>
                           <!--end::User account menu-->
                           <!--end::Menu wrapper-->
                        </div>
                        <!--end::User menu-->
                        <!--begin::Header menu toggle-->
                        <!--end::Header menu toggle-->
                     </div>
                     <!--end::Navbar-->	
                  </div>
                  <!--end::Header wrapper-->            
               </div>
               <!--end::Header container-->
            </div>
            <!--end::Header-->
            <!--begin::Wrapper-->
            <div class="app-wrapper  flex-column flex-row-fluid " id="kt_app_wrapper">
               <!--begin::Toolbar-->
               <div id="kt_app_toolbar" class="app-toolbar  py-6 " 
                  >
                  <!--begin::Toolbar container-->
                  <div id="kt_app_toolbar_container" class="app-container  container-xxl d-flex align-items-start ">
                     <!--begin::Toolbar container-->
                     <div class="d-flex flex-column flex-row-fluid">
                        <!--begin::Toolbar wrapper-->
                        <div class="d-flex align-items-center pt-1">
                           <!--begin::Breadcrumb-->
                           <ul class="breadcrumb breadcrumb-separatorless fw-semibold">
                              <!--begin::Item-->
                              <li class="breadcrumb-item text-white fw-bold lh-1">
                                 <a href="#" class="text-white">
                                 <i class="ki-outline ki-home text-white fs-3"></i> 
                                 </a>
                              </li>
                              <!--end::Item-->
                              <!--begin::Item-->
                              <li class="breadcrumb-item">
                                 <i class="ki-outline ki-right fs-4 text-white mx-n1"></i>                
                              </li>
                              <!--end::Item-->
                              <!--begin::Item-->
                              <li class="breadcrumb-item text-white fw-bold lh-1">
                                 Master                                    
                              </li>
                              <!--end::Item-->
                              <!--begin::Item-->
                              <li class="breadcrumb-item">
                                 <i class="ki-outline ki-right fs-4 text-white mx-n1"></i>                
                              </li>
                              <!--end::Item-->
                              <!--begin::Item-->
                              <li class="breadcrumb-item text-white fw-bold lh-1">
                                 @yield('title')                                    
                              </li>
                              <!--end::Item-->
                           </ul>
                           <!--end::Breadcrumb-->
                        </div>
                        <!--end::Toolbar wrapper--->
                        <!--begin::Toolbar wrapper--->
                        <div class="d-flex flex-stack flex-wrap flex-lg-nowrap gap-4 gap-lg-10 pt-6 pb-18 py-lg-13">
                           <!--begin::Page title-->
                           <div class="page-title d-flex align-items-center me-3">
                              <!--begin::Title-->
                              <h1 class="page-heading d-flex text-white fw-bolder fs-2 flex-column justify-content-center my-0">
                                 @yield('title')
                                 <!--begin::Description-->
                                 <span class="page-desc text-white opacity-50 fs-6 fw-bold pt-4">
                                 @yield('pageDescription')           </span>
                                 <!--end::Description-->
                              </h1>
                              <!--end::Title-->    
                           </div>
                           <!--end::Page title--> 
                           <!--begin::Items-->
                           <div class="d-flex gap-4 gap-lg-13">
                              <!--begin::Item-->
                              <div class="d-flex flex-column">
                                 <!--begin::Number-->           
                                 <span class="text-white fw-bold fs-3 mb-1">1500</span> 
                                 <!--end::Number-->              
                                 <!--begin::Section-->
                                 <div class="text-white opacity-50 fw-bold">Total No. of Leads</div>
                                 <!--end::Section-->             
                              </div>
                              <!--end::Item-->
                              <!--begin::Item-->
                              <div class="d-flex flex-column">
                                 <!--begin::Number-->           
                                 <span class="text-white fw-bold fs-3 mb-1">800</span> 
                                 <!--end::Number-->              
                                 <!--begin::Section-->
                                 <div class="text-white opacity-50 fw-bold">No. of WON Leads</div>
                                 <!--end::Section-->             
                              </div>
                              <!--end::Item-->
                              <!--begin::Item-->
                              <div class="d-flex flex-column">
                                 <!--begin::Number-->           
                                 <span class="text-white fw-bold fs-3 mb-1">400</span> 
                                 <!--end::Number-->              
                                 <!--begin::Section-->
                                 <div class="text-white opacity-50 fw-bold">No. of Lost Leads</div>
                                 <!--end::Section-->             
                              </div>
                              <!--end::Item-->
                              <!--begin::Item-->
                              <div class="d-flex flex-column">
                                 <!--begin::Number-->           
                                 <span class="text-white fw-bold fs-3 mb-1">300</span> 
                                 <!--end::Number-->              
                                 <!--begin::Section-->
                                 <div class="text-white opacity-50 fw-bold">No. of Pending Leads</div>
                                 <!--end::Section-->             
                              </div>
                              <!--end::Item-->
                           </div>
                           <!--end::Items-->    
                        </div>
                        <!--end::Toolbar wrapper--->
                     </div>
                     <!--end::Toolbar container--->        
                  </div>
                  <!--end::Toolbar container-->
               </div>
               <!--end::Toolbar-->            
               <!--begin::Wrapper container-->
               <div class="app-container  container-xxl ">
                  <!--begin::Main-->
                  <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
                     <!--begin::Content wrapper-->
                     <div class="d-flex flex-column flex-column-fluid">
                        <!--begin::Content-->
                        <div id="kt_app_content" class="app-content " >
                           @yield('content')
                        </div>
                        <!--end::Content-->					
                     </div>
                     <!--end::Content wrapper-->
                     <!--begin::Footer-->
                     <div id="kt_app_footer" class="app-footer  d-flex flex-column flex-md-row align-items-center flex-center flex-md-stack py-2 py-lg-4 " >
                        <!--begin::Copyright-->
                        <div class="text-dark order-2 order-md-1">
                           <span class="text-muted fw-semibold me-1">2023&copy;</span>
                           <a href="#" target="_blank" class="text-gray-800 text-hover-primary">Servile Relocations. All Rights Reserved.</a>
                        </div>
                        <!--end::Copyright-->
                        <!--begin::Menu-->
                        <ul class="menu menu-gray-600 menu-hover-primary fw-semibold order-1">
                           <li class="menu-item"><a href="#" target="_blank" class="menu-link px-2">About</a></li>
                           <li class="menu-item"><a href="#" target="_blank" class="menu-link px-2">Contact Us</a></li>
                        </ul>
                        <!--end::Menu-->    
                     </div>
                     <!--end::Footer-->                            
                  </div>
                  <!--end:::Main-->
               </div>
               <!--end::Wrapper container-->
            </div>
            <!--end::Wrapper-->
         </div>
         <!--end::Page-->
      </div>
      <!--end::App-->
      <!--end::Drawers-->
      <!--begin::Engage-->
      <div class="app-engage " id="kt_app_engage">
         <!--begin::Prebuilts toggle-->
         <a href="#" data-bs-toggle="modal" data-bs-target="#kt_app_engage_prebuilts_modal" class="app-engage-btn hover-dark">			
         <i class="ki-outline ki-people fs-1 pt-1 mb-2"></i>					Clients
         </a>
         <!--end::Prebuilts toggle-->
         <!--begin::Get help-->
         <a href="#" class="app-engage-btn hover-primary">			
         <i class="ki-outline ki-like-shapes fs-1 pt-1 mb-2"></i>					Contact
         </a>
         <!--end::Get help-->
         <!--begin::Prebuilts toggle-->
         <a href="#" target="_blank" class="app-engage-btn hover-success">			
         <i class="ki-outline ki-document fs-2 pt-1 mb-2"></i>					Reports
         </a>
         <!--end::Prebuilts toggle-->
         <!--begin::Engage close-->
         <a href="#" id="kt_app_engage_toggle_off" class="app-engage-btn app-engage-btn-toggle-off text-hover-primary p-0">			
         <i class="ki-outline ki-cross fs-2x"></i>				</a>
         <!--end::Engage close-->
         <!--begin::Engage close-->
         <a href="#" id="kt_app_engage_toggle_on" class="app-engage-btn app-engage-btn-toggle-on text-hover-primary p-0" data-bs-toggle="tooltip" data-bs-placement="left" data-bs-custom-class="tooltip-inverse" data-bs-dimiss="click" title="Explore More">		
         <i class="ki-outline ki-question fs-2 text-primary"></i>				</a>
         <!--end::Engage close-->
      </div>
      <!--end::Engage-->
      <!--begin::Scrolltop-->
      <div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
         <i class="ki-outline ki-arrow-up"></i>
      </div>
      <!--end::Scrolltop-->
      <!--begin::Modals-->
      <!--end::Modals-->
      <!--begin::Javascript-->
      <!--begin::Global Javascript Bundle(mandatory for all pages)-->
      <script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
      <script src="{{ asset('assets/js/scripts.bundle.js') }}"></script>
      <!--end::Global Javascript Bundle-->
      <!--begin::Vendors Javascript(used for this page only)-->
      <script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
      <script src="{{ asset('assets/plugins/custom/formrepeater/formrepeater.bundle.js') }}"></script>
      {{-- Logout function --}}
      <script>
         // Click function for the signout button
        $('#signoutButton').click(function() {
            // Make an AJAX request to the logout route
            $.ajax({
                url: '{{ route("signout.process") }}',
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                success: function(response) {
                    // Handle the success response, you can redirect or perform any other action
                    console.log('Signout successful');
                },
                error: function(xhr, status, error) {
                    // Handle errors
                    console.error('Signout failed:', xhr.responseText);
                }
            });
        });
      </script>
      <!--end::Vendors Javascript-->
      <!--begin::Custom Javascript(used for this page only)-->
      @stack('scripts')
      <!--end::Custom Javascript-->
      <!--end::Javascript-->
   </body>
   <!--end::Body-->
</html>