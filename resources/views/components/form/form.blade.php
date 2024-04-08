<div class="row justify-content-center py-4 px-8 py-lg-7 px-lg-10">
    <div class="col-xl-12 col-xxl-10">
        <!--Begin:: Form-->
        {{ $form_tag }}
            <div class="row justify-content-center">
                <div class="col-xl-9">
                    <div class="my-5 step">

                       {{ $slot }}

                    </div>

                    <div class="d-flex justify-content-between border-top pt-10 mt-15">
                        <div class="mr-2">
                            {{ $custom_element ?? '' }}
                        </div>
                        <div>
                            <button type="reset" id="{{ $attributes['reset_button_id'] ?? ''}}" class="btn btn-secondary font-weight-bolder px-9 py-4" >Cancel</button>
                            <button type="submit" id="{{ $attributes['submit_button_id'] ?? ''}}" class="btn btn-success font-weight-bolder px-9 py-4" >Submit</button>

                        </div>
                    </div>
                </div>
            </div>
        </form>
        <!--end:: Form-->
    </div>
</div>
