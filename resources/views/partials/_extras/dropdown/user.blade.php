<!--begin::Header-->
<div class="d-flex align-items-center p-8 rounded-top">

    <!--begin::Symbol-->
    <div class="symbol symbol-md bg-light-primary mr-3 flex-shrink-0">
        <img src="{{ asset('assets/media/users/100_1.jpg') }}" alt="" />
    </div>

    <!--end::Symbol-->

    <!--begin::Text-->
    <div class="text-dark m-0 flex-grow-1 mr-3 font-size-h5">{{ auth()->user()->name }}</div>
    {{-- <span class="label label-light-success label-lg font-weight-bold label-inline">3 messages</span> --}}

    <!--end::Text-->
</div>
<div class="separator separator-solid"></div>

<!--end::Header-->

<!--begin::Nav-->
<div class="navi navi-spacer-x-0 pt-5">

    <!--begin::Item-->
    <a href="#" class="navi-item px-8">
        <div class="navi-link">
            <div class="navi-icon mr-2">
                <i class="flaticon2-calendar-3 text-success"></i>
            </div>
            <div class="navi-text">
                <div class="font-weight-bold">
                    My Profile
                </div>
                <div class="text-muted">
                    Account settings and more
                    <span class="label label-light-danger label-inline font-weight-bold">update</span>
                </div>
            </div>
        </div>
    </a>

    <!--end::Item-->

    {{-- <!--begin::Item-->
	<a href="custom/apps/user/profile-3.html" class="navi-item px-8">
		<div class="navi-link">
			<div class="navi-icon mr-2">
				<i class="flaticon2-mail text-warning"></i>
			</div>
			<div class="navi-text">
				<div class="font-weight-bold">
					My Messages
				</div>
				<div class="text-muted">
					Inbox and tasks
				</div>
			</div>
		</div>
	</a>

	<!--end::Item-->

	<!--begin::Item-->
	<a href="custom/apps/user/profile-2.html" class="navi-item px-8">
		<div class="navi-link">
			<div class="navi-icon mr-2">
				<i class="flaticon2-rocket-1 text-danger"></i>
			</div>
			<div class="navi-text">
				<div class="font-weight-bold">
					My Activities
				</div>
				<div class="text-muted">
					Logs and notifications
				</div>
			</div>
		</div>
	</a>

	<!--end::Item-->

	<!--begin::Item-->
	<a href="custom/apps/userprofile-1/overview.html" class="navi-item px-8">
		<div class="navi-link">
			<div class="navi-icon mr-2">
				<i class="flaticon2-hourglass text-primary"></i>
			</div>
			<div class="navi-text">
				<div class="font-weight-bold">
					My Tasks
				</div>
				<div class="text-muted">
					latest tasks and projects
				</div>
			</div>
		</div>
	</a> --}}

    <!--end::Item-->

    <!--begin::Footer-->
    <div class="navi-separator mt-3"></div>
    <div class="navi-footer  px-8 py-5">
        <a href="{{ route('logout') }}" id="logout_button" target="_self"
            class="btn btn-light-primary font-weight-bold"> {{ __('Logout') }}</a>

        <form id="logout_form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>


        {{-- <a href="custom/user/login-v2.html" target="_self" class="btn btn-clean font-weight-bold">Upgrade Plan</a> --}}
    </div>

    <!--end::Footer-->
</div>

<!--end::Nav-->
