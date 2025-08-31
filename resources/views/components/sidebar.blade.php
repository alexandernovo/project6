<aside class="left-sidebar" style="background-color: #545454">
    <div class="h-100">
        <div class="mt-3 mb-4">
            <div class="d-flex justify-content-center gap-2 align-items-center mb-2">
                <img src="{{ asset('assets/images/logo2.png') }}" class="bg-white rounded-circle" width=""
                    alt="" style="width: 78px; height: 78px" />
                <img src="{{ asset('assets/images/logo1.png') }}" class="bg-white rounded-circle" width=""
                    alt="" style="width: 78px; height: 78px" />
            </div>
            <p class="mb-0 text-center text-white font-semibold" style="font-size: 17px;">TIBIAO MDRRMO PORTAL</p>
        </div>
        <nav class="sidebar-nav scroll-sidebar mt-1 position-relative pb-3 h-100">
            <ul id="sidebarnav">
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('dashboard') }}" aria-expanded="false">
                        <span>
                            <i class="bi bi-microsoft"></i>
                        </span>
                        <span class="hide-menu">Dashboard</span>
                    </a>
                </li>
                <hr class="border-top border-white">
                @if (auth()->user() && auth()->user()->usertype == 'ADMIN')
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ route('incidentreport_view') }}" aria-expanded="false">
                            <span>
                                <i class="bi bi-journals"></i>
                            </span>
                            <span class="hide-menu">Incident Report</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ route('situationalreport_view') }}" aria-expanded="false">
                            <span>
                                <i class="bi bi-journals"></i>
                            </span>
                            <span class="hide-menu">Situational Report</span>
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ route('progressreport_view') }}" aria-expanded="false">
                            <span>
                                <i class="bi bi-journals"></i>
                            </span>
                            <span class="hide-menu">Progress Report</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ route('inventoryreport_view') }}" aria-expanded="false">
                            <span>
                                <i class="bi bi-journals"></i>
                            </span>
                            <span class="hide-menu">Inventory Report</span>
                        </a>
                    </li>
                    <hr class="border-top border-white">
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ route('staffreport_view') }}" aria-expanded="false">
                            <span>
                                <i class="bi bi-folder2-open"></i>
                            </span>
                            <span class="hide-menu">Staff's Submit Report</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ route('report_view') }}" aria-expanded="false">
                            <span>
                                <i class="bi bi-folder2-open"></i>
                            </span>
                            <span class="hide-menu">Records Report</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ route('user_view') }}" aria-expanded="false">
                            <span>
                                <i class="bi bi-people-fill"></i>
                            </span>
                            <span class="hide-menu">Staff User</span>
                        </a>
                    </li>
                @else
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ route('submitreportdashboard') }}" aria-expanded="false">
                            <span>
                                <i class="bi bi-folder-symlink"></i>
                            </span>
                            <span class="hide-menu">Submit Report</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ route('archive_view') }}" aria-expanded="false">
                            <span>
                                <i class="bi bi-folder-plus"></i>
                            </span>
                            <span class="hide-menu">Archive</span>
                        </a>
                    </li>
                @endif

                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('profile_view') }}" aria-expanded="false">
                        <span>
                            <i class="bi bi-person-circle"></i>
                        </span>
                        <span class="hide-menu">Profile</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
