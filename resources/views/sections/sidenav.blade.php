
        <aside class="left-sidebar" data-sidebarbg="skin6">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar" data-sidebarbg="skin6">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="sidebar-item">
                            <a class="sidebar-link sidebar-link" href="{{route('home')}}" aria-expanded="false">
                                <i data-feather="home" class="feather-icon"></i>
                                <span class="hide-menu">Eligibility Check</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link sidebar-link" href="{{route('offers')}}" aria-expanded="false">
                                <i data-feather="home" class="feather-icon"></i>
                                <span class="hide-menu">Offers</span>
                            </a>
                        </li>
                       {{-- <li class="list-divider"></li>
                        <li class="nav-small-cap"><span class="hide-menu">Applications</span></li>

                        <li class="sidebar-item"> <a class="sidebar-link" href="ticket-list.html"
                                aria-expanded="false"><i data-feather="tag" class="feather-icon"></i><span
                                    class="hide-menu">Ticket List
                                </span></a>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="app-chat.html"
                                aria-expanded="false"><i data-feather="message-square" class="feather-icon"></i><span
                                    class="hide-menu">Chat</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="app-calendar.html"
                                aria-expanded="false"><i data-feather="calendar" class="feather-icon"></i><span
                                    class="hide-menu">Calendar</span></a></li>

                        <li class="list-divider"></li> --}}
                        <li class="nav-small-cap"><span class="hide-menu">Components</span></li>
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)"
                                aria-expanded="false"><i class="icon-user"></i><span
                                    class="hide-menu">Users Management</span></a>
                            <ul aria-expanded="false" class="collapse  first-level base-level-line">
                                <li class="sidebar-item"><a href="{{route('user.role.index')}}" class="sidebar-link"><span
                                            class="hide-menu">View Roles
                                        </span></a>
                                </li>
                                <li class="sidebar-item"><a href="{{route('user.role.create')}}" class="sidebar-link"><span
                                            class="hide-menu">Create Role
                                        </span></a>
                                </li>
                                <li class="sidebar-item"><a href="{{route('user.list.index')}}" class="sidebar-link"><span
                                            class="hide-menu">User List
                                        </span></a>
                                </li>
                            </ul>
                        </li>
                        

                        <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)"
                            aria-expanded="false"><i class="icon-user"></i><span
                                class="hide-menu"> Student Management</span></a>
                            <ul aria-expanded="false" class="collapse  first-level base-level-line">
                                <li class="sidebar-item"><a href="{{route('student.assign.create')}}" class="sidebar-link"><span
                                            class="hide-menu"> Assign Counselor
                                        </span></a>
                                </li>
                                <li class="sidebar-item"><a href="{{route('student.new.list',['status'=>'new_leads'])}}" class="sidebar-link"><span
                                            class="hide-menu"> New Applied
                                        </span></a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="{{route('student.scheduled.list',['status'=>'scheduled'])}}" class="sidebar-link"><span
                                            class="hide-menu"> Scheduled
                                        </span>
                                    </a>
                                </li>
                                <li class="sidebar-item"><a href="{{route('student.not_interested.list',['status'=>'not_interested'])}}" class="sidebar-link"><span
                                            class="hide-menu"> Not Interested
                                        </span></a>
                                </li>
                                <li class="sidebar-item"><a href="{{route('student.not_answered.list',['status'=>'not_answered'])}}" class="sidebar-link"><span
                                            class="hide-menu"> Not Answered
                                        </span></a>
                                </li>
                                <li class="sidebar-item"><a href="{{route('student.interested.list',['status'=>'interested'])}}" class="sidebar-link"><span
                                            class="hide-menu"> Interested
                                        </span></a>
                                </li>
                                <li class="sidebar-item"><a href="{{route('student.interested.list',['status'=>'visitor'])}}" class="sidebar-link"><span
                                                class="hide-menu"> Visitor
                                        </span></a>
                                </li>
{{-- 
                                <li class="sidebar-item"><a href="{{route('leads.list')}}" class="sidebar-link"><span
                                                class="hide-menu"> Manual Lead List
                                        </span></a>
                                </li>
 --}}                            </ul>
                        </li>

                        <li class="nav-small-cap"><span class="hide-menu">Administrative</span></li>
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)"
                                aria-expanded="false"><i class="icon-user"></i><span
                                    class="hide-menu">Settings</span></a>
                            <ul aria-expanded="false" class="collapse  first-level base-level-line">
                                <li class="sidebar-item"><a href="{{route('setting.country.index')}}" class="sidebar-link"><span
                                            class="hide-menu">Country
                                        </span></a>
                                </li>
                                <li class="sidebar-item"><a href="{{route('setting.university.index')}}" class="sidebar-link"><span
                                            class="hide-menu">University
                                        </span></a>
                                </li>
                                <li class="sidebar-item"><a href="{{route('setting.subject.index')}}" class="sidebar-link"><span
                                            class="hide-menu">Subject
                                        </span></a>
                                </li>
                                <li class="sidebar-item"><a href="{{route('degree_type_list')}}" class="sidebar-link"><span
                                            class="hide-menu">Degree Type
                                        </span></a>
                                </li>
                                <li class="sidebar-item"><a href="{{route('setting.program.index')}}" class="sidebar-link"><span
                                            class="hide-menu">Program
                                        </span></a>
                                </li>
                                <li class="sidebar-item"><a href="{{route('setting.defaultUploadTitle.index')}}" class="sidebar-link"><span
                                            class="hide-menu">DefaultUpload Title
                                        </span></a>
                                </li>
                                
                            </ul>
                        </li>
                        <li class="nav-small-cap"><span class="hide-menu">Accounts</span></li>
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)"
                                aria-expanded="false"><i class="icon-user"></i><span
                                    class="hide-menu">Accounts Management</span></a>
                            <ul aria-expanded="false" class="collapse  first-level base-level-line">
                                <li class="sidebar-item"><a href="{{route('account.head.index')}}" class="sidebar-link"><span
                                            class="hide-menu">Accounts Head
                                        </span></a>
                                </li>
                               
                            </ul>
                        </li>
                    </ul> 
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>