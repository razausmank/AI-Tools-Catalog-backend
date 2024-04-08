<div class="card card-custom">
    <div class="card-header">
        <div class="card-title">
            <h3 class="card-label">
                {{ $attributes['title'] }}
            </h3>
        </div>
        <div class="card-toolbar">
            <!--begin::Dropdown-->
            <div class="dropdown dropdown-inline mr-2">
                <button type="button" class="btn btn-light-primary font-weight-bolder dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="la la-download"></i>Export</button>
                <!--begin::Dropdown Menu-->
                <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                    <ul class="nav flex-column nav-hover">
                        <li class="nav-header font-weight-bolder text-uppercase text-primary pb-2">Choose an option:</li>
                        <li class="nav-item">
                            <a  class="nav-link datatable_print_button">
                                <i class="nav-icon la la-print"></i>
                                <span class="nav-text">Print</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a  class="nav-link datatable_copy_button">
                                <i class="nav-icon la la-copy"></i>
                                <span class="nav-text">Copy</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a  class="nav-link datatable_excel_button">
                                <i class="nav-icon la la-file-excel-o"></i>
                                <span class="nav-text">Excel</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a  class="nav-link datatable_csv_button">
                                <i class="nav-icon la la-file-text-o"></i>
                                <span class="nav-text">CSV</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link datatable_pdf_button">
                                <i class="nav-icon la la-file-pdf-o"></i>
                                <span class="nav-text">PDF</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <!--end::Dropdown Menu-->
            </div>
            <!--end::Dropdown-->
            <!--begin::Button-->
            @if ($attributes['button_text'] )
                <a href="{{ route( $attributes['button_link'] ) }}" class="btn btn-primary font-weight-bolder">
                    <i class="la la-plus"></i>
                        {{ $attributes['button_text'] }}
                </a>
            @endif

            <!--end::Button-->
        </div>
    </div>
    <div class="card-body">
        <!--begin: Datatable-->
        <table class="table table-bordered table-hover table-checkable basic_datatable {{ $attributes['table_class']  }}" id="{{ $attributes['table_id'] }}" >
            <thead>
                <tr>
                    {{ $header }}
                </tr>
            </thead>
            <tbody>
                    {{ $body}}

            </tbody>
        </table>
        <!--end: Datatable-->
    </div>
</div>
