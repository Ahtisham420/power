
<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link" href="{{ url('admin') }}">
                    <i class="nav-icon icon-speedometer"></i> Dashboard
                </a>
            </li>
                <li class="nav-item nav-dropdown">
                    <a class="nav-link nav-dropdown-toggle" href="#">
                        <i class="nav-icon icon-people"></i> {{ __('admin/layout.sidebar_users') }}</a>
                    <ul class="nav-dropdown-items">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('all-users') }}" target="_top">
                                <i class="nav-icon icon-list"></i> {{ __('admin/layout.sidebar_users_list') }}</a>
                        </li>  <li class="nav-item">
                            <a class="nav-link" href="{{ route('all-user-payment') }}" target="_top">
                                <i class="nav-icon icon-list"></i>User Payment List</a>
                        </li>
                        <!--<li class="nav-item">-->
                        <!--    <a class="nav-link" href="{{ route('roles.index') }}" target="_top">-->
                        <!--        <i class="nav-icon icon-list"></i> {{ __('admin/layout.sidebar_roles_list') }}-->
                        <!--    </a>-->
                        <!--</li>-->
                       <li class="nav-item">
    <a class="nav-link" href="{{ route('all-users-pakg') }}" target="_top">
    <i class="nav-icon icon-plus"></i>Users Packages</a>
    </li>
                        @can('subscriber')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('counter-subscribers') }}" target="_top">
                                    <i class="nav-icon icon-list"></i> {{ __('admin/layout.sidebar_subscribers_list') }}
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#">
                    <i class="nav-icon icon-bag"></i> Packages</a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('all-packages') }}" target="_top">
                            <i class="nav-icon icon-list"></i> Packages List</a>
                    </li>
                    <!--<li class="nav-item">-->
                    <!--    <a class="nav-link" href="{{ route('create-packages') }}" target="_top">-->
                    <!--        <i class="nav-icon icon-plus"></i> Package Form</a>-->
                    <!--</li>-->
                </ul>
            </li>
            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#">
                    <i class="nav-icon fa fa-car"></i> Power Car Settings</a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('all-car-settings',["key" => "engine-types"]) }}" target="_top">
                            <i class="nav-icon icon-list"></i> Engin Types</a>
                    </li>
                    {{--<li class="nav-item">--}}
                        {{--<a class="nav-link" href="{{ route('all-car-settings',["key" => "colors"]) }}" target="_top">--}}
                            {{--<i class="nav-icon icon-list"></i>Color </a>--}}
                    {{--</li>--}}
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('all-car-settings',["key" => "matt-paint"]) }}" target="_top">
                            <i class="nav-icon icon-list"></i>Matt Paint </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('all-car-settings',["key" => "wheel-size"]) }}" target="_top">
                            <i class="nav-icon icon-list"></i>Wheel Size</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('all-car-settings',["key" => "exhaust"]) }}" target="_top">
                            <i class="nav-icon icon-list"></i>Exhaust</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('all-car-settings',["key" => "parking-sensor"]) }}" target="_top">
                            <i class="nav-icon icon-list"></i>Parking Sensor</a>
                    </li>
					  <li class="nav-item">
                        <a class="nav-link" href="{{ route('all-car-settings',["key" => "car-type"]) }}" target="_top">
                            <i class="nav-icon icon-list"></i>Body Type</a>
                    </li>
					  {{--<li class="nav-item">--}}
                        {{--<a class="nav-link" href="{{ route('all-car-settings',["key" => "body-type"]) }}" target="_top">--}}
                            {{--<i class="nav-icon icon-list"></i>Body Type</a>--}}
                    {{--</li>--}}
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('all-car-settings',["key" => "interior"]) }}" target="_top">
                            <i class="nav-icon icon-list"></i>Interior</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('all-car-settings',["key" => "import"]) }}" target="_top">
                            <i class="nav-icon icon-list"></i>Import</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('all-car-settings',["key" => "service-history"]) }}" target="_top">
                            <i class="nav-icon icon-list"></i>Service History</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('all-car-settings',["key" => "boot-spoiler"]) }}" target="_top">
                            <i class="nav-icon icon-list"></i>Boot Spoiler</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('all-car-settings',["key" => "model"]) }}" target="_top">
                            <i class="nav-icon icon-list"></i>Model</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('all-car-settings',["key" => "variant"]) }}" target="_top">
                            <i class="nav-icon icon-list"></i>Variant</a>
                    </li>
                    {{--<li class="nav-item">--}}
                        {{--<a class="nav-link" href="{{ route('all-car-settings',["key" => "car-make"]) }}" target="_top">--}}
                            {{--<i class="nav-icon icon-user-follow"></i>Car Make</a>--}}
                    {{--</li>--}}
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('all-car-settings',["key" => "saftey-feature"]) }}" target="_top">
                            <i class="nav-icon icon-list"></i>Saftey  Features</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('all-car-settings',["key" => "entertainment-feature"]) }}" target="_top">
                            <i class="nav-icon icon-list"></i>Entertainment  Features</a>
                    </li>


                </ul>
            </li>

            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#">
                    <i class="nav-icon fa fa-car"></i> Power Cars Adverts</a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('all-sell-types',['model'=>'American-Muscle']) }}" target="_top">
                            <i class="nav-icon icon-list"></i>American Muscle</a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('all-sell-types',['model'=>'featured']) }}" target="_top">
                            <i class="nav-icon icon-list"></i>Featured</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('all-sell-types',['model'=>'Auction']) }}" target="_top">
                            <i class="nav-icon icon-list""></i>Auction</a>
                    </li>
                    {{--<li class="nav-item">--}}
                        {{--<a class="nav-link" href="{{ route('all-sell-types',['model'=>'Auction']) }}" target="_top">--}}
                            {{--<i class="nav-icon icon-list""></i>Lease cars</a>--}}
                    {{--</li>--}}
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('all-sell-types',['model'=>'Sell']) }}" target="_top">
                            <i class="nav-icon icon-list""></i>Classified</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('all-sell-types',['model'=>'Prestige']) }}" target="_top">
                            <i class="nav-icon icon-list""></i>Prestige</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('all-sell-types',['model'=>'Rent']) }}" target="_top">
                            <i class="nav-icon icon-list""></i>Rental</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('all-sell-types',['model'=>'Swap']) }}" target="_top">
                            <i class="nav-icon icon-list""></i>Swaps</a>
                    </li>
                </ul>
            </li>

            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#">
                    <i class="nav-icon fa fa-car"></i>Car Reports</a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('car-report-list') }}" target="_top">
                            <i class="nav-icon icon-list"></i>Car Reports Lists</a>
                    </li>
                </ul>
            </li>
            


            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#">
                    <i class="nav-icon fa fa-font-awesome"></i> Manufacturers</a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('all-brands') }}" target="_top">
                            <i class="nav-icon icon-list"></i> {{ __('admin/layout.sidebar_brands_list') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('create-brand') }}" target="_top">
                            <i class="nav-icon icon-plus"></i> {{ __('admin/layout.sidebar_brands_form') }}</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#">
                    <i class="nav-icon fa fa-cogs"></i>
                    {{ __('admin/layout.sidebar_website_settings') }}</a>
                <ul class="nav-dropdown-items">
                    {{--<li class="nav-item">--}}
                        {{--<a class="nav-link" href="{{ route('meta-settings') }}" target="_top">--}}
                            {{--<i class="nav-icon icon-settings"></i>Meta Settings</a>--}}
                    {{--</li>--}}
                    <li class="nav-item nav-dropdown">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="nav-icon icon-pencil"></i>
                            {{ __('admin/layout.sidebar_blog') }} </a>
                        <ul class="nav-dropdown-items">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('posts.index') }}" target="_top">
                                    <i class="nav-icon icon-list"></i> {{ __('admin/layout.sidebar_all_blog_posts') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('events.index') }}" target="_top">
                                    <i class="nav-icon icon-list"></i>Events</a>
                            </li>
                              <li class="nav-item">
                                <a class="nav-link" href="{{ route('careers.index') }}" target="_top">
                                    <i class="nav-icon icon-list"></i>Careers</a>
                            </li>
                            {{--<li class="nav-item">--}}
                            {{--<a class="nav-link" href="{{ route('posts.create') }}" target="_top">--}}
                            {{--<i class="fa fa-plus fa-fw"></i> Add Post</a>--}}
                            {{--</li>--}}
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('comments.index') }}" target="_top">
                                    <i class="fa fa-fw fa-comments"></i> {{ __('admin/layout.sidebar_all_comments') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('car.comment') }}" target="_top">
                                    <i class="fa fa-fw fa-comments"></i>Car Comments</a>
                            </li>
                            <?php $comment_approval_count = App\Comment::withoutGlobalScopes()->where("approved", false)->count(); ?>
                            {{--<li class="nav-item">--}}
                                {{--<a class="nav-link @if($comment_approval_count>0) list-group-item-warning @endif"--}}
                                   {{--href="{{ route('comments.index') }}?waiting_for_approval=true" target="_top">--}}
                                    {{--<i class="fa fa-plus fa-fw"></i>{{ $comment_approval_count }} {{ __('admin/layout.sidebar_waiting_for_approval') }}</a>--}}
                            {{--</li>--}}

                        </ul>
                    </li>
                    <li class="nav-item nav-dropdown">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="nav-icon icon-pencil"></i>
                           PPC News Letter </a>
                        <ul class="nav-dropdown-items">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('ppc.index') }}" target="_top">
                                    <i class="nav-icon icon-list"></i>Letter Lists</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('ppc.create') }}" target="_top">
                                    <i class="nav-icon icon-list"></i>Create Letter</a>
                            </li>
                           

                              <li class="nav-item">
                                <a class="nav-link" href="{{ route('subscriber-list') }}" target="_top">
                                    <i class="nav-icon icon-list"></i>Subscriber List</a>
                            </li>
                        </ul>
                    </li>
                       <li class="nav-item nav-dropdown">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="nav-icon icon-pencil"></i>
                            Privacy Policy </a>
                        <ul class="nav-dropdown-items">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('privacy-policy.index') }}" target="_top">
                                    <i class="nav-icon icon-list"></i>Privacy Policy Lists</a>
                            </li>
                            <!--<li class="nav-item">-->
                            <!--    <a class="nav-link" href="{{ route('privacy-policy.create') }}" target="_top">-->
                            <!--        <i class="nav-icon icon-list"></i>Privacy Policy Create</a>-->
                            <!--</li>-->



                        </ul>
                    </li>
                     <li class="nav-item nav-dropdown">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="nav-icon icon-pencil"></i>
                            Terms&Conditions </a>
                        <ul class="nav-dropdown-items">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('term-condition.index') }}" target="_top">
                                    <i class="nav-icon icon-list"></i>Terms & Condition Lists</a>
                            </li>
                            <!--<li class="nav-item">-->
                            <!--    <a class="nav-link" href="{{ route('term-condition.create') }}" target="_top">-->
                            <!--        <i class="nav-icon icon-list"></i>Terms & Condition Create</a>-->
                            <!--</li>-->



                        </ul>
                    </li>
                   
                   

                    <li class="nav-item nav-dropdown">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="nav-icon fa fa-font-awesome"></i> Testimonial</a>
                        <ul class="nav-dropdown-items">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('testimonial.index') }}" target="_top">
                                    <i class="nav-icon icon-list"></i>Testimonial List</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('testimonial.create') }}" target="_top">
                                    <i class="nav-icon icon-plus"></i>Testimonial Form</a>
                            </li>
                        </ul>
                    </li>
                      <li class="nav-item nav-dropdown">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="nav-icon fa fa-font-awesome"></i> Contact Us</a>
                        <ul class="nav-dropdown-items">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('contact-us-list') }}" target="_top">
                                    <i class="nav-icon icon-list"></i>Contact Us List</a>
                            </li>

                        </ul>
                    </li>
                    <li class="nav-item nav-dropdown">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="nav-icon fa fa-font-awesome"></i>Home Slider</a>
                        <ul class="nav-dropdown-items">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('homeImage.index') }}" target="_top">
                                    <i class="nav-icon icon-list"></i>Home Slider list</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('homeImage.create') }}" target="_top">
                                    <i class="nav-icon icon-plus"></i>Home Slider Form</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#">
                    <i class="nav-icon fa fa-cogs"></i> {{ __('admin/layout.sidebar_system_settings') }} </a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('settings.index') }}" target="_top">
                            <i class="nav-icon icon-list"></i>All settings</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('form-settings') }}" target="_top">
                            <i class="nav-icon icon-plus"></i> Setting Form</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logs.index') }}" target="_top">
                            <i class="nav-icon icon-plus"></i> {{ __('admin/layout.sidebar_logs') }} </a>
                    </li>
                </ul>
            </li>
            <!--<li class="nav-item nav-dropdown">-->
            <!--    <a class="nav-link" href="{{ route('all-engin-types') }}" target="_top">-->
            <!--        <i class="nav-icon fa fa-car"></i>Feature Car</a>-->
            <!--</li>-->
            <li class="nav-item nav-dropdown">
                <a class="nav-link" href="{{ route('all-engin-types') }}" target="_top">
                    <i class="nav-icon icon-list"></i>Paypal Settings</a>
            </li>
            <li class="nav-item nav-dropdown">
                <a class="nav-link" href="{{ route('all-engin-types') }}" target="_top">
                    <i class="nav-icon icon-list"></i>Payment Settings</a>
            </li>
            {{--<li class="nav-item nav-dropdown">--}}
                {{--<a class="nav-link nav-dropdown-toggle" href="#">--}}
                    {{--<i class="nav-icon fa fa-bell"></i> {{ __('admin/layout.sidebar_notification') }}</a>--}}
                {{--<ul class="nav-dropdown-items">--}}
                    {{--<li class="nav-item">--}}
                        {{--<a class="nav-link" href="{{ route('notifications.index') }}" target="_top">--}}
                            {{--<i class="nav-icon icon-list"></i> {{ __('admin/layout.sidebar_notification_list') }}--}}
                        {{--</a>--}}
                    {{--</li>--}}
                    {{--<li class="nav-item">--}}
                        {{--<a class="nav-link" href="{{ route('notifications.create') }}" target="_top">--}}
                            {{--<i class="nav-icon icon-plus"></i> {{ __('admin/layout.sidebar_notification_form') }}--}}
                        {{--</a>--}}
                    {{--</li>--}}
                {{--</ul>--}}
            {{--</li>--}}
            {{--<li class="nav-item nav-dropdown">--}}
                {{--<a class="nav-link nav-dropdown-toggle" href="#">--}}
                    {{--<i class="fa fa-cogs"></i> Settings</a>--}}
                {{--<ul class="nav-dropdown-items">--}}
                    {{--<li class="nav-item">--}}
                        {{--<a class="nav-link" href="{{ route('settings.index') }}" target="_top">--}}
                            {{--<i class="nav-icon icon-list"></i>All settings</a>--}}
                    {{--</li>--}}
                    {{--<li class="nav-item">--}}
                        {{--<a class="nav-link" href="{{ route('form-settings') }}" target="_top">--}}
                            {{--<i class="nav-icon icon-plus"></i> Setting Form</a>--}}
                    {{--</li>--}}
                {{--</ul>--}}
            {{--</li>--}}
        </ul>
    </nav>
    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>
