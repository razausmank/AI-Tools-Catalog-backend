<!--begin::Header-->
<div id="kt_header" class="header  header-fixed ">

    <!--begin::Container-->
    <div class=" container  d-flex align-items-stretch justify-content-between">

        <!--begin::Left-->
        <div class="d-flex align-items-stretch mr-3">

            <!--begin::Header Logo-->
            <div class="header-logo">
                <a href="#">
                    Ai tools backend
                    {{-- <img alt="Logo" src="{{ asset('main/images/logo.png') }}" class="logo-default max-h-70px" /> --}}
                    {{-- <img alt="Logo" src="{{ asset('main/images/logo.png') }}" class="logo-sticky max-h-70px" /> --}}
                </a>
            </div>
            <div class="header-logo">


            </div>
            {{-- Custom Page Begin Here --}}

            @include('partials/_pages_menu');




            <!--end::Header Logo-->

            <!--begin::Header Menu Wrapper-->


            <!--end::Header Menu Wrapper-->
        </div>

        <!--end::Left-->

        <!--begin::Topbar-->
        <div class="topbar">

            {{-- <!--begin::Search-->
			<div class="dropdown">

				<!--begin::Toggle-->
				<div class="topbar-item" data-toggle="dropdown" data-offset="10px,0px">
					<div class="btn btn-icon btn-hover-transparent-white btn-lg btn-dropdown mr-1">
						<span class="svg-icon svg-icon-xl">

							<!--begin::Svg Icon | path:assets/media/svg/icons/General/Search.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
								<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
									<rect x="0" y="0" width="24" height="24" />
									<path d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
									<path d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z" fill="#000000" fill-rule="nonzero" />
								</g>
							</svg>

							<!--end::Svg Icon--></span> </div>
				</div>

				<!--end::Toggle-->

				<!--begin::Dropdown-->
				<div class="dropdown-menu p-0 m-0 dropdown-menu-right dropdown-menu-anim-up dropdown-menu-lg">

					@include("partials/_extras/dropdown/search-dropdown")
				</div>

				<!--end::Dropdown-->
			</div>

			<!--end::Search--> --}}
            <!--begin::Notifications-->
            <div class="dropdown">

                <!--begin::Toggle-->
                <div class="topbar-item" data-toggle="dropdown" data-offset="10px,0px">
                    <div class="btn btn-icon btn-hover-transparent-white btn-dropdown btn-lg mr-1 pulse pulse-primary">
                        <span class="svg-icon svg-icon-xl">

                            <!--begin::Svg Icon | path:assets/media/svg/icons/Code/Compiling.svg--><svg
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24" />
                                    <path
                                        d="M2.56066017,10.6819805 L4.68198052,8.56066017 C5.26776695,7.97487373 6.21751442,7.97487373 6.80330086,8.56066017 L8.9246212,10.6819805 C9.51040764,11.267767 9.51040764,12.2175144 8.9246212,12.8033009 L6.80330086,14.9246212 C6.21751442,15.5104076 5.26776695,15.5104076 4.68198052,14.9246212 L2.56066017,12.8033009 C1.97487373,12.2175144 1.97487373,11.267767 2.56066017,10.6819805 Z M14.5606602,10.6819805 L16.6819805,8.56066017 C17.267767,7.97487373 18.2175144,7.97487373 18.8033009,8.56066017 L20.9246212,10.6819805 C21.5104076,11.267767 21.5104076,12.2175144 20.9246212,12.8033009 L18.8033009,14.9246212 C18.2175144,15.5104076 17.267767,15.5104076 16.6819805,14.9246212 L14.5606602,12.8033009 C13.9748737,12.2175144 13.9748737,11.267767 14.5606602,10.6819805 Z"
                                        fill="#000000" opacity="0.3" />
                                    <path
                                        d="M8.56066017,16.6819805 L10.6819805,14.5606602 C11.267767,13.9748737 12.2175144,13.9748737 12.8033009,14.5606602 L14.9246212,16.6819805 C15.5104076,17.267767 15.5104076,18.2175144 14.9246212,18.8033009 L12.8033009,20.9246212 C12.2175144,21.5104076 11.267767,21.5104076 10.6819805,20.9246212 L8.56066017,18.8033009 C7.97487373,18.2175144 7.97487373,17.267767 8.56066017,16.6819805 Z M8.56066017,4.68198052 L10.6819805,2.56066017 C11.267767,1.97487373 12.2175144,1.97487373 12.8033009,2.56066017 L14.9246212,4.68198052 C15.5104076,5.26776695 15.5104076,6.21751442 14.9246212,6.80330086 L12.8033009,8.9246212 C12.2175144,9.51040764 11.267767,9.51040764 10.6819805,8.9246212 L8.56066017,6.80330086 C7.97487373,6.21751442 7.97487373,5.26776695 8.56066017,4.68198052 Z"
                                        fill="#000000" />
                                </g>
                            </svg>

                            <!--end::Svg Icon-->
                        </span> <span class="pulse-ring"></span>
                    </div>
                </div>

                <!--end::Toggle-->

                <!--begin::Dropdown-->
                {{-- <div class="dropdown-menu p-0 m-0 dropdown-menu-right dropdown-menu-anim-up dropdown-menu-lg">
                    <form>

                        @include("partials/_extras/dropdown/notifications")
                    </form>
                </div> --}}

                <!--end::Dropdown-->
            </div>

            <!--end::Notifications-->
            {{-- <!--begin::Quick Actions-->
			<div class="dropdown">

				<!--begin::Toggle-->
				<div class="topbar-item" data-toggle="dropdown" data-offset="10px,0px">
					<div class="btn btn-icon btn-hover-transparent-white btn-dropdown btn-lg mr-1">
						<span class="svg-icon svg-icon-xl">

							<!--begin::Svg Icon | path:assets/media/svg/icons/Media/Equalizer.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
								<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
									<rect x="0" y="0" width="24" height="24" />
									<rect fill="#000000" opacity="0.3" x="13" y="4" width="3" height="16" rx="1.5" />
									<rect fill="#000000" x="8" y="9" width="3" height="11" rx="1.5" />
									<rect fill="#000000" x="18" y="11" width="3" height="9" rx="1.5" />
									<rect fill="#000000" x="3" y="13" width="3" height="7" rx="1.5" />
								</g>
							</svg>

							<!--end::Svg Icon--></span> </div>
				</div>

				<!--end::Toggle-->

				<!--begin::Dropdown-->
				<div class="dropdown-menu p-0 m-0 dropdown-menu-right dropdown-menu-anim-up dropdown-menu-lg">

					@include("partials/_extras/dropdown/quick-actions")
				</div>

				<!--end::Dropdown-->
			</div>

			<!--end::Quick Actions-->

			<!--begin::My Cart-->
			<div class="dropdown">

				<!--begin::Toggle-->
				<div class="topbar-item" data-toggle="dropdown" data-offset="10px,0px">
					<div class="btn btn-icon btn-hover-transparent-white btn-dropdown btn-lg mr-1">
						<span class="svg-icon svg-icon-xl">

							<!--begin::Svg Icon | path:assets/media/svg/icons/Shopping/Cart3.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
								<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
									<rect x="0" y="0" width="24" height="24" />
									<path d="M12,4.56204994 L7.76822128,9.6401844 C7.4146572,10.0644613 6.7840925,10.1217854 6.3598156,9.76822128 C5.9355387,9.4146572 5.87821464,8.7840925 6.23177872,8.3598156 L11.2317787,2.3598156 C11.6315738,1.88006147 12.3684262,1.88006147 12.7682213,2.3598156 L17.7682213,8.3598156 C18.1217854,8.7840925 18.0644613,9.4146572 17.6401844,9.76822128 C17.2159075,10.1217854 16.5853428,10.0644613 16.2317787,9.6401844 L12,4.56204994 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
									<path d="M3.5,9 L20.5,9 C21.0522847,9 21.5,9.44771525 21.5,10 C21.5,10.132026 21.4738562,10.2627452 21.4230769,10.3846154 L17.7692308,19.1538462 C17.3034221,20.271787 16.2111026,21 15,21 L9,21 C7.78889745,21 6.6965779,20.271787 6.23076923,19.1538462 L2.57692308,10.3846154 C2.36450587,9.87481408 2.60558331,9.28934029 3.11538462,9.07692308 C3.23725479,9.02614384 3.36797398,9 3.5,9 Z M12,17 C13.1045695,17 14,16.1045695 14,15 C14,13.8954305 13.1045695,13 12,13 C10.8954305,13 10,13.8954305 10,15 C10,16.1045695 10.8954305,17 12,17 Z" fill="#000000" />
								</g>
							</svg>

							<!--end::Svg Icon--></span> </div>
				</div>

				<!--end::Toggle-->

				<!--begin::Dropdown-->
				<div class="dropdown-menu p-0 m-0 dropdown-menu-right dropdown-menu-xl dropdown-menu-anim-up">
					<form>

						@include("partials/_extras/dropdown/cart")
					</form>
				</div>

				<!--end::Dropdown-->
			</div>

			<!--end::My Cart-->

			<!--begin::Quick panel-->
			<div class="topbar-item">
				<div class="btn btn-icon btn-hover-transparent-white btn-lg mr-1" id="kt_quick_panel_toggle">
					<span class="svg-icon svg-icon-xl">

						<!--begin::Svg Icon | path:assets/media/svg/icons/Layout/Layout-4-blocks.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
							<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
								<rect x="0" y="0" width="24" height="24" />
								<rect fill="#000000" x="4" y="4" width="7" height="7" rx="1.5" />
								<path d="M5.5,13 L9.5,13 C10.3284271,13 11,13.6715729 11,14.5 L11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 L4,14.5 C4,13.6715729 4.67157288,13 5.5,13 Z M14.5,4 L18.5,4 C19.3284271,4 20,4.67157288 20,5.5 L20,9.5 C20,10.3284271 19.3284271,11 18.5,11 L14.5,11 C13.6715729,11 13,10.3284271 13,9.5 L13,5.5 C13,4.67157288 13.6715729,4 14.5,4 Z M14.5,13 L18.5,13 C19.3284271,13 20,13.6715729 20,14.5 L20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L14.5,20 C13.6715729,20 13,19.3284271 13,18.5 L13,14.5 C13,13.6715729 13.6715729,13 14.5,13 Z" fill="#000000" opacity="0.3" />
							</g>
						</svg>

						<!--end::Svg Icon--></span> </div>
			</div>

			<!--end::Quick panel-->

			<!--begin::Languages-->
			<div class="dropdown">

				<!--begin::Toggle-->
				<div class="topbar-item" data-toggle="dropdown" data-offset="10px,0px">
					<div class="btn btn-icon btn-hover-transparent-white btn-dropdown btn-lg mr-1">
						<img class="h-20px w-20px rounded-sm" src="{{ asset('assets/media/svg/flags/226-united-states.svg') }}" alt="" />
					</div>
				</div>

				<!--end::Toggle-->

				<!--begin::Dropdown-->
				<div class="dropdown-menu p-0 m-0 dropdown-menu-anim-up dropdown-menu-sm dropdown-menu-right">

					@include("partials/_extras/dropdown/languages")
				</div>

				<!--end::Dropdown-->
			</div>

			<!--end::Languages--> --}}

            <!--begin::User-->
            <div class="dropdown">

                <!--begin::Toggle-->
                <div class="topbar-item" data-toggle="dropdown" data-offset="0px,0px">
                    <div
                        class="btn btn-icon btn-hover-transparent-white d-flex align-items-center btn-lg px-md-2 w-md-auto">
                        <span
                            class="text-white opacity-70 font-weight-bold font-size-base d-none d-md-inline mr-1">Hi,</span>
                        <span
                            class="text-white opacity-90 font-weight-bolder font-size-base d-none d-md-inline mr-4">{{ auth()->user()->name }}</span>
                        <span class="symbol symbol-35">
                            <span class="symbol-label text-white font-size-h5 font-weight-bold bg-white-o-30">S</span>
                        </span>
                    </div>
                </div>

                <!--end::Toggle-->

                <!--begin::Dropdown-->
                <div class="dropdown-menu p-0 m-0 dropdown-menu-right dropdown-menu-anim-up dropdown-menu-lg p-0">

                    @include("partials/_extras/dropdown/user")
                </div>

                <!--end::Dropdown-->
            </div>

            <!--end::User-->
        </div>

        <!--end::Topbar-->
    </div>

    <!--end::Container-->
</div>

<!--end::Header-->
