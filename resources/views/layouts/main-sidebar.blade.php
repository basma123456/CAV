<div class="container-fluid">
    <div class="row">
        <!-- Left Sidebar start-->
        <div class="side-menu-fixed">
            <div class="scrollbar side-menu-bg">
                <ul class="nav navbar-nav side-menu" id="sidebarnav">
                    <!-- menu item Dashboard-->
                    <li>
                        <a href={{route("dashboard.home")}}><i class="ti-home"></i><span class="right-nav-text">@lang("sidebar.dashboard")</span> </a>
                    </li>
                    <!-- menu title -->
                    <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title"> @lang("sidebar.components")</li>
                    <!-- menu item Elements-->
                    <li>
                        <a href={{route("dashboard.department.index")}}><i class="ti-palette"></i><span class="right-nav-text">@lang("sidebar.departments")</span> </a>
                    </li>
                    <!-- Start Li-->
                        <li>
                            <a href="javascript:void(0);" data-toggle="collapse" data-target="#categories">
                                <div class="pull-left"><i class="ti-palette"></i><span
                                        class="right-nav-text">@lang("sidebar.categories")</span></div>
                                <div class="pull-right"><i class="ti-plus"></i></div>
                                <div class="clearfix"></div>
                            </a>
                            <ul id="categories" class="collapse" data-parent="#categories">
                                <li> <a href="{{route("dashboard.x.index")}}"> @lang("sidebar.all_categories")</a> </li>
                            </ul>
                        </li>
                    <!-- End Li-->
                    <!-- Start Li-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#sub_category">
                            <div class="pull-left"><i class="ti-palette"></i><span
                                    class="right-nav-text">@lang("sidebar.sub_cate")</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="sub_category" class="collapse" data-parent="#sub_category">
                            <li> <a href="{{route("dashboard.subCategory.index")}}"> @lang("sidebar.all_sub_cate")</a> </li>
                        </ul>
                    </li>
                    <!-- End Li-->

                    <!-- Start Li-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#employees">
                            <div class="pull-left"><i class="ti-palette"></i><span
                                    class="right-nav-text">@lang("sidebar.employees")</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="employees" class="collapse" data-parent="#employees">
                            <li> <a href="{{route("dashboard.employee.index")}}"> @lang("sidebar.all_employees")</a> </li>
                            <li> <a href="{{route("dashboard.employee.create")}}"> @lang("global.add")</a> </li>
                        </ul>
                    </li>
                    <!-- End Li-->

                    <!-- Start Li-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#plans">
                            <div class="pull-left"><i class="ti-palette"></i><span
                                    class="right-nav-text">@lang("sidebar.plans")</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="plans" class="collapse" data-parent="#plans">
                            <li> <a href="{{route("dashboard.plan.index")}}"> @lang("sidebar.all_plans")</a> </li>
                            <li> <a href="{{route("dashboard.plan.create")}}"> @lang("global.add")</a> </li>
                        </ul>
                    </li>
                    <!-- End Li-->

                    <!-- Start Li-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#preCustomer">
                            <div class="pull-left"><i class="ti-palette"></i><span
                                    class="right-nav-text">@lang("sidebar.customers")</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="preCustomer" class="collapse" data-parent="#preCustomer">
                            <li> <a href="{{route("dashboard.customer.index")}}"> @lang("sidebar.all_customers")</a> </li>
                            <li> <a href="{{route("dashboard.customer.create")}}"> @lang("global.add")</a> </li>
                        </ul>
                    </li>
                    <!-- End Li-->


                    <!-- Start Li-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#deals">
                            <div class="pull-left"><i class="ti-palette"></i><span
                                    class="right-nav-text">@lang("sidebar.deals")</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="deals" class="collapse" data-parent="#deals">
                            <li> <a href="{{route('dashboard.deals.index')}}"> @lang("sidebar.all_deals")</a> </li>
                            <li> <a href="{{route('dashboard.deals.new')}}"> @lang("sidebar.new_deals")</a> </li>
                            <li> <a href="{{route('dashboard.deals.underWork')}}"> @lang("sidebar.deal_under_work")</a> </li>
                            <li> <a href="{{route('dashboard.deals.done')}}"> @lang("sidebar.complete_deals")</a> </li>
                        </ul>
                    </li>
                    <!-- End Li-->
                </ul>
            </div>
        </div>

        <!-- Left Sidebar End-->

        <!--=================================
